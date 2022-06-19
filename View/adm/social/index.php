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
                <h4 class="page-head-line titulo">Redes Sociais</h4> 
            </div>
        </div>
        <div class="content-wrapper">
            <div class="container">
                <?php echo status::msg(); ?>
                <form method="post" enctype="multipart/form-data" action="<?php echo Router::base(); ?>/social/atualizar/">
                    <input type="hidden" name="social_id" id="social_id" value="<?php echo $dados['social']->social_id ?>"/>
                    <div class="form-group">
                        <label for="social_facebook"><i class="fa fa-facebook-official"></i> Facebook</label>
                        <input type="text" name="social_facebook" id="social_facebook" placeholder="Endereço do Facebook" class="form-control" 
                               value="<?php echo $dados['social']->social_facebook; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="social_twitter"><i class="fa fa-twitter-square"></i> Twitter</label>
                        <input type="text" name="social_twitter" id="social_twitter" placeholder="Endereço do Twitter" class="form-control" 
                               value="<?php echo $dados['social']->social_twitter; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="social_linkedin"><i class="fa fa-linkedin-square"></i> Linkedim</label>
                        <input type="text" name="social_linkedin" id="social_linkedin" placeholder="Endereço do Linkedin" class="form-control" 
                               value="<?php echo $dados['social']->social_linkedin; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="social_pinterest"><i class="fa fa-pinterest-square"></i> Pinterest</label>
                        <input type="text" name="social_pinterest" id="social_pinterest" placeholder="Endereço do Pinterest" class="form-control" 
                               value="<?php echo $dados['social']->social_pinterest; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="social_google"><i class="fa fa-google-plus-square"></i> Google+</label>
                        <input type="text" name="social_google" id="social_google" placeholder="Endereço do Google" class="form-control" 
                               value="<?php echo $dados['social']->social_google; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="social_instagram"><i class="fa fa-instagram"></i> Instagram</label>
                        <input type="text" name="social_instagram" id="social_instagram" placeholder="Endereço do Instagram" class="form-control" 
                               value="<?php echo $dados['social']->social_instagram; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="social_vimeo"><i class="fa fa-vimeo-square"></i> Vimeo</label>
                        <input type="text" name="social_vimeo" id="social_vimeo" placeholder="Endereço do Vimeo" class="form-control" 
                               value="<?php echo $dados['social']->social_vimeo; ?>"/>
                    </div>
                    <br />
                    <div class="row">    
                        <div class="col-md-12 col-xs-12 text-right">
                            <div class="hidden-xs">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i> Atualizar Dados</button>
                            </div>
                            <div class="visible-xs">
                                <br>
                                <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-refresh"></i> Atualizar Dados</button>
                            </div>
                        </div>
                    </div>
                </form>  
            </div>  
        </div>  
        <?php require_once 'View/adm/common/rodape.php'; ?>
        <script>$("#menu-social").addClass('menu-top-active');</script>
        <script type="text/javascript">
            setTimeout(function () {
                $('.msg-status').slideUp();
            }, 2500);
        </script>
    </body>
</html>      