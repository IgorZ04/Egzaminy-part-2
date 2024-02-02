<?php

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'egzamin';

$dbConn = new mysqli($host, $user, $password, $db);

$name = 'cookie1';
$value = 1;
$expire = time() + 60*60;
$path = '/';


setcookie($name,  $value, $expire);

?>
<!DOCTYPE html>
<html lang="pl">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odloty samolotów</title>
    <link rel="stylesheet" href="./styl6.css">
</head>

<body>



    <header>

        <section id="header_left">

            <h2>Odloty z lotniska</h2>

        </section>

        <section id="header_right">

            <img src="./zad6.png" alt="logotyp">

        </section>

    </header>

    <main>

        <h4>tabela odlotów</h4>
        <table>
            <tr>
                <th>lp.</th>
                <th>numer rejsu</th>
                <th>czas</th>
                <th>kierunek</th>
                <th>status</th>
            </tr>
            <!-- script 1 -->

            <?php

            $sql_kw1_select = "SELECT `id`, `nr_rejsu`, `czas`, `kierunek`, `status_lotu` FROM `odloty` ORDER BY `czas` DESC;";
            $sql_kw1_resault = mysqli_query($dbConn, $sql_kw1_select);

            while ($data = mysqli_fetch_array($sql_kw1_resault, MYSQLI_BOTH)) {

                $id = $data['id'];
                $fly_number = $data['nr_rejsu'];
                $fly_status = $data['status_lotu'];
                $time = $data['czas'];
                $fly_to = $data['kierunek'];

                echo <<<TX

                            <tr>
                            
                            <td>$id</td>
                            <td>$fly_number</td>
                            <td>$time</td>
                            <td>$fly_to</td>
                            <td>$fly_status</td>
                            
                            </tr>

                        TX;
            }

            ?>

        </table>

    </main>

    <footer>

        <section id="footer_left">

            <a href="../screeny/kw1.png">Pobierz obraz</a>

        </section>

        <section id="footer_center">

            <!-- script 2 -->




            <?php

            

            if (!$_COOKIE) {
                echo <<<TX

                     <p><i>Dzień Dobry! Sprawdź regulamin naszej strony</i></p>

                 TX;
            } else {

                echo <<<TX

                 <p><i>Miło nam, że nas znowu odwiedziłeś</i></p>

                 TX;
            }




            ?>

        </section>

        <section id="footer_right">

            <span>autor: 00000000000</span>

        </section>

    </footer>

</body>

<?php $dbConn->close() ?>

</html>