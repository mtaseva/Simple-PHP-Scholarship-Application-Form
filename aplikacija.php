<html>
    <head>
        <meta http-equiv="content-type" context="text/html; charset=utf-8" />
    </head>

    <body>

        <?php

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            if(isset($_POST['selektiraj']) && isset($_POST['ime']) && isset($_POST['prezime']) 
                && !empty($_POST['selektiraj']) && !empty($_POST['ime']) && !empty($_POST['prezime'])) {
                
                $selektiraj = htmlspecialchars(trim($_POST['selektiraj']));

                date_default_timezone_set('Europe/Skopje');
                echo date("l jS \of F Y h:i:s A") . "<br><br>";

                $ocenki = [];
                $siteOcenki = true;

                for($i = 1; $i <= 10; $i++) {
                    if(!empty($_POST['o' . $i])) {
                        $ocenki[] = (float)$_POST['o' . $i];
                    } else {
                        $siteOcenki = false;
                    }
                }

                if(($siteOcenki == true) && (count($ocenki) == 10)) {
                    $prosecnaOcenka = array_sum($ocenki) / count($ocenki);

                    if($selektiraj == 'a') {
                        if($prosecnaOcenka > 9) {
                            echo "Успешна апликација за стипендија Тип А";
                        } else {
                            echo "Неуспешна апликација за стипендија Тип А";
                        }
                    } else if($selektiraj == 'b') {
                        if($prosecnaOcenka > 8) {
                            echo "Успешна апликација за стипендија Тип B";
                        } else {
                            echo "Неуспешна апликација за стипендија Тип B";
                        }
                    } else if($selektiraj == 'c') {
                        if($prosecnaOcenka > 7) {
                            echo "Успешна апликација за стипендија Тип C";
                        } else {
                            echo "Неуспешна апликација за стипендија Тип C";
                        }
                    } 
                } else {
                    echo "Задолжително е внесување на оценки за секој предмет."; 
                }

            } else {
                echo "Пополнете ги сите полиња за успешна апликација!";
            }

        }

        ?>

    </body>

</html>