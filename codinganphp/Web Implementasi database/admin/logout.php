<?php
    session_start();

    session_destroy();

    $cookie_name = "cookie_email";
    $cookie_value = "";
    $cookie_time = time() - (60 * 60); //1 hari
    setcookie($cookie_name, $cookie_value, $cookie_time, "/");

    $cookie_name = "cookie_password";
    $cookie_value = "";
    $cookie_time = time() - (60 * 60); //1 hari
    setcookie($cookie_name, $cookie_value, $cookie_time, "/");
    header("Location: index.php");

    $cookie_name = "cookie_name";
    $cookie_value = "";
    $cookie_time = time() - (60 * 60 ); //1 hari
    setcookie($cookie_name, $cookie_value, $cookie_time, "/");
?>