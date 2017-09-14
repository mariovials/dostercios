<?php
if(!isset($acciones))
  $acciones = array();
if(!isset($campos))
  $campos = array_keys($model->attributes);
?>

<div class="ficha auspiciador">

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
      <?php if(in_array('descripcion', $campos)): ?>
      <div class="campo descripcion">
        <div class="label"><?php echo $model->getAttributeLabel('descripcion'); ?></div>
        <div class="value"><?php echo $model->descripcion; ?></div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('imagen', $campos)): ?>
      <div class="campo imagen">
        <div class="label"><?php echo $model->getAttributeLabel('imagen'); ?></div>
        <div class="value">
          <img width="100%" src="<?php echo $model->pathFileAttribute('imagen'); ?>" alt="<?php echo $model->imagen ?>">
        </div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('fecha_creacion', $campos)): ?>
      <div class="campo fecha_creacion">
        <div class="label"><?php echo $model->getAttributeLabel('fecha_creacion'); ?></div>
        <div class="value"><?php echo $model->fecha_creacion; ?></div>
      </div>
      <?php endif; ?>
      <?php if(in_array('fecha_edicion', $campos)): ?>
      <div class="campo fecha_edicion">
        <div class="label"><?php echo $model->getAttributeLabel('fecha_edicion'); ?></div>
        <div class="value"><?php echo $model->fecha_edicion; ?></div>
      </div>
      <?php endif; ?>
    </div>

  </div>

</div>
