<?php
/* @var $this EtiquetaItemController */
/* @var $model EtiquetaItem */

$this->breadcrumbs=array(
	'Etiqueta Items'=>array('index'),
	'Administrar',
);

$this->menu = array(
  array('label'=>'Lista de EtiquetaItem', 'url'=>array('index'),
    'linkOptions'=>array('class'=>'lista')),
  array('label'=>'Agregar EtiquetaItem', 'url'=>array('agregar'),
    'linkOptions'=>array('class'=>'agregar')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#etiqueta-item-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div id="etiqueta-item-administrar">

	<h1>Administrar Etiqueta Items</h1>

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
		'id'=>'etiqueta-item-grid',
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
