<?php
// rimuovo tutte le variabili della sessione   
session_unset();
// distrugge la sessione
session_destroy();
//Reindirizza alla home page
header("location: ../index.php");
?>