<?php
session_start();
require_once '../../../vendor/autoload.php';
require_once '../../../index.php';
use Model\DAO\UsuariosDao;
if(filter_has_var(INPUT_POST,"cadastrar")){
    $id = $_SESSION['Usuario']['_id']->{'$id'};
    $tags = (filter_input(INPUT_POST, "tag"));
    (new UsuariosDao())->removerMinhasTags($id, [$tags]);
    
}
?>
