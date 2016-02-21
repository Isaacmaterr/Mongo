<?php
session_start();
require_once '../../../vendor/autoload.php';
require_once '../../../index.php';
use Model\DAO\EditorasDao;
use Model\Editoras;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 

if(filter_has_var(INPUT_POST,"cadastrar")){

$editora = new Editoras();
$telefones = explode(',', filter_input(INPUT_POST,"telefones"));
$editora->setNome(filter_input(INPUT_POST,"nome"));
$editora->setLogradouro(filter_input(INPUT_POST,"logradouro"));
$editora->setBairro(filter_input(INPUT_POST,"bairro"));
$editora->setCidade(filter_input(INPUT_POST,"cidade"));
$editora->setEstado(filter_input(INPUT_POST,"estado"));
$editora->setTelefone($telefones);

 $modelo = $editora->modelo();
    
 $return = (new EditorasDao())->saveDocument($modelo);
 
  header("location:index.php");
 
}
