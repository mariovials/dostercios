<?php
/* @var $this CapituloController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
  'Capitulos',
);

$this->menu = array(
  array('label'=>'Agregar Capitulo',
    'url'=>array('/admin/capitulo/agregar'),
    'linkOptions'=>array('class'=>'agregar accion')
  ),
  array('linkOptions'=>array('class'=>'separador')),
);
?>

<div id="capitulo-index">

  <div id="contenido-head">
    <h1>Capítulos</h1>
  </div>

  <div id="contenido-body">
    <div class="lista capitulo admin">
    <?php $this->widget('zii.widgets.CListView', array(
      'dataProvider'=>$dataProvider,
      'itemView'=>'_lista',
    )); ?>
    </div>
  </div>

</div>
