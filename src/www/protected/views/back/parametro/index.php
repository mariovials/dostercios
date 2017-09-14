<?php
/* @var $this ParametroController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Parámetros',
);

$this->menu = array(
  array('label'=>'Agregar Parámetro', 'url'=>array('agregar'),
    'linkOptions'=>array('class'=>'agregar')),
);
?>

<h1>Parámetros</h1>

<div class="lista parametro admin">

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_lista',
)); ?>

</div>
