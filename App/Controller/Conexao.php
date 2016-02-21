<?php
namespace Controller ;


/**
 * Description of Conexao
 *
 * @author isaac
 */
use MongoClient;

class Conexao {
    private $conexao = null ; 
    public function __construct() {
       try{
           if($this->conexao == null){
           $mongo= new MongoClient("mongodb://isaac:isaac1234@localhost", array("db" => "biblioteca"));
           $this->conexao = $mongo->selectDB('biblioteca');
           }
       }catch(\MongoConnectionException $e){
           return null ;
       
       }
    }
    public function getConexao() {
        
        return $this->conexao;
    }
}
