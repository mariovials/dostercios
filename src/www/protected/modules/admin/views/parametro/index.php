<?php
/* @var $this ParametroController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
  'Parametros',
);

$this->menu = array(
  array('label'=>'Agregar Parametro',
    'url'=>array('/admin/parametro/agregar'),
    'linkOptions'=>array('class'=>'agregar accion')
  ),
  array('linkOptions'=>array('class'=>'separador')),
);
?>

<div id="admin/parametro-index">

  <div id="contenido-head">
    <h1>Parametros</h1>
  </div>

  <div id="contenido-body">
    <div class="lista parametro admin">
    <?php $this->widget('zii.widgets.CListView', array(
      'dataProvider'=>$dataProvider,
      'itemView'=>'_lista',
    )); ?>
    </div>
  </div>

</div>
