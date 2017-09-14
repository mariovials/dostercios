<?php
/* @var $this ParametroController */
/* @var $model Parametro */

$this->breadcrumbs=array(
	'Parámetros'=>array('index'),
	'Crear',
);

$this->menu = array(
  array('label'=>'Lista de Parámetros', 'url'=>array('/parametro'),
    'linkOptions'=>array('class'=>'lista')),
);
?>

<h1>Agregar Parámetro</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
