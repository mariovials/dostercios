<?php
/* @var $this ImagenItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Imagen Items',
);

$this->menu = array(
  array('label'=>'Agregar ImagenItem', 'url'=>array('agregar'),
    'linkOptions'=>array('class'=>'agregar')),
);
?>

<div id="imagen-item-index">

  <h1>Imagen Items</h1>

  <div class="lista imagen-item admin">

  <?php $this->widget('zii.widgets.CListView', array(
  	'dataProvider'=>$dataProvider,
  	'itemView'=>'_lista',
  )); ?>

  </div>

</div>
