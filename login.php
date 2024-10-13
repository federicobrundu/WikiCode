


<?php 
    include "parts/navbar_login.php";
    
?>

<div class="container login_cont mt-5">

    <form name='form_login'method='post'>
        <h2 class="txt-h mt_1 mb-5">Effettua l'accesso all'area riservata</h2>

        <label class='txt-label mt_1' for="email">La tua email</label>
        <input type="email"require placeholder="Email" id="email" name='email'>
        <label class='txt-label mt_1' for="email">Password</label>
        <input type="password"require placeholder="Password" id='psw'name='psw'>
        <br>
        <input type="button"value='Accedi'class='mt_1 btn_login'onclick="accedi()">
    </form>
</div>

<?php 
    require_once "init/conn.php";
    require_once "functions/login_fn.php";
    include "parts/footer.php";
    login();

?>
