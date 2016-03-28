<div class="container">
	<div class="row">
        <div class="col-md-10">
            <h1>Publicaciones</h1>
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
                        <td><?= $row->nombre?></td>
                        <td><?= $row->url?></td>
                        <td><a href="<?= base_url() ?>admin/menu/editar/<?= $row->idMenu?>">
                                <img src="<?= base_url() ?>img/toolbar/table_edit.png" alt="Editar">
                            </a> | 
                            <a href="<?= base_url() ?>admin/menu/eliminar/<?= $row->idMenu?>">
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
            <a href="<?= base_url() ?>admin/menu/crear" class="btn btn-info btn-sm">Crear Nuevo</a>
        </div>
	</div>
</div>