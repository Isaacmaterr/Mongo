<?php

session_start();
require_once '../../../vendor/autoload.php';
require_once '../../../index.php';

use Model\DAO\UsuariosDao;
use Model\DAO\Util;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if (filter_has_var(INPUT_POST, "logar")) {



    $array['email'] = (filter_input(INPUT_POST, "Email"));
    $array['senha'] = (new Util())->hash((filter_input(INPUT_POST, "Senha")));
    $usuario = (new UsuariosDao())->findOne($array);
   
    if ($usuario == NULL) {
        $var = "<script>javascript:history.back(-1)</script>";
      //  echo $var;
    }
    $usuariologar = (new UsuariosDao())->logar($usuario);

}
