<?php

require_once '../../../vendor/autoload.php';
require_once '../../../index.php';


use View\Helper\HelperLivros;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if (filter_has_var(INPUT_POST, "buscar")) {
    $tags = explode(',', filter_input(INPUT_POST, "tags"));
    $livros = (new HelperLivros)->listLivros($tags) ;
  
}
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img alt="Brand" src="...">
      </a>
        
    </div>
  </div>
</nav>
<div class="row"style="">
    
    <div class="col-md-8">
        <div class="bs-example" data-example-id="thumbnails-with-custom-content"> 
            <div class="row"> 
                <?php foreach ($livros as $livro) {
                                      
                    
                ?>
                <div class="col-sm-6 col-md-4"> 
                    <div class="thumbnail"> 
                        <img data-src="holder.js/100%x200" alt="100%x200" src="../webroot/img/livros/<?=$livro['imagem']?>" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
                        <div class="caption"> 
                            
                            <p>Nome : <?= $livro['nome']?></p>
                            <p>Autor : <?= $livro['autor']?></p>
                            <p>Editora :<?= $livro['editora']?> </p>
                            <p>Serie :<?= $livro['serie']?> </p>
                            
                            <p>Valor : <?= $livro['preco']?> </p>
                            <p>Quantidade em estoque : <?= $livro['qtd']?></p>
                            <p><a href="#" class="btn btn-primary" role="button">Button</a> 
                                <a href="#" class="btn btn-default" role="button">Button</a></p> 
                        </div> 
                    </div> 
                </div>
                <?php  } ?>
            </div>
        </div>
    </div>
</div>
