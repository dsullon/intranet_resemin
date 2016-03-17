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
            <link href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" rel="stylesheet">
	 		<title>RESEMIN S.A. : <?= $titulo ?></title>
	</head>
	<body>
		<div class="container">
            <div class="row">
                <div class="col-md-2">
                    <? echo $this->menu_dinamico->menu_admin() ?>
                </div>
                <div class="col-md-10">
                    <?=$contenido?>
                </div>
            </div>
        </div> <!-- Wrapper Close -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
                } 
            );
        </script>
    </body>
</html>