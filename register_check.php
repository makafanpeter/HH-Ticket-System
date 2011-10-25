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

$user = new user($mysql);

if (isset($_POST['reg_btn'])) {
	if (isset($_POST['username'])) {
		$details['username'] = $_POST['username'];
	}
	
	if (isset($_POST['password1']) && isset($_POST['password2'])) {
		if (($_POST['password1']) == ($_POST['password2'])) {
			$details['password'] = $_POST['password1'];
		}
	}
	
	if (isset($_POST['email'])) {
		$details['email'] = $_POST['email'];
	}
	
	if (isset($_POST['habbo'])) {
		$details['habbo_name'] = $_POST['habbo'];
	}
	
	$user->register($details);
	
	header("Location: login.php");
	
}
?>