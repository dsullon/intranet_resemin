<div class="container">
    <h1>Navegación <small>Editar registro</small></h1>
    <?=form_open("/admin/menu/editar/".$pagina->idMenu,['class' => 'form-horizontal', 'role' => 'form']);?>
    <input type="hidden" name="id" value="<?=set_value('titulo',$pagina->idMenu) ?>">
	<div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="nombre" class="col-lg-2 control-label">Nombre:</label>
                <div class="col-lg-4">
                  <input type="text" class="form-control" name="nombre"
                         placeholder="Ingrese el nombre" value="<?= set_value('nombre',$pagina->nombre); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="principal" class="col-lg-2 control-label">Principal:</label>
                <div class="col-lg-5">
                    <select class="form-control text-lowercase" name="principal">
                        <option value=0>--SELECCIONE--</option>
                        <?
                            foreach ($opciones->result() as $opcion) {
                                ?>
                                <option value="<?=$opcion->idMenu?>" <?= $pagina->idPadre == $opcion->idMenu ? "selected" : "" ?>><?=$opcion->nombre ?></option>
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
                                <option value="<?=$p->idPagina?>" <?= $pagina->idPagina == $p->idPagina ? "selected" : "" ?>><?=$p->titulo ?></option>
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
        </div>
	</div>
    <?=form_close(); ?>
</div>