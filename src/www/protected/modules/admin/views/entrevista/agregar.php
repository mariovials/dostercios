<?php
/* @var $this EntrevistaController */
/* @var $model Entrevista */

$this->breadcrumbs=array(
	'Entrevistas'=>array('index'),
	'Crear',
);

$this->menu = array(
  array('label'=>'Lista de Entrevista',
    'url'=>array('/admin/entrevista'),
    'linkOptions'=>array('class'=>'lista')),
);
?>

<div id="entrevista-administrar">

  <h1>Agregar Entrevista</h1>

  <?php echo $this->renderPartial('_form', array(
    'model'=>$model,
    'transaccion'=>$transaccion,
  )); ?>
</div>
