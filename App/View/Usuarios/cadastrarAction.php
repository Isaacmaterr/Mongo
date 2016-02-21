<?php
require_once '../../../vendor/autoload.php';
require_once '../../../index.php';
use Model\Usuarios;
use Model\DAO\UsuariosDao;
use Model\DAO\Util;
if(filter_has_var(INPUT_POST,"cadastrar")){
    $file ="usuario.png";
  
    if($_FILES['file']['error'] != 4){
    $file=(new Util())->upload($_FILES['file'],"../../View/webroot/img/usuarios/",1);
}
$usuario = new Usuarios();
$usuario->setNome(filter_input(INPUT_POST,"nome"));
$usuario->setEmail(filter_input(INPUT_POST,"email"));
$usuario->setSenha((new Util())->hash(filter_input(INPUT_POST,"senha")));
$usuario->setStatus(1);
$usuario->setPerfil(1);
$usuario->setImagem($file);
$usuario->setMeusIntereces([]);
$usuario->setMeusLivros([]);
$usuario->setRaio(filter_input(INPUT_POST,"raio"));
$usuario->setLat(filter_input(INPUT_POST,"lat"));
$usuario->setLog(filter_input(INPUT_POST,"lng"));
$data = new DateTime(filter_input(INPUT_POST,"data"));
$usuario->setDataNacimento( new \MongoDate($data->format('Ymd')));
$array = $usuario->modelo();
try{
(new UsuariosDao())->saveDocument($array);
$var = "<script>javascript:history.back(-1)</script>";
    echo $var;
}catch(MongoDuplicateKeyException $e){
    echo'Email Ja Cadastrado';
    
}

}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

