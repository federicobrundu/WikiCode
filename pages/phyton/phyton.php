<?php 

include "../parts/navbar.php";          
require_once "../../init/conn.php";

include "parts/sidebar.php";


$lista_id= array();
foreach ($sezioni_server as $k=>$val){
    $lista_id[$val['nome']]= [$val['nome']=>$val['id'],'<br>'];
}
$id_select = $lista_id['Phyton'];
$id = $id_select['Phyton'];

$argomenti = getArgomenti_server($id);
$argomenti_client =$argomenti['lista_server'];
?>

<h5 class="txt-h">Impara Phyton </h5>

<p class='mt-2 p-arg 'style='color:#fff'>Argomenti:</p>


<main class="mt-5">
    <div style='width:60%' class='row mt-3 p-5 dad'>
        <?php foreach($argomenti_client as $k=>$value){ 				
				?>
        <div class="col-3">
            <button onclick="get_risposte_server(<?php echo $value['id']?>,<?php echo $value['id_linguaggio']?>)"
                id='<?php echo $value['id']?>' id_lang='<?php echo $value['id_linguaggio']?>'>
                <?php echo $value['nome']?></button>
        </div>
        <?php } ?>
    </div>
</main>

<div class="container">
    <h3 class='mt-5 p-2 txt-h1'id='titolo'></h3>
    <p class='mt-4 txt-p' id="risposta"></p>
</div>

<br><br><br><br><br>


<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script type="text/javascript" src="../../assets/functions.js"></script>