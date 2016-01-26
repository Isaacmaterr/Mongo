<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace View\Helper;

use Model\DAO\LivrosDao;

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
            if($livro['serie'] != ""){
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
                    . '<a href="updatestatus.php?id=' . $livro['_id']->{'$id'} . '&status='.($livro['status'] ==0 ? 1:0 ).'">Retirado estoque'
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
                $tags.= ",".$tag;

               
            }
             $cont++;
        }
        return $tags;
    }
public function chuvaTags(){
 $array =  ((new LivrosDao)->tagsDistinct());
 
 
 $conteudo ="";
 foreach ($array['retval'] as $value) {
     
      foreach ($value['Tags'] as $key=>$tags) {
    $conteudo.='<span class="label label-success tags" data-tag="'.$key.'"style="margin-left: 4px;cursor: pointer;">'.$key.'['.$tags.']</span>';
 }
 }
 return $conteudo;
}

public function listLivros(array $tags) {
    $array['tags']['$in']=$tags;
    $array['status']=1;
    $return = (new LivrosDao())->findAll($array);
    
    return $return ;
}

}
