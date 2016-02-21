<?php
session_start();
require_once '../../../vendor/autoload.php';
require_once '../../../index.php';

use Model\DAO\UsuariosDao;
use Model\DAO\LivrosDao;
use View\Helper\HelperLivros;

(new UsuariosDao())->verficaLogado();
$id = $_SESSION['Usuario']['_id']->{'$id'};
$tags = (new UsuariosDao())->distinctTags($id);
$meusLivros = (new HelperLivros)->meusIntereces($id);
?>

<link rel="stylesheet" href="../webroot/css/foundation.css" />
<link rel="stylesheet" href="../webroot/css/app.css" />
<style>.fi-social-facebook{color:dodgerblue;font-size:2rem;}.fi-social-youtube{color:red;font-size:2rem;}.fi-social-pinterest{color:darkred;font-size:2rem;}i.fi-social-instagram{color:brown;font-size:2rem;}i.fi-social-tumblr{color:navy;font-size:2rem;}.fi-social-twitter{color:skyblue;font-size:2rem;}</style>
<header>

    <div class="top-bar">
        <div class="top-bar-left">
            <ul class="menu">
                <li><a href=logout.php><i class="glyphicon glyphicon-log-in"></i>Sair</a></li>

            </ul>
        </div>
        <div class="top-bar-right">
            <ul class="menu">
                <li><input type="search" placeholder="Search"></li>
                <li><button type="button" class="button">Search</button></li>
            </ul>
        </div>
    </div>


    <div class="row">
        <div class="medium-4 columns">
            <img src="../webroot/img/logo.png" alt="company logo">
        </div>
        <div class="medium-8 columns">
            <img src="http://placehold.it/900x175&text=Responsive Ads - ZURB Playground/333" alt="advertisement for deep fried Twinkies">
        </div>
    </div>

    <br>
    <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
        <button class="menu-icon" type="button" data-toggle></button>
        <div class="title-bar-title">Menu</div>
    </div>
    <div class="top-bar" id="main-menu">
        <ul class="menu vertical medium-horizontal expanded medium-text-center" data-responsive-menu="drilldown medium-dropdown">
            <li class="has-submenu"><a href="../Livros/index.php">Cadastra livro</a>

            </li>
            <li class="has-submenu"><a href="listaMeusLivros.php">Meus livros</a>
            </li>
            <li class="has-submenu"><a href="cadastrarIntereces.php">Cadastra intereces </a>
            </li>

        </ul>
    </div>
</header>
<br>
<div class="row">
    <div class="medium-8 columns">
        <p><img src="http://placehold.it/900x450&text=Promoted Article" alt="main article image"></p>
    </div>
    <div class="medium-4 columns">
        <p><img src="http://placehold.it/400x200&text=Other cool article" alt="article promo image" alt="advertisement for deep fried Twinkies"></p>
        <p><img src="http://placehold.it/400x200&text=Other cool article" alt="article promo image"></p>
    </div>
</div>
<hr>
<div class="row column">
    <h4 style="margin: 0;" class="text-center">BREAKING NEWS</h4>
</div>
<hr>
<div class="row small-up-3 medium-up-4 large-up-5">
    <div class="column">
        <img src="http://placehold.it/400x370&text=Look at me!" alt="image for article">
    </div>
    <div class="column">
        <img src="http://placehold.it/400x370&text=Look at me!" alt="image for article">
    </div>
    <div class="column">
        <img src="http://placehold.it/400x370&text=Look at me!" alt="image for article">
    </div>
    <div class="column show-for-medium">
        <img src="http://placehold.it/400x370&text=Look at me!" alt="image for article">
    </div>
    <div class="column show-for-large">
        <img src="http://placehold.it/400x370&text=Look at me!" alt="image for article">
    </div>
</div>
<hr>
<div class="row column">
    <h4 style="margin: 0;" class="text-center">Meus Intereces</h4>
</div>
<hr>
<div class="row">
    <div class="large-8 columns" style="border-right: 1px solid #E3E5E8;">
        <article>
<?php foreach ($meusLivros as $value) {
    ?>


                <div class="row">
                    <div class="large-6 columns">
                        <p><img src="../webroot/img/livros/<?= $value['livro']['imagem'] ?>" alt="image for article" alt="article preview image"></p>
                    </div>
                    <div class="large-6 columns">
                        <h5><a href="#"><?= $value['livro']['nome'] ?></a></h5>
                        <p>
                        <p> <span><i class="fi-torso">Autor:<?= $value['livro']['autor'] ?></i></span>
                            <span><i class="fi-torso">Serie:<?= $value['livro']['serie'] ?></i></span></p>
                        <p> <span><i class="fi-torso">Editora:<?= $value['livro']['editora'] ?></i></span>
                            <span><i class="fi-calendar">Usuario:<?= $value['usuario']['nome'] ?> </i></span></p>
                        <span><i class="fi-comments">Distancia:<?= $value['usuario']['distancia'] ?>Km</i></span>
                        </p>
                        <p>Tags:<?= $value['livro']['printTags'] ?></p>
                    </div>
                </div>
                <hr>
<?php } ?>

        </article>
    </div>
    <div class="large-4 columns">
        <aside>
            <div class="row small-up-3">
                <div class="column text-center">
                    <i class="fi-social-facebook"></i>
                    <h6>56,009</h6>
                    <p><small>FOLLOWERS</small></p>
                    <br>
                </div>
                <div class="column text-center">
                    <i class="fi-social-twitter"></i>
                    <h6>76,905</h6>
                    <p><small>FOLLOWERS</small></p>
                    <br>
                </div>
                <div class="column text-center">
                    <i class="fi-social-instagram"></i>
                    <h6>34,099</h6>
                    <p><small>FOLLOWERS</small></p>
                    <br>
                </div>
                <div class="column text-center">
                    <i class="fi-social-tumblr"></i>
                    <h6>13,765</h6>
                    <p><small>FOLLOWERS</small></p>
                </div>
                <div class="column text-center">
                    <i class="fi-social-pinterest"></i>
                    <h6>9,283</h6>
                    <p><small>FOLLOWERS</small></p>
                </div>
                <div class="column text-center">
                    <i class="fi-social-youtube"></i>
                    <h6>99,000</h6>
                    <p><small>FOLLOWERS</small></p>
                </div>
            </div>
            <br>
            <div class="row column">
                <p class="lead">FROM OUR FRIENDS</p>
                <p><img src="http://placehold.it/400x300&text=Buy Me!" alt="advertisement of ShamWow"></p>
            </div>
            <br>
            <div class="row column">
                <p class="lead">TRENDING POSTS</p>
                <div class="media-object">
                    <div class="media-object-section">
                        <img class="thumbnail" src="http://placehold.it/100">
                    </div>
                    <div class="media-object-section">
                        <h5>All I need is a space suit and I'm ready to go.</h5>
                    </div>
                </div>
                <div class="media-object">
                    <div class="media-object-section">
                        <img class="thumbnail" src="http://placehold.it/100">
                    </div>
                    <div class="media-object-section">
                        <h5>Are the stars out tonight? I don't know if it's cloudy or bright.</h5>
                    </div>
                </div>
                <div class="media-object">
                    <div class="media-object-section">
                        <img class="thumbnail" src="http://placehold.it/100">
                    </div>
                    <div class="media-object-section">
                        <h5>And the world keeps spinning.</h5>
                    </div>
                </div>
                <div class="media-object">
                    <div class="media-object-section">
                        <img class="thumbnail" src="http://placehold.it/100">
                    </div>
                    <div class="media-object-section">
                        <h5>Cold hearted orb that rules the night.</h5>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
<footer>
    <div class="row expanded callout secondary">
        <div class="large-4 columns">
            <h5>FLICKR IMAGES</h5>
            <div class="row small-up-4">
                <div class="column"><img class="thumbnail" src="http://placehold.it/75" alt="image of space dog"></div>
                <div class="column"><img class="thumbnail" src="http://placehold.it/75" alt="image of space dog"></div>
                <div class="column"><img class="thumbnail" src="http://placehold.it/75" alt="image of space dog"></div>
                <div class="column"><img class="thumbnail" src="http://placehold.it/75" alt="image of space dog"></div>
                <div class="column"><img class="thumbnail" src="http://placehold.it/75" alt="image of space dog"></div>
                <div class="column"><img class="thumbnail" src="http://placehold.it/75" alt="image of space dog"></div>
                <div class="column"><img class="thumbnail" src="http://placehold.it/75" alt="image of space dog"></div>
                <div class="column"><img class="thumbnail" src="http://placehold.it/75" alt="image of space dog"></div>
            </div>
        </div>
        <div class="large-4 columns">
            <h5>Meus intereces </h5>
<?php foreach ($tags as $value) { ?>
                <span class="secondary label"><?= $value; ?></span>  
            <?php } ?>

        </div>
        <div class="large-4 columns">
            <h5>RANDOM MAG</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti quam voluptatum vel repellat ab similique molestias molestiae ea omnis eos, id asperiores est praesentium, voluptate officia nulla aspernatur sequi aliquam.</p>
        </div>
    </div>
    <div class="row expanded">
        <div class="medium-6 columns">
            <ul class="menu">
                <li><a href="#">Legal</a></li>
                <li><a href="#">Partner</a></li>
                <li><a href="#">Explore</a></li>
            </ul>
        </div>
        <div class="medium-6 columns">
            <ul class="menu align-right">
                <li class="menu-text">Copyright © 2099 Random Mag</li>
            </ul>
        </div>
    </div>
</footer>
<script src="../webroot/js/vendor/jquery.min.js"></script>
<script src="../webroot/js/vendor/what-input.min.js"></script>
<script src="../webroot/js/foundation.min.js"></script>
<script src="../webroot/js/app.js"></script>
<script>
    
    </script>

