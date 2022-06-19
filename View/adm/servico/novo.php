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
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php require_once 'View/adm/common/menu.php'; ?>
        <div class="container-fluid back">
            <div class="container text-center">
                <h4 class="page-head-line titulo">Novo Serviço</h4> 
            </div>
        </div>
        <div class="content-wrapper">
            <div class="container">
                <form method="post" enctype="multipart/form-data" action="<?php echo Router::base(); ?>/servicoAdmin/incluir/">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="servico_nome">Título</label>
                            <input type="text" name="servico_nome"  placeholder="Informe o título do servico" class="form-control altura" required />
                        </div>
                    </div>
                    <div class="row">   
                        <div class="form-group col-md-10">   
                            <span class="btn btn-black btn-file col-xs-12 col-md-4">
                                <i class="fa fa-cloud-upload"></i>  
                                Selecione uma Logo<input type="file" id="perfil_foto" name="servico_foto" class="form-group" required>
                            </span>
                            &nbsp; &nbsp; &nbsp; 
                            <span class="text-muted" style="line-height: 50px">Dimensões: 60 Largura x 60 Altura (pixels)</span>
                        </div>
                    </div><br/><br/>
                    <div class="form-group">
                        <label for="servico_desc">Descrição</label>
                        <textarea name="servico_desc" id="servico_desc"></textarea>
                    </div>
                    <div class="row">    
                        <div class="col-xs-12 text-right">
                            <div class="hidden-xs">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Cadastrar Dados</button>
                            </div>
                            <div class="visible-xs">
                                <br />
                                <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-check-circle"></i> Cadastrar Dados</button>
                                <br /><br />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>   
        <?php require_once 'View/adm/common/rodape.php'; ?>
        <script type="text/javascript" src="<?= Router::base(); ?>/assets/summernote/summernote.js"></script>
        <script>$("#menu-servico").addClass('menu-top-active');</script>
        <script type="text/javascript">
            $(function () {
                $('#servico_desc').summernote({
                    height: 200
                });
            });
        </script> 
    </body>
</html>      