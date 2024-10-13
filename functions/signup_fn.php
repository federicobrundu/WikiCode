




<?php 

function signup(){    
    global $connessione;
    if (!empty($_POST)){
        $my_email= "f.brundu7@gmail.com";
        $email= $_POST['email'];
        $psw= $_POST['psw'];
        $nome =$_POST['nome'];
        $anno = $_POST['anno_birth'];
        $mese = $_POST['mese_birth'];
        $giorno = $_POST['giorno_birth'];
        $data_nascita = $anno.'-'.$mese.'-'.$giorno ;
        $comune = $_POST['comune'];
        $email_header= 'From: Federico Brundu < ' .$my_email. ">\r\n"; 
        $oggetto= 'Registrazione avvenuta con successo';
        $testo_email = file_get_contents("reply_email.html");
        $sql_check= "SELECT email FROM test.utenti WHERE email = '".$email."' ";
        $query_check =$connessione->query($sql_check);
        
        if(mysqli_num_rows($query_check)==1){
            echo "<h6 class='pop_msg1'>Esiste già un utente registrato con questa email</h6>";
        }else{
            $sql="INSERT INTO test.utenti (`email`, `psw`, `nome`, `comune`, `data_nascita`)
            VALUES ('$email','$psw','$nome','$comune','$data_nascita')";
            $query = $connessione->query($sql);
            if($query === false){
                echo 'Errore in fase di registrazione'.$connessione->error;
            }else{
                mail($email,$oggetto,$testo_email,$email_header);
                header("location:conf_reg.php");
            }
        }
    }
}
?>