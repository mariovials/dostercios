<?php
/* @var $this ImagenItemController */
/* @var $model ImagenItem */

$this->breadcrumbs=array(
	'Imagen Items'=>array('index'),
	$model->id=>array('ver','id'=>$model->id),
	'Editar',
);

$this->menu = array(
  array('label'=>'Lista ImagenItem', 'url'=>array('index'),
    'linkOptions'=>array('class'=>'lista')),
  array('label'=>'Agregar ImagenItem', 'url'=>array('agregar'),
    'linkOptions'=>array('class'=>'agregar')),
  array('label'=>'Ver ImagenItem', 'url'=>array('ver', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'ver')),
);
?>
<div id="imagen-item-editar">

  <h1>Editar ImagenItem <?php echo $model->id; ?></h1>

  <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
