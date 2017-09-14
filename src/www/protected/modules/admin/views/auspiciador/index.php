<?php
/* @var $this AuspiciadorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Auspiciadors',
);

$this->menu=array(
  array('label'=>'Agregar Auspiciador', 'url'=>array('agregar'),
    'linkOptions'=>array('class'=>'agregar')),
);
?>

<div id="auspiciador-index">

  <h1>Auspiciadors</h1>

  <div class="lista auspiciador admin">

  <?php $this->widget('zii.widgets.CListView', array(
  	'dataProvider'=>$dataProvider,
  	'itemView'=>'_lista',
  )); ?>

  </div>

</div>
