<?php
/**
 * @var $this ImagenController
 * @var $model Imagen
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

</div>
