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

$sql = $conn -> "SELECT `email` from `konta` where '$email' = `email`";
$sql -> bind_param("s", $email);
$sql -> execute();
$result = $sql -> get_result();
if($result -> num_rows > 0 || strlen($name) < 3 || strlen($password) < 6 || strlen($phone) != 9){
    header('Location: registerPage.php');
    $_SESSION['fail'] = 1;
    exit();
}
// password hash
$passwordh = password_hash($password,PASSWORD_DEFAULT);
// hash password into database
$sql2 = "INSERT INTO `konta`(`username`,`email`,`password`,`phone`) values ('$name','$email','$passwordh','$phone')";
$query = $conn -> query($sql2);
$_SESSION['email'] = $email;
$_SESSION['password'] = $passwordh;
$_SESSION['username'] = $username;
$_SESSION['phone'] = $phone;
header('Location: loginPage.php');
exit();
?>