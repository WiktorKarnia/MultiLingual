
<DOCTYPE html>
<html>
    <head>
        <title>Zapisz się</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="ikona.png">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="header">
            <div class="logo_container">
                <h1 onclick="window.location.href='index.htm'">Multi<span>Lingual</span></h1>
            </div>
            <ul class="nawigation">
                <a onclick="window.location.href='index.htm'"><li>Strona główna</li></a>
                <a onclick="window.location.href='signup.php'"><li>Zapisy</li></a>
                <a onclick="window.location.href='about.htm'"><li>O nas</li></a>
                <a onclick="window.location.href='contact.htm'"><li>Kontakt</li></a>
            </ul>
        </div>
        <div class="welcome">
            
            <h2>Pomyślnie zapisałeś się na jeden z naszych kursów językowych!<br><br></h2>    
            <h3>  
                Dziękujemy za wybór naszej szkoły!  
                W ciągu 12 godzin otrzymasz e-mail z daszymi inforamcjami dotyczącymi kursu. 
                Jeśli masz jakieś pytania zawsze możesz się z nami skontaktować drogą mailową lub telefoniczną, wszelkie informacje znajdują się w zakładce "Kontakt." <br><br>
            </h3>
            <button class="button" onclick="window.location.href='index.htm'">Powrót na stronę główną</button>
        </div>
          
<?php

require_once "../../db_connection.php";
$c=new PDO($db_pg, $user, $password);
$s="insert into klienci(imie,nazwisko,nr_telefonu,email,data_urodzenia,miasto) values (:k_i, :k_n, :k_nr, :k_e, :k_d, :k_m)";
$r=$c->prepare($s);
$r->bindParam(':k_i',$_POST['imie']);
$r->bindParam(':k_n',$_POST['nazwisko']);
$r->bindParam(':k_nr',$_POST['numer_tel']);
$r->bindParam(':k_e',$_POST['email']);
$r->bindParam(':k_d',$_POST['data_uro']);
$r->bindParam(':k_m',$_POST['miasto']);
$r->execute();

$querry="insert into zajecia(id_klienta,termin,jezyk,poziom,godziny) values (:k_id, :z_t, :z_j, :z_p, :z_g)";
$x=$c->prepare($querry);
if ($r->rowCount()) $id=$c->lastInsertId();
$x->bindParam(':k_id', $id);
$x->bindParam(':z_t',$_POST['termin']);
$x->bindParam(':z_j',$_POST['jezyk']);
$x->bindParam(':z_p',$_POST['poziom']);
$x->bindParam(':z_g',$_POST['godzina']);
$x->execute();

?>
<div class="footer">&copy; 2021 Wiktor Karnia, Uniwersytet Ekonomiczy w Krakowie </div>
</html>


