<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

/**
 * Description of Livros
 *
 * @author isaac
 */
class Livros {

    //put your code here

    private $usuario;
    private $nome;
    private $id;
    private $preco;
    private $outor;
    private $status;
    private $tags;
    private $serie;
    private $editora;
    private $quantidade;
    private $imagem;

    function getUsuario() {
        return $this->usuario;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function getImagem() {
        return $this->imagem;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
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

    function getPreco() {
        return $this->preco;
    }

    function getOutor() {
        return $this->outor;
    }

    function getStatus() {
        return $this->status;
    }

    function getTags() {
        return $this->tags;
    }

    function getSerie() {
        return $this->serie;
    }

    function getEditora() {
        return $this->editora;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setOutor($outor) {
        $this->outor = $outor;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setTags($tags) {
        $this->tags = $tags;
    }

    function setSerie($serie) {
        $this->serie = $serie;
    }

    function setEditora($editora) {
        $this->editora = $editora;
    }

    public function modelo() {
        $insert = [
            '_id' => $this->getId(),
            'nome' => $this->getNome(),
            'usuario' => $this->getUsuario(),
            'preco' => intval($this->getPreco()),
            'qtd' => intval($this->getQuantidade()),
            'autor' => $this->getOutor(),
            'status' => $this->getStatus(),
            'tags' => $this->getTags(),
            'imagem' => $this->getImagem(),
            'serie' => $this->getSerie(),
            'editora' => $this->getEditora(),
        ];
        return $insert;
    }

}
