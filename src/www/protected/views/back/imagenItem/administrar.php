<?php
/* @var $this ImagenItemController */
/* @var $model ImagenItem */

$this->breadcrumbs=array(
	'Imagen Items'=>array('index'),
	'Administrar',
);

$this->menu = array(
  array('label'=>'Lista de ImagenItem', 'url'=>array('index'),
    'linkOptions'=>array('class'=>'lista')),
  array('label'=>'Agregar ImagenItem', 'url'=>array('agregar'),
    'linkOptions'=>array('class'=>'agregar')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#imagen-item-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div id="imagen-item-administrar">

	<h1>Administrar Imagen Items</h1>

	<p>
	También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
	o <b>=</b>) al comienzo de cada uno de sus valores de búsqueda para especificar cómo se debe hacer la comparación.
	</p>

	<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
	<div class="search-form" style="display:none">
	<?php $this->renderPartial('_busqueda',array(
		'model'=>$model,
	)); ?>
	</div><!-- search-form -->

	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'imagen-item-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			'id',
		'tabla_id',
		'entidad_id',
			array(
				'class'=>'CButtonColumn',
			),
		),
	)); ?>

</div>
