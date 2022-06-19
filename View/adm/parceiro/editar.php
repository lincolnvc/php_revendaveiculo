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
                <h4 class="page-head-line titulo">Editar Parceiro</h4> 
            </div>
        </div>
        <div class="content-wrapper">
            <div class="container">
                <form method="post" enctype="multipart/form-data" action="<?php echo Router::base(); ?>/parceiro/atualizar/">
                    <input type="hidden" name="slide_id" id="slide_id" value="<?php echo $dados['slide']->slide_id; ?>"/>
                    <div class="row">
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="slide_nome">Título</label>
                            <input type="text" name="slide_nome"  placeholder="Informe o nome do parceiro" required class="form-control altura" 
                                   value="<?php echo $dados['slide']->slide_nome; ?>"/>
                        </div>              
                        <div class="form-group col-md-4 col-xs-12">
                            <label for="slide_link">Link</label>
                            <input type="text" name="slide_link" placeholder="http://www.nomedosite.com.br"  class="form-control altura" 
                                   value="<?php echo $dados['slide']->slide_link; ?>"/>
                        </div>
                        <div class="form-group col-md-2 col-xs-12">
                            <label for="slide_nova">Nova Página</label>
                            <select name="slide_nova" id="slide_nova" class="form-control" required>
                                <option value="">Selecionar destaque...</option>
                                <option value="1">SIM</option>
                                <option value="0" selected>NÃO</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">   
                            <div class="col-md-10">   
                                <span class="btn btn-black btn-file col-xs-12 col-md-4 ">
                                    <i class="fa fa-cloud-upload"></i>  
                                    Selecione uma Foto<input type="file" id="slide_foto" name="slide_foto">
                                </span>
                                &nbsp; &nbsp; &nbsp; 
                                <span class="text-muted" style="line-height: 50px">Dimensões:  300 Largura x 300 Altura (pixels)</span>
                            </div>
                            <div class="col-md-2">                            
                                <?php if ($dados['slide']->slide_foto != ""): ?>
                                    <p class="text-right">
                                        <img class="img-thumbnail" style="height:80px; "
                                             src="<?php echo Router::base(); ?>/midias/thumb.php?w=120&src=parceiro/<?php echo $dados['slide']->slide_foto; ?>" />
                                    </p>    
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12col-xs-12">
                        <div class="hidden-xs text-right ">
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
        <script>$("#menu-parceiro").addClass('menu-top-active');</script>
        <script type="text/javascript" src="<?php echo Router::base(); ?>/assets/select2/dist/js/select2.js"></script>
        <script>$("#slide_nova").select2();</script>
        <script type="text/javascript">
            $(function () {
                $("#slide_nova").val('<?php echo $dados['slide']->slide_nova ?>');
            });
            $("#slide_nova").select2('val', '<?php echo $dados['slide']->slide_nova ?>');
        </script>
    </body>
</html>      