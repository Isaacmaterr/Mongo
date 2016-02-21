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
    
    public function upload(array $file,$pasta,$option=null){
       
        $ext = explode(".", $file['name']);
        $nome = md5($file['name']."".date("Y-m-d H:s")).".".$ext[1];
        move_uploaded_file($file['tmp_name'], $pasta."".$nome);
       if($option==null){
       $this->marcaAgua($nome,$pasta);
       }
        return $nome ;
   }
   public function marcaAgua($imagem,$pastas){
     $img = WideImage::load($pastas.''.$imagem);
     $marca = WideImage::load('../../View/webroot/img/marca.png');
    $novaImagem = $img->merge($marca, 50, 50, 50);
    $novaImagem->saveToFile($pastas.''.$imagem);
  

       
   }
   public function hash($senha) {
      return hash('sha512',$senha);
  }
 function calcDistancia($lat1, $long1, $lat2, $long2)
{
    $d2r = 0.017453292519943295769236;

    $dlong = ($long2 - $long1) * $d2r;
    $dlat = ($lat2 - $lat1) * $d2r;

    $temp_sin = sin($dlat/2.0);
    $temp_cos = cos($lat1 * $d2r);
    $temp_sin2 = sin($dlong/2.0);

    $a = ($temp_sin * $temp_sin) + ($temp_cos * $temp_cos) * ($temp_sin2 * $temp_sin2);
    $c = 2.0 * atan2(sqrt($a), sqrt(1.0 - $a));

    return 6368.1 * $c;
}  
   
}

