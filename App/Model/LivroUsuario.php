<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

/**
 * Description of Livro_Usuario
 *
 * @author isaac
 */
class LivroUsuario {
   private $idLivro;
   private $idUsuario;
   
   function getIdLivro() {
       return new \MongoId($this->idLivro);
   }

   function getIdUsuario() {
       return new \MongoId($this->idUsuario);
   }

   function setIdLivro($idLivro) {
       $this->idLivro = $idLivro;
   }

   function setIdUsuario($idUsuario) {
       $this->idUsuario = $idUsuario;
   }
  public function modelo() {
        $insert = [
            'idlivro' => $this->getIdLivro(),
            
            'usuario' => $this->getidUsuario(),
            
        ];
        return $insert;
    }
 
}
