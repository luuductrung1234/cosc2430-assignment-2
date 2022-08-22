<?php

declare(strict_types=1);

namespace SeedWork;

require_once SEED_WORK_PATH . "exceptions/RouteNotFoundException.php";
require_once SERVICE_PATH . "AuthenticationService.php";

use SeedWork\Exceptions\RouteNotFoundException;
use Services\AuthenticationService;

class Router
{
    private array $routes;
    private bool $forwardStaticFile = false;

    public function register(string $requestMethod, string $route, callable|array $action, ?string $role = null): self
    {
        $this->routes[$requestMethod][$route][$role ?? NONE_ROLE] = $action;
        return $this;
    }

    public function get(string $route, callable|array $action, ?string $role = null): self
    {
        return $this->register("get", $route, $action, $role);
    }

    public function post(string $route, callable|array $action, ?string $role = null): self
    {
        return $this->register("post", $route, $action, $role);
    }

    public function put(string $route, callable|array $action, ?string $role = null): self
    {
        return $this->register("put", $route, $action, $role);
    }

    public function delete(string $route, callable|array $action, ?string $role = null): self
    {
        return $this->register("delete", $route, $action, $role);
    }

    public function routes(): array
    {
        return $this->routes;
    }

    public function allowForwardStaticFile(): self
    {
        $this->forwardStaticFile = true;
        return $this;
    }

    public function isStaticFile(string $requestUri): bool
    {
        return str_contains($requestUri, ".js") || str_contains($requestUri, ".css");
    }

    /**
     * @throws RouteNotFoundException
     */
    public function resolve(string $requestMethod, string $requestUri)
    {
        $route = explode('?', $requestUri)[0];
        
        if ($this->forwardStaticFile && $this->isStaticFile($requestUri)) {
            ob_start();
            include VIEW_PATH . $requestUri;
            return (string)ob_get_clean();
        }
        
        $action = null;
        if (!str_starts_with($route, LOGIN_URL) && !str_starts_with($route, REGISTER_URL)) {
            $account = AuthenticationService::getAccount();
            if (empty($account)) {
                header("Location: " . LOGIN_URL);
            }
            $action = $this->routes[$requestMethod][$route][$account["role"]] ?? null;
        }
        $action = $action ?? $this->routes[$requestMethod][$route][NONE_ROLE] ?? null;

        if (!$action) {
            throw new RouteNotFoundException();
        }

        if (is_callable($action)) {
            return call_user_func($action);
        }

        if (is_array($action)) {
            [$class, $method] = $action;
            if (class_exists($class)) {
                $class = new $class;
                if (method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], []);
                }
            }
        }
    }
}
