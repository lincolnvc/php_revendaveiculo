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
                <h4 class="page-head-line titulo">Depoimentos</h4>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="container text-center">
                <p class="text-right">
                    <a href="<?php echo Router::base(); ?>/depoimento/novo/" class="btn btn-primary"> 
                        <i class="fa fa-plus-circle"></i> 
                        Cadastrar Novo 
                    </a>
                </p>
                <?php echo status::msg(); ?>
                <?php if (isset($dados['depoimento'][0])) : ?> 
                    <table class="table table-striped table-bordered" id="tb1">
                        <tr>
                            <th width="80">Foto</th>
                            <th class="hidden-xs">Nome</th>
                            <th class="text-center" width="110"><i class="fa fa-cog"</th>
                        </tr>
                        <?php foreach ($dados['depoimento'] as $obj): ?>
                            <tr>
                                <td class="text-center"><img src="<?php echo Router::base(); ?>/midias/thumb.php?zzc=1&h=60&w=60&src=depoimento/<?php echo $obj->depoimento_foto; ?>" class="img-responsive"/> </td>
                                <td style="line-height: 60px" class="text-left hidden-xs"><?php echo $obj->depoimento_nome; ?></td>
                                <td class="text-center" style="line-height: 60px"> 
                                    <a href="<?php echo Router::base(); ?>/depoimento/editar/<?php echo $obj->depoimento_id; ?>/"
                                       class="btn btn-primary btn-sm" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i>
                                    </a>
                                    <button data-link="<?php echo Router::base(); ?>/depoimento/remover/<?php echo $obj->depoimento_id; ?>/"
                                            class="btn btn-danger btn-sm btn-remover-depoimento" data-toggle="tooltip" title="Remover"><i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else : ?>
                    <p class="well well-sm"> Nenhum registro encontrado!</p>
                <?php endif; ?>
                <div id="pageNav" class="text-center" ></div>
            </div>
        </div>
        <div class="modal fade" id="modal-remove-depoimento">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Remover Depoimento</h4>
                    </div>
                    <div class="modal-body">
                        <p>Você está prestes à remover um depoimento!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="boo" data-bla="1">Cancelar</button>
                        <a href="#" class="btn btn-danger" id="link-remover">Remover</a>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <?php require_once 'View/adm/common/rodape.php'; ?>
        <script type="text/javascript" src="<?php echo Router::base(); ?>/assets/paginacao/paging.js"></script>
        <script type="text/javascript">
            <?php if (count($dados['depoimento']) >= 15) : ?>
                var pager = new Pager('tb1', 15);
                pager.init();
                pager.showPageNav('pager', 'pageNav');
                pager.showPage(1);
            <?php endif; ?>
            $(function () {
                $("#menu-depoimento").addClass('menu-top-active');
                $('[nasc-toggle="tooltip"]').tooltip();
            });
            setTimeout(function () {
                $('.msg-status').slideUp();
            }, 2500);
            $(function () {
                $('[data-toggle="tooltip"]').tooltip();

                $('.btn-remover-depoimento').on('click', function () {
                    $('#modal-remove-depoimento').modal('show');
                    var link = $(this).data('link');
                    $('#link-remover').attr('href', link);
                });
            });
        </script>
    </body>
</html>