<div class="container">
	<div class="row">
        <div class="col-md-10">
            <h1>Página <small>Nuevo registro</small></h1>
            <?=form_open("/admin/pagina/crear",['class' => 'form-horizontal', 'role' => 'form']);?>
            <div class="form-group">
                <label for="titulo" class="col-lg-2 control-label">Titulo:</label>
                <div class="col-lg-4">
                  <input type="text" class="form-control" name="titulo"
                         placeholder="Titulo de la página" value="<?=set_value('titulo') ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="descripcion" class="col-lg-2 control-label">Descripción:</label>
                <div class="col-lg-5">
                  <input type="text" class="form-control" name="descripcion"
                         placeholder="Descripcion de la página" value="<?= set_value('descripcion'); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="clave" class="col-lg-2 control-label">Palabras claves:</label>
                <div class="col-lg-5">
                  <input type="text" class="form-control" name="clave"
                         placeholder="Keywords o palabras clave" value="<?= set_value('clave'); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="cabecera" class="col-lg-2 control-label">Encabezado:</label>
                <div class="col-lg-5">
                  <input type="text" class="form-control" name="cabecera"
                         placeholder="Título del contenido de la página." value="<?= set_value('cabecera'); ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="cabecera" class="col-lg-2 control-label">Contenido:</label>
                <div class="col-lg-10">
                  <?php echo $this->ckeditor->editor('detalle',@$default_value);?> 
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
</div>