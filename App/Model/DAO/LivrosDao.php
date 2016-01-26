<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LivrosDao
 *
 * @author isaac
 */

namespace Model\DAO;

use MongoCode;
use Controller\Collection;

class LivrosDao extends OdmAbstract {

    public $conexao;

    public function __construct() {
        $this->conexao = (new Collection('livros'))->getCollection();

        parent::__construct($this->conexao);
    }

    public function saveDocument(array $array) {

        return parent::saveDocument($array);
    }

    public function findAll($array = null) {

        return parent::findAll($array);
    }

    public function findOne($array = null) {
        return parent::findOne($array);
    }

    public function remover($id, $status) {
        return parent::remover($id, $status);
    }

    public function tagsDistinct() {

        $keys = [];

        $initial = ["total" => 0, "Tags" => [], "totalValor" => 0];
        $reduce = "function(curr,result){
 curr.tags.forEach(function(tags){
 if(result.Tags[tags]){
 result.Tags[tags]++;
 }else{
 result.Tags[tags]=1;
 }})
 result.total++;
 result.totalValor +=curr.preco;
 }";

        $finalize = "function(result){
            result.avgValor = result.totalValor/result.total;
                 }";

        $options = ['condition' => ['status' => 1],
            'finalize' => new MongoCode($finalize)
        ];


        $tags = $this->conexao->group($keys, $initial, new MongoCode($reduce), $options);

        return $tags;
    }

}
