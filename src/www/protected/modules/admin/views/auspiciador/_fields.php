<?php
/**
 * @var $this AuspiciadorController
 * @var $model Auspiciador
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
      <?php echo $form->textField($model, 'nombre', array('size'=>60,'maxlength'=>200)); ?>
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
      <?php echo $form->textArea($model, 'descripcion',
        array('rows'=>6, 'cols'=>60)); ?>
      </div>
      <?php echo $form->suggestion($model, 'descripcion'); ?>
      <?php echo $form->error($model, 'descripcion'); ?>
    </div>
    <?php endif; ?>

  </div>

  <div class="fila">

    <?php if(in_array('imagen', $attributes)): ?>
    <div class="campo imagen">
      <div class="label">
      <?php echo $form->labelEx($model, 'imagen'); ?>
      </div>
      <?php echo $form->description($model, 'imagen'); ?>
      <div class="value">
      <?php echo $form->fileField($model, 'imagen'); ?>
      </div>
      <?php echo $form->suggestion($model, 'imagen'); ?>
      <?php echo $form->error($model, 'imagen'); ?>
    </div>
    <?php endif; ?>

  </div>

  <div class="fila">

    <?php if(in_array('fecha_creacion', $attributes)): ?>
    <div class="campo fecha_creacion">
      <div class="label">
      <?php echo $form->labelEx($model, 'fecha_creacion'); ?>
      </div>
      <?php echo $form->description($model, 'fecha_creacion'); ?>
      <div class="value">
      <?php echo $form->textField($model,'fecha_creacion'); ?>
      </div>
      <?php echo $form->suggestion($model, 'fecha_creacion'); ?>
      <?php echo $form->error($model, 'fecha_creacion'); ?>
    </div>
    <?php endif; ?>

    <?php if(in_array('fecha_edicion', $attributes)): ?>
    <div class="campo fecha_edicion">
      <div class="label">
      <?php echo $form->labelEx($model, 'fecha_edicion'); ?>
      </div>
      <?php echo $form->description($model, 'fecha_edicion'); ?>
      <div class="value">
      <?php echo $form->textField($model,'fecha_edicion'); ?>
      </div>
      <?php echo $form->suggestion($model, 'fecha_edicion'); ?>
      <?php echo $form->error($model, 'fecha_edicion'); ?>
    </div>
    <?php endif; ?>

  </div>

</div>
