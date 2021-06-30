<!DOCTYPE html>
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
            
            <h2>Chcesz się zapisać na jeden z naszych kursów online? Wspaniale!<br><br></h2>    
            <h3>    
                Wystarczy że wypełnisz poniższy formularz swoimi danymi, wybierzesz język, poziom na jakim chcesz się uczyć oraz odpowiadający Ci termin zajęć.
                Jeśli nie jeseś pewien/pewna co do poziomu, możesz skorzystać z testu pozimującego dostępnego poniżej.<br><br>
            </h3>
            <button class="button" onclick="window.open('https://lincoln.edu.pl/krakow/wybierz-test/')">Test poziomujący</button>
        </div><br>
        <div class="over_form">
            <div class="form_name">
                <h1> Formularz zapisu na kurs językowy w szkole MultiLingual</h1>
            </div>   
            <form onsubmit="check(this)" method="POST" action='signup_complete.php' class="form" autocomplete="off">
                <div class="right">
                    <label for="surname">Nazwisko:</label>
                    <input type="text" id="surname" name=nazwisko maxlength="30" class="form_input" required>
                    <label for="phone_number">Numer telefonu:</label>
                    <input type="tel" id="phone_number" name=numer_tel placeholder="634721461" maxlength="9" pattern="[0-9]{9}" class="form_input" required>
                    <label for="city">Miasto zamieszkania: </label>
                    <input type="text" id="city" name=miasto maxlength="20" class="form_input" required>
                
                    <label for="language">Język:</label><br>
                    <?php 
		                require_once "../../db_connection.php";
		                $c=pg_connect("host=sbazy user=s215117 password=$password");
		                $s="select * from jezyki order by jezyk";
		                $r=pg_exec($c, $s);
	                        print "<select name=jezyk id=language class=menu_select>";
	                        $rn=pg_numrows($r);
		                for ($i=0; $i<$rn; $i++) {
   			            $x=pg_result($r, $i, 0);
    		            	print "<option value=$x>$x";
		                }
		                print "</select><br>";
		                ?>

                    <label for="level">Poziom:</label><br>
                    <?php 
                         $c=pg_connect("host=sbazy user=s215117 password=$password");
                         $s="select * from poziomy order by poziom";
                         $r=pg_exec($c, $s);
                         print "<select name=poziom id=level class=menu_select>";
                         $rn=pg_numrows($r);
                         for ($i=0; $i<$rn; $i++) {
                             $x=pg_result($r, $i, 0);
                             print "<option value=$x>$x";
                         }
                         print "</select><br>";
                         ?><br><br>
                </div>
                <div class="left">
                    <label for="name">Imię:</label>
                    <input type="text" id="name" name=imie maxlength="30" class="form_input" required>
                    <label for="email">Adres E-mail:</label>
                    <input type="email" id="email" name=email maxlength="50" class="form_input_email" required>
                    <label for="birth_date">Data urodzenia:</label>
                    <input type="date" id="birth_date" name=data_uro class="form_input" required>

                    <label for="date">Terminy:</label><br>
                    <?php 
                         $c=pg_connect("host=sbazy user=s215117 password=$password");
                         $s="select * from terminy";
                         $r=pg_exec($c, $s);
                         print "<select name=termin id=date class=menu_select>";
                         $rn=pg_numrows($r);
                         for ($i=0; $i<$rn; $i++) {
                             $x=pg_result($r, $i, 0);
                             print "<option value=$x>$x";
                         }
                         print "</select><br>";
                         ?>
                    <label for="time">Godziny:</label><br>
                    <?php 
                         $c=pg_connect("host=sbazy user=s215117 password=$password");
                         $s="select * from godziny order by godzina";
                         $r=pg_exec($c, $s);
                         print "<select name=godzina id=time class=menu_select>";
                         $rn=pg_numrows($r);
                         for ($i=0; $i<$rn; $i++) {
                             $x=pg_result($r, $i, 0);
                             print "<option value=$x>$x";
                         }
                         print "</select><br>";
                         ?><br><br>
                </div>
                <div class="add_button">
                    <input type=submit value="Zapisz mnie!"/> 
                </div>
            </form>
            
        </div>
        <div class="footer">&copy; 2021 Wiktor Karnia, Uniwersytet Ekonomiczy w Krakowie </div>
    </body>
</html>