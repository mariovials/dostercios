<?php
/**
 * @var $this EtiquetaController * @var $model Etiqueta * @var $form ActiveForm
 */
?>
<div class="set">
  <div class="fila">
    <div class="campo">
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
  </div>


</div>