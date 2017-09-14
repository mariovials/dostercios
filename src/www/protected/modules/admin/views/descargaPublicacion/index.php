<?php
/* @var $this DescargaPublicacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Descarga Publicacions',
);

$this->menu=array(
  array('label'=>'Agregar DescargaPublicacion', 'url'=>array('agregar'),
    'linkOptions'=>array('class'=>'agregar')),
);
?>

<div id="descarga-publicacion-index">

  <h1>Descarga Publicacions</h1>

  <div class="lista descarga-publicacion admin">

  <?php $this->widget('zii.widgets.CListView', array(
  	'dataProvider'=>$dataProvider,
  	'itemView'=>'_lista',
  )); ?>

  </div>

</div>
