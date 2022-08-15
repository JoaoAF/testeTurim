<?php 
    
    include_once('Source/autoload.php');

    $json = json_decode($_GET['json'], true);

    $obj = new \Source\App\PessoaModel();

    $obj->gravar($json);

    header('Location:index.php');   

?>