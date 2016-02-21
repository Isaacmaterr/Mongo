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

class HelperAdmin {
public function gerarmenu() {
    echo '<nav class="navbar navbar-inverse navbar-fixed-top" style="border-bottom: 100px solid #886363;
                 border-left: 50px solid transparent;
                 border-right: 50px solid transparent;
                 height: 0;
                 width: 100%;">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Sebo online </a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="../Site/Buscas.php">In&iacute;cio</a></li>
                            <li><a href="../Editora/index.php">Editoras</a></li>
                            <li><a href="../Serie/index.php">Series</a></li>
                            <li><a href="#">Ajuda</a></li>
                        </ul>
                    </div>
                </div>
            </nav>';
}
}
