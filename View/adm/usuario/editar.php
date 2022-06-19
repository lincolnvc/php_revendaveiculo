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
                <h4 class="page-head-line titulo">Editar Usuário</h4> 
            </div>
        </div>
        <div class="content-wrapper">
            <div class="container">
                <form method="post" action="<?php echo Router::base(); ?>/usuario/atualizar/">
                    <input type="hidden" name="usuario_id" value="<?php echo $dados->usuario_id; ?>"/>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="form-group col-md-6">
                            <hr/>
                            <label for="usuario_login"><i class="fa fa-user"></i> Login</label>
                            <input type="text" name="usuario_login" placeholder="Informe login do usuário" class="form-control"
                                   value="<?php echo $dados->usuario_login; ?>"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="form-group col-md-6">
                            <label for="usuario_senha"><i class="fa fa-unlock-alt"></i> Senha</label>
                            <input type="password" name="usuario_senha" placeholder="Informe senha do usuário" class="form-control" required/>
                            <hr/>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="text-center col-xs-12">
                            <div class="hidden-xs text-center">
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
        <script>$("#menu-usuario").addClass('menu-top-active');</script> 
    </body>
</html>      






