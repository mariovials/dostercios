<?php
/* @var $this EtiquetaItemController */
/* @var $model EtiquetaItem */

$this->breadcrumbs=array(
	'Etiqueta Items'=>array('index'),
	$model->id,
);

$this->menu = array(
  array('label'=>'Lista de EtiquetaItem', 'url'=>array('index'),
    'linkOptions'=>array('class'=>'lista')),
  array('label'=>'Agregar EtiquetaItem', 'url'=>array('agregar'),
    'linkOptions'=>array('class'=>'agregar')),
	array('label'=>'Editar EtiquetaItem', 'url'=>array('editar', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'editar')),
	array('label'=>'Eliminar EtiquetaItem', 'url'=>'#', 'linkOptions'=>array('class'=>'eliminar','submit'=>array('eliminar','id'=>$model->id),'confirm'=>'¿Estás seguro de eliminar?')),
);
?>

<div id="etiqueta-item-ver">

  <h1>Detalle de EtiquetaItem <?php echo $model->id; ?></h1>

  <?php
  $this->renderPartial('_ficha', array('model'=>$model));
  ?>

</div>
