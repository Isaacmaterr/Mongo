<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

/**
 * Description of Series
 *
 * @author isaac
 */
class Series {
   
    //put your code here
     private $id;
     private $nome ;
     private $dataLancamento ;
     private $autorSerie  ;
     private $tags ;
    
     
     
      public function modelo() {
        $insert = [
            '_id' => $this->getId(),
            'nome' => $this->getNome(),
            'dataLancamento' => $this->getDataLancamento(),
            'autorSerie' => $this->getAutorSerie(),
            'tags' => $this->getTags(),
            
        ];
        return $insert;
    }
     
     
     
      function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
     
     
     
    function getNome() {
        return $this->nome;
    }

    function getDataLancamento() {
        return $this->dataLancamento;
    }

    function getAutorSerie() {
        return $this->autorSerie;
    }

    function getTags() {
        return $this->tags;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDataLancamento(\MongoDate $dataLancamento) {
        $this->dataLancamento = $dataLancamento;
    }

    function setAutorSerie($autorSerie) {
        $this->autorSerie = $autorSerie;
    }

    function setTags( array $tags) {
        $this->tags = $tags;
    }


}
