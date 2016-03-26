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
                <label for="url" class="col-lg-2 control-label">Dirección:</label>
                <div class="col-lg-5">
                  <input type="text" class="form-control" name="url"
                         placeholder="Dirección url (ejem.: empresa/historia)" value="<?= set_value('nombre',$pagina->url); ?>">
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
                                <option value="<?=$opcion->idMenu?>" <?= $pagina->idPadre == $opcion->idMenu ? "selected" : "" ?>><?=$opcion->url ?></option>
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
                                <option value="<?=$p->idPagina?>" <?= $pagina->idPagina == $p->idPagina ? "selected" : "" ?>><?=$p->encabezado ?></option>
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
        </div>
        <div class="col-md-4">
            <?
                foreach ($paginas->result() as $p) {
                    echo $p->titulo.'<br/>';
                }
            ?>
        </div>
	</div>
    <?=form_close(); ?>
</div>