<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model\DAO;

/**
 * Description of EditorasDao
 *
 * @author isaac
 */
use Controller\Collection;

class UsuariosDao extends OdmAbstract {

    public $conexao;

    public function __construct() {
        $this->conexao = (new Collection('usuarios'))->getCollection();

        parent::__construct($this->conexao);
    }

    public function saveDocument(array $array) {

        return parent::saveDocument($array);
    }

    public function saveMinhasTags($id, array $tags) {
        try {
            $fields['$pushAll']['meusIntereces'] = $tags;
        $this->conexao->update(['_id' => new \MongoId($id)],$fields);
            exit();
            $this->conexao->update(['_id' => new \MongoId($id)],$fields);
            return TRUE;
        } catch (Exception $ex) {
            return false;
        }
    }

    
    
     public function removerMinhasTags($id, array $tags) {
        try {
            $fields['$pullAll']['meusIntereces'] = $tags;
            $this->conexao->update(['_id' => new \MongoId($id)], $fields);
            return TRUE;
        } catch (Exception $e) {
            return false;
        }
    }
    public function distinctTags($id) {
      $tags =  $this->conexao->distinct('meusIntereces',['_id' => new \MongoId($id)]);
    
      return $tags;
    }




    public function findAll($array = null) {

        return parent::findAll($array);
    }

    public function findOne($array = null) {
        return parent::findOne($array);
    }

    public function remover($id) {
        return parent::remover($id);
    }

    public function logar(array $usuario) {
         unset($usuario['senha']);
        $_SESSION['Usuario'] = $usuario;
        $this->meusLivros();
        $this->nivelAcesso($usuario['perfil']);
    }

    public function nivelAcesso($perfil) {

        switch ($perfil) {
            case 0:


                break;
            case 1:

             header("location:../../View/Usuarios/painel.php");
                break;

            default:
                break;
        }
    }

    public function verficaLogado() {
        if (!isset($_SESSION['Usuario'])) {
            $this->logout();
        }
    }

    public function logout() {
        session_destroy();
        header("location:../../View/Site/Buscas.php");
    }

    public function getidLogado() {
        return $_SESSION['Usuario']['_id']->{'$id'};
    }
   
    
    public function meusLivros(){
       
        $query = [ 
        'loc' => [
        '$near' => [
          $_SESSION['Usuario']['loc']['x'],
          $_SESSION['Usuario']['loc']['y'], 
        ],
        '$maxDistance' => $_SESSION['Usuario']['raio']/111.12],
    ];
        $query['_id']['$ne']= new \MongoId($_SESSION['Usuario']['_id']);
        $array = $this->conexao->find($query); 
      //  var_dump(iterator_to_array($array));
     
        if($array){
              $Livro_UsuarioDao = new LivroUsuarioDao();
              $query2['usuario'] = new \MongoId($_SESSION['Usuario']['_id']);
              
            $Interecesjacadastrados = $Livro_UsuarioDao->findAll($query2);
           
            $livros = (new LivrosDao())->meusIntereces($array,$Interecesjacadastrados);
           
            $Livro_Usuario = new \Model\LivroUsuario();
          
            foreach ($livros as $key=>$livro) {
                $Livro_Usuario->setIdLivro($key);
                $Livro_Usuario->setIdUsuario($_SESSION['Usuario']['_id']->{'$id'});
                $Livro_UsuarioDao->saveDocument($Livro_Usuario->modelo());
            }
        }
                return null;
                
            }
            
            
            
     
            
            
            
}
