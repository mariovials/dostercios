<?php
/* @var $this EtiquetaController */
/* @var $model Etiqueta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('ActiveForm', array(
  'id'=>'etiqueta-form',
  'enableAjaxValidation'=>false,
  // 'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>

  <p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

  <?php echo $form->errorSummary($model); ?>
  
  <?php
  $this->renderPartial('_fields', array(
    'form'=>$form,
    'model'=>$model
  ));
  ?>
  
  <div class="fila botones">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar',
      array('class'=>'confirmar')); ?>
    <?php
      if($model->isNewRecord)
        echo CHtml::link('Cancelar', array('/etiqueta'));
      else
        echo CHtml::link('Cancelar', array('/etiqueta/ver',
        'id'=>$model->id));
      ?>
  </div>

<?php $this->endWidget(); ?>

</div>
