<div class="container">
	<div class="row">
        <div class="col-md-10">
            <h1>Página <small>Nuevo registro</small></h1>
            <?=form_open("/admin/pagina/crear",['class' => 'form-horizontal', 'role' => 'form']);?>
            <div class="form-group">
                <label for="titulo" class="col-lg-1 control-label">Titulo:</label>
                <div class="col-lg-4">
                  <input type="text" class="form-control" name="titulo"
                         placeholder="Titulo de la página" value="<?=set_value('titulo') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12">
                  <?php echo $this->ckeditor->editor('detalle',@$default_value);?> 
                </div>
            </div>                    

            <div class="form-group">
                <div class="col-sm-offset-2 col-lg-8 col-sm-8 text-left">
                    <input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Grabar" />
                    <a href="<?=base_url()?>admin/pagina" class="btn btn-danger">Cancelar</a>
                </div>
            </div>

            <?=form_close(); ?>
    	</div>
    </div>
</div>