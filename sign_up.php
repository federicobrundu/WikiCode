<?php 
include "parts/navbar_signup.php";
ob_start();

?>


<div class="container  mt-5">

    <form id='form_signup' name='form_signup'method='post'>
        <h2 class="txt-h mt_1 mb-3">Registrati e aiutaci ad ampliare la guida</h2>
        <p>* Campi obbligatori</p>
        <label for="nome"class='txt-label mt-1'>Il tuo nome</label>
        <input type="text"require placeholder="Nome*" id="nome" name='nome'>
        <label class='txt-label mt_1' for="email">La tua email</label>
        <input type="email"require placeholder="Email*" id="email" name='email'>
        <label class='txt-label mt_1' for="psw">Password</label>
        <input type="password"require placeholder="Password*" id='psw'name='psw'>
        <label class='txt-label mt_1' for="conf_psw">Conferma password</label>
        <input type="password"require placeholder="Conferma Password*" id='conf_psw'name='conf_psw'>

        <br>
        <label class='txt-label mt_1' for="">Data di nascita</label>
        <div class=" mt-4 d-flex justify-content-center">
                <select name="giorno_birth" id="giorno_birth">
                    <option value="">Giorno*</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>
                <select style="margin-left: 8px;" name="mese_birth" id="mese_birth">
                    <option value="">Mese*</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>

                </select>
                <select  style="margin-left: 8px;" name="anno_birth" id="anno_birth">
                    <option value="">Anno*</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                    <option value="2005">2005</option>
                    <option value="2004">2004</option>
                    <option value="2003">2003</option>
                    <option value="2002">2002</option>
                    <option value="2001">2001</option>
                    <option value="2000">2000</option>
                    <option value="1999">1999</option>
                    <option value="1998">1998</option>
                    <option value="1997">1997</option>
                    <option value="1996">1996</option>
                    <option value="1995">1995</option>
                    <option value="1994">1994</option>
                    <option value="1993">1993</option>
                    <option value="1992">1992</option>
                </select>
        </div>
        <label class='txt-label mt_1' for="">Comune</label>
        <input type="text"require placeholder="Comune*" id='comune'name='comune'>
        <br>
        <input type="button"value='Registrati'class='mt_1 btn_login mb'onclick="registrati()">
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script type="text/javascript" src="assets/functions.js"></script>

<?php 
    require_once "init/conn.php";
    
    require_once "functions/signup_fn.php";
    signup();    
?>
<?php include "parts/footer.php" ?>

</body>
</html>