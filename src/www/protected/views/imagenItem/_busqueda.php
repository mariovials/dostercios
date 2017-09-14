<?php
/* @var $this ImagenItemController */
/* @var $model ImagenItem */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tabla_id'); ?>
		<?php echo $form->textField($model,'tabla_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entidad_id'); ?>
		<?php echo $form->textField($model,'entidad_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->