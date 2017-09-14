<?php
/**
 * @var $this DescargaPublicacionController
 * @var $model DescargaPublicacion
 * @var $form ActiveForm
 */
if(!isset($attributes))
  $attributes = array_keys($model->attributes);
?>
<div class="set">


  <div class="fila">

    <?php if(in_array('publicacion_id', $attributes)): ?>
    <div class="campo publicacion_id">
      <div class="label">
      <?php echo $form->labelEx($model, 'publicacion_id'); ?>
      </div>
      <?php echo $form->description($model, 'publicacion_id'); ?>
      <div class="value">
      <?php echo $form->textField($model,'publicacion_id'); ?>
      </div>
      <?php echo $form->suggestion($model, 'publicacion_id'); ?>
      <?php echo $form->error($model, 'publicacion_id'); ?>
    </div>
    <?php endif; ?>

  </div>

  <div class="fila">

    <?php if(in_array('descarga_id', $attributes)): ?>
    <div class="campo descarga_id">
      <div class="label">
      <?php echo $form->labelEx($model, 'descarga_id'); ?>
      </div>
      <?php echo $form->description($model, 'descarga_id'); ?>
      <div class="value">
      <?php echo $form->textField($model,'descarga_id'); ?>
      </div>
      <?php echo $form->suggestion($model, 'descarga_id'); ?>
      <?php echo $form->error($model, 'descarga_id'); ?>
    </div>
    <?php endif; ?>

  </div>

  <div class="fila">

    <?php if(in_array('texto', $attributes)): ?>
    <div class="campo texto">
      <div class="label">
      <?php echo $form->labelEx($model, 'texto'); ?>
      </div>
      <?php echo $form->description($model, 'texto'); ?>
      <div class="value">
      <?php echo $form->textArea($model, 'texto', array('rows'=>6, 'cols'=>50)); ?>
      </div>
      <?php echo $form->suggestion($model, 'texto'); ?>
      <?php echo $form->error($model, 'texto'); ?>
    </div>
    <?php endif; ?>

  </div>

</div>
