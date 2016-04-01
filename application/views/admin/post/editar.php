<div class="container">
	<div class="row">
        <div class="col-md-10">
            <h1>Página <small>Editar registro</small></h1>
            <?=form_open_multipart("/admin/post/editar/".$pagina->idPublicacion,['class' => 'form-horizontal', 'role' => 'form']);?>
            <input type="hidden" name="id" value="<?=set_value('titulo',$pagina->idPublicacion) ?>">
            <div class="form-group">
                <label for="titulo" class="col-lg-1 control-label">Titulo:</label>
                <div class="col-lg-4">
                  <input type="text" class="form-control" name="titulo"
                         placeholder="Título de la publicación" value="<?=set_value('titulo',$pagina->titulo) ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="categoria" class="col-lg-1 control-label">Categoría:</label>
                <div class="col-lg-4">
                    <select class="form-control text-uppercase" name="categoria">
                        <option value=0>--SELECCIONE--</option>
                        <?
                            foreach ($categorias->result() as $c) {
                                ?>
                                <option value="<?=$c->idCategoria?>" <?=$pagina->idCategoria == $c->idCategoria ? "selected" : "" ?>><?=$c->nombre ?></option>
                                <?
                            }
                        ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="imagen" class="col-lg-1 control-label">Imagen:</label>
                <div class="col-lg-4">
                    <input type="file" class="filestyle" data-input="false" name="imagen" value="<?=set_value('imagen') ?>" data-filename-placement="inside"/>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-lg-12">
                  <?php echo $this->ckeditor->editor('detalle',html_entity_decode(set_value('detalle', $pagina->contenido)));?> 
                </div>
            </div>                    

            <div class="form-group">
                <div class="col-sm-offset-2 col-lg-8 col-sm-8 text-left">
                    <input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Grabar" />
                    <a href="<?=base_url()?>admin/post" class="btn btn-danger">Cancelar</a>
                </div>
            </div>

            <?=form_close(); ?>
    	</div>
    </div>
</div>