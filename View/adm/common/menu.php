<nav class="navbar navbar-default" style="background-color: #8a1818; font-size: large; ">
    <div class="container-fluid">
        <div class="container">
            <div class="navbar navbar-inverse" style="background-color: #8a1818; border-color: #8a1818;">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="navbar-header hide">
                <a class="navbar-brand branco" href="<?= Router::base(); ?>/admin/" navbar-brand style="color: #fff;"><i class="fa fa-home" style="color: #fff;"></i> HOME</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" id="menu-top">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle text-uppercase" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #fff; font-size: 0.8em;"><i class="fa fa-car"></i> Automóveis</a>
                        <ul class="dropdown-menu">                            
                            <li><a id="menu-auto" href="<?= Router::base(); ?>/auto/"><i class="fa fa-th-list"></i> Listar Autos</a></li> 
                            <li><a id="menu-marca" href="<?= Router::base(); ?>/auto/novo/"><i class="fa fa-plus-circle"></i> Cadastrar Novo</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle text-uppercase" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #fff; font-size: 0.8em;"><i class="fa fa-th-list"></i> Cadastros</a>
                        <ul class="dropdown-menu">                            
                            <li><a id="menu-marca" href="<?= Router::base(); ?>/marca/"><i class="fa fa-tags"></i> Marcas</a></li>
                            <li><a id="menu-modelo" href="<?= Router::base(); ?>/modelo/"><i class="fa fa-star-half-o"></i> Modelos</a></li>
                            <li><a id="menu-versao" href="<?= Router::base(); ?>/versao/"><i class="fa fa-code-fork"></i> Versões</a></li>
                            <li><a id="menu-grupo" href="<?= Router::base(); ?>/grupo/"><i class="fa fa-tags"></i> Opcionais</a></li>
                            <li><a id="menu-cambio" href="<?= Router::base(); ?>/cambio/"><i class="fa fa-neuter"></i> Câmbios</a></li>  
                            <li><a id="menu-cor" href="<?= Router::base(); ?>/cor/"><i class="fa fa-tint"></i> Cores</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle text-uppercase" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #fff; font-size: 0.8em;"><i class="fa fa-slideshare"></i> Banner's</a>
                        <ul class="dropdown-menu">                            
                            <li><a id="menu-slide" href="<?= Router::base(); ?>/slide/"><i class="fa fa-slideshare"></i> Slide</a></li>
                            <li><a id="menu-parceiro" href="<?= Router::base(); ?>/parceiro/"><i class="fa fa-suitcase"></i> Parceiros</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle text-uppercase" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #fff; font-size: 0.8em;"><i class="fa fa-suitcase"></i> Serviços</a>
                        <ul class="dropdown-menu">                            
                            <li><a id="menu-servico" href="<?= Router::base(); ?>/servicoAdmin/"><i class="fa fa-th-list"></i> Listar Serviços</a></li>
                            <li><a id="menu-servico" href="<?= Router::base(); ?>/servicoAdmin/novo/"><i class="fa fa-plus-circle"></i> Cadastrar Serviço</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle text-uppercase" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #fff; font-size: 0.8em;"><i class="fa fa-share-alt"></i> Redes Sociais</a>
                        <ul class="dropdown-menu">                            
                            <li><a id="menu-social" href="<?= Router::base(); ?>/social/"><i class="fa fa-share"></i> Redes Sociais</a></li>
                            <li><a id="menu-depoimento" href="<?= Router::base(); ?>/depoimento/"><i class="fa fa-comment-o"></i> Depoimentos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle text-uppercase" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #fff; font-size: 0.8em;"><i class="fa fa-cog"></i> Configurações</a>
                        <ul class="dropdown-menu">                            
                            <!--<li><a id="menu-logoff" href="<?= Router::base(); ?>/config/"><i class="fa fa-cogs"></i> Configurações</a></li>-->
                            <li><a id="menu-logoff" href="<?= Router::base(); ?>/usuario/"><i class="fa fa-user-secret"></i> Usuários</a></li>
                            <li><a id="menu-agencia" href="<?= Router::base(); ?>/agencia/"><i class="fa fa-home"></i> Agência</a></li>
                            <li><a id="menu-smtp" href="<?= Router::base(); ?>/smtp/"><i class="fa fa-envelope-o"></i> Configurar E-mail</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-left hide" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #fff; font-size: 0.8em;"><i class="fa fa-puzzle-piece"></i> Sessão</a>
                        <ul class="dropdown-menu">

                            <li><a id="menu-logoff" href="<?= Router::base(); ?>/login/logout_site/" target="_blank"><i class="fa fa-sitemap"></i> Visitar o Site</a></li>
                            <li><a id="menu-logoff" href="<?= Router::base(); ?>/login/logout/"><i class="fa fa-power-off"></i> Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </div><!-- /.container-fluid -->
</nav>