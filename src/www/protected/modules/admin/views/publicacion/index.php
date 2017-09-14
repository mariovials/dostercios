<?php
/* @var $this PublicacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Editorial',
);

$this->menu=array(
  array('label'=>'Agregar Publicación', 'url'=>array('agregar'),
    'linkOptions'=>array('class'=>'agregar')),
);
?>

<div id="publicacion-index">

  <h1>Editorial</h1>

  <div class="lista publicacion admin">

  <?php $this->widget('zii.widgets.CListView', array(
  	'dataProvider'=>$dataProvider,
  	'itemView'=>'_lista',
  )); ?>

  </div>

</div>
