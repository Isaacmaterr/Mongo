<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

/**
 * Description of Editoras
 *
 * @author isaac
 */
class Editoras {
    //put your code here
   
    private $id;
    private $nome ;
    private $logradouro ;
    private $bairro ;
    private $cidade ;
    private $estado ;
    private $telefone ;
      public function modelo() {
        $insert = [
            '_id' => $this->getId(),
            'nome' => $this->getNome(),
            'logradouro' => $this->getLogradouro(),
            'bairro' => $this->getBairro(),
            'cidade' => $this->getCidade(),
            'estado' => $this->getEstado(),
            'telefone' => $this->getTelefone(),
            
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

    function getLogradouro() {
        return $this->logradouro;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setTelefone(array $telefone) {
        $this->telefone = $telefone;
    }


    
}
