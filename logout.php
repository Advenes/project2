<?php
include_once('conn.php');

session_start();

$_SESSION['username'] = "";
$_SESSION['password'] = "";
$_SESSION['phone'] = "";
$_SESSION['email'] = "";

header('Location: index.php');
exit();

?>