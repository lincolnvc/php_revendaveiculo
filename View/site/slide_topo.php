<div class="subbar" >
    <?php
    $k = 0;
    $x = 0;
    $y = 0;
    ?>
    <div class="container">
        <div id="carousel-top" class="carousel slide">
            <div class="carousel-inner">
                <?php if (isset($dados['auto_topo'][0])) : ?>
                    <?php foreach ($dados['auto_topo'] as $car) : ?>
                        <?php if ($x++ == 0): ?>
                            <div class="item <?php if ($k++ == 0): ?>active<?php endif; ?>">
                            <?php endif; ?>
                            <a class="offer" href="<?php echo Router::base(); ?>/detalhe/<?php echo Util::slug($car->marca_nome); ?>/<?php echo Util::slug($car->modelo_nome); ?>/ano-<?php echo Util::slug($car->auto_ano); ?>/<?php echo $car->auto_id; ?>/">
                                <?php if ($car->foto_url != ""): ?>
                                    <img src="<?php echo Router::base(); ?>/midias/thumb.php?zcs=1&w=100&h=70&src=fotos/<?php echo $car->foto_url; ?>" alt="" class="img-responsive"/>
                                <?php else : ?>
                                    <img src="<?php echo Router::base(); ?>/midias/thumb.php?zcs=1&w=100&h=70&src=fotos/sem.png" alt="sem foto" class="img-responsive"/>
                                <?php endif; ?>
                                    <span><strong><?php echo $car->modelo_nome; ?></strong>Ano: <?php echo $car->auto_ano; ?> <br/> R$ <?php echo Util::money($car->auto_preco); ?></span>
                            </a>
                            <?php if ($x == 4 || $x < 4 && $y == count($dados['auto_topo']) - 1): ?>
                            </div> 
                            <?php $x = 0; ?>
                        <?php endif; ?>
                        <?php $y++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <a class="carousel-control" href="#carousel-top" data-slide="prev">
                <span class="icon-left-circled"></span>
            </a>
            <a class="carousel-control next" href="#carousel-top" data-slide="next">
                <span class="icon-right-circled"></span>
            </a>
        </div>
    </div>
</div>