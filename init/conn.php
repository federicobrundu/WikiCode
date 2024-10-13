<?php


$host= 'localhost';
$user='root';
$psw='';
$db = 'faq';
$connessione= mysqli_connect($host, $user,$psw,$db );	

if($connessione == true){
    return;
}else{
    die("<h2>Nessuna risposta dal server</h2>".$connessione->connect_error );
}






$connessione->close();


?>





