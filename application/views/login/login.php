<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	    <link href="<?= base_url() ?>assets/css/resemin.css" rel="stylesheet">
	    <link rel="shortcut icon" href="<?= base_url() ?>img/favicon.ico" />
	</head>
	<body>
		<div class="container">
		    <div class="row">
		        <div class="col-sm-6 col-md-4 col-md-offset-4">
		            <h1 class="text-center login-title">Inicie sesión para continuar</h1>
		            <div class="account-wall">
		                <img class="text-center" src="<?= base_url() ?>img/logo-resemin.png" alt="Resemin S.A."/>
		                <?=form_open(base_url().'login/new_user', array("class"=>"form-signin"))?>
		                <input type="text" class="form-control" name="usuario" placeholder="Nombre de usuario" required autofocus>
		                <input type="password" class="form-control" name="password" placeholder="Password" required>
		                <?=form_hidden('token',$token)?>
		                <input type="submit" class="btn btn-lg btn-primary btn-block" type="submit" value="Inicia sesión"/>
		                <!--<label class="checkbox pull-left">
		                    <input type="checkbox" value="remember-me">
		                    Remember me
		                </label>
		                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>-->
		                <?=form_close()?>
						<?php 
						if($this->session->flashdata('usuario_incorrecto'))
						{
						?>
						<div class="alert alert-danger">
							<?=$this->session->flashdata('usuario_incorrecto')?>
						</div>
						<?php
						}
						?>
		            </div>
		            <!--<a href="#" class="text-center new-account">Create an account </a>-->
		        </div>
		    </div>
		</div>
	</body>
</html>