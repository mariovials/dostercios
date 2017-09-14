<?php
/* @var $this EtiquetaController */
/* @var $model Etiqueta */

$this->breadcrumbs=array(
	'Etiquetas'=>array('index'),
	$model->id,
);

$this->menu = array(
  array('label'=>'Lista de Etiqueta', 'url'=>array('index'),
    'linkOptions'=>array('class'=>'lista')),
  array('label'=>'Agregar Etiqueta', 'url'=>array('agregar'),
    'linkOptions'=>array('class'=>'agregar')),
	array('label'=>'Editar Etiqueta', 'url'=>array('editar', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'editar')),
	array('label'=>'Eliminar Etiqueta', 'url'=>'#', 'linkOptions'=>array('class'=>'eliminar','submit'=>array('eliminar','id'=>$model->id),'confirm'=>'¿Estás seguro de eliminar?')),
);
?>

<div id="etiqueta-ver">

  <h1>Detalle de Etiqueta <?php echo $model->id; ?></h1>

  <?php
  $this->renderPartial('_ficha', array('model'=>$model));
  ?>

</div>
