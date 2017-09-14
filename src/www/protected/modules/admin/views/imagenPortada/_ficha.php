<?php
if(!isset($acciones))
  $acciones = array();
if(!isset($campos))
  $campos = array_keys($model->attributes);

?>

<div class="ficha imagen-portada">

  <div class="datos">

    <div class="fila">
      <?php if(in_array('id', $campos)): ?>
      <div class="campo id">
        <div class="label"><?php echo $model->getAttributeLabel('id'); ?></div>
        <div class="value"><?php echo $model->id; ?></div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila grande">
      <?php if(in_array('imagen', $campos)): ?>
      <div class="campo imagen grande">
        <div class="label"><?php echo $model->getAttributeLabel('imagen'); ?></div>
        <div class="value">
          <img src="<?php echo $model->pathFileAttribute('imagen'); ?>" alt="">
        </div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('imagen', $campos)): ?>
      <div class="campo imagen">
        <div class="label"><?php echo $model->getAttributeLabel('archivo'); ?></div>
        <div class="value"><?php echo $model->imagen; ?></div>
      </div>
      <?php endif; ?>
    </div>

  </div>

</div>
