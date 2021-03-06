<?php
session_start();
require_once '../../../vendor/autoload.php';
require_once '../../../index.php';
use View\Helper\HelperSeries;
use View\Helper\HelperEditoras;
use View\Helper\HelperLivros;
use View\Helper\HelperAdmin;

$serie = new HelperSeries();
$selectSerie = $serie->select();
$editora = new HelperEditoras();
$selectEditora = $editora->select();
$livro = new HelperLivros();
$tabelaLivro = $livro->tabela();

?>

<HTML>
    <HEAD>
       

        <link href="../webroot/css/jquery.tagit.css" rel="stylesheet" type="text/css">
        <link href="../webroot/css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD Mongodb</title>

    </head>
    <body>
        <div class="row">
            
        </div>
        <div class="row" style="margin-top: 58px;">

            <div id="main" class="container-fluid">
                <button class="btn btn-danger"  onClick="history.go(-1)">Voltar</button>
                <h3 class="page-header">Adicionar Livros</h3>
                

                <form action="indexAction.php" method="post" enctype="multipart/form-data">


                    <div class="container-fluid">
                        <div class="row">
                            <div class=" col-md-5 center-block">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Titulo</label>
                                    <input type="text" class="form-control"  name="titulo" placeholder="Titulo">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Preço</label>
                                    <input type="text" class="form-control" name="preco" placeholder="Preço">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Quantidade</label>
                                    <input type="text" class="form-control" name="quantidade" placeholder="Preço">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Autor</label>
                                    <input type="text" class="form-control" name="autor" placeholder="Autor">
                                </div>
                                <?= $selectSerie ?>
                                <?= $selectEditora ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tags</label>

                                    <input name="tags" id="singleFieldTags2" value="">


                                </div>
                                
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Imagem</label>

                                    <input type="file" name="file">


                                </div>

                                <button type="submit" class="btn btn-default" name="cadastrar">Submit</button>
                            </div>
                            
                        </div>
                  <!--      <div class="row">
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
                        </div>-->
                </form>

            </div>








        </div>
     

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

