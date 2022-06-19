<!-- Slider -->                
    <?php if (isset($dados['slide'][0])) : ?>
        <div class="bannercontainer">
            <div class="banner ">
                <ul>                      
                    <?php foreach ($dados['slide'] as $s) : ?>
                        <li data-transition="curtain-3" data-slotamount="1">
                            <img src="<?php echo Router::base(); ?>/midias/thumb.php?zc=3&w=1900&h=500&src=slide/<?php echo $s->slide_foto; ?>" alt="Slide de fotos" class="img-responsive" />
                            <div 
                                class="caption lft " 
                                data-x="center"
                                data-y="bottom"
                                data-speed="1000"
                                data-start="500"
                                data-easing="easeOutBack">		
                                <a href="<?= $s->slide_link; ?>" <?php if ($s->slide_nova == 1): ?> target="_blank" <?php endif; ?> class="offer">
                                    <p>
                                        <span>Oferta Especial <span>&nbsp;</span></span>
                                        <?php echo $s->slide_nome ?>
                                    </p>
                                </a>
                            </div>                                 
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
<!-- End Slider -->
