<?php
/* @var $this EtiquetaController */
/* @var $model Etiqueta */

$this->breadcrumbs=array(
	'Etiquetas'=>array('index'),
	'Crear',
);

$this->menu = array(
  array('label'=>'Lista de Etiqueta', 'url'=>array('index'),
    'linkOptions'=>array('class'=>'lista')),
);
?>

<div id="etiqueta-administrar">

  <h1>Agregar Etiqueta</h1>

  <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
