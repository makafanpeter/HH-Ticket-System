<?php
session_start();

function __autoload($class_name) {
    include 'classes/' . $class_name . '.php';
}

include "config.php";

$mysql = new Mysql(MYSQL_HOST, MYSQL_USER, MYSQL_PASS);

$con = $mysql->connect();
$database = $mysql->selectDB(MYSQL_DATABASE, $con);

$error = new Error();

if (isset($_POST['login_btn'])) {
    $user = new User($mysql);
    
    //echo ($user->login($_POST['username'], $_POST['password'])) ? "True" : "False";
    
    if ($user->login($_POST['username'], $_POST['password']) == false) {
        $error->add("Login Fail", "Username or Password were incorrect!");
    }
}

header("Location: index.php");
?>