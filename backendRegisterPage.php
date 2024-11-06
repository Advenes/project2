<?php

include_once("conn.php");

if(mysqli_connect_error()){
    die("error" . mysqli_connect_error());
}

session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];

$sql1 = "SELECT `email` from `konta` where '$email' = `email`";
$result = $conn -> query($sql1);
if($result -> num_rows > 0 || strlen($name) < 3 || strlen($password) < 6 || strlen($phone) != 9){
    header('Location: registerPage.php');
    $_SESSION['fail'] = 1;
    exit();
}
echo('1');
$sql2 = "INSERT INTO `konta`(`username`,`email`,`password`,`phone`) values ('$name','$email','$password','$phone')";
$query = $conn -> query($sql2);
$_SESSION['email'] = $email;
$_SESSION['password'] = $pass;
session_close();

$conn -> close();
?>