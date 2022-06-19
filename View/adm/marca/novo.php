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
                <h4 class="page-head-line titulo">Nova Marca</h4> 
            </div>
        </div>
        <!-- CONTEUDO AQUI -->
        <div class="content-wrapper">
            <div class="container">
                <form method="post" enctype="multipart/form-data" action="<?php echo Router::base(); ?>/marca/incluir/">
                    <div class="form-group">
                        <label for="marca_nome">Nome</label>
                        <input type="text" name="marca_nome" id="marca_nome" placeholder="Informe a marca" class="form-control altura" required />
                    </div>
                    <div class="row">
                        <div class="col-md-3  col-xs-12">
                            <span class="btn btn-black btn-file">
                                <i class="fa fa-cloud-upload"></i>  
                                Selecione uma imagem para logo<input type="file" id="marca_foto" name="marca_foto">
                            </span>
                        </div>
                        <span class="text-muted">Dimensões:  350 Largura x 260 Altura (pixels)</span>
                    </div><br><br>

                    <div class="row">    
                        <div class="col-md-12 col-xs-12 text-right">
                            <div class="hidden-xs">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Cadastrar Dados</button>
                            </div>
                            <div class="visible-xs">
                                <br>
                                <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-check-circle"></i> Cadastrar Dados</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>   
        </div>
        <!-- FOOTER -->
        <?php require_once 'View/adm/common/rodape.php'; ?>
        <script>$("#menu-marca").addClass('menu-top-active');</script>
    </body>
</html>      