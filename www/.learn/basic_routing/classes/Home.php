<?php

declare(strict_types=1);

namespace App\Classes;

class Home
{
    public function index(): string
    {
        $_SESSION["count"] = ($_SESSION["count"] ?? 0) + 1;
        return <<<HTML
        <form action="/upload" method="post" enctype="multipart/form-data">
            <label for="avatar">Avatar</label>
            <input type="file" name="avatar"/>
            <button type="submit">Upload</button>
        </form>
        HTML;
    }

    public function upload(): void
    {
        echo "<pre>";
        var_dump($_FILES);
        var_dump(pathinfo($_FILES["avatar"]["tmp_name"]));
        echo "</pre>";
        
        $fileName = $_FILES["avatar"]["name"];
        $filePath = STORAGE_PATH . DIRECTORY_SEPARATOR . $fileName;
        
        move_uploaded_file($_FILES["avatar"]["tmp_name"], $filePath);
        
        echo "<pre>";
        var_dump(pathinfo($filePath));
        echo "</pre>";
    }
}
