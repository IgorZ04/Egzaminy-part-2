<!DOCTYPE html>

<?php 

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'egzamin3';

$dbConn = new mysqli($host, $user, $password, $db);

if(!$dbConn){
    echo "Connection error";
}

?>

<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki i urlopy</title>
    <link rel="stylesheet" href="styl3.css">
</head>

<body>

    <header>

        <h1>BIURO PODRÓŻY</h1>

    </header>

    <main>

        <section id="main_left">

            <h2>KONTAKT</h2>

            <a href="biuro@wycieczki.pl">napisz do nas</a>
            <p>telefon: 555666777</p>

        </section>

        <section id="main_center">
            
            <h2>GALERIA</h2>

            <!-- script 1 -->

            <?php 
            
                $sql1 = "SELECT `nazwaPliku`, `podpis` FROM `zdjecia` ORDER BY `podpis` ;";
                $sql1_resault = $dbConn->query($sql1);

                while ($data = mysqli_fetch_array($sql1_resault, MYSQLI_BOTH)){

                    $img_src = $data['nazwaPliku'];
                    $img_alt = $data['podpis'];

                    echo <<< TX

                    <img src="$img_src" alt="$img_alt">
                    

                    TX;

                }
            
            ?>

        </section>

        <section id="main_right">
            
            <h2>PROMOCJE</h2>

            <table>

                <tr>
                    <td>Jesień</td>
                    <td>Grupa 4+</td>
                    <td>Grupa 10+</td>
                </tr>

                <tr>
                    <td>5%</td>
                    <td>10%</td>
                    <td>15%</td>
                </tr>

            </table>

        </section>

    </main>

    <section id="data">

        <h2>LISTA WYCIECZEK</h2>

        <!-- script 2 -->
        <?php 
        
                $sql2 = "SELECT `id`, `dataWyjazdu`, `cel`, `cena` FROM `wycieczki` WHERE `dostepna` = 1;";
                $sql2_resault = $dbConn->query($sql2);

                

                while ($data2 = mysqli_fetch_array($sql2_resault, MYSQLI_BOTH)){

                    $id = $data2['id'];
                    $datawyjazdu = $data2['dataWyjazdu'];
                    $cel = $data2['cel'];
                    $cena = $data2['cena'];

                    echo "$id. $datawyjazdu, $cel, $cena <br>";

                }
        
        ?>

    </section>

    <footer>

        <p>Stronę wykonał: 00000000000</p>

    </footer>

</body>

</html>

<?php $dbConn->close() ?>