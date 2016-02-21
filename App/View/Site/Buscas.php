<?php
require_once '../../../vendor/autoload.php';
require_once '../../../index.php';

use View\Helper\HelperLivros;

$tags = (new HelperLivros)->chuvaTags();
?>
<link href="../webroot/css/jquery.tagit.css" rel="stylesheet" type="text/css">
<link href="../webroot/css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
<div class="container-fluid">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../Usuarios/index.php">
                    Minha Conta
                </a>

            </div>

            <div class="navbar-header">
                <a class="navbar-brand" href="../Usuarios/Cadastro.php">
                    Cadastrar
                </a>

            </div>
        </div>
    </nav>
    <div class="row" style="margin-top: 145px;">
        <div class="col-md-5 col-lg-offset-3">
            <div class="row">
                <label for="basic-url">Tags</label>
                <form method="post" action="listaLivros.php" >
                    <input type="text" class="form-control" id="singleFieldTags2" name="tags" >
                    <button type="submit" class="btn btn-success" style="width: 100%;" name="buscar" >Buscar</button>
                </form>



            </div>
            <div class="row" >

                <div class="col-md-12">
                    <div class="btn-group">
                        <div class="col-md-6">
                            <?= $tags ?>
                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div>

</div>
<script src="../webroot/js/tag-it.js" type="text/javascript" charset="utf-8"></script>
<script>
    $(document).ready(function () {
        //-------------------------------
        // Minimal
        //-------------------------------
        $('#myTags').tagit();

        $('#singleFieldTags2').tagit({
        });
        $(".tags").click(function () {
            $tags = $(this).attr('data-tag');
            $('#singleFieldTags2').tagit('createTag', $tags)
            console.log($tags);
        });

    });
</script>