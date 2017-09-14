<?php
/* @var $this ImagenItemController */
/* @var $model ImagenItem */

$this->breadcrumbs=array(
	'Imagen Items'=>array('index'),
	'Crear',
);

$this->menu = array(
  array('label'=>'Lista de ImagenItem', 'url'=>array('index'),
    'linkOptions'=>array('class'=>'lista')),
);
?>

<div id="imagen-item-administrar">

  <h1>Agregar ImagenItem</h1>

  <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
