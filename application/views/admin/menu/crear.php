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
                <label for="url" class="col-lg-2 control-label">Principal:</label>
                <div class="col-lg-5">
                    <select class="form-control text-lowercase" name="principal">
                        <option value=0>Ninguno</option>
                        <?
                            foreach ($opciones->result() as $opcion) {
                                ?>
                                <option value="<?=$opcion->idMenu ?>"><?=$opcion->nombre ?></option>
                                <?
                            }
                        ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="pagina" class="col-lg-2 control-label">Página:</label>
                <div class="col-lg-5">
                    <select class="form-control text-uppercase" name="pagina">
                        <option value=0>--SELECCIONE--</option>
                        <?
                            foreach ($paginas->result() as $p) {
                                ?>
                                <option value="<?=$p->idPagina?>"><?=$p->titulo ?></option>
                                <?
                            }
                        ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-lg-8 col-sm-8 text-left">
                    <input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Grabar" />
                    <a href="<?=base_url()?>admin/menu" class="btn btn-danger">Cancelar</a>
                </div>
            </div>
            <?=form_close(); ?>
	</div>
</div>