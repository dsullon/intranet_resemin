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
        <div>
            <? echo $this->menu_dinamico->construir_menu() ?>
        </div>
		<div class="container">
            <div class="row">
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-6">

                </div>
                <div class="col-md-3">
                    
                </div>
            </div>
        </div> <!-- Wrapper Close -->
        <script src="<?= base_url() ?>assets/js/jquery-2.2.2.min.js"></script>
        <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    </body>
</html>