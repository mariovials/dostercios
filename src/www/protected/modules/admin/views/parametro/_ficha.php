<?php
if(!isset($acciones))
  $acciones = array();
if(!isset($campos))
  $campos = array_keys($model->attributes);
?>

<div class="ficha parametro">

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

    <div class="fila">
      <?php if(in_array('codigo', $campos)): ?>
      <div class="campo codigo">
        <div class="label"><?php echo $model->getAttributeLabel('codigo'); ?></div>
        <div class="value"><?php echo $model->codigo; ?></div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('tipo', $campos)): ?>
      <div class="campo tipo">
        <div class="label"><?php echo $model->getAttributeLabel('tipo'); ?></div>
        <div class="value"><?php echo $model->tipo; ?></div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('valor', $campos)): ?>
      <div class="campo valor">
        <div class="label"><?php echo $model->getAttributeLabel('valor'); ?></div>
        <div class="value"><?php echo $model->valor; ?></div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('descripcion', $campos)): ?>
      <div class="campo descripcion">
        <div class="label"><?php echo $model->getAttributeLabel('descripcion'); ?></div>
        <div class="value"><?php echo nl2br($model->descripcion); ?></div>
      </div>
      <?php endif; ?>
    </div>

  </div>

</div>
