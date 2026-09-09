<?php

if (isset($_POST["pass"]) && isset($_POST["token"])){
    $salt = "221wh0dyanikAbollokOvs3ZhO1ii1ixoxoxo132112";
    $pass = hash('sha256', $salt . $_POST["pass"]);
    $token = $_POST["token"];
    $fileData = file_get_contents("session.php");
    $fileData = preg_replace('/\$currentPassword\s*\=.*/', '$currentPassword = "' . $pass . '";', $fileData);
    $fileData = preg_replace('/\$currentToken\s*\=.*/', '$currentToken = "' . $token . '";', $fileData);
    file_put_contents("session.php", $fileData);
    if (file_exists("./novi-intro-password.txt")){
        unlink("./novi-intro-password.txt");
    }
}