<?php
/* @var $this EtiquetaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Etiquetas',
);

$this->menu = array(
  array('label'=>'Agregar Etiqueta', 'url'=>array('agregar'),
    'linkOptions'=>array('class'=>'agregar')),
);
?>

<div id="etiqueta-index">

  <h1>Etiquetas</h1>

  <div class="lista etiqueta admin">

  <?php $this->widget('zii.widgets.CListView', array(
  	'dataProvider'=>$dataProvider,
  	'itemView'=>'_lista',
  )); ?>

  </div>

</div>
