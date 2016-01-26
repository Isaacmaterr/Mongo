<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model\DAO;
use Controller\Collection;
/**
 * Description of SeriesDao
 *
 * @author isaac
 */
class SeriesDao  extends OdmAbstract {
    //put your code here
      public $conexao;

    public function __construct() {
        $this->conexao = (new Collection('series'))->getCollection();
        parent::__construct($this->conexao);
    }

    public function saveDocument(array $array) {

        return parent::saveDocument($array);
    }

    public function findAll($array = null) {

        return parent::findAll($array);
    }

    public function findOne($array=null) {
        return parent::findOne($array);
    }

    public function remover($id) {
        return parent::remover($id);
    }

    
    
}
