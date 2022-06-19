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
        <link href="<?php echo Router::base(); ?>/assets/dropzone/dist/dropzone.css" rel="stylesheet"/>  
        <link href="<?php echo Router::base(); ?>/assets/css/style.css" rel="stylesheet" />
        <link href="<?php echo Router::base(); ?>/assets/lightbox2/src/css/lightbox.css" rel="stylesheet" />
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php require_once 'View/adm/common/menu.php'; ?>
        <?php require_once 'View/adm/common/menu.php'; ?>
        <div class="container-fluid back ">
            <div class="container text-center">
                <h4 class="page-head-line titulo">Fotos Automóveis</h4>
            </div>
        </div>
        <!-- CONTEUDO AQUI -->
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <p class="text-right">
                        <a href="<?php echo Router::base(); ?>/auto/editar/<?php echo $dados['auto']->auto_id; ?>/"
                           class="btn btn-primary btn-lg" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i> Editar Auto
                        </a>
                    </p>
                    <form  action="<?php echo Router::base(); ?>/auto/foto_incluir/<?php echo $dados['auto']->auto_id; ?>/" 
                           class="dropzone" id="formFoto" enctype="multipart/form-data" > 
                        <div  class= "fallback" > 
                            <input  name="foto_url"  id="foto_url" type= "file"  multiple/>
                        </div> 
                    </form>
                    <div class="row">                            
                        <p>&nbsp;</p>
                        <?php if (isset($dados['foto'][0])) : ?>
                            <?php foreach ($dados['foto'] as $f) : ?>
                                <?php if ($f->foto_url != "") : ?>
                                    <div class="col-md-2" id="div-foto-<?php echo $f->foto_id; ?>">
                                        <a href="<?php echo Router::base(); ?>/midias/fotos/<?php echo $f->foto_url; ?>" data-lightbox= "roadtrip">
                                            <img class="img-thumbnail img-responsive" style="min-height: 155px"
                                                 src="<?php echo Router::base(); ?>/midias/fotos/<?php echo $f->foto_url; ?>" /> 
                                        </a>
                                        <br/>
                                        <button  class="btn btn-danger btn-xs btn-block btn-remover-uma-foto"
                                                 title="remover foto" 
                                                 data-foto="<?php echo $f->foto_id; ?>" 
                                                 data-url="<?php echo $f->foto_url; ?>" 
                                                 data-auto="<?php echo $f->foto_auto; ?>" 
                                                 data-toggle="tooltip"><i class="fa fa-trash"></i> 
                                        </button>
                                    </div>    
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <?php require_once 'View/adm/common/rodape.php'; ?>
        <script src = "<?php echo Router::base(); ?>/assets/dropzone/dist/dropzone.js"></script>
        <script src = "<?php echo Router::base(); ?>/assets/lightbox2/src/js/lightbox.js"></script>
        <script>
            Dropzone.options.formFoto = false;
            Dropzone.options.formFoto = {
                init: function () {
                    this.on("addedfile", function (file) {
                        //lert("Added file.");
                    });
                },
                complete: function (a) {
                    //console.log(a.xhr.response)
                    //window.location.reload();
                }
            };
            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
                $('.btn-remover-uma-foto').on('click', function () {
                    var foto_id = $(this).data('foto');
                    var foto_url = $(this).data('foto-url');
                    var foto_auto = $(this).data('foto-auto');
                    var url = '<?php echo Router::base(); ?>/auto/remover_uma_foto/' + foto_id + '/' + foto_url + '/' + foto_auto + '/';
                    $.post(url, {}, function (data) {
                        $('#div-foto-' + foto_id).fadeOut();
                    });
                });
            });
            lightbox.option({
                'resizeDuration': 200,
                'wrapAround': true
            });
        </script>
    </body>
</html>    