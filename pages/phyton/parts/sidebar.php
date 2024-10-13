<?php 
require_once "../../functions/get.php";

$sezioni = getSezioni();
$sezioni_client =$sezioni['lista_client'];
$sezioni_server =$sezioni['lista_server'];
?>



    <div class="hamburger">
        <span></span>
        <span></span>
    	<span></span>
    </div>

    


    <aside class="sidebar">
		<span class="ham">X</span>
		<h3 style="text-decoration:underline;" class="txt-sec mt-5">Client side</h3>
		<div class="mt">
			<ul class="">
				<?php
					foreach ($sezioni_client as $k => $val) {
						$link = str_replace('/phyton','/'.strtolower($val['nome']),$url);
                ?>
				<li> <a href="<?php echo $link?>"><?php echo $val['nome'] ?></a> </li>
				<?php
					}	
				?>
			</ul>
		</div>
		<h3 style="text-decoration:underline;" class="txt-sec mt-5">Server side</h3>
        <div class="mt">
			<ul class="">
				<?php
					foreach ($sezioni_server as $k => $val) {
						$link = str_replace('/phyton','/'.strtolower($val['nome']),$url);
                ?>
				<li> <a href="<?php echo $link ?>"><?php echo $val['nome'] ?></a> </li>
				<?php
					}	
				?>
			</ul>
			
		</div>
		
	</aside>