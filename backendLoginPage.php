
<?php

require_once 'conn.php';

    if(mysqli_connect_error()){
        die("error". mysqli_connect_error());
    }

session_start();

$email = $_POST["email"];
$pass = $_POST["pass"];

$sql = "SELECT `email`,`password` from `konta` where `email` = '$email' && `password` = '$pass'";
$result = $conn -> query($sql);
if($result -> num_rows > 0){
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $pass;
}
else{
    header("Location: loginPage.php");
    $_SESSION['fail'] = 1;
    exit();
}
$conn -> close();

?>