<?php

declare(strict_types=1);

namespace App\Classes;

class Invoice
{
    public function index(): string
    {
        unset($_SESSION["count"]);
        setcookie("username", "thomas", time() + 10);
        return "Invoice";
    }

    public function create(): string
    {
        echo "<pre>";
        var_dump($_REQUEST);
        echo "</pre>";

        echo "<pre>";
        var_dump($_GET);
        echo "</pre>";

        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        return <<<HTML
        <form action="/invoices/create?foo=bar" method="post">
            <label for="name">Amount</label>
            <input type="number" name="amount"/>
        </form>
        HTML;
    }

    public function store(): void
    {
        $amount = $_POST["amount"];

        var_dump($amount);
    }
}