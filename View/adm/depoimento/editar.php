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
        <link rel="stylesheet" href="<?= Router::base(); ?>/assets/summernote/summernote.css">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php require_once 'View/adm/common/menu.php'; ?>
        <div class="container-fluid back">
            <div class="container text-center">
                <h4 class="page-head-line titulo">Editar Depoimento</h4> 
            </div>
        </div>
        <div class="content-wrapper">
            <div class="container">
                <form method="post" enctype="multipart/form-data" action="<?php echo Router::base(); ?>/depoimento/atualizar/">
                    <input type="hidden" name="depoimento_id" id="depoimento_id" value="<?php echo $dados['depoimento']->depoimento_id; ?>"/>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="depoimento_nome">Nome</label>
                            <input type="text" name="depoimento_nome"  placeholder="Informe o titulo do depoimento" required  class="form-control altura" 
                                   value="<?php echo $dados['depoimento']->depoimento_nome; ?>"/>
                        </div>             
                    </div><br/><br/>  
                    <div class="form-group row">   
                        <div class="col-md-10">   
                            <span class="btn btn-black btn-file col-xs-12 col-md-4 ">
                                <i class="fa fa-cloud-upload"></i>  
                                Selecione um Foto<input type="file" id="depoimento_foto" name="depoimento_foto" >
                            </span>
                            &nbsp; &nbsp; &nbsp; 
                            <span class="text-muted" style="line-height: 50px">Dimensões:  60 Largura x 60 Altura (pixels)</span>
                        </div>
                        <div class="col-md-2">                            
                            <?php if ($dados['depoimento']->depoimento_foto != ""): ?>
                                <p class="text-right">
                                    <img class="img-thumbnail" style="height:80px; "
                                         src="<?php echo Router::base(); ?>/midias/depoimento/<?php echo $dados['depoimento']->depoimento_foto; ?>" />
                                </p>    
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="depoimento_desc">Depoimento</label>
                        <textarea name="depoimento_desc" id="depoimento_desc"><?php echo $dados['depoimento']->depoimento_desc; ?></textarea>
                    </div>
                    <div class="row">    
                        <div class="text-right col-xs-12">
                            <div class="hidden-xs">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i> Atualizar Dados</button>
                            </div>
                            <div class="visible-xs">
                                <br />
                                <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-refresh"></i> Atualizar Dados</button>
                                <br /><br />
                            </div>
                        </div>
                    </div>
                </form>  
            </div>  
        </div>  
        <?php require_once 'View/adm/common/rodape.php'; ?>
        <script type="text/javascript" src="<?= Router::base(); ?>/assets/summernote/summernote.js"></script>
        <script>$("#menu-depoimento").addClass('menu-top-active');</script>
        <script type="text/javascript">
            $(function () {
                $('#depoimento_desc').summernote({
                    height: 200
                });
            });
        </script> 
    </body>
</html>      