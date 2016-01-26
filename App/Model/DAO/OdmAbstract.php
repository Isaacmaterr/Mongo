<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model\DAO;

/**
 * Description of odmAbstract
 *
 * @author isaac
 */
abstract class odmAbstract {

    protected $collection;

    public function __construct($collection) {
        $this->collection = $collection;
        
    }

    public function saveDocument(array $array) {
      
        if (isset($array['_id']) && !empty($array['_id'])&&($array['_id'] !='')) {
           
            $fields['$set'] = $array;
            unset($fields['$set']['_id']);
            $return = $this->collection->update(['_id' => new \MongoId($array['_id'])], $fields);
            return $return;
        }

      
        unset($array['_id']);
        $return = $this->collection->insert($array);
        return $return;
    }

    public function findAll($array=null) {
        if ($array!=null) {
            return $this->collection->find($array);
        }

        return $this->collection->find();
    }

    public function findOne($array = null) {
        if ($array!=null) {
            return $this->collection->findOne($array);
        }
        return $this->collection->findOne();
    }

    public function remover($id,$set) {
        $array['$set']['status'] = $set ;
        return $this->collection->update(['_id' => new \MongoId($id)],$array);
    }

}
