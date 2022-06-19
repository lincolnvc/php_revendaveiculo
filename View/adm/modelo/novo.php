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
        <link href="<?php echo Router::base(); ?>/assets/select2/dist/css/select2.css" rel="stylesheet"/>
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php require_once 'View/adm/common/menu.php'; ?>
        <div class="container-fluid back">
            <div class="container text-center">
                <h4 class="page-head-line titulo">Novo Modelo</h4> 
            </div>
        </div>
        <div class="content-wrapper">
            <div class="container">
                <form method="post" enctype="multipart/form-data" action="<?php echo Router::base(); ?>/modelo/incluir/">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="modelo_marca">Marca</label>
                            <select name="modelo_marca" id="modelo_marca" class="form-control" required >
                                <option value=""> Selecione uma marca...</option>
                                <?php foreach ($dados['marca'] as $p): ?>
                                    <option value="<?php echo $p->marca_id ?>"> <?php echo $p->marca_nome ?></option>
                                <?php endforeach; ?>                           
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modelo_nome">Modelo</label>
                            <input type="text" name="modelo_nome" id="modelo_nome" placeholder="Informe o modelo" class="form-control" required style="height: 35px"/>
                        </div>
                    </div><br/><br/>
                    <div class="row">    
                        <div class="form-group col-xs-12 text-right">
                            <div class="hidden-xs">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Cadastrar Dados</button>
                            </div>
                            <div class="visible-xs">
                                <br>
                                <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-check-circle"></i> Cadastrar Dados</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>   
        </div>
        <!-- FOOTER -->
        <?php require_once 'View/adm/common/rodape.php'; ?>
        <script>$("#menu-modelo").addClass('menu-top-active');</script>
        <script type="text/javascript" src="<?php echo Router::base(); ?>/assets/select2/dist/js/select2.js"></script>
        <script>$("#modelo_marca").select2();</script>
    </body>
</html>      