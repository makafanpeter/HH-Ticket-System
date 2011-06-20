<?php
function __autoload($class_name) {
    include 'classes/' . $class_name . '.php';
}
$mysql = new Mysql("localhost", "root", "");
$error = "";

if (isset($_POST['login_btn'])) {
    $user = new User($mysql);
    if (!$user->login($_POST['username'], $_POST['password'])) {
        $error .= "#Login failed!";
    }
}
if (Util::isText($error)) {
    header("Location: index.php?e=".$error);
}
header("Location: index.php");
?>