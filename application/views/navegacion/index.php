<div class="container">
	<div class="row">
        <div class="col-md-2">
	  	    <?=$menu?>
        </div>
        <div class="col-md-10">
            <h1>Navegación</h1>
            <p><a href="<?= base_url() ?>navegacion/crear" class="btn btn-info btn-sm">Crear Nuevo</a></p>            
        	<table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Url</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Titulo</th>
                        <th>Url</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Donna Snider</td>
                        <td>Customer Support</td>
                    </tr>
                </tbody>
            </table>
            <a href="<?= base_url() ?>navegacion/crear" class="btn btn-info btn-sm">Crear Nuevo</a>
        </div>
	</div>
</div>