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
        <link href="<?php echo Router::base(); ?>/assets/summernote/summernote.css" rel="stylesheet"/>
        <link href="<?php echo Router::base(); ?>/assets/select2/dist/css/select2.css" rel="stylesheet"/>
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .select2-results .select2-disabled,  .select2-results__option[aria-disabled=true] { 
                display: none;
            }
        </style>        
    </head>
    <body>
        <?php require_once 'View/adm/common/menu.php'; ?>
        <div class="container-fluid back ">
            <div class="container text-center">
                <h4 class="page-head-line titulo">Editar Auto</h4>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="container">
                <p class="text-right">
                    <a href="<?php echo Router::base(); ?>/auto/foto/<?php echo $dados['auto']->auto_id; ?>/"
                       class="btn btn-lg btn-warning" data-toggle="tooltip" title="Fotos"><i class="fa fa-photo"></i> Gerenciar Fotos
                    </a>                    
                </p>
                <form method="post" enctype="multipart/form-data" action="<?php echo Router::base(); ?>/auto/atualizar/">
                    <input type="hidden" name="auto_id" id="auto_id" class="form-control" value="<?php echo $dados['auto']->auto_id; ?>"/>
                    <?php echo status::msg(); ?>
                    <div class="row">
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="auto_marca">Marca</label>
                            <select name="auto_marca" id="auto_marca" class="form-control" required >
                                <option value=""> Selecione uma marca...</option>
                                <?php foreach ($dados['marca'] as $ma): ?>
                                    <option value="<?php echo $ma->marca_id ?>"> <?php echo $ma->marca_nome ?></option>
                                <?php endforeach; ?>                           
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="auto_modelo">Modelo</label>
                            <select name="auto_modelo" id="auto_modelo" class="form-control" required >
                                <option value=""> Selecione um modelo...</option>
                                <?php foreach ($dados['modelo'] as $mo): ?>
                                    <option value="<?php echo $mo->modelo_id ?>" data-marca="<?php echo $mo->modelo_marca; ?>"> <?php echo $mo->modelo_nome ?></option>
                                <?php endforeach; ?>                           
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4 col-xs-12">
                            <label for="auto_versao">Vers??o</label>
                            <select name="auto_versao" id="auto_versao" class="form-control" required >
                                <option value=""> Selecione uma vers??o...</option>
                                <?php foreach ($dados['versao'] as $ve): ?>
                                    <option value="<?php echo $ve->versao_id ?>" data-modelo="<?php echo $ve->versao_modelo; ?>"> <?php echo $ve->versao_nome ?></option>
                                <?php endforeach; ?>                           
                            </select>
                        </div>

                        <div class="form-group col-md-2 col-xs-12">
                            <label for="auto_placa_num">Placa</label>
                            <input type="text" name="auto_placa_num" id="auto_placa_num" class="form-control altura" value=<?php echo $dados['auto']->auto_placa_num ?> />
                        </div>                        
                        <div class="form-group col-md-2 col-xs-12">
                            <label for="auto_placa">Final da Placa</label>
                            <select name="auto_placa" id="auto_placa" class="form-control" required>
                                <option value="">Selecione final da placa...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="0">0</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 col-xs-12">
                            <label for="auto_estado">Estado do carro</label>
                            <select name="auto_estado" id="auto_estado" class="form-control" required>
                                <option value="">Estado do carro...</option>
                                <option value="1">Novo</option>
                                <option value="0">Usado</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 col-xs-12">
                            <label for="auto_ano">Ano</label>
                            <select name="auto_ano" id="auto_ano" class="form-control" value="<?php echo $dados['auto']->auto_ano ?>" required> 
                                <?php
                                for ($i = date("Y") + 1; $i >= 1980; $i--) :
                                    $i == date("Y") ? $valor = "selected" : $valor = "";
                                    echo "<option value=\"$i\" $valor>$i</option>";
                                endfor
                                ?> 
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2 col-xs-12">
                            <label for="auto_cambio">C??mbio</label>
                            <select name="auto_cambio" id="auto_cambio" class="form-control" required >
                                <option value=""> Selecione...</option>
                                <?php foreach ($dados['cambio'] as $ca): ?>
                                    <option value="<?php echo $ca->cambio_id ?>"> <?php echo $ca->cambio_nome ?></option>
                                <?php endforeach; ?>                           
                            </select>
                        </div>
                        <div class="form-group col-md-2 col-xs-12">
                            <label for="auto_cor">Cor</label>
                            <select name="auto_cor" id="auto_cor" class="form-control" required >
                                <option value=""> Selecione...</option>
                                <?php foreach ($dados['cor'] as $co): ?>
                                    <option value="<?php echo $co->cor_id ?>"> <?php echo $co->cor_nome ?></option>
                                <?php endforeach; ?>                           
                            </select>
                        </div>
                        <div class="form-group col-md-2 col-xs-12">
                            <label for="auto_combustivel">Combust??vel</label>
                            <select name="auto_combustivel" id="auto_combustivel" class="form-control" required >
                                <option value=""> Selecione...</option>
                                <?php foreach ($dados['combustivel'] as $com): ?>
                                    <option value="<?php echo $com->combustivel_id ?>"> <?php echo $com->combustivel_nome ?></option>
                                <?php endforeach; ?>                           
                            </select>
                        </div>
                        <div class="form-group col-md-2 col-xs-12">
                            <label for="auto_carroceria">Carroceria</label>
                            <select name="auto_carroceria" id="auto_carroceria" class="form-control" required >
                                <option value=""> Selecione...</option>
                                <?php foreach ($dados['carroceria'] as $car): ?>
                                    <option value="<?php echo $car->carroceria_id ?>"> <?php echo $car->carroceria_nome ?></option>
                                <?php endforeach; ?>                           
                            </select>
                        </div>
                        <div class="form-group col-md-2 col-xs-12">
                            <label for="auto_documentacao">Documenta????o</label>
                            <select name="auto_documentacao" id="auto_documentacao" class="form-control" required >
                                <option value=""> Selecione...</option>
                                <?php foreach ($dados['documentacao'] as $doc): ?>
                                    <option value="<?php echo $doc->documentacao_id ?>"> <?php echo $doc->documentacao_nome ?></option>
                                <?php endforeach; ?>                           
                            </select>
                        </div>
                        <div class="form-group col-md-2 col-xs-12">
                            <label for="auto_necessidade">Necessidade</label>
                            <select name="auto_necessidade" id="auto_necessidade" class="form-control" required >
                                <option value=""> Selecione...</option>
                                <?php foreach ($dados['necessidade'] as $nec): ?>
                                    <option value="<?php echo $nec->necessidade_id ?>"> <?php echo $nec->necessidade_nome ?></option>
                                <?php endforeach; ?>                           
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2 col-xs-12">
                            <label for="auto_negociacao">Tipo de negocia????o</label>
                            <select name="auto_negociacao" id="auto_negociacao" class="form-control" >
                                <option value="">Negocia????o...</option>
                                <option value="1">Aceita troca</option>
                                <option value="0">N??o aceita troca</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 col-xs-12">
                            <label for="auto_porta">Quantidade de portas</label>
                            <select name="auto_porta" id="auto_porta" class="form-control" >
                                <option value="">Portas...</option>
                                <option value="0">0</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="col-md-2 col-xs-12">
                            <label for="auto_destaque">Em destaque</label>
                            <select name="auto_destaque" id="auto_destaque" class="form-control" >
                                <option value="">Selecione uma op????o...</option>
                                <option value="1">SIM</option>
                                <option value="0" selected>N??O</option>
                            </select>
                        </div>
                        <div class="col-md-2 col-xs-12">
                            <label for="auto_oferta">Em oferta</label>
                            <select name="auto_oferta" id="auto_oferta" class="form-control" required>
                                <option value="">Selecione uma op????o...</option>
                                <option value="1">SIM</option>
                                <option value="0" selected>N??O</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 col-xs-12">
                            <label for="auto_km">Kilometragem</label>
                            <input type="text" name="auto_km" id="auto_km" class="form-control altura" placeholder="Informe o km" 
                                   value="<?php echo $dados['auto']->auto_km; ?>"/>
                        </div>
                        <div class="form-group col-md-2 col-xs-12">
                            <label for="auto_preco">Pre??o</label>
                            <input type="text" name="auto_preco" id="auto_preco" class="form-control altura money" placeholder="Informe o pre??o"
                                   value="<?php echo $dados['auto']->auto_preco; ?>"/>
                        </div>
                    </div>
                    <div class="row">
                        
                            <?php $opc_ids = explode("|", $dados['auto']->auto_opc); ?>
                            <?php foreach ($dados['opc'] as $g): ?>
                                <div class="col-md-3">
                                    <h4><?php echo $g['grupo']; ?></h4>
                                    <div class="list-group">
                                        <?php foreach ($g['item'] as $item): ?>
                                            <?php if (is_array($opc_ids)): ?>
                                                <?php //if (in_array($item->opcional_id, $opc_ids)): ?>
                                                <input type="checkbox" name="auto_opc[]" value="<?php echo $item->opcional_id; ?>" id="opc_<?php echo $item->opcional_id; ?>" <?= (in_array($item->opcional_id, $opc_ids)) ? 'checked' : ''; ?>/>
                                                <label style="font-weight: 100;cursor:pointer" for="opc_<?php echo $item->opcional_id; ?>"><?php echo $item->opcional_nome; ?></label> <br />
                                                <?php //endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        
                    </div>
                    <div class="form-group">
                        <label for="auto_obs">Observa????o</label>
                        <textarea name="auto_obs" id="auto_obs"><?php echo $dados['auto']->auto_obs; ?></textarea>
                    </div><br/>
                    <div class="row">    
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="auto_seo_desc">Descri????o breve (SEO - Opcional)</label>
                            <small class="text-muted pull-right">Meta Description - At?? 156 caracteres</small>
                            <input type="text" name="auto_seo_desc" id="auto_seo_desc" class="form-control altura" placeholder="Informe uma descri????o breve do autom??vel"
                                   value="<?php echo $dados['auto']->auto_seo_desc; ?>"/>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="auto_seo_keys">Palavras-chave (SEO - Opcional)</label>
                            <small class="text-muted pull-right">Meta Keywords - At?? 20 palavras</small>
                            <input type="text" name="auto_seo_keys" id="auto_seo_keys" class="form-control altura" placeholder="Informe palavras-chave do autom??vel" 
                                   value="<?php echo $dados['auto']->auto_seo_keys; ?>"/>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="form-group col-xs-12 text-right">
                            <div class="hidden-xs">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Atualizar Dados</button>
                            </div>
                            <div class="visible-xs">
                                <br/>
                                <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-check-circle"></i> Atualizar Dados</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>   
        <?php require_once 'View/adm/common/rodape.php'; ?>
        <script type="text/javascript" src="<?php echo Router::base(); ?>/assets/summernote/summernote.js"></script>
        <script type="text/javascript" src="<?php echo Router::base(); ?>/assets/select2/dist/js/select2.js"></script>
        <script type="text/javascript" src="<?php echo Router::base(); ?>/assets/js/jquery.mask.js"></script>
        <script>$("#menu-auto").addClass('menu-top-active');</script>
        <script>//$("#auto_versao").select2();</script>
        <script>//$("#auto_marca").select2();</script>
        <script>//$("#auto_modelo").select2();</script>
        <script>$("#auto_placa").select2();</script>
        <script>$("#auto_ano").select2();</script>
        <script>$("#auto_estado").select2();</script>
        <script>$("#auto_negociacao").select2();</script>
        <script>$("#auto_porta").select2();</script>
        <script>$("#auto_destaque").select2();</script>
        <script>$("#auto_oferta").select2();</script>
        <script>$("#auto_cor").select2();</script>
        <script>$("#auto_cambio").select2();</script>
        <script>$("#auto_combustivel").select2();</script>
        <script>$("#auto_carroceria").select2();</script>
        <script>$("#auto_documentacao").select2();</script>
        <script>$("#auto_necessidade").select2();</script>
        <script>$('.money').mask("#.##0,00", {reverse: true});</script>
        <script type="text/javascript">
            $(function () {
                $('#auto_obs').summernote({
                    height: 200
                });
            });

           $("#auto_marca").val( '<?php echo $dados['auto']->auto_marca ?>').trigger('change');            
       $("#auto_marca").select2(); 

            $("#auto_modelo").val( '<?php echo $dados['auto']->auto_modelo ?>').trigger('change');            
        $("#auto_modelo").select2();    


            var marca_id = '<?php echo $dados['auto']->auto_marca ?>';
            $('#auto_modelo option').each(function () {
                $(this).removeAttr('disabled');
            });
            $('#auto_modelo option').each(function () {
                if ($(this).data('marca') != marca_id) {
                    $(this).attr('disabled', 'disabled');
                }
            });
        $("#auto_marca").select2();

            var modelo_id = '<?php echo $dados['auto']->auto_modelo ?>';
            $('#auto_versao option').each(function () {
                $(this).removeAttr('disabled');
            });
            $('#auto_versao option').each(function () {
                if ($(this).data('modelo') != modelo_id) {
                    $(this).attr('disabled', 'disabled');
                }
            });
            $("#auto_versao").select2();
            $("#auto_versao").select2('val', '<?php echo $dados['auto']->auto_versao ?>');
            $("#auto_placa").select2('val', '<?php echo $dados['auto']->auto_placa ?>');
            $("#auto_ano").select2('val', '<?php echo $dados['auto']->auto_ano ?>');
            $("#auto_estado").select2('val', '<?php echo $dados['auto']->auto_estado ?>');
            $("#auto_negociacao").select2('val', '<?php echo $dados['auto']->auto_negociacao ?>');
            $("#auto_porta").select2('val', '<?php echo $dados['auto']->auto_porta ?>');
            $("#auto_destaque").select2('val', '<?php echo $dados['auto']->auto_destaque; ?>');
            $("#auto_oferta").select2('val', '<?php echo $dados['auto']->auto_oferta; ?>');
            $("#auto_cor").select2('val', '<?php echo $dados['auto']->auto_cor; ?>');
            $("#auto_cambio").select2('val', '<?php echo $dados['auto']->auto_cambio; ?>');
            $("#auto_combustivel").select2('val', '<?php echo $dados['auto']->auto_combustivel; ?>');
            $("#auto_carroceria").select2('val', '<?php echo $dados['auto']->auto_carroceria; ?>');
            $("#auto_documentacao").select2('val', '<?php echo $dados['auto']->auto_documentacao; ?>');
            $("#auto_necessidade").select2('val', '<?php echo $dados['auto']->auto_necessidade; ?>');
        </script>
        <script type="text/javascript">
            $(function () {
                $('#auto_obs').summernote({
                    height: 200
                });
                $('#auto_modelo option').each(function () {
                    $(this).hide();
                });
                $('#auto_versao option').each(function () {
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
                $('#auto_modelo').on('change', function () {
                $("#auto_versao").select2('val', '');
                    $("#auto_versao").select2('destroy');
                    var modelo_id = $(this).val();
                    $('#auto_versao option').each(function () {
                        $(this).removeAttr('disabled');
                    });
                    $('#auto_versao option').each(function () {
                        if ($(this).data('modelo') != modelo_id) {
                            $(this).attr('disabled', 'disabled');
                        }
                    });
                    $("#auto_versao").select2();
                });
            });
            setTimeout(function () {
                $('.msg-status').fadeOut(1000);
            }, 1500);
        </script>
                     <script>$('#auto_placa_num').css('text-transform','uppercase').mask("AAA-9999");</script>
    </body>
</html>      