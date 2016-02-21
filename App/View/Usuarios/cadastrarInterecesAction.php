<?php

session_start();
require_once '../../../vendor/autoload.php';
require_once '../../../index.php';

use Model\DAO\UsuariosDao;

if (filter_has_var(INPUT_POST, "cadastrar")) {
    $tags = explode(',', filter_input(INPUT_POST, "tags"));
    $id = $_SESSION['Usuario']['_id']->{'$id'};
    $return = (new UsuariosDao())->saveMinhasTags($id, $tags);
    $var = "<script>javascript:history.back(-1)</script>";
    echo $var;
}
?>
