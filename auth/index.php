<?php
include "parts/navbar_auth.php";          
require_once "../init/conn.php";
include '../functions/get.php';



$sezioni = getSezioni();
$sezioni_client =$sezioni['lista_client'];
$sezioni_server =$sezioni['lista_server'];

// $argomenti = getArgomenti();
// $argomenti_client =$argomenti['lista_client'];
// $argomenti_server =$argomenti['lista_server'];
?>


    <h1 class="txt-h mt_1">Guida per full stack developer</h1>

    <main class="mt-5">
        <h2 class="txt-sec mt_1 mb">CLIENT SIDE</h2>
        <div class='row mt-3 p-5'>
            <?php foreach($sezioni_client as $k=>$value){
                    $link1 = '../'.$value['link'];
                ?>
                <div class="col-3">
                    <a href="<?php echo $link1 ?>" id='<?php echo $k?>' > <?php echo $value['nome']?></a>
                </div>         
            <?php } ?>
        </div>
        <h2 class="txt-sec mt_1">SERVER SIDE</h2>
        <div class='row mt-3  p-5'>
            <?php foreach($sezioni_server as $k=>$value){ 
                    $link2 = '../'.$value['link'];

                ?>
                <div class="col-3">
                    <a href="<?php echo $link2?>" id='<?php echo $k?>' > <?php echo $value['nome']?></a>
                </div>
            <?php } ?>

        </div>
    </main>
    


<?php include "parts/footer_auth.php" ?>

