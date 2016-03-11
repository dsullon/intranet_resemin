<div class="container">
	<div class="row">
        <div class="col-md-10">
            <h1>Navegación <small>Nuevo registro</small></h1>
            <?=form_open("/admin/menu/recibirdatos",['class' => 'form-horizontal', 'role' => 'form']);?>
            <div class="form-group">
                <label for="nombre" class="col-lg-2 control-label">Nombre:</label>
                <div class="col-lg-4">
                  <input type="text" class="form-control" name="nombre"
                         placeholder="Ingrese el nombre">
                </div>
            </div>
            <div class="form-group">
                <label for="url" class="col-lg-2 control-label">Dirección:</label>
                <div class="col-lg-5">
                  <input type="text" class="form-control" name="url"
                         placeholder="Dirección url (ejem.: empresa/historia)">
                </div>
            </div>
            <div class="form-group">
                <label for="url" class="col-lg-2 control-label">Principal:</label>
                <div class="col-lg-5">
                    <select class="form-control text-lowercase" name="principal">
                        <option value=0>Ninguno</option>
                        <?
                            foreach ($opciones->result() as $opcion) {
                                ?>
                                <option value="<?=$opcion->idMenu ?>"><?=$opcion->url ?></option>
                                <?
                            }
                        ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-lg-8 col-sm-8 text-left">
                    <input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Grabar" />
                    <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Cancelar" />
                </div>
            </div>
            <?=form_close(); ?>
	</div>
</div>