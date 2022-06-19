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
        <link href="<?= Router::base(); ?>/assets/css/font-awesome.css" rel="stylesheet" /> 
        <link href="<?= Router::base(); ?>/assets/css/style.css" rel="stylesheet" />
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php require_once 'View/adm/common/menu.php'; ?>
        <div class="container-fluid back">
            <div class="container text-center">
                <h4 class="page-head-line titulo">Grupos</h4>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <ol class="breadcrumb">
                            <li>Cadastros</li>
                            <li class="active">Grupos de Opcionais</li>
                        </ol>     
                    </div>
                    <div class="col-md-4">
                        <p class="text-right">
                            <a href="<?php echo Router::base(); ?>/grupo/novo/" class="btn btn-primary"> 
                                <i class="fa fa-plus-circle"></i>
                                Cadastrar Novo
                            </a>
                        </p>
                    </div>
                </div>
                <?php echo status::msg(); ?>
                <?php if (isset($dados['grupo'][0])) : ?>
                    <table class="table table-striped table-bordered" id="tb1">
                        <tr>
                            <th class="text-uppercase">Nome</th>
                            <th class="text-center" width="150"><i class="fa fa-cog"></i></th>
                        </tr>
                        <?php foreach ($dados['grupo'] as $obj): ?>
                            <tr>
                                <td class="text-uppercase"> <?php echo $obj->grupo_nome; ?></td>
                                <td  class="text-center"> 
                                    <a href="<?php echo Router::base(); ?>/opcional/grupo/<?php echo $obj->grupo_id; ?>/"
                                       class="btn btn-info btn-sm" data-toggle="tooltip" title="Itens do grupo"><i class="fa fa-tag"></i>
                                    </a>
                                    <a href="<?php echo Router::base(); ?>/grupo/editar/<?php echo $obj->grupo_id; ?>/"
                                       class="btn btn-primary btn-sm" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i>
                                    </a>
                                    <button data-link="<?php echo Router::base(); ?>/grupo/remover/<?php echo $obj->grupo_id; ?>/"
                                            class="btn btn-danger btn-sm btn-remover-grupo" data-toggle="tooltip" title="Remover"><i class="fa fa-trash"></i> 
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else : ?>
                    <p class="well well-sm"> Nenhum registro encontrado!</p>
                <?php endif; ?>
                <div id="pageNav" class="text-center"></div>
            </div>
        </div>
        <div class="modal fade" id="modal-remove-grupo">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Remover Grupo</h4>
                    </div>
                    <div class="modal-body">
                        <p>Você está prestes à remover um grupo e todos os opcionais relacionados à ele!</p>
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
        
        <?php if (count($dados['grupo']) >= 15): ?>     
            var pager = new Pager('tb1', 15);
            pager.init();
            pager.showPageNav('pager', 'pageNav');
            pager.showPage(1);
        <?php endif; ?>

            $(function () {
                $("#menu-grupo").addClass('menu-top-active');
                $('[nasc-toggle="tooltip"]').tooltip();
            });
            
            setTimeout(function () {
                $('.msg-status').slideUp();
            }, 2500);
            
            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
                $('.btn-remover-grupo').on('click', function () {
                    
                    $('#modal-remove-grupo').modal('show');
                    var link = $(this).data('link');
                    $('#link-remover').attr('href', link);
                });
            });
            
        </script>
    </body>
</html>