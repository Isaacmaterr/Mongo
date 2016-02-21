<?php
session_start();
require_once '../../../vendor/autoload.php';
require_once '../../../index.php';

use Model\DAO\UsuariosDao;
use Model\DAO\LivrosDao;
use View\Helper\HelperLivros;

(new UsuariosDao())->verficaLogado();
$usuarioLogado = (new UsuariosDao())->getidLogado();
$meusLivros = (new LivrosDao())->findAll(['usuario' => $usuarioLogado]);
?>


<link rel="stylesheet" href="../webroot/css/foundation.css" />
<link rel="stylesheet" href="../webroot/css/app.css" />
<div class="title-bar" data-responsive-toggle="realEstateMenu" data-hide-for="small">
    <button class="menu-icon" type="button" data-toggle></button>
    <div class="title-bar-title">Menu</div>
</div>
<div class="top-bar" id="realEstateMenu">
    <div class="top-bar-left">
        <ul class="menu" data-responsive-menu="accordion">
            <li class="menu-text" onClick="history.go(-1)">Voltar</li>
            
        </ul>
    </div>

</div>

<br>

<div class="row column">
    <hr>
</div>
<div class="row column">
    <p class="lead">Meus livros</p>
</div>
<div class="row small-up-1 medium-up-2 large-up-3">
<?php foreach ($meusLivros as $livro) { ?>
    <div class="column" style="width:23.33333%!important;">
            <div class="callout">
                <p><?= $livro['nome'] ?></p>
                <p><img src="../webroot/img/livros/<?= $livro['imagem'] ?>" alt="image of a planet called Pegasi B"></p>
                <p class="lead"> 
                <p>Autor : <?= $livro['autor'] ?></p>
                <p>Editora :<?=(new HelperLivros())->serie($livro['editora'])['nome'] ?> </p>
                <p>Serie :<?= (new HelperLivros())->serie($livro['serie'])['nome'] ?> </p>

                <p>Valor : <?= $livro['preco'] ?> </p>
                <p>Quantidade em estoque : <?= $livro['qtd'] ?></p></p>
                
            </div>
        </div>
<?php } ?>

</div>
<div class="row column">
    <a class="button hollow expanded">Load More</a>
</div>

<script src="../webroot/js/vendor/jquery.min.js"></script>
<script src="../webroot/js/vendor/what-input.min.js"></script>
<script src="../webroot/js/foundation.min.js"></script>
<script src="../webroot/js/app.js"></script>


