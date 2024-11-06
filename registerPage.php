<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>second</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<?php    
    require_once "conn.php"; 
    
    if(mysqli_connect_error()) {
        die("conn" . mysqli_connect_error());
    }
?>

<body>

<div class="main">

    <div class="header">
        <div class="scaling">
            <a href="index.php">Firma</a>
            <div class="headerhrefs">
                <div class="account"><a href="loginPage.php">ACCOUNT</a></div>
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
        <h2>Register</h2>
        <form method="post" action="backendRegisterPage.php">
            <div class="input1">NAME: <br><input type="text" name="name" required></div>
            <div class="input1">EMAIL: <br><input type="text" name="email" required></div>
            <div class="input1">PHONE: <br><input type="text" name="phone" required></div>
            <div class="input2">PASSWORD: <br><input type="password" id="pass" name="password" required><i onclick="changeType()" class='fas fa-eye'></i></div>
            <div class="input3"><input type="submit" name="button" value="REGISTER"></div>
        </form>
        <signin>Have an account? - <u><a href="loginPage.php">Log in</a></u></signin>
        <wrg>
        <?php

        session_start();

        if($_SESSION['fail'] == 1){
            echo("Credentials incorrect.");
        }

        $_SESSION['fail'] = 0;
        $conn -> close();
        ?>
        </wrg>
    </div>

</div>

</body>

<script>
const topbar = document.getElementById("topbar");

function openin() {
    topbar.classList.toggle('active');
}

const input = document.getElementById("pass");
var passShown = 0;

function changeType(){
    
    if (passShown == 0){
        passShown = 1;
        input.type = "text";
        console.log("active");
    }
    else{
        passShown = 0;
        input.type = "password";
        console.log("not active");
    }
}

</script>

</html>