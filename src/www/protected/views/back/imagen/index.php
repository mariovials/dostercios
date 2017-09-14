<?php
/* @var $this ImagenController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
  'Imagens',
);

$this->menu = array(
  array('label'=>'Agregar Imagen',
    'url'=>array('/imagen/agregar'),
    'linkOptions'=>array('class'=>'agregar accion')
  ),
  array('linkOptions'=>array('class'=>'separador')),
);
?>

<div id="imagen-index">

  <div id="contenido-head">
    <h1>Imagens</h1>
  </div>

  <div id="contenido-body">
    <div class="lista imagen admin">
    <?php $this->widget('zii.widgets.CListView', array(
      'dataProvider'=>$dataProvider,
      'itemView'=>'_lista',
    )); ?>
    </div>
  </div>

</div>
