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
                <h4 class="page-head-line titulo">Editar Opcional</h4>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ol class="breadcrumb">
                            <li>Cadastros</li>
                            <li><a href="<?php echo Router::base(); ?>/grupo/">Grupos de Opcionais</a></li>
                            <li><a href="<?php echo Router::base(); ?>/opcional/grupo/<?php echo $dados['opcional']->grupo_id ?>/"><?php echo $dados['opcional']->grupo_nome ?></a></li>
                            <li class="active"><?php echo $dados['opcional']->opcional_nome ?></li>
                        </ol>     
                    </div>
                </div>
                <br /><br />
                <form method="post" enctype="multipart/form-data" action="<?php echo Router::base(); ?>/opcional/incluir/">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="opcional_nome" id="opcional_nome" placeholder="Informe opcional" class="form-control altura"
                                       value="<?php echo $dados['opcional']->opcional_nome ?>" />
                            </div>
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
                </form>
            </div>   
        </div>   
        <?php require_once 'View/adm/common/rodape.php'; ?>
        <script>$("#menu-modulo").addClass('menu-top-active');</script>
        <script type="text/javascript">
            $(function () {
                $("#opcional_grupo").val('<?php echo $dados['opcional']->opcional_grupo ?>');
            });
        </script>
    </body>
</html>      