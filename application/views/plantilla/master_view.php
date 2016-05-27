<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <meta name="author" content="Resemin S.A.">
		    <link rel="shortcut icon" href="<?= base_url() ?>img/favicon.ico" />
		    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
		    <link href="<?= base_url() ?>assets/css/resemin.css" rel="stylesheet">
	 		<title>RESEMIN S.A.</title>
	</head>
	<body>
        <? echo $this->menu_dinamico->construir_menu() ?>
		<div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!--Panel-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Aplicaciones</h3>
                        </div>
                        <div class="panel-body">
                            ...
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Herramientas de comunicacion</h3>
                        </div>
                        <div class="panel-body">
                            ...
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Categorias</h3>
                        </div>
                        <div class="panel-body">
                            ...
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Próximos eventos</h3>
                        </div>
                        <div class="panel-body">
                            ...
                        </div>
                    </div>                    
                    <!--Fin Panel-->
                </div>
                <div class="col-md-9">
                    <? if($carousel)
                    {
                        echo $this->carousel->crearCarousel();
                    }?>    
                    <? if(isset($vista))
                    {
                        echo $vista;
                    }
                    ?>                
                </div>
            </div>
        </div> <!-- Wrapper Close -->
        <div class="footer">
            <div class="container">
                <p class="text-muted">Place sticky footer content here.</p>
            </div>
        </div>
        <script src="<?= base_url() ?>assets/js/jquery-2.2.2.min.js"></script>
        <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    </body>
</html>