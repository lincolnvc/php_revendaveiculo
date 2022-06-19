<div class="topbar" >
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul id="topmenu">
                    <li>
                        &nbsp; <i class="icon-phone"></i> 
                        <?php if ($dados['agencia'][0]->agencia_tel != ""): ?><?php echo $dados['agencia'][0]->agencia_tel; ?><?php endif; ?> &nbsp; - &nbsp; 
                        <?php if ($dados['agencia'][0]->agencia_tel2 != ""): ?><?php echo $dados['agencia'][0]->agencia_tel2; ?><?php endif; ?> &nbsp; - &nbsp;
                        <?php if ($dados['agencia'][0]->agencia_tel3 != ""): ?><?php echo $dados['agencia'][0]->agencia_tel3; ?><?php endif; ?> &nbsp; 
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="col-sm-6 col-offset-sm-4 col-md-3">
                <ul id="topsocial">
                    <?php if ($dados['social']->social_facebook != ""): ?>
                        <li><a href="<?php echo $dados['social']->social_facebook; ?>"><i class="icon-facebook"></i></a></li>
                    <?php endif; ?>
                    <?php if ($dados['social']->social_google != ""): ?>
                        <li><a href="<?php echo $dados['social']->social_google; ?>"><i class="icon-gplus"></i></a></li>
                    <?php endif; ?>
                    <?php if ($dados['social']->social_linkedin != ""): ?>
                        <li><a href="<?php echo $dados['social']->social_linkedin; ?>"><i class="icon-linkedin"></i></a></li>
                    <?php endif; ?>
                    <?php if ($dados['social']->social_twitter != ""): ?>
                        <li><a href="<?php echo $dados['social']->social_twitter; ?>"><i class="icon-twitter"></i></a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="col-sm-2 col-md-1 hide">
                <div class="dropdown pull-right" id="language" >
                    <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#" class="btn_lang en_gb"><span class="sr-only">United Kingdom</span><span class="caret"></span></a>

                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li role="presentation"><a role="menuitem" href="#" class="en_gb">English</a></li>
                        <li role="presentation"><a role="menuitem" href="#" class="es_es">Español</a></li>
                        <li role="presentation"><a role="menuitem" href="#" class="fr_fr">Français</a></li>
                        <li role="presentation"><a role="menuitem" href="#" class="pt_br">Português</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>