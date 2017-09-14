<?php
/* @var $this EtiquetaItemController */
/* @var $model EtiquetaItem */

$this->breadcrumbs=array(
	'Etiqueta Items'=>array('index'),
	$model->id=>array('ver','id'=>$model->id),
	'Editar',
);

$this->menu = array(
  array('label'=>'Lista EtiquetaItem', 'url'=>array('index'),
    'linkOptions'=>array('class'=>'lista')),
  array('label'=>'Agregar EtiquetaItem', 'url'=>array('agregar'),
    'linkOptions'=>array('class'=>'agregar')),
  array('label'=>'Ver EtiquetaItem', 'url'=>array('ver', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'ver')),
);
?>
<div id="etiqueta-item-editar">

  <h1>Editar EtiquetaItem <?php echo $model->id; ?></h1>

  <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
