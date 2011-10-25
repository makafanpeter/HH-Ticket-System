<?php
session_start();

function __autoload($class_name) {
    include 'classes/' . $class_name . '.php';
}

include "config.php";

try {
	$mysql = new Mysql(MYSQL_HOST, MYSQL_USER, MYSQL_PASS);
	$con = $mysql->connect();
	$database = $mysql->selectDB(MYSQL_DATABASE, $con);
} catch (Exception $e) {
	echo $e->getMessage();
}
$error = new Error();
if (isset($_POST['login_btn'])) {
    $user = new User($mysql);
    $username = $user->login($_POST['username'], $_POST['password']);
    //echo ($user->login($_POST['username'], $_POST['password'])) ? "True" : "False";
    
    if (!$username) {
        $error->add("Login Fail", "Username or Password were incorrect!");
    } else {
		$_SESSION['logged_in'] = $_POST['username'];
		header("Location: index.php");
	}
	header("Location: login.php");

}

?>