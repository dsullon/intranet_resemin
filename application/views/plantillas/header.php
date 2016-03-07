<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <link rel="icon" href="../../favicon.ico">

	    <title>RESEMIN S.A.C.</title>

	    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	    <link href="<?= base_url() ?>assets/css/resemin.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
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
							<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
							<li><a href="#">Link</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
							  	<ul class="dropdown-menu">
								    <li><a href="#">Action</a></li>
								    <li><a href="#">Another action</a></li>
								    <li><a href="#">Something else here</a></li>
								    <li role="separator" class="divider"></li>
								    <li><a href="#">Separated link</a></li>
								    <li role="separator" class="divider"></li>
								    <li><a href="#">One more separated link</a></li>
							  	</ul>
							</li>
						</ul>

					  	<ul class="nav navbar-nav pull-right">
			                <li class="dropdown">
			                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			                        <!-- The Profile picture inserted via div class below, with shaping provided by Bootstrap -->
			                        <img src="<?= base_url() ?>img/user.jpg" class="img-circle profile-img">
			                        Donald Alexander Sullon Porras<span class="caret"></span>
			                    </a>
			                    <ul class="dropdown-menu">
			                        <li>
			                            <a href="#">Editar perfil</a>
			                        </li>
			                        <li role="separator" class="divider"></li>
			                        <li>
			                            <a href="#">Cerrar sesión</a>
			                        </li>
			                    </ul>
			                </li>
			            </ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>