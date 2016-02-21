<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

/**
 * Description of Usuarios
 *
 * @author isaac
 */
class Usuarios {

    //put your code here

    private $id;
    private $nome;
    private $email;
    private $senha;
    private $dataNacimento;
    private $meusIntereces;
    private $meusLivros;
    private $log;
    private $lat;
    private $status;
    private $imagem;
    private $perfil;
    private $raio;
    function getRaio() {
        return $this->raio;
    }

    function setRaio($raio) {
        $this->raio = $raio;
    }

        function getPerfil() {
        return $this->perfil;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

        function getStatus() {
        return $this->status;
    }

    function getImagem() {
        return $this->imagem;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

        public function modelo() {
        $insert = [
            '_id' => $this->getId(),
            'nome' => $this->getNome(),
            'email' => $this->getEmail(),
            'senha' => $this->getSenha(),
            'dataNacimento' => $this->getDataNacimento(),
            'meusIntereces' => $this->getMeusIntereces(),
            'meusLivros' => $this->getMeusLivros(),
            'loc'=>['x'=> floatval($this->getLat()),'y'=>floatval($this->getLog())],
            'status' => $this->getStatus(),
            'imagem' => $this->getImagem(),
            'perfil' => $this->getPerfil(),
            'raio' => (int) $this->getRaio()
        ];
        return $insert;
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getDataNacimento() {
        return $this->dataNacimento;
    }

    function getMeusIntereces() {
        return $this->meusIntereces;
    }

    function getMeusLivros() {
        return $this->meusLivros;
    }

    function getLog() {
        return $this->log;
    }

    function getLat() {
        return $this->lat;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setDataNacimento(\MongoDate $dataNacimento) {
        $this->dataNacimento = $dataNacimento;
    }

    function setMeusIntereces(array $meusIntereces) {
        $this->meusIntereces = $meusIntereces;
    }

    function setMeusLivros(array $meusLivros) {
        $this->meusLivros = $meusLivros;
    }

    function setLog($log) {
        $this->log = $log;
    }

    function setLat($lat) {
        $this->lat = $lat;
    }

}
