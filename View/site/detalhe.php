<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $dados['agencia'][0]->agencia_nome; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="<?php echo Router::base(); ?>/View/site/css/bootstrap.css"/>			
        <link rel="stylesheet" href="<?php echo Router::base(); ?>/View/site/css/fontello.css" />
        <!--SEO-->
        <meta name="application-name" content="<?php echo $dados['agencia'][0]->agencia_nome; ?>" />        
        <meta name="description" content="<?php echo $dados['auto']->auto_seo_desc; ?>" />
        <meta name="keywords" content="<?php echo $dados['auto']->auto_seo_keys; ?>" />
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
                            <li><a href="<?php echo Router::base(); ?>/sobre/">Sobre Nós</a></li>
                            <li><a href="<?php echo Router::base(); ?>/contato/">Contato</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
            <?php require_once 'View/site/slide_topo.php' ?>
        </header>
        <section id="car">
            <div class="container">	
                <article>
                    <?php echo status::msg(); ?>
                    <div class="row pagetitle">
                        <div class="col-xs-12">
                            <h2><?php echo $dados['auto']->marca_nome; ?> - <?php echo $dados['auto']->modelo_nome; ?> - <?php echo $dados['auto']->versao_nome; ?> - <?php echo $dados['auto']->auto_ano; ?></h2>
                        </div>
                    </div>	
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="nav nav-tabs" id="tab-car">
                                <li><a href="#images">Fotos</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane  active" id="images">
                                    <div id="carousel-car" class="carousel slide" data-ride="carousel">
                                        <a class="carousel-control" href="#carousel-car" data-slide="prev">
                                            <i class="icon-left-open"></i>
                                        </a>
                                        <a class="carousel-control next" href="#carousel-car" data-slide="next">
                                            <i class="icon-right-open"></i>
                                        </a>
                                            <?php
                                            $k = 0;
                                            $x = 0;
                                            $y = 0;
                                            ?>
                                            <?php if (isset($dados['foto'][0])) : ?>
                                                <ol class="carousel-indicators">
                                                <?php foreach ($dados['foto'] as $f) : ?>                                                
                                                    <?php if ($x == 0): ?>
                                                        <li data-target="#carousel-car" data-slide-to="<?=$x?>" class="active"></li>
                                                        <?php else: ?>
                                                        <li data-target="#carousel-car" data-slide-to="<?=$x?>"></li>
                                                        <?php endif; ?>
                                                        <?php $x++; ?>
                                                    <?php endforeach; ?>
                                                </ol>
                                            <?php
                                            $k = 0;
                                            $x = 0;
                                            $y = 0;
                                            ?>
                                            <div class="carousel-inner" role="listbox">
                                                <?php foreach ($dados['foto'] as $f) : ?>                                                
                                                    <?php if ($x++ == 0): ?>
                                                        <div class="item <?php if ($k++ == 0): ?>active<?php endif; ?>">
                                                        <?php endif; ?>
                                                        <a class="fancybox" data-rel="gallery1" href="<?php echo Router::base(); ?>/midias/fotos/<?php echo $f->foto_url; ?>" title="<?php echo $dados['auto']->modelo_nome; ?> - <?php echo $dados['auto']->versao_nome; ?> - <?php echo $dados['auto']->auto_ano; ?>">
                                                            <?php if ($f->foto_url != ""): ?>
                                                                <img src="<?php echo Router::base(); ?>/midias/thumb.php?zc=1&w=560&h=450&src=fotos/<?php echo $f->foto_url; ?>" alt="">
                                                            <?php else : ?>
                                                                <img src="<?php echo Router::base(); ?>/midias/thumb.php?zc=1&w=560&h=450&src=fotos/sem.png"  alt="sem foto" class="img-responsive"/>
                                                            <?php endif; ?>
                                                        </a>
                                                        <?php if ($x == 1 || $x < 1 && $y == count($dados['auto']) - 1): ?>
                                                            <?php $x = 0; ?>
                                                        <?php endif; ?>
                                                        <?php $y++; ?>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php if ($dados['auto']->auto_preco != "") : ?>
                                <br>
                                <div class="tags price"><span></span> R$<?php echo Util::money($dados['auto']->auto_preco); ?></div>
                            <?php endif; ?>
                            <div class="row">
                                <h3>Contatar o vendedor agente</h3>
                            </div>
                            <div class="row">
                                <form role="form" class="formcontact" method="post" enctype="multipart/form-data" action="<?php echo Router::base(); ?>/detalhe/enviar/" >
                                    <div class="form-group">
                                        <label for="nome">Nome completo:</label>
                                        <input type="text" name="nome" id="nome" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" id="email" class="form-control"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tel">Telefone:</label>
                                        <input type="tel" name="tel" id="tel"  class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="mensagem">Mensagem:</label>
                                        <textarea name="mensagem" id="mensagem" class="form-control" rows="4"  required></textarea>
                                    </div>
                                    <input type="hidden" name="auto_url" value="<?php echo Router::base(); ?>/detalhe/<?php echo Util::slug($dados['auto']->marca_nome); ?>/<?php echo Util::slug($dados['auto']->modelo_nome); ?>/ano-<?php echo Util::slug($dados['auto']->auto_ano); ?>/<?php echo Util::slug($dados['auto']->auto_id); ?>" />
                                    <input type="hidden" name="modelo" value="<?php echo Util::slug($dados['auto']->modelo_nome); ?> - ID: <?php echo Util::slug($dados['auto']->auto_id); ?>" />
                                    <div class="text-center">
                                        <button type="submit" class="btn">Enviar mensagem</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row extrainfo">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs alt" id="tab-car2">
                                <li class="active"><a href="#features">Configurações</a></li>
                            </ul>
                            <div class="tab-content alt">
                                <div class="tab-pane active" id="features">
                                    <div class="row">
                                        <?php if ($dados['auto']->auto_opc != "") : ?>
                                            <?php $opc_ids = explode("|", $dados['auto']->auto_opc); ?>
                                            <?php if (isset($dados['opc']) && !empty($dados['opc'])): ?>
                                                <?php foreach ($dados['opc'] as $g): ?>
                                                    <div class="col-md-3">
                                                        <h4><?php echo $g['grupo']; ?></h4>
                                                        <div class="list-group">
                                                            <?php foreach ($g['item'] as $item): ?>
                                                                <?php if (is_array($opc_ids)): ?>
                                                                    <?php if (in_array($item->opcional_id, $opc_ids)): ?>
                                                                        <span class="list-group-item"><i class="icon-right-open"></i><?php echo $item->opcional_nome; ?></span>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php if ($dados['auto']->auto_obs != "") : ?>
                                                <h3>Descrição Geral</h3>
                                                <p><?php echo $dados['auto']->auto_obs; ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>
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
                            Você está aqui: <a href="<?php echo Router::base(); ?>/">Detalhe - <?php echo $dados['auto']->modelo_nome; ?></a>
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
                                <h2><i>SOBRE NÓS</i></h2>
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
