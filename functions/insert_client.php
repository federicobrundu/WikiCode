<?php 

include "../init/conn.php";

$id_linguaggio = $_POST['id_linguaggio'];
$titolo = $_POST['titolo'];
$risposta = $_POST['risposta'];

$result= $id_linguaggio .'titolo '. $titolo. 'risposta '.$risposta;

$sql_argomento = "INSERT INTO argo_client (`id_linguaggio`, `nome`) VALUES ('".$id_linguaggio."','".$titolo."')";
$query_argomento = $connessione->query($sql_argomento);

if ($query_argomento === false) {
    $flag = false;
    $msg = 'Query inserimento argomento fallita';
    $dati=['status'=>'KO','response'=>$msg];
}else{
    $argomento_id = $connessione->insert_id;
    $sql = "INSERT INTO risposta_client(`id_argomento`, `id_linguaggio`, `titolo`, `risposta`) VALUES ('".$argomento_id."','".$id_linguaggio."','".$titolo."','".$risposta."')";
    $query= $connessione->query($sql);
    if ($query === false) {
        $flag = false;
        $msg = 'Query inserimento argomento fallita';
        $dati=['status'=>'KO','response'=>$msg];
    }else{
        $msg='Inserimento effettuato con successo';
        $dati=['status'=>'OK','response'=>$msg];
    }
}

echo json_encode($dati);
?>