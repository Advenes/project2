<?php
require_once "conn.php";
if(mysqli_connect_error()) {
    die("conn" . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
    include_once 'conn.php';
    if(mysqli_connect_error()){
        die("error". mysqli_connect_error());
    }
    session_start();
    $name = $_SESSION['username'];
    $email = $_SESSION['email'];
?>

    

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

    <div class="mainProfile">
        <name><?php echo($name); ?></name>
    <div class="logout">
        <u><a href="logout.php">Logout</a></u>
    </div>
    </div>


</div>
</body>

<script type="text/javascript" src="script.js">
</script>
</html>