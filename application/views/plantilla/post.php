<div class="row">
    <div class="col-md-12">
        <h3 class="page-header"><?= $titulo?></h3>
        <div><?= $contenido?></div>
    </div>
</div>
<br/>
<br/>
<div class="row">
    <div class="col-md-9">
        <? if($this->session->userdata('usuario'))
            {   
                ?>
                <h4>Deja un comentario</h4>
                <?=form_open("/admin/pagina/crear",['class' => 'form-horizontal', 'role' => 'form']);?>
                    <div class="input-group">
                        <textarea class="form-control custom-control" rows="5" style="resize:none"></textarea>     
                        <span class="input-group-addon btn btn-primary">Comentar</span>
                    </div>
                <?=form_close(); ?>
                <?
            }
            else{?>
                <div class="alert alert-warning">
                    <strong>Aviso!</strong> Para dejar un comentario necesita <a href="<?= base_url()?>login">iniciar sesión</a>.
                </div>
            <?
            }
        ?>
    </div>
</div>