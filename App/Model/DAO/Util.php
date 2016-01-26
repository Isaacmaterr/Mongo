<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model\DAO;
use WideImage\WideImage;
/**
 * Description of util
 *
 * @author isaac
 */
class Util {
    //put your code here
    
    public function upload(array $file,$pasta){
       
        $ext = explode(".", $file['name']);
        $nome = md5($file['name']."".date("Y-m-d H:s")).".".$ext[1];
        move_uploaded_file($file['tmp_name'], $pasta."".$nome);
       
       $this->marcaAgua($nome,$pasta);
        return $nome ;
   }
   public function marcaAgua($imagem,$pastas){
     $img = WideImage::load($pastas.''.$imagem);
     $marca = WideImage::load('../../View/webroot/img/marca.png');
    $novaImagem = $img->merge($marca, 50, 50, 50);
    $novaImagem->saveToFile($pastas.''.$imagem);
  

       
   }
   
   
}

