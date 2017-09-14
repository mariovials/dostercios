<?php
/**
 * @var $this ParametroController * @var $model Parametro * @var $form ActiveForm
 */
$this->cargar_jquery();
?>
<div class="set">
  <div class="fila">
    <div class="campo">
      <div class="label">
      <?php echo $form->labelEx($model, 'nombre'); ?>
      </div>
      <?php echo $form->description($model, 'nombre'); ?>
      <div class="value">
      <?php echo $form->textField($model, 'nombre',
        array('size'=>60,'maxlength'=>255)); ?>
      </div>
      <?php echo $form->suggestion($model, 'nombre'); ?>
      <?php echo $form->error($model, 'nombre'); ?>
    </div>
  </div>

  <?php if($model->isNewRecord) { ?>
  <div class="fila">
    <div class="campo">
      <div class="label">
      <?php echo $form->labelEx($model, 'codigo'); ?>
      </div>
      <?php echo $form->description($model, 'codigo'); ?>
      <div class="value">
      <?php echo $form->textField($model, 'codigo',
        array('size'=>30,'maxlength'=>30)); ?>
      </div>
      <?php echo $form->suggestion($model, 'codigo'); ?>
      <?php echo $form->error($model, 'codigo'); ?>
    </div>
  </div>
  <?php } ?>

  <div class="fila">
    <?php if($model->isNewRecord) { ?>
    <div class="campo">
      <div class="label">
      <?php echo $form->labelEx($model, 'tipo'); ?>
      </div>
      <?php echo $form->description($model, 'tipo'); ?>
      <div class="value">
      <?php echo $form->dropDownList($model,'tipo', $model->tiposPhpLD,
        array('empty'=>'Seleccione tipo...')); ?>
      </div>
      <?php echo $form->suggestion($model, 'tipo'); ?>
      <?php echo $form->error($model, 'tipo'); ?>
    </div>
    <?php } ?>
    <div class="campo">
      <div class="label">
      <?php echo $form->labelEx($model, 'valor'); ?>
      </div>
      <?php echo $form->description($model, 'valor'); ?>
      <div class="value">
      <?php echo $form->textfield($model, 'valor',
        array('size'=>60,'maxlength'=>2000, 'class'=>$model->tipo)); ?>
      </div>
      <?php echo $form->suggestion($model, 'valor'); ?>
      <?php echo $form->error($model, 'valor'); ?>
    </div>
  </div>
</div>


<script>
</script>
