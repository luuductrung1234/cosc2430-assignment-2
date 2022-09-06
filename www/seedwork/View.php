<?php

namespace SeedWork;

require_once SEED_WORK_PATH . "exceptions/ViewNotFoundException.php";
require_once SERVICE_PATH . "AuthenticationService.php";

use SeedWork\Exceptions\ViewNotFoundException;
use Services\AuthenticationService;

class View
{
    public function __construct(
        protected string $view,
        protected array  $viewData = [],
        protected array  $layoutData = []
    )
    {
    }

    public static function make(string $view, array $viewData = []): static
    {
        return new static($view, $viewData);
    }

    /**
     * @throws ViewNotFoundException
     */
    public function render(): string
    {
        if(str_contains($this->view, '.html'))
            return $this->tryResolveView();
        return $this->tryResolveLayout($this->tryResolveView());
    }

    /**
     * @throws ViewNotFoundException
     */
    private function tryResolveView(): string
    {
        $extension = str_contains($this->view, '.') ? '' : '.php';
        $viewPath = VIEW_PATH . $this->view . $extension;
        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException();
        }
        foreach ($this->viewData as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include $viewPath;
        $viewContent = (string)ob_get_clean();
        $this->prepareLayoutData($viewPath, $viewContent);
        return $viewContent;
    }

    private function prepareLayoutData(string $viewPath, string $viewContent): void
    {
        $account = AuthenticationService::getAccount();
        
        $viewDir = dirname($viewPath);
        $dirParts = explode(DIRECTORY_SEPARATOR, $viewDir);
        $cwdName = $dirParts[count($dirParts) - 1];
        $cwdName = $cwdName == "views" ? "" : $cwdName;
        
        $viewParts = explode("/", $this->view);
        $viewName = $viewParts[count($viewParts) - 1];

        $this->layoutData["_title"] = "";
        $this->layoutData["_show_header"] = true;
        $this->layoutData["_show_footer"] = true;
        $this->layoutData["_show_cart"] = !empty($account) && $account["role"] === CUSTOMER_ROLE;
        $this->layoutData["_show_order_history"] = !empty($account) && $account["role"] === CUSTOMER_ROLE;
        $this->layoutData["_styles"] = [];
        $this->layoutData["_scripts"] = [];
        $this->layoutData["_content"] = $viewContent;
        $this->layoutData["_avatar"] = "default-img.png";

        $name = explode('.', $viewName)[0];
        foreach (scandir($viewDir) as $staticFileName) {
            if(!str_contains($staticFileName, $name))
                continue;
            if (str_contains($staticFileName, ".js")) {
                $this->layoutData["_scripts"][] = STATIC_FILE_PATH . $cwdName . DIRECTORY_SEPARATOR . $staticFileName;
                continue;
            }
            if (str_contains($staticFileName, ".css")) {
                $this->layoutData["_styles"][] = STATIC_FILE_PATH . $cwdName . DIRECTORY_SEPARATOR . $staticFileName;
            }
        }

        foreach ($this->viewData as $key => $value) {
            if (str_starts_with($key, "_")) {
                $this->layoutData[$key] = $value;
            }
        }
    }

    private function tryResolveLayout(string $viewContent): string
    {
        $layoutPath = VIEW_PATH . '/_layout.php';
        if (!file_exists($layoutPath)) {
            return $viewContent;
        }
        foreach ($this->layoutData as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include $layoutPath;
        return (string)ob_get_clean();
    }

    /**
     * @throws ViewNotFoundException
     */
    public function __toString(): string
    {
        return $this->render();
    }

    public function __get(string $name)
    {
        return $this->viewData[$name];
    }
}