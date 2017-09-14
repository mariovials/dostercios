<?php
/* @var $this EtiquetaItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Etiqueta Items',
);

$this->menu = array(
  array('label'=>'Agregar EtiquetaItem', 'url'=>array('agregar'),
    'linkOptions'=>array('class'=>'agregar')),
);
?>

<div id="etiqueta-item-index">

  <h1>Etiqueta Items</h1>

  <div class="lista etiqueta-item admin">

  <?php $this->widget('zii.widgets.CListView', array(
  	'dataProvider'=>$dataProvider,
  	'itemView'=>'_lista',
  )); ?>

  </div>

</div>
