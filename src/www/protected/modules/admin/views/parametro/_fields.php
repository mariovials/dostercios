<?php
/**
 * @var $this ParametroController
 * @var $model Parametro
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
      <?php echo $form->textField($model, 'nombre', array('size'=>80,'maxlength'=>500)); ?>
      </div>
      <?php echo $form->suggestion($model, 'nombre'); ?>
      <?php echo $form->error($model, 'nombre'); ?>
    </div>
    <?php endif; ?>

  </div>

  <div class="fila">

    <?php if(in_array('codigo', $attributes)): ?>
    <div class="campo codigo">
      <div class="label">
      <?php echo $form->labelEx($model, 'codigo'); ?>
      </div>
      <?php echo $form->description($model, 'codigo'); ?>
      <div class="value">
      <?php echo $form->textField($model, 'codigo', array('size'=>80,'maxlength'=>100)); ?>
      </div>
      <?php echo $form->suggestion($model, 'codigo'); ?>
      <?php echo $form->error($model, 'codigo'); ?>
    </div>
    <?php endif; ?>

  </div>

  <div class="fila">

    <?php if(in_array('tipo', $attributes)): ?>
    <div class="campo tipo">
      <div class="label">
      <?php echo $form->labelEx($model, 'tipo'); ?>
      </div>
      <?php echo $form->description($model, 'tipo'); ?>
      <div class="value">
      <?php echo $form->textField($model, 'tipo', array('size'=>10,'maxlength'=>10)); ?>
      </div>
      <?php echo $form->suggestion($model, 'tipo'); ?>
      <?php echo $form->error($model, 'tipo'); ?>
    </div>
    <?php endif; ?>

  </div>

  <div class="fila">

    <?php if(in_array('valor', $attributes)): ?>
    <div class="campo valor">
      <div class="label">
      <?php echo $form->labelEx($model, 'valor'); ?>
      </div>
      <?php echo $form->description($model, 'valor'); ?>
      <div class="value">
      <?php echo $form->textArea($model, 'valor', array('rows'=>6, 'cols'=>80)); ?>
      </div>
      <?php echo $form->suggestion($model, 'valor'); ?>
      <?php echo $form->error($model, 'valor'); ?>
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
      <?php echo $form->textArea($model, 'descripcion', array('rows'=>3, 'cols'=>80)); ?>
      </div>
      <?php echo $form->suggestion($model, 'descripcion'); ?>
      <?php echo $form->error($model, 'descripcion'); ?>
    </div>
    <?php endif; ?>

  </div>

</div>
