<?php
session_start();
require_once '../../../vendor/autoload.php';
require_once '../../../index.php';
use Model\DAO\SeriesDao;
use Model\Series;
use Model\DAO\Util;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 

if(filter_has_var(INPUT_POST,"cadastrar")){

$serie = new Series();
$tags = explode(',', filter_input(INPUT_POST,"tags"));

$serie->setNome(filter_input(INPUT_POST,"nome"));
$serie->setAutorSerie(filter_input(INPUT_POST,"autor"));
$serie->setDataLancamento( new \MongoDate(filter_input(INPUT_POST,"data")));
$serie->setTags($tags);
 $modelo = $serie->modelo();
 $return = (new SeriesDao())->saveDocument($modelo);
 
  header("location:index.php");
 
}
