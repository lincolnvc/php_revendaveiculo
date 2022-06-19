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
                <h4 class="page-head-line titulo">Agência</h4> 
            </div>
        </div>
        <div class="content-wrapper">
            <div class="container">
                <?php echo status::msg(); ?>
                <form method="post" enctype="multipart/form-data" action="<?php echo Router::base(); ?>/agencia/atualizar/">
                    <input type="hidden" name="agencia_id" id="agencia_id" value="<?php echo $dados['agencia'][0]->agencia_id; ?>"/>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="agencia_nome">Nome da agência</label>
                            <input type="text" name="agencia_nome" id="agencia_nome" placeholder="Informe o nome do agencia" required  class="form-control altura" 
                                   value="<?php echo $dados['agencia'][0]->agencia_nome; ?>"/>
                        </div>             
                        <div class="form-group col-md-3">
                            <label for="agencia_tel">Telefone</label>
                            <input type="text" name="agencia_tel" id="agencia_tel" placeholder="Informe o telefone" required  class="form-control altura" 
                                   value="<?php echo $dados['agencia'][0]->agencia_tel; ?>"/>
                        </div>             
                        <div class="form-group col-md-3">
                            <label for="agencia_tel2">Telefone</label>
                            <input type="text" name="agencia_tel2" id="agencia_tel2" placeholder="Informe o telefone" required  class="form-control altura" 
                                   value="<?php echo $dados['agencia'][0]->agencia_tel2; ?>"/>
                        </div>             
                        <div class="form-group col-md-3">
                            <label for="agencia_tel3">Telefone</label>
                            <input type="text" name="agencia_tel3" id="agencia_tel3" placeholder="Informe o telefone" required  class="form-control altura" 
                                   value="<?php echo $dados['agencia'][0]->agencia_tel3; ?>"/>
                        </div>             
                        <div class="form-group col-md-8">
                            <label for="agencia_end">Endereço completo da agência</label>
                            <input type="text" name="agencia_end" id="agencia_end"  placeholder="Informe o endereço completo" class="form-control altura" 
                                   value="<?php echo $dados['agencia'][0]->agencia_end; ?>"/>
                        </div>                         
                        <div class="form-group col-md-4">
                            <label for="agencia_func">Horário de funcionamento</label>
                            <input type="text" name="agencia_func" id="agencia_func"  placeholder="Informe o horário de funcionamento" class="form-control altura" 
                                   value="<?php echo $dados['agencia'][0]->agencia_func; ?>"/>
                        </div>                         
                    </div><br/><br/>  
                    <div class="form-group row">   
                        <div class="col-md-10">   
                            <span class="btn btn-black btn-file col-xs-12 col-md-4 ">
                                <i class="fa fa-cloud-upload"></i>  
                                Logo do Site<input type="file" id="agencia_foto" name="agencia_foto" >
                            </span>
                            &nbsp; &nbsp; &nbsp; 
                            <span class="text-muted" style="line-height: 50px">Dimensões: 155 Largura x 40 Altura (pixels)</span>
                        </div>
                        <div class="col-md-2">                            
                            <?php if ($dados['agencia'][0]->agencia_foto != ""): ?>
                                <p class="text-right">
                                    <img class="img-thumbnail" style="height:80px; "
                                         src="<?php echo Router::base(); ?>/midias/agencia/<?php echo $dados['agencia'][0]->agencia_foto; ?>" />
                                </p>    
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="agencia_titulo" id="agencia_titulo"  placeholder="Título no site" class="form-control" 
                               value="<?php echo $dados['agencia'][0]->agencia_titulo; ?>" required/>                        
                        <textarea name="agencia_desc" id="agencia_desc"><?php echo $dados['agencia'][0]->agencia_desc; ?></textarea>
                    </div>
                    <div class="row">    
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="agencia_seo_desc">Descrição breve (SEO - Opcional)</label>
                            <small class="text-muted pull-right">Meta Description - Até 156 caracteres</small>
                            <input type="text" name="agencia_seo_desc" id="agencia_seo_desc" class="form-control altura" placeholder="Informe uma descrição breve da agência"
                                   value="<?php echo $dados['agencia'][0]->agencia_seo_desc; ?>"/>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="agencia_seo_keys">Palavras-chave (SEO - Opcional)</label>
                            <small class="text-muted pull-right">Meta Keywords - Até 20 palavras</small>
                            <input type="text" name="agencia_seo_keys" id="agencia_seo_keys" class="form-control altura" placeholder="Informe palavras-chave da agência"
                                   value="<?php echo $dados['agencia'][0]->agencia_seo_keys; ?>"/>
                        </div>                        
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
        <script>$("#menu-agencia").addClass('menu-top-active');</script>
        <script type="text/javascript">
            $(function () {
                $('#agencia_desc').summernote({
                    height: 200
                });
            });
            setTimeout(function () {
                $('.msg-status').slideUp();
            }, 2500);
        </script> 
    </body>
</html>      