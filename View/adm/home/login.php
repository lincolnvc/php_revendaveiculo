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
        <link href="<?php echo Router::base(); ?>/assets/css/bootstrap.css" rel="stylesheet" />
        <link href="<?php echo Router::base(); ?>/assets/css/font-awesome.css" rel="stylesheet" /> 
        <link href="<?php echo Router::base(); ?>/assets/css/style.css" rel="stylesheet" />
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php require_once 'View/adm/common/topo.php'; ?>
        <div class="content-wrapper">
            <div class="container">
                <?php echo status::msg(); ?>
                <form  action="<?php echo Router::base(); ?>/login/entrar/" method="post">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <hr />
                                <div class="col-md-1 btn btn-default hidden-xs">
                                    <i class="fa fa-user-secret fa-2x"></i>
                                </div>
                                <div class=" btn-default visible-xs text-center">
                                    <i class="fa fa-user-secret fa-2x"></i>
                                </div>
                                <div class="col-md-11">
                                    <input type="text" class="form-control input-lg" placeholder="Informe seu login" autocomplete="off" name="usuario_login" autofocus="usuario_login"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">

                                <div class="col-md-1 btn btn-default hidden-xs">
                                    <i class="fa fa-unlock-alt fa-2x"></i>
                                </div>
                                <div class=" btn-default text-center visible-xs">
                                    <i class="fa fa-unlock-alt fa-2x"></i>
                                </div>
                                <div class="col-md-11">
                                    <input type="password" class="form-control input-lg" placeholder="Informe sua senha" autocomplete="off" name="usuario_senha"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-11">
                                    <button type="submit" class="btn btn-block btn-primary" ><i class="fa fa-key"></i> Entrar</button>
                                </div>
                            </div>
                        </div>
                        <br/><br/>
                        <hr />
                    </div>
                </form>
            </div>
        </div>
        <script>
            $(function () {
                $('#btn-repass').live('click', function (e) {
                    e.preventDefault();
                    $('#form-login').hide();
                    $('#form-login-repass').show();
                    $('#notice').html('Recuperação de senha do Painel Administrativo');
                })
                $('#btn-cancel').live('click', function (e) {
                    e.preventDefault();
                    window.location = '[baseUri]/admin/';
                })
            })
            setTimeout(function () {
                $('.msg-status').slideUp()
            }, 2500);
            [message_login]
        </script>
    </body>
</html>