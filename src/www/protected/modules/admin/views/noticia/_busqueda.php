<?php
/* @var $this NoticiaController */
/* @var $model Noticia */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="campo">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="campo">
		<?php echo $form->label($model,'titulo'); ?>
		<?php echo $form->textField($model, 'titulo', array('size'=>60,'maxlength'=>2000)); ?>
	</div>

	<div class="campo">
		<?php echo $form->label($model,'texto'); ?>
		<?php echo $form->textArea($model, 'texto', array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="campo">
		<?php echo $form->label($model,'video'); ?>
		<?php echo $form->textField($model, 'video', array('size'=>60,'maxlength'=>2000)); ?>
	</div>

	<div class="campo">
		<?php echo $form->label($model,'fecha_publicacion'); ?>
		<?php echo $form->textField($model,'fecha_publicacion'); ?>
	</div>

	<div class="campo">
		<?php echo $form->label($model,'fecha_edicion'); ?>
		<?php echo $form->textField($model,'fecha_edicion'); ?>
	</div>

	<div class="campo">
		<?php echo $form->label($model,'miniatura'); ?>
		<?php echo $form->textField($model, 'miniatura', array('size'=>60,'maxlength'=>2000)); ?>
	</div>

	<div class="campo">
		<?php echo $form->label($model,'resumen'); ?>
		<?php echo $form->textArea($model, 'resumen', array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="botones">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
