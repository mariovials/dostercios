<?php
/* @var $this ParametroController */
/* @var $model Parametro */

$this->breadcrumbs=array(
	'Parámetros'=>array('/parametro'),
	$model->descripcion=>array('/parametro/ver','id'=>$model->id),
	'Editar',
);

$this->menu = array(
  array('label'=>'Lista Parámetro', 'url'=>array('/parametro'),
    'linkOptions'=>array('class'=>'lista')),
  array('label'=>'Agregar Parámetro', 'url'=>array('/parametro/agregar'),
    'linkOptions'=>array('class'=>'agregar')),
  array('label'=>'Ver Parámetro', 'url'=>array('/parametro/ver', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'ver')),
);
?>

<h1>Editar Parámetro <?php echo $model->nombre; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
