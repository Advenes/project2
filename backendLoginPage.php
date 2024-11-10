
<?php

require_once 'conn.php';

    if(mysqli_connect_error()){
        die("error". mysqli_connect_error());
    }

session_start();
$email = $_POST["email"];
$pass = $_POST["pass"];

$sql = $conn->prepare("SELECT `email`,`password`,`username`,`phone` from `konta` where `email` = ?");
$sql -> bind_param("s",$email);
$sql->execute();
$result = $sql->get_result();
if($result -> num_rows > 0){
    while($row = $result -> fetch_assoc()){
        if(password_verify($pass, $row['password'])) {
            $_SESSION['email'] = $email;
            $passwordh = password_hash($pass,PASSWORD_DEFAULT);
            $_SESSION['password'] = $passwordh;
            $_SESSION['username'] = $row['username'];
            $_SESSION['phone'] = $row['phone'];
            header('Location: userPanel.php');
            exit();        
            }
        else{
            header("Location: loginPage.php");
            $_SESSION['fail'] = 2;
            exit();
        }
    }
}
else{
    header("Location: loginPage.php");
    $_SESSION['fail'] = 1;
    exit();
}
$conn -> close();

?>