<?php
if(!isset($acciones))
  $acciones = array();
if(!isset($campos))
  $campos = array_keys($model->attributes);

$this->cargar_jquery();
?>

<div class="ficha capitulo">

  <div class="datos">

    <div class="fila">
      <?php if(in_array('id', $campos)): ?>
      <div class="campo id">
        <div class="label"><?php echo $model->getAttributeLabel('id'); ?></div>
        <div class="value"><?php echo $model->id; ?></div>
      </div>
      <?php endif; ?>
      <?php if(in_array('titulo', $campos)): ?>
      <div class="campo titulo">
        <div class="label"><?php echo $model->getAttributeLabel('titulo'); ?></div>
        <div class="value"><?php echo $model->titulo; ?></div>
      </div>
      <?php endif; ?>
      <?php if(in_array('serie_id', $campos)): ?>
      <div class="campo serie_id">
        <div class="label"><?php echo $model->getAttributeLabel('serie_id'); ?></div>
        <div class="value"><?php echo $model->serie->link(); ?></div>
      </div>
      <?php endif; ?>
      <?php if(in_array('orden', $campos)): ?>
      <div class="campo orden">
        <div class="label"><?php echo $model->getAttributeLabel('orden'); ?></div>
        <div class="value"><?php echo $model->orden; ?></div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <div class="campo url">
        <div class="label"><?php echo $model->getAttributeLabel('url'); ?></div>
        <div class="value">
          <a href="<?php echo $model->urlCompleta; ?>" target="_blank">
            <?php echo $model->urlCompleta; ?>
          </a>
        </div>
      </div>
      <div class="campo portada">
        <div class="label"><?php echo $model->getAttributeLabel('portada'); ?></div>
        <div class="value"><?php echo $model->portadaTexto(); ?></div>
      </div>
    </div>

    <div class="fila">
      <?php if(in_array('texto', $campos)): ?>
      <div class="campo texto">
        <div class="label"><?php echo $model->getAttributeLabel('texto'); ?></div>
        <div class="value"><?php echo $model->texto; ?></div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('resumen', $campos)): ?>
      <div class="campo resumen">
        <div class="label"><?php echo $model->getAttributeLabel('resumen'); ?></div>
        <div class="value"><?php echo $model->resumen; ?></div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('video', $campos)): ?>
      <div class="campo video grande">
        <div class="label"><?php echo $model->getAttributeLabel('video'); ?></div>
        <div class="value"><?php echo $model->video; ?></div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('fecha_publicacion', $campos)): ?>
      <div class="campo fecha_publicacion">
        <div class="label"><?php echo $model->getAttributeLabel('fecha_publicacion'); ?></div>
        <div class="value"><?php echo $model->fecha_publicacion; ?></div>
      </div>
      <?php endif; ?>
      <?php if(in_array('fecha_edicion', $campos)): ?>
      <div class="campo fecha_edicion">
        <div class="label"><?php echo $model->getAttributeLabel('fecha_edicion'); ?></div>
        <div class="value"><?php echo $model->fecha_edicion; ?></div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila grande">
      <?php if(in_array('imagenes', $campos)): ?>
      <div class="campo imagenes grande">
        <div class="label"><?php echo $model->getAttributeLabel('imagenes'); ?></div>
        <div id="previsualizacion" class="value grande">
          <?php foreach ($model->imagenes as $imagen) { ?>
          <div class="preview">
            <img src="<?php echo BASE_URL . "{$model->pathImagen()}/{$imagen->filename}"; ?>" alt="">
            <a class="eliminar-imagen" href="<?php echo $this->createUrl('/admin/imagen/eliminar', array('id'=>$imagen->id)) ?>"></a>
          </div>
          <?php } ?>
        </div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('miniatura', $campos)): ?>
      <div class="campo miniatura">
        <div class="label"><?php echo $model->getAttributeLabel('miniatura'); ?></div>
        <div class="value grande">
          <img width="50%" src="<?php echo $model->pathFileAttribute('miniatura') ?>" alt="">
        </div>
      </div>
      <?php endif; ?>
    </div>

  </div>

</div>


<script>
  $(function() {
    $('.eliminar-imagen').on('click', function(e) {
      if( confirm('¿Está seguro de eliminar la imagen?') ) {
        a = $(this);
        $.ajax({
          url: a.attr('href'),
          method: 'POST',
          beforeSend: function () {
            console.log('beforeSend');
          },
          success: function () {
            a.parent().remove();
            console.log('success');
          },
          error: function () {
            console.log('error');
          },
          complete: function () {
            console.log('complete');
          },
        });
      }
      e.preventDefault();
    });
  });
</script>
