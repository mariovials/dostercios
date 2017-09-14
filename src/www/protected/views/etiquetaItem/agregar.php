<?php
/* @var $this EtiquetaItemController */
/* @var $model EtiquetaItem */

$this->breadcrumbs=array(
	'Etiqueta Items'=>array('index'),
	'Crear',
);

$this->menu = array(
  array('label'=>'Lista de EtiquetaItem', 'url'=>array('index'),
    'linkOptions'=>array('class'=>'lista')),
);
?>

<div id="etiqueta-item-administrar">

  <h1>Agregar EtiquetaItem</h1>

  <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
