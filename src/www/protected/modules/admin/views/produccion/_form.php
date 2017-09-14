<?php
/* @var $this ProduccionController */
/* @var $model Produccion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('ActiveForm', array(
  'id'=>'produccion-form',
  'enableAjaxValidation'=>false,
  'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>

  <p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

  <?php echo $form->errorSummary($model); ?>

  <?php
  $this->renderPartial('_fields', array(
    'form'=>$form,
    'model'=>$model,
    'transaccion'=>$transaccion,
  ));
  ?>

  <div class="fila botones">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar',
      array('class'=>'confirmar')); ?>
    <?php
      if($model->isNewRecord)
        echo CHtml::link('Cancelar', array('/admin/produccion'));
      else
        echo CHtml::link('Cancelar', array('/admin/produccion/ver',
        'id'=>$model->id));
      ?>
  </div>

<?php $this->endWidget(); ?>

</div>
