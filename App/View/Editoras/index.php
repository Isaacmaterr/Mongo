<?php
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
            <?=(new HelperAdmin)->gerarmenu();?>
        </div>
        <div class="row" style="margin-top: 58px;">

            <div id="main" class="container-fluid">

                <h3 class="page-header">Adicionar Editora</h3>

                <form action="indexAction.php" method="post" enctype="multipart/form-data">


                    <div class="container-fluid">
                        <div class="row">
                            <div class=" col-md-5 center-block">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nome</label>
                                    <input type="text" class="form-control"  name="nome" placeholder="Titulo">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Logradouro</label>
                                    <input type="text" class="form-control" name="logradouro" placeholder="Preço">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Bairro</label>
                                    <input type="text" class="form-control" name="bairro" placeholder="Preço">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cidade</label>
                                    <input type="text" class="form-control" name="cidade" placeholder="Autor">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Estado</label>
                                    <input type="text" class="form-control" name="estado" placeholder="Autor">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telefones</label>

                                    <input name="telefones" id="singleFieldTags2" value="">


                                </div>
                                
                              

                                <button type="submit" class="btn btn-default" name="cadastrar">Submit</button>
                            </div>
                            
                        </div>
                     
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

