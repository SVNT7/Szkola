<?php
    require_once('admin.php');
?>
<!doctype html>
<html lang="pl">
<html>
    <head>
    <meta charset="UTF-8">
    <title>Ankieta - place</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="function.js"></script>
    </head>
    <body>
        <main>
            <fieldset id='wyslij'>
                <legend>Dane</legend>
                <form id='form' method='post'>
                    <p>
                        <label>Wiek: </label>
                        <input list="wiek" name='wiek' pattern="18-29|30-39|40-49|50-59|60-65" placeholder='Podaj swój wiek...' required>
                            <datalist id='wiek'>
                                <option value="18-29">
                                <option value="30-39">
                                <option value="40-49">
                                <option value="50-59">
                                <option value="60-65">
                            </datalist>
                    </p>
                    <p>
                        <label>Płeć: </label>
                            <input type='radio' name='plec' value='k' checked/>Kobieta
                            <input type='radio' name='plec' value='m'/>Mężczyzna
                    </p>
                    <p>
                        <label>Średnia płaca:</label>
                        <input type='number' name='placa' placeholder='Podaj swoją płacę...' required/>
                    </p>
                        <input type='submit'/>
                        <input type='reset'/>   
                </form>
                <div id="komunikat"></div>
            </fieldset>
            <fieldset id='analiza'>
                <legend>Analiza</legend>
                <img id=pokazFormularz src='check-form.png' width=40 height=40 float=right>
                <ul id='menu'>
                    <li id='anDetailedSalary'>Analiza szczegółowa płac</li>
                    <hr/>
                    <li id='anAge'>Analiza wieku</li>
                    <hr/>
                    <li id='anGender'>Analiza płci</li>
                    <hr/>
                    <li id='anSalary'>Analiza płac</li>
                    <hr/>
                </ul>
            </fieldset>

            <fieldset id='wyniki'>
                <h1><?php echo $title ?></h1>
                <hr/>
                <p><?php echo $t1.$o1 ?> </p>
                <p><?php echo $t2.$o2 ?> </p>
                <p><?php echo $t3.$o3 ?> </p>
                <p><?php echo $t4.$o4 ?> </p>
            </fieldset>

        </main>
    </body>
</html>