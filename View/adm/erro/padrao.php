<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
       <![endif]-->        
        <title>Admin</title>
        <link href="<?php echo Router::base(); ?>/assets/css/bootstrap.css" rel="stylesheet" />
        <link href="<?php echo Router::base(); ?>/assets/css/font-awesome.css" rel="stylesheet" /> 
        <link href="<?php echo Router::base(); ?>/assets/css/style.css" rel="stylesheet" />
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php require_once 'View/adm/common/menu.php'; ?>
        <!-- CONTEUDO AQUI -->
        <div class="content-wrapper">
            <div class="container">
                <div class="alert alert-danger">
                    <?php echo $dados['mensagem']; ?>
                </div>

                <a href="javascript:history.back();" class="btn btn-primary">
                    <i class="fa fa-chevron-circle-left"></i> 
                     <?php echo $dados['mensagem_voltar']; ?>
                </a>

            </div>
        </div>
        <!-- FOOTER -->
        <?php require_once 'View/adm/common/rodape.php'; ?>
        <script type="text/javascript">
            $(function () {
                $("#menu-noticia").addClass('menu-top-active');
                $('[data-toggle="tooltip"]').tooltip()
            });
        </script>
    </body>
</html>