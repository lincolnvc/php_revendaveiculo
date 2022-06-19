<div class="col-md-3 col-lg-3">
    <div class="">
        <?php if (isset($dados['parceiro'][0])) : ?>
            <h3>Parceiros</h3>
            <?php shuffle($dados['parceiro']); ?>
            <?php $parceiros = array_slice($dados['parceiro'], 0, 4); ?>
            <?php foreach ($parceiros as $p) : ?>
                <div style="margin-bottom: 12px; padding-bottom: 5px; ">
                    <a href="<?php echo $p->slide_link; ?>" target="_blank">
                        <img src="<?php echo Router::base(); ?>/midias/thumb.php?zc=2&w=300&h=250&src=parceiro/<?php echo $p->slide_foto; ?>" alt="logo parceiro" class="img-responsive">
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="list-group alt row hide">
        <h3>Novos no site</h3>
        <?php if (isset($dados['auto_recente'][0])) : ?>
            <?php foreach ($dados['auto_recente'] as $car) : ?>
                <a href="<?php echo Router::base(); ?>/detalhe/<?php echo Util::slug($car->marca_nome); ?>/<?php echo Util::slug($car->modelo_nome); ?>/ano-<?php echo Util::slug($car->auto_ano); ?>/<?php echo $car->auto_id; ?>/" class="list-group-item" >
                    <div class="popular-item">
                        <?php if ($car->foto_url != ""): ?>
                            <img class="img-thumbnail img-responsive" 
                                 src="<?php echo Router::base(); ?>/midias/thumb.php?zc=1&w=120&h=85&src=fotos/<?php echo $car->foto_url; ?>" />
                             <?php else : ?>
                            <td class="text-center"><img src="<?php echo Router::base(); ?>/midias/thumb.php?zc=1&w=120&h=85&src=fotos/sem.png"  alt="sem foto" class="img-responsive"/> </td>
                        <?php endif; ?>
                        <strong><?php echo $car->modelo_nome; ?></strong>
                        <span>Ano: <?php echo $car->auto_ano; ?></span><br >
                        <span>Preço: <?php echo Util::money($car->auto_preco); ?></span>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="alert alert-info"> Nenhum item disponível!</p>
        <?php endif; ?>
        <div class="clearfix"></div>
    </div><br/>
    <div class="list-group alt row">
        <h3>Mais Visitados</h3>
        <?php if (isset($dados['auto_popular'][0])) : ?>
            <?php foreach ($dados['auto_popular'] as $car) : ?>
                <a href="<?php echo Router::base(); ?>/detalhe/<?php echo Util::slug($car->marca_nome); ?>/<?php echo Util::slug($car->modelo_nome); ?>/ano-<?php echo Util::slug($car->auto_ano); ?>/<?php echo $car->auto_id; ?>/" class="list-group-item" >
                    <div class="popular-item">
                        <?php if ($car->foto_url != ""): ?>
                            <img class="img-thumbnail img-responsive" 
                                 src="<?php echo Router::base(); ?>/midias/thumb.php?zc=1&w=110&h=85&src=fotos/<?php echo $car->foto_url; ?>" />
                             <?php else : ?>
                            <td class="text-center"><img src="<?php echo Router::base(); ?>/midias/thumb.php?zc=1&w=120&h=85&src=fotos/sem.png"  alt="sem foto" class="img-responsive"/> </td>
                        <?php endif; ?>
                        <strong><?php echo $car->modelo_nome; ?></strong>
                        <span>Ano: <?php echo $car->auto_ano; ?></span><br >
                        <span>Preço: <?php echo Util::money($car->auto_preco); ?></span>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="alert alert-info">  Nenhum item disponível!</p>
        <?php endif; ?>

        <div class="clearfix"></div>
    </div>
</div>