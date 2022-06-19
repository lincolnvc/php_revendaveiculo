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
        <link href="<?= Router::base(); ?>/assets/css/font-awesome.css" rel="stylesheet" /> 
        <link href="<?= Router::base(); ?>/assets/css/style.css" rel="stylesheet" />
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php require_once 'View/adm/common/menu.php'; ?>
        <div class="container-fluid back ">
            <div class="container text-center">
                <h4 class="page-head-line titulo">Editar Câmbio</h4> 
            </div>
        </div>
        <div class="content-wrapper">
            <div class="container">
                <form method="post" action="<?= Router::base(); ?>/cambio/gravar/">
                    <div class="form-group">
                        <input type="hidden" name="cambio_id" class="form-control" value="<?= $dados[0]->cambio_id; ?>"/>
                        <div class="row">
                            <div class="col-md-7  col-xs-12">
                                <input type="text" name="cambio_nome" id="cambio_nome" class="form-control altura" value="<?= $dados[0]->cambio_nome; ?>"/>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="hidden-xs text-right">
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
        <script>$("#menu-cambio").addClass('menu-top-active');</script>
    </body>
</html>      