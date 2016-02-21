<?php
session_start();
require_once '../../../vendor/autoload.php';
require_once '../../../index.php';

use Model\DAO\UsuariosDao;
(new UsuariosDao())->logout();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

