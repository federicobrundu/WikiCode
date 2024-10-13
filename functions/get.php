<?php 

// require_once "../init/conn.php";

/*
    La funzione getSezioni recupera da entrambe le tabelle (CLIENT - SERVER) 
    tutti i linguaggi di programmazione presenti nella guida

    Attraverso l'utilizzo di una variabile flag (Booleano)
    gestisce gli errori e lo status di risposta 
    Se il flag  === false restituira uno status KO e il messaggio di errore attraverso la variabile $msg
    Se il flag === true restituira uno status OK, il messaggio di query eseguita e due array multidimensionali 
    con i dati riecevuti dal database;

    */
function getSezioni(){
    global $connessione;
    $flag = true;
    $msg= '';
    
    $client_list = array();
    $server_list = array();

    $sql_client = "SELECT nome,id,link FROM client WHERE 1";
    $query_client = $connessione->query($sql_client);
    if ($query_client === false) {
        $flag = false;
        $msg = 'Query ricerca linguaggi client fallita';
    }else{
        while($rows = $query_client->fetch_assoc()){
            $client_list[$rows['id']]=['nome'=>$rows['nome'],'link'=>$rows['link'],'id'=>$rows['id']];
            $msg = 'Query eseguita con successo';
        }
    }
    $sql_server= "SELECT nome,id,link FROM server WHERE 1";
    $query_server = $connessione->query($sql_server);
    if ($query_server === false) {
        $flag = false;
        $msg = 'Query ricerca linguaggi client fallita';
    }else{
        while($rows = $query_server->fetch_assoc()){
            $server_list[$rows['id']]= ['nome'=>$rows['nome'],'link'=>$rows['link'],'id'=>$rows['id']];
            $msg = 'Query eseguita con successo';
        }
    }
    if($flag === true){
        $dati = ['status'=> 'OK', 'msg'=>$msg, 'lista_client'=>$client_list,'lista_server'=>$server_list];
    }else{
        $dati = ['status'=> 'KO', 'msg'=>$msg];
    }
    return $dati;
}



function getArgomenti(){
    global $connessione;
    $flag = true;
    $msg= '';
    
    $client_list = array();
    $server_list=array();

    $sql_client = "SELECT nome,id,link,id_linguaggio FROM argo_client WHERE 1";
    $query_client = $connessione->query($sql_client);
    if ($query_client === false) {
        $flag = false;
        $msg = 'Query ricerca linguaggi client fallita';
    }else{
        while($rows = $query_client->fetch_assoc()){
            $client_list[$rows['id']]=['id'=>$rows['id'],'nome'=>$rows['nome'],'link'=>$rows['link'],'id_linguaggio'=>$rows['id_linguaggio']];
            $msg = 'Query eseguita con successo';
        }
    }
    $sql_server = "SELECT nome,id,link,id_linguaggio FROM argo_server WHERE 1";
    $query_server = $connessione->query($sql_server);
    if ($query_server === false) {
        $flag = false;
        $msg = 'Query ricerca linguaggi server fallita';
    }else{
        while($rows = $query_server->fetch_assoc()){
            $server_list[$rows['id']]=['id'=>$rows['id'],'nome'=>$rows['nome'],'link'=>$rows['link'],'id_linguaggio'=>$rows['id_linguaggio']];
            $msg = 'Query eseguita con successo';
        }
    }
    if($flag === true){
        $dati = ['status'=> 'OK', 'msg'=>$msg, 'lista_client'=>$client_list,'lista_server'=>$server_list];
    }else{
        $dati = ['status'=> 'KO', 'msg'=>$msg];
    }
    return $dati;
}

/*
    La funzione getArgomenti_client() prende come parametro l'id del linguaggio per il quale deve recuperare 
    gli argomenti e li estrapola dalla tabella argo_client

    Attraverso l'utilizzo di una variabile flag (Booleano)
    gestisce gli errori e lo status di risposta 
    Se il flag  === false restituira uno status KO e il messaggio di errore attraverso la variabile $msg
    Se il flag === true restituira uno status OK, il messaggio di query eseguita e due array multidimensionali 
    con i dati riecevuti dal database;
*/

// deve prendere come parametro l'id del linguaggio dal quale ricavare gli argomenti
// WHERE ID_LINGUAGGIO UGUALE PARAMETRO INSERITO 
function getArgomenti_client($id){
    global $connessione;
    $flag = true;
    $msg= '';
    
    $client_list = array();

    $sql_client = "SELECT nome,id,link,id_linguaggio FROM argo_client WHERE id_linguaggio = $id";
    $query_client = $connessione->query($sql_client);
    if ($query_client === false) {
        $flag = false;
        $msg = 'Query ricerca linguaggi client fallita';
    }else{
        while($rows = $query_client->fetch_assoc()){
            $client_list[$rows['id']]=['id'=>$rows['id'],'nome'=>$rows['nome'],
                        'link'=>$rows['link'],'id_linguaggio'=>$rows['id_linguaggio']];
            $msg = 'Query eseguita con successo';
        }
    }
    
    if($flag === true){
        $dati = ['status'=> 'OK', 'msg'=>$msg, 'lista_client'=>$client_list];
    }else{
        $dati = ['status'=> 'KO', 'msg'=>$msg];
    }
    return $dati;
}

function getArgomenti_server($id){
    global $connessione;
    $flag = true;
    $msg= '';
    
    $server_list = array();

    $sql_server = "SELECT nome,id,link,id_linguaggio FROM argo_server WHERE id_linguaggio = $id";
    $query_server = $connessione->query($sql_server);
    if ($query_server === false) {
        $flag = false;
        $msg = 'Query ricerca linguaggi client fallita';
    }else{
        while($rows = $query_server->fetch_assoc()){
            $server_list[$rows['id']]=['id'=>$rows['id'],'nome'=>$rows['nome'],'link'=>$rows['link'],'id_linguaggio'=>$rows['id_linguaggio']];
            $msg = 'Query eseguita con successo';
        }
    }
    
    if($flag === true){
        if (count($server_list)==0){
            $dati = ['status'=> 'OK', 'msg'=>$msg, 'lista_server'=>'Non ci sono argomenti'];
        }else{
            $dati = ['status'=> 'OK', 'msg'=>$msg, 'lista_server'=>$server_list];
        }
    }else{
        $dati = ['status'=> 'KO', 'msg'=>$msg];
    }
    return $dati;
}


?>