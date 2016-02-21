<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace View\Helper;

use Model\DAO\LivrosDao;
use Model\DAO\UsuariosDao;
use Model\DAO\LivroUsuarioDao;
use Model\DAO\Util;
/**
 * Description of HelperSeries
 *
 * @author isaac
 */
class HelperLivros implements InterfaceHelper {

    public function select() {
        
    }

    public function tabela() {
        $tr = "";
        $loop = (new LivrosDao)->findAll();
        $editora = new \Model\DAO\EditorasDao();
        $serie = new \Model\DAO\SeriesDao();
        foreach ($loop as $livro) {
            $tr.='<tr>';
            $tr.=" <td>" . $livro['nome'] . "</td>";
            $tr.=" <td>" . $livro['autor'] . "</td>";
            $tr.=" <td>" . $livro['status'] . "</td>";
            $edit = $editora->findOne(['_id' => new \MongoId($livro['editora'])]);
            $tr.=" <td>" . $edit['nome'] . "</td>";
            $ser['nome'] = "Nao existe";
            if ($livro['serie'] != "") {
                $ser = $serie->findOne(['_id' => new \MongoId($livro['serie'])]);
            }
            $tr.=" <td>" . $ser['nome'] . "</td>";
            $tr.=" <td>" . $livro['preco'] . "</td>";
            $tr.=" <td>" . $livro['qtd'] . "</td>";
            $tr.=' <td><div class="btn-group" role="group">'
                    . '<button id="btnGroupVerticalDrop1" type="button" class="btn btn-default dropdown-toggle" '
                    . 'data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
                    . ' Dropdown <span class="caret"></span> '
                    . '</button> '
                    . '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'
                    . ' <li><a href="update.php?id=' . $livro['_id']->{'$id'} . '">Editar'
                    . '</a>'
                    . '</li> '
                    . '<li>'
                    . '<a href="#">Visualizar'
                    . '</a>'
                    . '</li>'
                    . '<li>'
                    . '<a href="updatestatus.php?id=' . $livro['_id']->{'$id'} . '&status=' . ($livro['status'] == 0 ? 1 : 0 ) . '">Retirado estoque'
                    . '</a>'
                    . '</li>'
                    . ' </ul> </div></td>';

            $tr.='</tr>';
        }
        return $tr;
    }

    public function view() {
        
    }

    public function tags(array $array) {
        $tags = "";
        $cont = 0;
        foreach ($array as $tag) {


            if ($cont == 0) {
                $tags.= $tag;
            } else {
                $tags.= "," . $tag;
            }
            $cont++;
        }
        return $tags;
    }

    public function chuvaTags() {
        $array = ((new LivrosDao)->tagsDistinct());


        $conteudo = "";
        foreach ($array['retval'] as $value) {

            foreach ($value['Tags'] as $key => $tags) {
                $conteudo.='<span class="label label-success tags" data-tag="' . $key . '"style="margin-left: 4px;cursor: pointer;">' . $key . '[' . $tags . ']</span>';
            }
        }
        return $conteudo;
    }

    public function listLivros(array $tags) {
        $array['tags']['$in'] = $tags;
        $array['status'] = 1;
        $return = (new LivrosDao())->findAll($array);

        return $return;
    }

    public function editora($id) {
        $Obj = new \Model\DAO\EditorasDao();
       
        $editora = $Obj->findOne(['_id' => new \MongoId($id)]);
        return $editora;
    }

    public function serie($id) {
        $Obj = new \Model\DAO\SeriesDao();
        $serie = $Obj->findOne(['_id' => new \MongoId($id)]);
        return $serie;
    }

    
    public function meusIntereces($id) {
        $query['usuario']= new \MongoId($id);
        $Livrosdicas = (new LivroUsuarioDao())->findAll($query);
        $usuario = new UsuariosDao();
        $livro = new LivrosDao();
        $editora = new \Model\DAO\EditorasDao();
        $serie = new \Model\DAO\SeriesDao();
        $util = new Util();
        $array=[];
        $cont = 0;
      
        foreach ($Livrosdicas as $intereces) {
            
            
          $array[$cont]['livro'] =   $livro->findOne(['_id'=>new \MongoId($intereces['idlivro']->{'$id'})]);
         
           $array[$cont]['livro']['serie'] = $serie->findOne(['_id' => new \MongoId($array[$cont]['livro']['serie'])])['nome'];
           $array[$cont]['livro']['editora'] =$editora->findOne(['_id' => new \MongoId($array[$cont]['livro']['editora'])])['nome'];
           $array[$cont]['livro']['printTags']='';
           foreach ( $array[$cont]['livro']['tags'] as $value) {
         $array[$cont]['livro']['printTags'].=",".$value;
           }
           $array[$cont]['usuario'] = $usuario->findOne(['_id'=>new \MongoId($array[$cont]['livro']['usuario'])]);
           $array[$cont]['usuario']['distancia'] = number_format($util->calcDistancia($array[$cont]['usuario']['loc']['x'], $array[$cont]['usuario']['loc']['y'], $_SESSION['Usuario']['loc']['x'], $_SESSION['Usuario']['loc']['y']),2);
         
           unset($array[$cont]['usuario']['senha']);
          $cont++;
            
        }
      
        return $array;
    }
    
    
    
}
