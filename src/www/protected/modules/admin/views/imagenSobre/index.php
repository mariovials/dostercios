<?php
/* @var $this ImagenPortadaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
  'Imágenes Sobre Dostercios',
);

$this->menu = array(
  array('label'=>'Agregar Imágen Sobre Dostercios',
    'url'=>array('/admin/imagen-sobre/agregar'),
    'linkOptions'=>array('class'=>'agregar accion')
  ),
);
?>

<div id="imagen-sobre-index">

  <div id="contenido-head">
    <h1>Imágenes Sobre Dostercios</h1>
  </div>

  <div id="contenido-body">
    <div class="lista imagen-sobre admin">
    <?php $this->widget('zii.widgets.CListView', array(
      'dataProvider'=>$dataProvider,
      'itemView'=>'_lista',
    )); ?>
    </div>
  </div>

</div>
