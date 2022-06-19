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
        <div class="container-fluid back ">
            <div class="container text-center">
                <h4 class="page-head-line titulo">Configurações</h4>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="container">
                <?php echo status::msg(); ?>
                <form method="post" enctype="multipart/form-data" action="<?php echo Router::base(); ?>/config/atualizar/">
                    <input type="hidden" name="config_id" id="config_id" value="<?php echo $dados['config'][0]->config_id; ?>"/>
                    <div class="form-group col-md-6">
                        <label for="config_detalhe_paginacao">Paginação</label>
                        <input type="text" name="config_detalhe_paginacao" id="config_detalhe_paginacao"  placeholder="Informe a paginação" required  class="form-control altura" 
                               value="<?php echo $dados['config'][0]->config_detalhe_paginacao; ?>"/>
                    </div>             
                    <div class="text-right col-md-6 col-xs-12" style="margin-top: 1%;">
                        <div class="hidden-xs">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i> Atualizar Dados</button>
                        </div>
                        <div class="visible-xs">
                            <br />
                            <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-refresh"></i> Atualizar Dados</button>
                            <br /><br />
                        </div>
                    </div>
                </form>  
            </div>  
        </div>  
        <?php require_once 'View/adm/common/rodape.php'; ?>
        <script type="text/javascript" src="<?= Router::base(); ?>/assets/summernote/summernote.js"></script>
        <script>$("#menu-config").addClass('menu-top-active');</script>
        <script type="text/javascript">
            $(function () {
                $('#config_desc').summernote({
                    height: 200
                });
            });
            setTimeout(function () {
                $('.msg-status').slideUp();
            }, 2500);
        </script> 
    </body>
</html>      