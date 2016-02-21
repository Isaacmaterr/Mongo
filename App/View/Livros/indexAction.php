<?php
session_start();
require_once '../../../vendor/autoload.php';
require_once '../../../index.php';
use Model\DAO\LivrosDao;
use Model\Livros;
use Model\DAO\Util;

if(filter_has_var(INPUT_POST,"cadastrar")){
$file ="livro.jpg";
    if($_FILES['file']){
    $file=(new Util())->upload($_FILES['file'],"../../View/webroot/img/livros/");
}
$livro = new Livros();
$usuario = $_SESSION['usuario'];
$tags = explode(',', filter_input(INPUT_POST,"tags"));
$livro->setEditora(filter_input(INPUT_POST,"editora"));
$livro->setUsuario($_SESSION['Usuario']['_id']->{'$id'});
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
