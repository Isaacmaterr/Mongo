<?php
session_start();
require_once '../../../vendor/autoload.php';
require_once '../../../index.php';
use Model\DAO\LivrosDao;
use Model\Livros;
use Model\DAO\Util;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if(filter_has_var(INPUT_POST,"cadastrar")){
  //  echo filter_input(INPUT_POST,"id");
    //exit();
    
    if($_FILES['file']){
    $file=(new Util())->upload($_FILES['file'],"../../View/webroot/img/livros/");
    
}else{
   $file =filter_input(INPUT_POST,"nameFoto");
}
$livro = new Livros();
$tags = explode(',', filter_input(INPUT_POST,"tags"));
$livro->setId(filter_input(INPUT_POST,"id"));
$livro->setEditora(filter_input(INPUT_POST,"editora"));
$livro->setNome(filter_input(INPUT_POST,"titulo"));
$livro->setOutor(filter_input(INPUT_POST,"autor"));
$livro->setPreco(filter_input(INPUT_POST,"preco"));
$livro->setQuantidade(filter_input(INPUT_POST,"quantidade"));
$livro->setSerie(filter_input(INPUT_POST,"serie"));
$livro->setImagem($file);
$livro->setStatus(1);
$livro->setTags($tags);
$modelo = $livro->modelo();
    
 $return = (new LivrosDao())->saveDocument($modelo);
 
  header("location:index.php");
 
}
