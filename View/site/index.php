<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $dados['agencia'][0]->agencia_nome; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!--SEO-->
        <meta name="application-name" content="<?php echo $dados['agencia'][0]->agencia_nome; ?>" />        
        <meta name="description" content="<?php echo $dados['agencia'][0]->agencia_seo_desc; ?>" />
        <meta name="keywords" content="<?php echo $dados['agencia'][0]->agencia_seo_keys; ?>" /> 
        <link rel="stylesheet" href="<?php echo Router::base(); ?>/View/site/css/bootstrap.css"/>
        <link rel="stylesheet" href="<?php echo Router::base(); ?>/View/site/plugins/revolution/css/settings.css" />
        <link rel="stylesheet" href="<?php echo Router::base(); ?>/View/site/css/fontello.css" />
        <!--[if IE 7]>
        <link rel="stylesheet" href="<?php echo Router::base(); ?>/View/site/css/fontello-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" href="<?php echo Router::base(); ?>/View/site/css/styles.css" />
        <link rel="stylesheet" href="<?php echo Router::base(); ?>/View/site/css/media-queries.css" />
        <link href="<?php echo Router::base(); ?>/assets/select2/dist/css/select2.css" rel="stylesheet"/>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>        
        <![endif]-->
        <!--[if lt IE 9]>
                <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
        <style>
            .select2-results .select2-disabled,  .select2-results__option[aria-disabled=true] { 
                display: none;
            }
        </style>
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
                            <li class="active"><a href="<?php echo Router::base(); ?>/">Home</a></li>
                            <li><a href="<?php echo Router::base(); ?>/sobre/">Sobre Nós</a></li>
                            <li><a href="<?php echo Router::base(); ?>/contato/">Contato</a></li>                            
                        </ul>
                        <form class="navbar-form navbar-right" name="search" method="POST" action="<?php echo Router::base(); ?>/index/">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="busca" placeholder="Encontre seu carro..." />
                                    <span class="input-group-btn">
                                        <button class="btn" type="button" id="btnSearch" ><i class="icon-search"></i></button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
            <?php require_once 'View/site/slide_topo.php' ?>
            <?php require_once 'View/site/slide.php' ?>
        </header>
        <section id="home">
            <div class="container" style="background: #444;margin-bottom: 25px;padding-bottom: 7px;">
                <form role="form" method="POST" action="<?php echo Router::base(); ?>/index/filtro/">
                    <div class="col-md-9">

                        <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                                <label for="auto_marca">&nbsp;</label>
                                <select name="auto_marca" id="auto_marca" class="form-control" required>
                                    <option value=""> Marca...</option>
                                    <?php foreach ($dados['marca'] as $ma): ?>
                                        <option value="<?php echo $ma->marca_id ?>"> <?php echo $ma->marca_nome ?></option>
                                    <?php endforeach; ?>                           
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                                <label for="auto_modelo">&nbsp;</label>
                                <select name="auto_modelo" id="auto_modelo" class="form-control">
                                    <option value=""> Modelo...</option>
                                    <?php foreach ($dados['modelo'] as $mo): ?>
                                        <option value="<?php echo $mo->modelo_id ?>" data-marca="<?php echo $mo->modelo_marca; ?>" disabled> <?php echo $mo->modelo_nome ?></option>
                                    <?php endforeach; ?>                           
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                                <label for="auto_ano">&nbsp;</label>
                                <select class="form-control" id="auto_ano" name="auto_ano">
                                    <option value="">Ano...</option>
                                    <?php for ($i = date('Y'); $i >= 1980; $i--) : ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                                <label for="auto_preco">&nbsp;</label>
                                <select class="form-control" id="auto_preco" name="auto_preco">
                                    <option value="">Preço...</option>
                                    <option value="1000000">Até 10.000,00</option>
                                    <option value="2000000">Até 20.000,00</option>
                                    <option value="3000000">Até 30.000,00</option>
                                    <option value="5000000">Até 50.000,00</option>
                                    <option value="8000000">Até 80.000,00</option>
                                    <option value="10000000">Até 100.000,00</option>
                                    <option value="15000000">Até 150.000,00</option>
                                    <option value="20000000">Até 200.000,00</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12" style="padding-top:1.4%">
                        <button type="submit" id="submit" class="btn btn-block red">Buscar <i class="icon-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-9 ">
                        <h3>Automóveis em destaque</h3>
                        <div class="grid">
                            <?php if (isset($dados['auto'][0])) : ?>
                                <div class="row">
                                    <?php foreach ($dados['auto'] as $a) : ?>
                                        <?php if ($a->auto_destaque == 1): ?>
                                            <div class="item-grid">
                                                <?php if ($a->auto_oferta == 1): ?>
                                                    <div class="ribbon red"><span>oferta</span></div>
                                                <?php endif; ?>
                                                <a class="more" href="<?php echo Router::base(); ?>/detalhe/<?php echo Util::slug($a->marca_nome); ?>/<?php echo Util::slug($a->modelo_nome); ?>/ano-<?php echo Util::slug($a->auto_ano); ?>/<?php echo $a->auto_id; ?>/"><i class="icon-plus"></i></a>
                                                <?php if ($a->foto_url != ""): ?>
                                                    <img src="<?php echo Router::base(); ?>/midias/thumb.php?zc=1&w=267&h=207&src=fotos/<?php echo $a->foto_url; ?>" alt=""/>
                                                <?php else : ?>
                                                    <td class="text-center"><img src="<?php echo Router::base(); ?>/midias/thumb.php?zc=1&w=267&h=207&src=fotos/sem.png" alt="sem foto" class="img-responsive"/> </td>
                                                <?php endif; ?>
                                                <p><?php echo $a->modelo_nome; ?> <span style="width: 120px">R$ <?php echo Util::money($a->auto_preco); ?></span></p>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <div class="col-md-12 row" >
                                    <?php echo (isset($dados['paginacao'])) ? $dados['paginacao'] : ''; ?>
                                </div>
                            <?php else: ?>
                                <p class="alert alert-warning"><b>Nenhum veículo encontrado!</b></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php require 'View/site/sidebar_popular.php' ?>
                </div>
                <div class="row testimonials">
                    <div class="col-sm-12">
                        <?php if (isset($dados['depoimento'][0])) : ?>
                            <h2>Depoimentos</h2>
                            <div class="col-md-12">
                                <div id="carousel-testimonials" class="carousel slide">
                                    <a class="carousel-control prev" href="#carousel-testimonials" data-slide="prev">
                                        <i class="icon-left-open-mini"></i>
                                    </a>
                                    <a class="carousel-control" href="#carousel-testimonials" data-slide="next">
                                        <i class="icon-right-open-mini"></i>
                                    </a>
                                    <div class="carousel-inner">
                                        <?php
                                        $k = 0;
                                        $x = 0;
                                        $y = 0;
                                        ?>
                                        <?php foreach ($dados['depoimento'] as $dep) : ?>
                                            <?php if ($x++ == 0): ?>
                                                <div class="item <?php if ($k++ == 0): ?>active<?php endif; ?>">
                                                <?php endif; ?>
                                                <div class="testimonials-item">
                                                    <span class="ribbon">&nbsp;</span>
                                                    <div class="img"><img src="<?php echo Router::base(); ?>/midias/thumb.php?zzc=1&h=60&w=60&src=depoimento/<?php echo $dep->depoimento_foto; ?>" class="img-responsive"/> </div>
                                                    <em><?php echo $dep->depoimento_desc; ?></em>
                                                    <strong><?php echo $dep->depoimento_nome; ?></strong>
                                                    <?php if ($x == 2 || $x < 2 && $y == count($dados['depoimento']) - 1): ?>
                                                    </div> 
                                                    <?php $x = 0; ?>
                                                <?php endif; ?>
                                                <?php $y++; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>		
                </div>
                <div class="row services">
                    <div class="col-sm-12 col-md-12">
                        <?php if (isset($dados['servico'][0])) : ?>
                            <h2>Outros Serviços</h2>
                            <div id="carousel-services" class="carousel slide">
                                <!-- Controls -->
                                <a class="carousel-control prev" href="#carousel-services" data-slide="prev">
                                    <i class="icon-left-open-mini"></i>
                                </a>
                                <a class="carousel-control" href="#carousel-services" data-slide="next">
                                    <i class="icon-right-open-mini"></i>
                                </a>
                                <div class="carousel-inner">
                                    <?php
                                    $k = 0;
                                    $x = 0;
                                    $y = 0;
                                    ?>
                                    <?php foreach ($dados['servico'] as $ser) : ?>
                                        <?php if ($x++ == 0): ?>
                                            <div class="item <?php if ($k++ == 0): ?>active<?php endif; ?>">
                                            <?php endif; ?>
                                            <div class="services-item">
                                                <a href="<?php echo Router::base(); ?>/servico/<?php echo Util::slug($ser->servico_nome); ?>/<?php echo $ser->servico_id; ?>/">
                                                    <div class="ico">
                                                        <img src="<?php echo Router::base(); ?>/midias/thumb.php?zzc=3&h=60&w=60&src=servico/<?php echo $ser->servico_foto; ?>" class="img-responsive"/> 
                                                    </div>
                                                </a>
                                                <strong><?php echo $ser->servico_nome; ?></strong>
                                                <?php echo Util::cut($ser->servico_desc, 72, '...'); ?> <a href="<?php echo Router::base(); ?>/servico/<?php echo Util::slug($ser->servico_nome); ?>/<?php echo $ser->servico_id; ?>/"><i>saiba mais</i></a>
                                            </div>
                                            <?php if ($x == 6 || $x < 6 && $y == count($dados['servico']) - 1): ?>
                                            </div>
                                            <?php $x = 0; ?>
                                        <?php endif; ?>
                                        <?php $y++; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <div class="topfoot hide">
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
                            Você está aqui: <a href="<?php echo Router::base(); ?>/">Home</a>
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
            <?php require_once 'View/site/social_footer.php' ?>
        </footer>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write("<script src=\"<?php echo Router::base(); ?>/View/site/js/jquery-1.9.1.min.js\"")</script>
        <script src="<?php echo Router::base(); ?>/View/site/js/respond.min.js"></script>
        <script src="<?php echo Router::base(); ?>/View/site/js/bootstrap.min.js" ></script>
        <!--<script src="<?php echo Router::base(); ?>/View/site/js/retina.js" ></script>-->
        <script src="<?php echo Router::base(); ?>/View/site/js/placeholder.js" ></script>
        <script src="<?php echo Router::base(); ?>/View/site/js/jquery.scrollTo-1.4.3.1-min.js" ></script>
        <script src="<?php echo Router::base(); ?>/View/site/plugins/revolution/js/jquery.themepunch.plugins.min.js"></script>
        <script src="<?php echo Router::base(); ?>/View/site/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="<?php echo Router::base(); ?>/View/site/js/script.js"></script>
        <script type="text/javascript" src="<?php echo Router::base(); ?>/assets/select2/dist/js/select2.js"></script>
        <script>$("#auto_marca").select2();</script>
        <script>$("#auto_versao").select2();</script>
        <script>$('#auto_preco').select2();</script>
        <script type="text/javascript">
            $(function () {
                $("#auto_modelo").select2();
                $("#auto_ano").select2();
                $('#auto_modelo option').each(function () {
                    $(this).hide();
                });
                $('#auto_ano option').each(function () {
                    $(this).hide();
                });
                $('#auto_marca').on('change', function () {
                    var marca_id = $(this).val();
                    $("#auto_modelo").select2('val', '');
                    $("#auto_modelo").select2('destroy');
                    $('#auto_modelo option').each(function () {
                        $(this).removeAttr('disabled');
                    });
                    $('#auto_modelo option').each(function () {
                        if ($(this).data('marca') != marca_id) {
                            $(this).attr('disabled', 'disabled');
                        }
                    });
                    $("#auto_modelo").select2();
                });
            });
        </script>
    </body>
</html>