<?php
session_start();
require_once '../../../vendor/autoload.php';
require_once '../../../index.php';

use Model\DAO\UsuariosDao;

$id = $_SESSION['Usuario']['_id']->{'$id'};
$tags = (new UsuariosDao())->distinctTags($id);
?>

<link href="../webroot/css/jquery.tagit.css" rel="stylesheet" type="text/css">
<link href="../webroot/css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="../webroot/css/foundation.css" />
<link rel="stylesheet" href="../webroot/css/app.css" />

<div class="tabs-content" data-tabs-content="example-tabs">
    <div class="tabs-panel is-active" id="panel1">
        <h4>Meus Intereces</h4>


        <form method="post" action="cadastrarInterecesAction.php">
            <label>
                Tags
                <input type="text"placeholder="None" id="singleFieldTags2" name="tags" />
            </label>
            <button class="button" name="cadastrar">Cadastrar</button>
        </form>
    </div>
    <div class="tabs-panel" id="panel2">

    </div>
</div>
<div class="large-12 columns">
    <h5>Meus intereces </h5>
    <?php foreach ($tags as $value) { ?>
        <span class="secondary label"><?= $value; ?><i data-tag="<?= $value; ?>" class="glyphicon glyphicon-remove remover"></i></span>  
        <?php } ?>

</div>

<script src="../webroot/js/bootstrap.min.js"></script>
<script src="../webroot/js/tag-it.js" type="text/javascript" charset="utf-8"></script>


<script>
    $(function () {

        //-------------------------------
        // Minimal
        //-------------------------------
        $('.remover').click(function () {
            tag = $(this).attr('data-tag');
            $_this= $(this);
            $.ajax({
                method: "POST",
                url: "removerTags.php",
                data: {tag: tag, cadastrar: 1},
                success: function () {
                   console.log($_this.parent().remove());
                }
            })
        });
        $('#singleFieldTags2').tagit({
        });
    });
</script>