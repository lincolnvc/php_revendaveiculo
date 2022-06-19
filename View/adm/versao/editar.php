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
        <link rel="stylesheet" href="<?php echo Router::base(); ?>/assets/summernote/summernote.css">
        <link href="<?php echo Router::base(); ?>/assets/select2/dist/css/select2.css" rel="stylesheet"/>
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php require_once 'View/adm/common/menu.php'; ?>
        <div class="container-fluid back">
            <div class="container text-center">
                <h4 class="page-head-line titulo">Editar Versão</h4> 
            </div>
        </div>
        <div class="content-wrapper">
            <div class="container">
                <form method="post" enctype="multipart/form-data" action="<?php echo Router::base(); ?>/versao/gravar/">
                    <input type="hidden" name="versao_id" id="versao_id" value="<?php echo $dados['versao']->versao_id ?>" />
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="versao_modelo">Modelo</label>
                            <select name="versao_modelo" id="versao_modelo" class="form-control" required >
                                <option value=""> Selecione modelo...</option>
                                <?php foreach ($dados['modelo'] as $p): ?>
                                    <option value="<?php echo $p->modelo_id ?>"> <?php echo $p->modelo_nome ?></option>
                                <?php endforeach; ?>                           
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="versao_nome">Versão</label>
                            <input type="text" name="versao_nome" id="versao_nome" placeholder="Informe a Versão" class="form-control" style="height: 35px" required 
                                   value="<?php echo $dados['versao']->versao_nome ?>" />
                        </div>
                    </div><br/><br/>
                    <div class="row">    
                        <div class="form-group col-xs-12 text-right">
                            <div class="hidden-xs">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Atualizar Dados</button>
                            </div>
                            <div class="visible-xs">
                                <br/>
                                <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-check-circle"></i> Atualizar Dados</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>   
        </div>
        <!-- FOOTER -->
        <?php require_once 'View/adm/common/rodape.php'; ?>
        <script>$("#menu-versao").addClass('menu-top-active');</script>
        <script type="text/javascript" src="<?php echo Router::base(); ?>/assets/select2/dist/js/select2.js"></script>
        <script>$("#versao_modelo").select2();</script>
        <script type="text/javascript">
            $(function () {
                $("#versao_modelo").val('<?php echo $dados['versao']->versao_modelo ?>');
            });
            $("#versao_modelo").select2('val', '<?php echo $dados['versao']->versao_modelo ?>');
        </script>
    </body>
</html>      