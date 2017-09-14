<?php
/* @var $this DescargaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Descargas',
);

$this->menu=array(
  array('label'=>'Agregar Descarga', 'url'=>array('agregar'),
    'linkOptions'=>array('class'=>'agregar')),
);
?>

<div id="descarga-index">

  <h1>Descargas</h1>

  <div class="lista descarga admin">

  <?php $this->widget('zii.widgets.CListView', array(
  	'dataProvider'=>$dataProvider,
  	'itemView'=>'_lista',
  )); ?>

  </div>

</div>
