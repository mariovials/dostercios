<?php
/**
 * @var $this DescargaController
 * @var $model Descarga
 * @var $form ActiveForm
 */
if(!isset($attributes))
  $attributes = array_keys($model->attributes);
?>
<div class="set">


  <div class="fila">

    <?php if(in_array('nombre', $attributes)): ?>
    <div class="campo nombre">
      <div class="label">
      <?php echo $form->labelEx($model, 'nombre'); ?>
      </div>
      <?php echo $form->description($model, 'nombre'); ?>
      <div class="value">
      <?php echo $form->textField($model, 'nombre', array('size'=>60,'maxlength'=>2000)); ?>
      </div>
      <?php echo $form->suggestion($model, 'nombre'); ?>
      <?php echo $form->error($model, 'nombre'); ?>
    </div>
    <?php endif; ?>

  </div>

  <div class="fila">

    <?php if(in_array('descripcion', $attributes)): ?>
    <div class="campo descripcion">
      <div class="label">
      <?php echo $form->labelEx($model, 'descripcion'); ?>
      </div>
      <?php echo $form->description($model, 'descripcion'); ?>
      <div class="value">
      <?php echo $form->textArea($model, 'descripcion', array('rows'=>6, 'cols'=>50)); ?>
      </div>
      <?php echo $form->suggestion($model, 'descripcion'); ?>
      <?php echo $form->error($model, 'descripcion'); ?>
    </div>
    <?php endif; ?>

  </div>

  <div class="fila">

    <?php if(in_array('icono', $attributes)): ?>
    <div class="campo icono">
      <div class="label">
      <?php echo $form->labelEx($model, 'icono'); ?>
      </div>
      <?php echo $form->description($model, 'icono'); ?>
      <div class="value">
      <?php echo $form->fileField($model, 'icono'); ?>
      </div>
      <?php echo $form->suggestion($model, 'icono'); ?>
      <?php echo $form->error($model, 'icono'); ?>
    </div>
    <?php endif; ?>

  </div>

</div>
