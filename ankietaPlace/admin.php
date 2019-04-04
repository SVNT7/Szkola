<?php
    require('function.inc');
    $op = (isSet($_GET['op'])) ? $op = $_GET['op'] : $op = '';

    $title = "Wybierz kategorię analizy";
    $t1 = '';
    $t2 = '';
    $t3 = '';
    $t4 = '';

    $o1 = '';
    $o2 = '';
    $o3 = '';
    $o4 = '';
    
    
    switch($op){
        case 'send':
            $wiek = $_POST['wiek'];
            $plec = $_POST['plec'];
            $placa = $_POST['placa'];
            $lacz = lacz_bd();
            $wynik = $lacz -> query("insert into ankietaPlace values(0, '$wiek', '$plec', '$placa')");
            if ($wynik)
				echo true;
			else
                echo false;
            $lacz -> close();
        break;

        case 'anDetailedSalary':
            $title = "Analiza szczegółowa płac<hr>";
            $t1 = "Średnia płac w poszczególnych grupach wiekowych: ";
            $t2 = "Średnia płaca mężczyzn: ";
            $t3 = "Średnia płaca kobiet: ";
            $t4 = "Ilość respondentów: ";
            $d = "<ul>";
            $lacz = lacz_bd();

            $wynik = $lacz->query("select round(avg(anPlaca),2),anWiek from ankietaPlace group by anWiek");
            if ($wynik){
                while($wiersz = $wynik -> fetch_assoc()){
                    $o1 .= "<li>".$wiersz['anWiek']." lat - ".$wiersz['round(avg(anPlaca),2)']."zł</li>";
                }
            }
            $d .= "</ul>";
            $wynik = $lacz->query("select round(avg(anPlaca),2) from ankietaPlace where anPlec='m'");
            if ($wynik){
                while($wiersz = $wynik -> fetch_assoc()){
                    $o2 = $wiersz['round(avg(anPlaca),2)']."zł";
                }
            }
            $wynik = $lacz->query("select round(avg(anPlaca),2) from ankietaPlace where anPlec='k'");
            if ($wynik){
                while($wiersz = $wynik -> fetch_assoc()){
                    $o3 = $wiersz['round(avg(anPlaca),2)']."zł";
                }
            }
            $wynik = $lacz->query("select count(anPlaca) from ankietaPlace");
            if ($wynik){
                while($wiersz = $wynik -> fetch_assoc()){
                    $o4 = $wiersz['count(anPlaca)'];
                }
            }
            echo "<h1>$title</h1>
                  <p>$t1 $o1</p>
                  <p>$t2 $o2</p>
                  <p>$t3 $o3</p>
                  <p>$t4 $o4</p>";
        break;

        case 'anAge':
            $title = "Analiza wieku<hr>";
            $t1 = "Średnia wieku: ~ ";
            $t2 = "Największy zakres wiekowy: ";
            $t3 = "Najmniejszy zakres wiekowy: ";
            $t4 = "Ilość respondentów: ";

            $lacz = lacz_bd();
            $wynik = $lacz->query("select round(avg(anWiek)) from ankietaPlace");
            if ($wynik){
                while($wiersz = $wynik -> fetch_assoc()){
                    $o1 = $wiersz['round(avg(anWiek))']." lat(a)";
                }
            }
            $wynik = $lacz->query("select max(anWiek) from ankietaPlace");
            if ($wynik){
                while($wiersz = $wynik -> fetch_assoc()){
                    $o2 = $wiersz['max(anWiek)']." lat";
                }
            }
            $wynik = $lacz->query("select min(anWiek) from ankietaPlace");
            if ($wynik){
                while($wiersz = $wynik -> fetch_assoc()){
                    $o3 = $wiersz['min(anWiek)']." lat";
                }
            }
            $wynik = $lacz->query("select count(anWiek) from ankietaPlace");
            if ($wynik){
                while($wiersz = $wynik -> fetch_assoc()){
                    $o4 = $wiersz['count(anWiek)'];
                }
            }
            echo "<h1>$title</h1>
                  <p>$t1 $o1</p>
                  <p>$t2 $o2</p>
                  <p>$t3 $o3</p>
                  <p>$t4 $o4</p>";
        break;

        case 'anGender':
            $title = "Analiza płci<hr>";
            $t1 = "Ilość mężczyzn: ";
            $t2 = "Ilość kobiet: ";
            $t3 = "Ilość respondentów: ";

            $lacz = lacz_bd();
            $wynik = $lacz->query("select count(anPlec) from ankietaPlace where anPlec='m'");
            if ($wynik){
                while($wiersz = $wynik -> fetch_assoc()){
                    $o1 = $wiersz['count(anPlec)'];
                }
            }
            $wynik = $lacz->query("select count(anPlec) from ankietaPlace where anPlec='k'");
            if ($wynik){
                while($wiersz = $wynik -> fetch_assoc()){
                    $o2 = $wiersz['count(anPlec)'];
                }
            }
            $wynik = $lacz->query("select count(anPlec) from ankietaPlace");
            if ($wynik){
                while($wiersz = $wynik -> fetch_assoc()){
                    $o3 = $wiersz['count(anPlec)'];
                }
            }
            echo "<h1>$title</h1>
                  <p>$t1 $o1</p>
                  <p>$t2 $o2</p>
                  <p>$t3 $o3</p>";
        break;

        case 'anSalary':
            $title = "Analiza płac<hr>";
            $t1 = "Średnia płaca wszystkich osób: ";
            $t2 = "Ilość respondentów: ";

            $lacz = lacz_bd();
            $wynik = $lacz->query("select round(avg(anPlaca),2) from ankietaPlace");
            if ($wynik){
                while($wiersz = $wynik -> fetch_assoc()){
                    $o1 = $wiersz['round(avg(anPlaca),2)']."zł";
                }
            }
            $wynik = $lacz->query("select count(anPlaca) from ankietaPlace");
            if ($wynik){
                while($wiersz = $wynik -> fetch_assoc()){
                    $o2 = $wiersz['count(anPlaca)'];
                }
            }
            echo "<h1>$title</h1>
                  <p>$t1 $o1</p>
                  <p>$t2 $o2</p>";
        break;
        
    }
?>