<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		  	<a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url() ?>img/logo-resemin.png" alt="Resemin S.A."></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<? echo $this->menu_dinamico->display_children(0,1) ?>
			</ul>

		  	<ul class="nav navbar-nav pull-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <!-- The Profile picture inserted via div class below, with shaping provided by Bootstrap -->
                        <img src="<?=$usuario->result()[0]->urlAvatar;?>" class="img-circle profile-img">
                        <?=$usuario->result()[0]->nombres.' '.$usuario->result()[0]->apellidoPaterno.' '.$usuario->result()[0]->apellidoMaterno ?><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">Editar perfil</a>
                        </li>
                        <? if($this->session->userdata('nivel')==1)
                        	{
                        ?>
                        	<li>
	                            <a href="<?= base_url() ?>admin/">Administrar</a>
	                        </li>
						<?
							}
						?>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="<?= base_url() ?>login/logout">Cerrar sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>