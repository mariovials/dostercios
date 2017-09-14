<?php
/* @var $this ParametroController */
/* @var $model Parametro */

$this->breadcrumbs=array(
	'Parámetros'=>array('/parametro'),
	$model->descripcion,
);

$this->menu = array(
  array('label'=>'Lista de Parámetro', 'url'=>array('/parametro'),
    'linkOptions'=>array('class'=>'lista')),
  array('label'=>'Agregar Parámetro', 'url'=>array('/parametro/agregar'),
    'linkOptions'=>array('class'=>'agregar')),
	array('label'=>'Editar Parámetro', 'url'=>array('/parametro/editar', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'editar')),
	// array('label'=>'Eliminar Parámetro', 'url'=>'#', 'linkOptions'=>array('class'=>'eliminar','submit'=>array('/parametro/eliminar','id'=>$model->id),'confirm'=>'¿Estás seguro de eliminar?')),
);
?>

<h1>Detalle de Parámetro "<?php echo $model->nombre; ?>"</h1>

<?php
$this->renderPartial('_ficha', array('model'=>$model));
?>
