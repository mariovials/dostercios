<?php
/* @var $this ImagenPortadaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
  'Imágenes Portada',
);

$this->menu = array(
  array('label'=>'Agregar Imágen Portada',
    'url'=>array('/admin/imagen-portada/agregar'),
    'linkOptions'=>array('class'=>'agregar accion')
  ),
  array('linkOptions'=>array('class'=>'separador')),
  array('label'=>'Agregar video de Portada',
    'url'=>array('/admin/parametro/editar',
      'id' => 8,
     ),
    'linkOptions'=>array('class'=>'agregar accion')
  ),
);
?>

<div id="imagen-portada-index">

  <div id="contenido-head">
    <h1>Imágenes Portada</h1>
  </div>

  <div id="contenido-body">
    <div class="lista imagen-portada admin">
    <?php $this->widget('zii.widgets.CListView', array(
      'dataProvider'=>$dataProvider,
      'itemView'=>'_lista',
    )); ?>
    </div>
  </div>

</div>
