<?php
require_once '../../../vendor/autoload.php';
require_once '../../../index.php';

use View\Helper\HelperSeries;
use View\Helper\HelperEditoras;
use View\Helper\HelperLivros;
use Model\DAO\LivrosDao;
$id = filter_input(INPUT_GET,"id");
$serie = new HelperSeries();
$selectSerie = $serie->select();
$editora = new HelperEditoras();
$selectEditora = $editora->select();
$livro = new HelperLivros();
$tabelaLivro = $livro->tabela();

$livroEdit = (new LivrosDao())->findOne(['_id' => new \MongoId($id)]); 
$tags = $livro->tags($livroEdit['tags']);
?>

<HTML>
    <HEAD>
        <link href="../webroot/css/bootstrap.min.css" rel="stylesheet">

        <link href="../webroot/css/jquery.tagit.css" rel="stylesheet" type="text/css">
        <link href="../webroot/css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
        <link href="../webroot/css/styleMongo.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD Mongodb</title>

    </head>
    <body>
        <div class="row">
            <nav class="navbar navbar-inverse navbar-fixed-top circulo" >
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Web Dev Academy</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">In&iacute;cio</a></li>
                            <li><a href="#">Op&ccedil;&otilde;es</a></li>
                            <li><a href="#">Perfil</a></li>
                            <li><a href="#">Ajuda</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row" style="margin-top: 58px;">

            <div id="main" class="container-fluid">

                <h3 class="page-header">Adicionar Item</h3>

                <form action="updateAction.php" method="post" enctype="multipart/form-data">


                    <div class="container-fluid">
                        <div class="row">
                            <div class=" col-md-5 center-block">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Titulo</label>
                                    <input type="text" class="form-control"  name="titulo" placeholder="Titulo" value="<?= $livroEdit['nome']?>">
                                    <input type="hidden" class="form-control"  name="id"  value="<?= $livroEdit['_id']->{'$id'}?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Preço</label>
                                    <input type="text" class="form-control" name="preco" placeholder="Preço" value="<?= $livroEdit['preco']?>" >
                                </div>
                                   <div class="form-group">
                                    <label for="exampleInputEmail1">Quantidade</label>
                                    <input type="text" class="form-control" name="quantidade" placeholder="Quantidade" value="<?= $livroEdit['qtd']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Autor</label>
                                    <input type="text" class="form-control" name="autor" placeholder="Autor"  value="<?= $livroEdit['autor']?>">
                                </div>
                                <?= $selectSerie ?>
                                <?= $selectEditora ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tags</label>

                                    <input name="tags" id="singleFieldTags2" value="<?= $tags ?>">


                                </div>
                                    <div class="row">
                                  <div class="col-md-3">
                                  <img  alt="100%x200" src="../webroot/img/livros/<?=$livroEdit['imagem']?>" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
                                <input type ="hidden" name="nameFoto"  value="<?= $livroEdit['imagem'] ?>">
                                  
                                  </div>


                                </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Imagem</label>

                                    <input type="file" name="file">


                                </div>

                                <button type="submit" class="btn btn-default" name="cadastrar">Submit</button>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table border="1" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Autor</th>
                                            <th>Status</th>
                                            <th>Editora</th>
                                            <th>Serie</th>
                                            <th>Preço</th>
                                            <th>Quantidade</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?= $tabelaLivro ?>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                </form>

            </div>








        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>

        <script src="../webroot/js/bootstrap.min.js"></script>
        <script src="../webroot/js/tag-it.js" type="text/javascript" charset="utf-8"></script>

        <script>
            $(function () {

                //-------------------------------
                // Minimal
                //-------------------------------
                $('#myTags').tagit();

                $('#singleFieldTags2').tagit({
                });
            });
        </script>
    </BODY>
</HTML>

