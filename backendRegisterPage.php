<?php

require_once ("base.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if(empty($name) || empty($email) || empty($password)){
    echo "leave";
}
else{
    $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";
    @$conn->query($sql);
    echo "przeszlo";
}

?>