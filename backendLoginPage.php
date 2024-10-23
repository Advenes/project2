<?php

session_start();

require_once ("base.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if(empty($name) || empty($email) || empty($password)){

}
else{
    $sql = "SELECT * from `users` WHERE `password` = '$password' && `email` = '$email' && `name` = '$name' ";
    $result = @$conn->query($sql);
    if($result->num_rows > 0){
        echo "login succesful";
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
    }
    else{
        echo "login unsuccesful";
    }
}
header("Location: index.php");
exit();
?>