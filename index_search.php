<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>second</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<?php    
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername,$username,$password, "firma");
    
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

    <div class="filters"></div>
    
    <div class="offers">
    <div class="sctitle">Wyniki wyszukiwania:</div>
    <?php
$searchbar = $_POST["searchbar"];
$sql = "SELECT  id, zdj1, nazwa, opis, telefon, stan, cena, ilosc from oferty where nazwa like '%$searchbar%'";
$result = $conn-> query($sql);

if($result-> num_rows > 0){
    while ($row = $result-> fetch_assoc()) {
        $zdj = $row["zdj1"];
        $cena = $row["cena"];
        $id = $row['id'];
        echo '<div class="ofert">' . '<div class="left"><img class="ofertimage" style="width: 200px" src=' .  $zdj . '/></div>' . '<div class="right"><div class="oferttitle">' .
        $row['nazwa'] . '</div>' . '<div class="desc">' . ''
        . '<div class="right2">'  . "<b>$cena</b> zł" . '<div class="stan">' . $row['stan'] .
         '</div><div class="ilosc">' . "ilość na stanie: " . $row['ilosc'] . '</div></div>' . 
         "<form><a href='index_oferta.php?id={$row['id']}'.'><button type='button' class='btn' style='background-color:white; border-radius:5px; border: 1px solid black; width:90px;height:40px;cursor:pointer;font-size:14px; font-family: Montserrat, sans-serif;'>ZAMÓW</button></a></form></div></div></div>"
        
        . '';
    }
}
else{
    echo "no results";
}

$conn-> close();

?>

</div>

    </div>

    <div class="ad"></div>
    <div class="footer"></div>

</div>

</body>

<script type="text/javascript" src="script.js">
</script>

</html>
