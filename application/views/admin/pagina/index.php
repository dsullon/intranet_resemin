<div class="container">
	<div class="row">
        <div class="col-md-10">
            <h1>Listado de páginas</h1>
            <p><a href="<?= base_url() ?>admin/pagina/crear" class="btn btn-info btn-sm">Crear Nuevo</a></p>            
        	<table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Url</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
            <?
            if($listado)
            {
                foreach ($listado->result() as $row)
                {
                    ?>
                    <tr>
                        <td><?= $row->titulo?></td>
                        <td><?= $row->encabezado?></td>
                        <td><a href="<?= base_url() ?>admin/pagina/editar/<?= $row->idPagina?>">
                                <img src="<?= base_url() ?>img/toolbar/table_edit.png" alt="Editar">
                            </a> | 
                            <a href="<?= base_url() ?>admin/pagina/eliminar/<?= $row->idPagina?>">
                                <img src="<?= base_url() ?>img/toolbar/table_delete.png" alt="Eliminar">
                            </a>
                        </td>
                    </tr>
                    <?
                }
            }
            ?> 
                </tbody>
            </table> 
            <a href="<?= base_url() ?>admin/pagina/crear" class="btn btn-info btn-sm">Crear Nuevo</a>
        </div>
	</div>
</div>