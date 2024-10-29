<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
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
                <div class="account"><a>ACCOUNT</a></div>
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
    <div class="offerinside">

        <?php
        $id = $_GET['id'];

?>




<?php

$sql = "SELECT `id`,`zdj1`,`zdj2`,`zdj3`,`zdj4`,`zdj5`,
(CASE WHEN `zdj1` IS NULL OR `zdj1` = '0' OR `zdj1` = '' THEN 0 ELSE 1 END +
CASE WHEN `zdj2` IS NULL OR `zdj2` = '0' OR `zdj1` = '' THEN 0 ELSE 1 END +
CASE WHEN `zdj3` IS NULL OR `zdj3` = '0' OR `zdj1` = '' THEN 0 ELSE 1 END +
CASE WHEN `zdj4` IS NULL OR `zdj4` = '0' OR `zdj1` = '' THEN 0 ELSE 1 END +
CASE WHEN `zdj5` IS NULL OR `zdj5` = '0' OR `zdj1` = '' THEN 0 ELSE 1 END
) AS `ilosczdj`, `nazwa`, `opis`, `telefon`, `stan`, `cena`, `ilosc` from `oferty` where id = $id";
$result = $conn-> query($sql);

if($result-> num_rows > 0){
    while ($row = $result-> fetch_assoc()) {
        $id = $row['id'];
        $cena = $row["cena"];
        $ilosc = $row["ilosc"];
        $ilosczdjeczag = $row['ilosczdj'];
        
        echo "
        <div class='double_oferta'>
            <div class='galeria'>
                <div class='carousel'>
                    <div class='carousel-inner' id='carouselInner'>";

        for ($iloscid = 1; $iloscid <= $ilosczdjeczag; $iloscid++) {
            $akt = $row['zdj' . $iloscid];

            // DISPLAY CAROUSEL
            if ($iloscid == 1) {
                echo "<div class='carousel-item active'>
                        <a href='photo.php?id={$row['id']}'.'><img src='$akt' style='width:400px'></a>
                      </div>";
            } else {
                echo "<div class='carousel-item'>
                        <a href='photo.php?id={$row['id']}'.'><img src='$akt' style='width:400px'></a>
                      </div>";
            }
        }

        echo "      </div>
                    <button class='carousel-control-prev' onclick='prevSlide()'>‹</button>
                    <button class='carousel-control-next' onclick='nextSlide()'>›</button>
                </div>
            </div>";

        // END OF CAROUSEL
        echo "<div class='tittleandbutton'><div class='title'>" . $row["nazwa"] . "</div>
        <div class='stan_oferta'> Stan: " . $row["stan"] . "</div>
        <div class='cena_oferta'>Cena: <b>" . $row["cena"] . "</b> zł<br>
            <phone>od: " . $row['telefon'] . "</phone></div>
            <div class='column'>
                <div class='ilosc_cena'>
                    <div class='ilosc'>ilość: " . $row['ilosc'] . "</div>
                    <div class='ilosc-suw'>
                        <button id='ilosc-mns' data-action='minus' type='button'>-</button>
                        <input id='ilosc-input' class='ilosc-inpt' type='number' name='ilosc-inpt' min='1' max='$ilosc' value='1'>
                        <button id='ilosc-add' data-action='add' type='button'>+</button>
                    </div>
                    <button type='button' class='btn' style='width:140px;height:47px;cursor:pointer;font-size:25px;'>" . $row["cena"] . "zł</button>
                </div>
            </div></div>
            <br><br>
            <div class='opis-oferta'><br><br>Opis produktu:<br><phone2>" . $row['opis'] . "</phone2></div>
            <br><br>
            <div class='opis-oferta'>Kontakt do sprzedawcy:<br><phone>" . $row['telefon'] . "</phone></div>";
    }
} else {
    echo "no results";
}

$conn-> close();
?>
        </div></div>

    </div>

    <script type="text/javascript">

const topbar = document.getElementById("topbar");

function openin() {
    topbar.classList.toggle('active');
}

const inputElement = document.getElementById('ilosc-input');
            const min = parseInt(inputElement.getAttribute('min'));
            const max = parseInt(inputElement.getAttribute('max'));

function setInputValue(value){
        document.getElementById('ilosc-input').value = value;
        }
        document.getElementById('ilosc-add').addEventListener('click', function() {
            value = document.getElementById('ilosc-input').value;
            if(value < max){
                setInputValue(parseInt(value)+1);
                console.log('add');
            }
        });

        document.getElementById('ilosc-mns').addEventListener('click', function() {
            value = document.getElementById('ilosc-input').value;
            if(value > min){
                setInputValue(parseInt(value)-1);
                console.log('min');
            }
        });

        let currentIndex = 0;

function showSlide(index) {
    const carouselInner = document.getElementById('carouselInner');
    const totalSlides = carouselInner.children.length;

    if (index >= totalSlides) {
        currentIndex = 0;
    } else if (index < 0) {
        currentIndex = totalSlides - 1;
    } else {
        currentIndex = index;
    }

    const offset = -currentIndex * 100;
    carouselInner.style.transform = 'translateX(' + offset + '%)';
}

function nextSlide() {
    showSlide(currentIndex + 1);
}

function prevSlide() {
    showSlide(currentIndex - 1);
}
</script>




</body>
</html>