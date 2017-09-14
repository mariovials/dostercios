<?php
if(!isset($acciones))
  $acciones = array();
if(!isset($campos))
  $campos = array_keys($model->attributes);
?>

<div class="ficha descarga-publicacion">

  <div class="datos">

    <div class="fila">
      <?php if(in_array('id', $campos)): ?>
      <div class="campo id">
        <div class="label"><?php echo $model->getAttributeLabel('id'); ?></div>
        <div class="value"><?php echo $model->id; ?></div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('publicacion_id', $campos)): ?>
      <div class="campo publicacion_id">
        <div class="label"><?php echo $model->getAttributeLabel('publicacion_id'); ?></div>
        <div class="value"><?php echo $model->publicacion_id; ?></div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('descarga_id', $campos)): ?>
      <div class="campo descarga_id">
        <div class="label"><?php echo $model->getAttributeLabel('descarga_id'); ?></div>
        <div class="value"><?php echo $model->descarga_id; ?></div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('texto', $campos)): ?>
      <div class="campo texto">
        <div class="label"><?php echo $model->getAttributeLabel('texto'); ?></div>
        <div class="value"><?php echo $model->texto; ?></div>
      </div>
      <?php endif; ?>
    </div>

  </div>

</div>
