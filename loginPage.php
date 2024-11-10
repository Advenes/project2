<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>second</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<?php    
    require_once "conn.php"; 
    
    if(mysqli_connect_error()) {
        die("conn" . mysqli_connect_error());
    }
    session_start();
?>

<body>

<div class="main">

    <div class="header">
        <div class="scaling">
            <a href="index.php">Firma</a>
            <div class="headerhrefs">
                <div class="account">
                <?php 
                if($_SESSION['username'] == ""){
                    echo("<a href='loginPage.php'>ACCOUNT</a></div>");
                }
                else{
                    echo("<a href='userPanel.php'>ACCOUNT</a></div>");
                }
                ?>
                <div class="youroffers"><a>YOUR OFFERS</a></div>
                <div class="support"><a>SUPPORT</a></div>
                <button onclick="openin()" style="all:unset; cursor: pointer;height: 40px;margin-bottom:5px"><div id="src"><a><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg></a></button>
            </div>
        </div>
    </div>

    <div class="topbar" id="topbar">
        <form action="index_search.php" method="POST">
            <input type="text" name="searchbar" class="inputtop" placeholder="  Search">
            <button type="submit" class="searchbutton"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg></button>
        </form>
    </div>


    <div class="mainLogin">
        <h2>Login</h2>
        <form method="post" action="backendLoginPage.php">
            <div class="input1">EMAIL: <br><input type="email" name="email" required></div>
            <div class="input2">PASSWORD: <br><input type="password" name="pass" required></div>
            <div class="input3"><input type="submit" name="button" value="LOGIN"></div>
        </form>
        <signin>Don't have an account? - <u><a href="registerPage.php">Sign in</a></u></signin>
    

<wrg>

<?php

if($_SESSION['fail'] == 1){
    echo("Login is incorrect");
}
else if($_SESSION['fail'] == 2){
    echo("Password is incorrect");
}

$_SESSION['fail'] = 0;

$conn -> close();
?>
</wrg>
</div>
</div>
</body>

<script type="text/javascript" src="script.js">
</script>

</html>