<?php
session_start();

if (isset($_POST["logout"])){
    unset($_SESSION['User']);
}  
if (!isset($_SESSION["User"])){
    header("Location: /www/login/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>welcome</h1>
    <form method="post">
        <input type="hidden" name="logout" value="1">
        <input type="submit" value="logout">
    </form>
</body>
</html>