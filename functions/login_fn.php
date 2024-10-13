




<?php 

function login(){    
    global $connessione;
    if (!empty($_POST)){
        $email= $_POST['email'];
        $psw= $_POST['psw'];
        $sql="SELECT * FROM test.utenti WHERE email = '".$email."' AND psw = '".$psw."' ";
        $query = $connessione->query($sql);

        if (mysqli_num_rows($query)>0){
            session_start();
            $_SESSION['dati_utente']= $query->fetch_assoc();
            $_SESSION['login']= true;
            header("location:auth/dashboard.php");
        }else{
            echo "<h4 class='pop_msg'>Email o password errate</h4>";
        }
    }
}
?>






