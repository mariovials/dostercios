<?php
/* @var $this ProduccionController */
/* @var $model Produccion */

$this->menu = array(

  array('label'=>'Agregar Producción',
    'url'=>array('/admin/produccion/agregar'),
    'linkOptions'=>array('class'=>'agregar')),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Lista de Producciones',
    'url'=>array('/admin/produccion'),
    'linkOptions'=>array('class'=>'lista')),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver Producción', 'url'=>array('ver', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'ver')),
);
?>
<div id="produccion-editar">

  <h1>Editar Producción</h1>

  <?php echo $this->renderPartial('_form', array(
    'model'=>$model,
    'transaccion'=>$transaccion,
  )); ?>

</div>
