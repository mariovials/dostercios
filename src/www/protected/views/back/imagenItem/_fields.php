<?php
/**
 * @var $this ImagenItemController * @var $model ImagenItem * @var $form ActiveForm
 */
?>
<div class="set">
  <div class="fila">
    <div class="campo">
      <div class="label">
      <?php echo $form->labelEx($model, 'tabla_id'); ?>
      </div>
      <?php echo $form->description($model, 'tabla_id'); ?>
      <div class="value">
      <?php echo $form->textField($model,'tabla_id'); ?>
      </div>
      <?php echo $form->suggestion($model, 'tabla_id'); ?>
      <?php echo $form->error($model, 'tabla_id'); ?>
    </div>
  </div>

  <div class="fila">
    <div class="campo">
      <div class="label">
      <?php echo $form->labelEx($model, 'entidad_id'); ?>
      </div>
      <?php echo $form->description($model, 'entidad_id'); ?>
      <div class="value">
      <?php echo $form->textField($model,'entidad_id'); ?>
      </div>
      <?php echo $form->suggestion($model, 'entidad_id'); ?>
      <?php echo $form->error($model, 'entidad_id'); ?>
    </div>
  </div>


</div>