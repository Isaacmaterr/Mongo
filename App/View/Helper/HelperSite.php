<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HelperSite
 *
 * @author isaac
 */

namespace View\Helper;

class HelperSite {
public function gerarmenu() {
    echo '<nav class="navbar navbar-default" style="height: 20%;">
  <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="Buscas.php">
          <img alt="Brand" src="../webroot/img/logo.png" width="150px" height="66px">
        </a>
         <a class="navbar-brand" href="#">
         Minha conta
      </a>
    </div>
  </div>
</nav>';
}
}
