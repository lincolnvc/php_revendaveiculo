<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $dados['agencia'][0]->agencia_nome; ?></title>
        <meta name="application-name" content="<?php echo $dados['agencia'][0]->agencia_nome; ?>" />        
        <meta name="description" content="<?php echo $dados['agencia'][0]->agencia_seo_desc; ?>" />
        <meta name="keywords" content="<?php echo $dados['agencia'][0]->agencia_seo_keys; ?>" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="<?php echo Router::base(); ?>/View/site/css/bootstrap.css"/>			
        <link rel="stylesheet" href="<?php echo Router::base(); ?>/View/site/css/fontello.css" >
        <!--[if IE 7]>
        <link rel="stylesheet" href="css/fontello-ie7.css" ><![endif]-->
        <link rel="stylesheet" href="<?php echo Router::base(); ?>/View/site/css/styles.css" />
        <link rel="stylesheet" href="<?php echo Router::base(); ?>/View/site/css/media-queries.css" />
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>        
        <![endif]-->
        <!-- Media queries -->
        <!--[if lt IE 9]>
                <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
    </head>
    <body>
        <header>
            <?php require_once 'View/site/social_topo.php' ?>
            <nav class="navbar" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo Router::base(); ?>/">
                            <img src="<?php echo Router::base(); ?>/midias/agencia/<?php echo $dados['agencia'][0]->agencia_foto; ?>" alt="Logo" class="img-responsive"/>
                        </a>
                    </div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo Router::base(); ?>/">Home</a></li>
                            <li><a href="<?php echo Router::base(); ?>/sobre/">Sobre N??s</a></li>
                            <li><a href="<?php echo Router::base(); ?>/contato/">Contato</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
            <?php require_once 'View/site/slide_topo.php' ?>
        </header>
        <!-- More Services -->
        <div class="devinfo row">
            <div class="container">
                <?php if (isset($dados['servico'][0])): ?>
                    <div class="row pagetitle">
                        <div class="col-xs-12">
                            <h2><?php echo $dados['srv']->servico_nome; ?></h2>
                            <hr />
                        </div>
                    </div><br />
                    <div class="row itemde">
                        <div class="col-md-2 team"></div>
                        <div class="col-md-10 team">
                            <p><?php echo $dados['srv']->servico_desc; ?></p>
                        </div>
                    </div>
                <?php else : ?>
                    <p class="alert alert-info"> Nenhum registro encontrado!</p>
                <?php endif; ?>
            </div>	
        </div>
        <footer>
            <div class="topfoot">
                <div class="container">
                    <?php
                    $k = 0;
                    $x = 0;
                    $y = 0;
                    ?>
                    <?php if (isset($dados['parceiro'][0])) : ?>
                        <div id="logos" class="carousel slide">
                            <a class="carousel-control" href="#logos" data-slide="prev">
                                <i class="icon-left-open"></i>
                            </a>
                            <a class="carousel-control control-right" href="#logos" data-slide="next">
                                <i class="icon-right-open"></i>
                            </a>
                            <div class="carousel-inner">
                                <?php foreach ($dados['parceiro'] as $p) : ?>
                                    <?php if ($x++ == 0): ?>
                                        <div class="item <?php if ($k++ == 0): ?>active<?php endif; ?>">
                                        <?php endif; ?>

                                        <div>
                                            <a href="<?php echo $p->slide_link; ?>" target="_blank">
                                                <img src="<?php echo Router::base(); ?>/midias/thumb.php?zc=2&w=140&h=100&src=parceiro/<?php echo $p->slide_foto; ?>" alt="logo parceiro" class="img-responsive">
                                            </a>
                                        </div>
                                        <?php if ($x == 6 || $x < 6 && $y == count($dados['parceiro']) - 1): ?>
                                        </div> <!-- fim item <?php echo $x; ?> -->
                                        <?php $x = 0; ?>
                                    <?php endif; ?>
                                    <?php $y++; ?>
                                <?php endforeach; ?>
                            </div><!-- fim car <?php echo "$x - y $y"; ?> -->
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="middlefoot">
                <div class="container">
                    <div class="row bread-top">
                        <div class="col-xs-6 breadcrumbs">
                            Voc?? est?? aqui: <a href="<?php echo Router::base(); ?>/servico/">Servi??o - <?php echo $dados['servico'][0]->servico_nome; ?></a>
                        </div>
                        <div class="col-xs-6 go-top">
                            <a href="#" id="go-top">Ir para o topo <i class="icon-up-open"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-5 about">
                            <a href="<?php echo Router::Base(); ?>/contato/">
                                <h2>CONTATO</h2>
                            </a>
                            <p>
                                <?php if ($dados['agencia'][0]->agencia_tel != ""): ?>
                                    <?php echo $dados['agencia'][0]->agencia_tel; ?><br />
                                <?php endif; ?>
                                <?php if ($dados['agencia'][0]->agencia_tel2 != ""): ?>
                                    <?php echo $dados['agencia'][0]->agencia_tel2; ?><br />
                                <?php endif; ?>
                                <?php if ($dados['agencia'][0]->agencia_tel3 != ""): ?>
                                    <?php echo $dados['agencia'][0]->agencia_tel3; ?><br />
                                <?php endif; ?>
                            </p>
                            <p>
                                <?php if ($dados['agencia'][0]->agencia_func != ""): ?>
                                    <?php echo $dados['agencia'][0]->agencia_func; ?>
                                <?php endif; ?>
                            </p>
                        </div>
                        <div class="hidden-xs col-sm-2 col-md-2">
                        </div>
                        <div class="col-xs-12 col-sm-5 col-md-5">
                            <a href="<?php echo Router::Base(); ?>/sobre/">
                                <h2><i>SOBRE N??S</i></h2>
                            </a>
                            <p>
                                <?php if ($dados['agencia'][0]->agencia_desc != ""): ?>
                                    <?php echo Util::cut($dados['agencia'][0]->agencia_desc, 200, '...'); ?> <a href="<?php echo Router::Base(); ?>/sobre"><i>saiba mais</i></a>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once 'View/site/social_footer.php'; ?>
        </footer>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write("<script src=\"js/jquery-1.9.1.min.js\"")</script>
        <script src="<?php echo Router::base(); ?>/View/site/js/respond.min.js"></script>
        <script src="<?php echo Router::base(); ?>/View/site/js/bootstrap.min.js" ></script>
        <script src="<?php echo Router::base(); ?>/View/site/js/placeholder.js" ></script>
        <script src="<?php echo Router::base(); ?>/View/site/js/jquery.scrollTo-1.4.3.1-min.js" ></script>
        <script src="//maps.google.com/maps/api/js?sensor=true" ></script>
        <script src="<?php echo Router::base(); ?>/View/site/js/gmaps.js" ></script>
        <script src="<?php echo Router::base(); ?>/View/site/js/fancybox/jquery.fancybox.js"></script>
        <script src="<?php echo Router::base(); ?>/View/site/js/script.js"  ></script>
        <script type="text/javascript">
            setTimeout(function () {
                $('.msg-status').slideUp();
            }, 2500);
        </script>
    </body>
</html>
