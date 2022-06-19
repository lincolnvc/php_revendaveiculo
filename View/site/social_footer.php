<div class="bottomfoot"> <!-- // INICIOSOCIAL -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <p><?php echo $dados['agencia'][0]->agencia_nome; ?> - Todos direitos reservados</p>
            </div>
            <div class="col-xs-12 col-md-6">
                <ul class="social">
                    <?php if ($dados['social']->social_vimeo != ""): ?>
                        <li>
                            <a href="<?php echo $dados['social']->social_vimeo; ?>" target="_blank" class="vimeo"><i class="icon-vimeo"></i></a>
                        </li>
                    <?php endif; ?>
                    <?php if ($dados['social']->social_google != ""): ?>
                        <li>
                            <a href="<?php echo $dados['social']->social_google; ?>" target="_blank" class="gplus"><i class="icon-gplus"></i></a>
                        </li>
                    <?php endif; ?>
                    <?php if ($dados['social']->social_linkedin != ""): ?>
                        <li>
                            <a href="<?php echo $dados['social']->social_linkedin; ?>" target="_blank" class="linkedin"><i class="icon-linkedin"></i></a>
                        </li>
                    <?php endif; ?>
                    <?php if ($dados['social']->social_twitter != ""): ?>
                        <li>
                            <a href="<?php echo $dados['social']->social_twitter; ?>" target="_blank" class="twitter"><i class="icon-twitter"></i></a>
                        </li>
                    <?php endif; ?>
                    <?php if ($dados['social']->social_pinterest != ""): ?>
                        <li>
                            <a href="<?php echo $dados['social']->social_pinterest; ?>" target="_blank" class="pinterest"><i class="icon-pinterest"></i></a>
                        </li>
                    <?php endif; ?>
                    <?php if ($dados['social']->social_instagram != ""): ?>
                        <li>
                            <a href="<?php echo $dados['social']->social_instagram; ?>" target="_blank" class="instagram"><i class="icon-instagram"></i></a>
                        </li>
                    <?php endif; ?>
                    <?php if ($dados['social']->social_facebook != ""): ?>
                        <li>
                            <a href="<?php echo $dados['social']->social_facebook; ?>" target="_blank" class="facebook"><i class="icon-facebook"></i></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- // FIM SOCIAL -->