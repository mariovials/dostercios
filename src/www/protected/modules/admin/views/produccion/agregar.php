<?php
/* @var $this ProduccionController */
/* @var $model Produccion */

$this->breadcrumbs=array(
	'Producciones'=>array('index'),
	'Crear',
);

$this->menu = array(
  array('label'=>'Lista de Producciones',
    'url'=>array('/admin/produccion'),
    'linkOptions'=>array('class'=>'lista')),
);
?>

<div id="produccion-administrar">

  <h1>Agregar Producción</h1>

  <?php echo $this->renderPartial('_form', array(
    'model'=>$model,
    'transaccion'=>$transaccion,
  )); ?>
</div>
