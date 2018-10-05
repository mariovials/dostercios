<?php
/**
 * @var $this ImagenPortadaController
 * @var $model ImagenPortada
 * @var $form ActiveForm
 */
if(!isset($attributes))
  $attributes = array_keys($model->attributes);
?>
<div class="set">


  <div class="fila">

    <?php if(in_array('imagen', $attributes)): ?>
    <div class="campo imagen">
      <div class="label">
      <?php echo $form->labelEx($model, 'imagen'); ?>
      </div>
      <?php echo $form->description($model, 'imagen'); ?>
      <div class="value">
      <?php echo $form->fileField($model, 'imagen',
        array('multiple' => 'multiple', )); ?>
      </div>
      <?php echo $form->suggestion($model, 'imagen'); ?>
      <?php echo $form->error($model, 'imagen'); ?>
    </div>
    <?php endif; ?>

  </div>

</div>
