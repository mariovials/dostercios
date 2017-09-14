<?php
/* @var $this EntrevistaController */
/* @var $model Entrevista */

$this->menu = array(

  array('label'=>'Agregar Entrevista',
    'url'=>array('/admin/entrevista/agregar'),
    'linkOptions'=>array('class'=>'agregar')),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Lista de Entrevista',
    'url'=>array('/admin/entrevista'),
    'linkOptions'=>array('class'=>'lista')),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver Entrevista', 'url'=>array('ver', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'ver')),
);
?>
<div id="entrevista-editar">

  <h1>Editar Entrevista</h1>

  <?php echo $this->renderPartial('_form', array(
    'model'=>$model,
    'transaccion'=>$transaccion,
  )); ?>

</div>
