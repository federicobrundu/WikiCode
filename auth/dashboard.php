<?php 
session_start();
include "parts/navbar.php"; 

if(!isset($_SESSION['login'])){
    header("location: ../login.php");
}
$dati =($_SESSION['dati_utente']);

    
require_once "../init/conn.php";
include '../functions/get.php';



$sezioni = getSezioni();
$sezioni_client =$sezioni['lista_client'];
$sezioni_server =$sezioni['lista_server'];

$argomenti = getArgomenti();
$argomenti_client =$argomenti['lista_client'];
$argomenti_server =$argomenti['lista_server'];
?>

<div>
    <div class="d-flex">
        <img class='img-profile' src="<?php echo $dati['img']?>" alt="profilo">
        <h3 style='height:40px;margin-left:15px' class="mt-3 txt-h"><?php echo $dati['nome']?></h3>
    </div>
    <div class="to_close">
        
        <div class="d-grid">
            <h2 class="mt-3">Email</h2>
            <h2 class="mt-3">Comune</h2>
            <h2 class="mt-3">Data di nascita</h2>  
            <h3 class="mt-3"><?php echo $dati['email']?></h3>
            <h3 class="mt-3"><?php echo $dati['comune']?></h3> 
            <h3 class="mt-3"><?php echo $dati['data_nascita']?></h3> 
        </div>
    </div>
</div>

<button id='apri_insert'>Aggiungi un nuovo argomento</button>
<button id='chiudi_insert'>Chiudi sezione di inserimento</button>


<div class="container mt-3 mb-6" >
    <form action=""id='form_insert' class="container mt-4 mb-6">
        <h3 class="txt-h">Inserisci un nuovo argomento</h3>
        <label class="mt-2 txt-label" for="">Scegli il linguaggio</label>
        <select name="linguaggi" id="linguaggi">
            <option value="1">Server o Client</option>
            <option value="Client-side">Client Side</option>
            <option value="Server-side">Server Side</option>
        </select>
        <select name="linguaggio_client" id="linguaggio_client">
                <option value="">Linguaggi Client</option>
                    <?php foreach($sezioni_client as $k=>$value){ ?>
                <option value="<?php echo $k?>"><?php echo $value['nome']?></option>         
                    <?php } ?>
        </select>
        <select name="linguaggio_server" id="linguaggio_server">
                <option value="">Linguaggi Server</option>
                    <?php foreach($sezioni_server as $k=>$value){ ?>
                <option value="<?php echo $k?>"><?php echo $value['nome']?></option>         
                    <?php } ?>
        </select><br>
        <label class="mt-2 txt-label" for="">Titolo Argomento</label>
        <input id='titolo'name='titolo' class='txt-inp'type="text"placeholder='Titolo Argomento'>
        <label  class="mt-2 txt-label" for="">Descrizione Argomento</label>
        <textarea id='risposta' name='risposta'class="txt-area"rows="4" cols="50" placeholder='Descrizione Argomento'></textarea>
        <input id='insert' type="button" value="INVIA" class='btn_search mt-2'>
    </form>
</div>
<br><br>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../assets/functions.js"></script>


</body>
</html>