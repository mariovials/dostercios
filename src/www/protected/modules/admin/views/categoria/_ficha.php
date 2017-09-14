<?php
if(!isset($acciones))
  $acciones = array();
if(!isset($campos))
  $campos = array_keys($model->attributes);
?>

<div class="ficha categoria">

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
      <?php if(in_array('nombre', $campos)): ?>
      <div class="campo nombre">
        <div class="label"><?php echo $model->getAttributeLabel('nombre'); ?></div>
        <div class="value"><?php echo $model->nombre; ?></div>
      </div>
      <?php endif; ?>
    </div>

  </div>

</div>
