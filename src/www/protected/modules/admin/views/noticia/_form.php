<?php
/* @var $this NoticiaController */
/* @var $model Noticia */
/* @var $form CActiveForm */

if(!isset($attributes))
  $attributes = array_keys($model->attributes);
?>

<div class="form noticia">

<?php $form=$this->beginWidget('ActiveForm', array(
  'id'=>'noticia-form',
  'enableAjaxValidation'=>false,
  'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>

  <p class="note">Campos con <span class="required">*</span> son necesarios.</p>

  <?php echo $form->errorSummary($model); ?>

  <?php
  $this->renderPartial('_fields', array(
    'form'=>$form,
    'model'=>$model,
    'attributes' => $attributes,
    'transaccion' => $transaccion,
  ));
  ?>

    <div class="fila botones">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar',
      array('class'=>'confirmar')); ?>
    <?php
      if($model->isNewRecord)
        echo CHtml::link('Cancelar', array('/admin/noticia'));
      else
        echo CHtml::link('Cancelar', array('/admin/noticia/ver',
        'id'=>$model->id));
    ?>
  </div>

<?php $this->endWidget(); ?>

</div>
