<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace View\Helper;

use Model\DAO\EditorasDao;

/**
 * Description of HelperEditoras
 *
 * @author isaac
 */
class HelperEditoras implements InterfaceHelper {

    public function select() {

        $select = "";
        $editora = new EditorasDao();
        $loop = $editora->findAll();
        $select .='<fieldset class="form-group">
    <label for="exampleSelect1">Selecione Editora</label>
    <select class="form-control" name="editora">';
        foreach ($loop as $editora) {

            $select.=' <option value="' . $editora['_id']->{'$id'} . '">' . $editora['nome'] . '</option>';
        }

        $select .='</select>
  </fieldset>';
        return $select;
    }

    public function tabela() {
        
    }

    public function view() {
        
    }

//put your code here
}
