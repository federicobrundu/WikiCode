



<?php 
include "../init/conn.php";
include "get.php";
$id = $_POST['id'];
$id_linguaggio= $_POST['id_linguaggio'];


$risposta=array();
$sql = "SELECT * FROM faq.risposta_client WHERE 
        id_argomento = '".$id."' AND id_linguaggio = '".$id_linguaggio."'";
        
$query= $connessione->query($sql);
    if ($query === false) {
        $msg = 'Query ricerca linguaggi client fallita';
        $result = ['status'=>'KO','msg'=>$msg];
    }elseif(mysqli_num_rows($query)==0){
        $msg = 'Nessuna risposta presente nel database';
        $result = ['status'=>'KO','msg'=>$msg];
    }else{
        while($rows = $query->fetch_assoc()){
            $risposta=['titolo'=>$rows['titolo'],'risposta'=>$rows['risposta'],
            'id_linguaggio'=>$rows['id_linguaggio'],'id_argomento'=>$rows['id_argomento']];

            $msg = 'Query eseguita con successo';
            $result = ['status'=>'OK','titolo'=> $risposta['titolo']
                        ,'risposta'=>$risposta['risposta']];
        }
    }

echo json_encode($result);
?>