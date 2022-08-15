<?php 
    
    include_once('Source/autoload.php');

    $obj = new \Source\App\PessoaModel();
    
 	$data = json_encode($obj->ler());
	$array = json_decode($data);

    print_r($data);

    //$select = "SELECT DISTINCT p.id, p.nome, f.id as id_filho, f.id_pessoa, f.nome as nome_filho FROM $entitys[0] as p INNER JOIN $entitys[1] as f ON p.id = f.id_pessoa";
?>