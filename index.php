



<?php
include "parts/navbar.php";          
require_once "init/conn.php";
include 'functions/get.php';

$sezioni = getSezioni();
$sezioni_client =$sezioni['lista_client'];
$sezioni_server =$sezioni['lista_server'];

?>

    <h1 class="txt-h mt_1">Guida per full stack developer</h1>
    <main class="mt-5 mb-5">
        <h2 class="txt-sec mt_1 mb">CLIENT SIDE</h2>
        <div class='row mt-3 p-5'>
            <?php foreach($sezioni_client as $k=>$value){ ?>
                <div class="col-3">
                    <a href="<?php echo  $value['link']?>" id='<?php echo $k?>' > <?php echo $value['nome']?></a>
                </div>         
            <?php } ?>
        </div>
        <h2 class="txt-sec mt_1">SERVER SIDE</h2>
        <div class='row mt-3  p-5'>
            <?php foreach($sezioni_server as $k=>$value){ ?>
                <div class="col-3">
                    <a href="<?php echo $value['link']?>" id='<?php echo $k?>' > <?php echo $value['nome']?></a>
                </div>
            <?php } ?>
        </div>
    </main>
    


<?php include "parts/footer.php" ?>

