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
                <h5 class="page-head-line titulo">Configuração do E-mail</h5> 
            </div>
        </div>
        <div class="content-wrapper">
            <div class="container">
                <?php echo status::msg(); ?>
                <form method="post" enctype="multipart/form-data" action="<?php echo Router::base(); ?>/smtp/atualizar/">
                    <input type="hidden" name="smtp_id" id="smtp_id" value="<?php echo $dados['smtp'][0]->smtp_id; ?>"/>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="smtp_host">Host</label>
                            <input type="text" name="smtp_host" id="smtp_host" placeholder="Informe o host" class="form-control altura" 
                                   value="<?php echo $dados['smtp'][0]->smtp_host; ?>" required/>
                        </div>             
                        <div class="form-group col-md-4">
                            <label for="smtp_email">E-mail</label>
                            <input type="email" name="smtp_email" id="smtp_email" placeholder="Informe o e-mail" class="form-control altura" 
                                   value="<?php echo $dados['smtp'][0]->smtp_email; ?>" required/>
                        </div>             
                        <div class="form-group col-md-4">
                            <label for="smtp_senha">Senha</label>
                            <input type="password" name="smtp_senha" id="smtp_senha" placeholder="Informe a senha" class="form-control altura" />
                        </div>             
                        <div class="form-group col-md-4">
                            <label for="smtp_nome">Nome</label>
                            <input type="text" name="smtp_nome" id="smtp_nome" placeholder="Informe o nome" class="form-control altura" 
                                   value="<?php echo $dados['smtp'][0]->smtp_nome; ?>" required/>
                        </div>             
                        <div class="form-group col-md-4">
                            <label for="smtp_bcc">Com cópia</label>
                            <input type="text" name="smtp_bcc" id="smtp_bcc" placeholder="Com cópia para" class="form-control altura" 
                                   value="<?php echo $dados['smtp'][0]->smtp_bcc; ?>" required/>
                        </div>                         
                        <div class="form-group col-md-3">
                            <label for="smtp_assunto">Assunto</label>
                            <input type="text" name="smtp_assunto" id="smtp_assunto" placeholder="Assunto" class="form-control altura" 
                                   value="<?php echo $dados['smtp'][0]->smtp_assunto; ?>" required/>
                        </div>                         
                        <div class="form-group col-md-1">
                            <label for="smtp_porta">Porta</label>
                            <input type="text" name="smtp_porta" id="smtp_porta" placeholder="Informe a porta" class="form-control altura" 
                                   value="<?php echo $dados['smtp'][0]->smtp_porta; ?>" required />
                        </div>                         
                    </div><br/><br/>
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
            </div>  
        </form>  
    </div>  
    <?php require_once 'View/adm/common/rodape.php'; ?>
    <script>$("#menu-smtp").addClass('menu-top-active');</script>
    <script type="text/javascript">
        setTimeout(function () {
            $('.msg-status').slideUp();
        }, 2500);
    </script> 
</body>
</html>      