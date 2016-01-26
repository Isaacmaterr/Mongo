<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Collection
 *
 * @author isaac
 */

namespace Controller;

class Collection {

    private $collectionbd;

    public function __construct($collection) {
        try {
           $db = (new Conexao())->getConexao();
           if($db== null){
               throw new Exception("erroooooooo");
           }
                  $this->collectionbd =   $db->selectCollection($collection);
        } catch (\Exception $ex) {
            return null;
        }
   
        
    }

    public function getCollection() {
        return $this->collectionbd;
    }
public function close($param) {
    $this->collectionbd = null;
}
}
