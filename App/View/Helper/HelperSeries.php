<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace View\Helper;

use Model\DAO\SeriesDao;

/**
 * Description of HelperSeries
 *
 * @author isaac
 */
class HelperSeries implements InterfaceHelper {

    public function select() {
        $select = "";
        $series = new SeriesDao();
        $loop = $series->findAll();
        $select .='<fieldset class="form-group">
    <label for="exampleSelect1">Selecione uma serie</label>
    <select class="form-control" name="serie">';
         $select.=' <option value="" >Nenhuma</option>';
        foreach ($loop as $serie) {

            $select.=' <option value="' . $serie['_id']->{'$id'} . '">' . $serie['nome'] . '</option>';
        }

        $select .='</select>
  </fieldset>';
        return $select;
    }

    public function tabela() {
        
    }

    public function view() {
        
    }

}
