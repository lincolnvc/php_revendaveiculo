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
                <h4 class="page-head-line titulo">Novo Slide</h4> 
            </div>
        </div>
        <div class="content-wrapper">
            <div class="container">
                <form method="post" enctype="multipart/form-data" action="<?php echo Router::base(); ?>/slide/incluir/">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="slide_nome">Título</label>
                            <input type="text" name="slide_nome"  placeholder="Informe o título do slide" class="form-control altura" required />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="slide_link">Link</label>
                            <input type="text" name="slide_link" placeholder="http://www.nomedosite.com.br" class="form-control altura" />
                        </div>
                        <div class="col-md-2 col-xs-12">
                            <label for="slide_nova">Nova Página</label>
                            <select name="slide_nova" id="slide_nova" class="form-control" required>
                                <option value="">Selecione...</option>
                                <option value="1">SIM</option>
                                <option value="0" selected>NÃO</option>
                            </select>
                        </div>
                    </div>
                    <br/><br/>

                    <div class="row">   
                        <div class="form-group col-md-10">   
                            <span class="btn btn-black btn-file col-xs-12 col-md-4">
                                <i class="fa fa-cloud-upload"></i>  
                                Selecione uma Foto<input type="file" id="perfil_foto" name="slide_foto" class="form-group" required>
                            </span>
                            &nbsp; &nbsp; &nbsp; 
                            <span class="text-muted" style="line-height: 50px">Dimensões:  1900 Largura x  500 Altura (pixels)</span>
                        </div>
                    </div><br/><br/>

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
        <script>$("#menu-slide").addClass('menu-top-active');</script>
        <script type="text/javascript" src="<?php echo Router::base(); ?>/assets/select2/dist/js/select2.js"></script>
        <script>$("#slide_nova").select2();</script>
    </body>
</html>      