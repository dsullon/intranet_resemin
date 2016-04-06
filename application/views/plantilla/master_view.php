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
                    <div class="row">
                        <div class="widget well">
                            <h4 class="page-header">Aplicaciones</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="widget well">
                            <h4 class="page-header">Herramientas de comunicación</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="widget well">
                            <h4 class="page-header">Categorias</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="widget well">
                            <h4 class="page-header">Próximos eventos</h4>
                            <div>
                                <a href="">Evento</a>
                                2016-3-25
                            </div>
                        </div>
                    </div>
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