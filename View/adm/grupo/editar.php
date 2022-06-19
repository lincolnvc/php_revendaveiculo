<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
       <![endif]-->        
        <title>Admin</title>
        <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.5/cosmo/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo Router::base(); ?>/assets/css/font-awesome.css" rel="stylesheet" /> 
        <link href="<?php echo Router::base(); ?>/assets/css/style.css" rel="stylesheet" />
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php require_once 'View/adm/common/menu.php'; ?>
        <div class="container-fluid back">
            <div class="container text-center">
                <h4 class="page-head-line titulo">Editar Grupo</h4> 
            </div>
        </div>
        <div class="content-wrapper">
            <div class="container">
                <form method="post" action="<?php echo Router::base(); ?>/grupo/gravar/">
                    <div class="form-group">
                        <input type="hidden" name="grupo_id" class="form-control" value="<?php echo $dados[0]->grupo_id; ?>"/>
                        <div class="row">
                            <div class="col-md-6  col-xs-12">
                                <input type="text" name="grupo_nome" id="grupo_nome" class="form-control altura" required value="<?php echo $dados[0]->grupo_nome; ?>"/>
                            </div>
                            <div class="col-md-6 col-xs-12 text-right">
                                <div class="hidden-xs">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i> Atualizar Dados</button>
                                </div>
                                <div class="visible-xs">
                                    <br>
                                    <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-refresh"></i> Atualizar Dados</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- FOOTER -->
        <?php require_once 'View/adm/common/rodape.php'; ?>
        <script>$("#menu-grupo").addClass('menu-top-active');</script>
    </body>
</html>      