<?php
/* @var $this ImagenItemController */
/* @var $model ImagenItem */

$this->breadcrumbs=array(
	'Imagen Items'=>array('index'),
	$model->id,
);

$this->menu = array(
  array('label'=>'Lista de ImagenItem', 'url'=>array('index'),
    'linkOptions'=>array('class'=>'lista')),
  array('label'=>'Agregar ImagenItem', 'url'=>array('agregar'),
    'linkOptions'=>array('class'=>'agregar')),
	array('label'=>'Editar ImagenItem', 'url'=>array('editar', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'editar')),
	array('label'=>'Eliminar ImagenItem', 'url'=>'#', 'linkOptions'=>array('class'=>'eliminar','submit'=>array('eliminar','id'=>$model->id),'confirm'=>'¿Estás seguro de eliminar?')),
);
?>

<div id="imagen-item-ver">

  <h1>Detalle de ImagenItem <?php echo $model->id; ?></h1>

  <?php
  $this->renderPartial('_ficha', array('model'=>$model));
  ?>

</div>
