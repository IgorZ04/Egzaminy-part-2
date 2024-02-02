<!DOCTYPE html>
<html lang="pl">

<?php

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'dane3';

$dbConn = new mysqli($host, $user, $password, $db);

if(isset($_POST['delete_film'])){

    $film_id = $_POST['delete_film'];

    $sql_delete = "DELETE FROM `produkty` WHERE `id`=$film_id; ";
    mysqli_query($dbConn, $sql_delete);

}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video on Demand</title>
    <link rel="stylesheet" href="styl3.css">
</head>

<body>

    <header>

        <!-- banner left -->
        <section id="header_left">

            <h1>Internetowa wypożyczalnia filmów</h1>

        </section>


        <!-- banner right -->
        <section id="header_right">

            <table>

                <tr>
                    <td>Kryminał</td>
                    <td>Horror</td>
                    <td>Przygodowy</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>30</td>
                    <td>20</td>
                </tr>

            </table>

        </section>

    </header>

    <main>

        <section id="recommended">

            <h3>Polecamy</h3>
            <div class="list">


                <!-- script 1 -->
                <?php

                $sql_script1 = "SELECT `id`, `nazwa`, `opis`, `zdjecie` FROM `produkty` WHERE `id` IN (18,22,23,25); ";
                $sql_resault = mysqli_query($dbConn, $sql_script1);

                while ($info = mysqli_fetch_array($sql_resault, MYSQLI_BOTH)) {

                    $name = $info['nazwa'];
                    $id = $info['id'];
                    $img = $info['zdjecie'];
                    $desc = $info['opis'];

                    echo <<<TX
                
                <div class="film">
                
                <h4>$id, $name</h4>
                <img src="./$img" alt="film">
                <p>$desc</p>
                
                </div>
                
                
                TX;
                }

                ?>
            </div>

        </section>

        <section id="fantastic_films">

            <h3>Filmy fantastyczne</h3>

            <div class="list">
                <!-- script 2 -->
                <?php

                $sql_script2 = "SELECT `id`, `nazwa`, `opis`, `zdjecie` FROM `produkty` WHERE `Rodzaje_id` = 12;";
                $resqult2 = mysqli_query($dbConn, $sql_script2);

                while ($row = mysqli_fetch_array($resqult2, MYSQLI_BOTH)) {

                    $name = $row['nazwa'];
                    $id = $row['id'];
                    $img = $row['zdjecie'];
                    $desc = $row['opis'];

                    echo <<<TX
                
                <div class="film">
                
                <h4>$id, $name</h4>
                <img src="./$img" alt="film">
                <p>$desc</p>
                
                </div>
                
                
                TX;
                }

                ?>

            </div>

        </section>

    </main>

    <footer>

        <form action="./video.php" method="post">

            <label for="delete_film">Usuń film nr.: </label>
            <input type="number" id="delete_film" name="delete_film">
            <input type="submit" value="Usuń film">
            <br>
            <span>Stronę wykonał: <a href="ja@poczta.com">00000000000</a></span>

        </form>

    </footer>

</body>

<?php $dbConn->close() ?>

</html>