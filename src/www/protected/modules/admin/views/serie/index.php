<?php
/* @var $this SerieController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
  'Series',
);

$this->menu = array(
  array('label'=>'Agregar Serie',
    'url'=>array('/admin/serie/agregar'),
    'linkOptions'=>array('class'=>'agregar accion')
  ),
  array('linkOptions'=>array('class'=>'separador')),
);
?>

<div id="serie-index">

  <div id="contenido-head">
    <h1>Series</h1>
  </div>

  <div id="contenido-body">
    <div class="lista serie admin">
    <?php
    $dataProvider->pagination->pageSize = 20;
    $dataProvider->sort->defaultOrder = array(
      'fecha_edicion' => CSort::SORT_DESC,
    );
    $this->widget('zii.widgets.CListView', array(
      'dataProvider'=>$dataProvider,
      'itemView'=>'_lista',
      'sortableAttributes'=>array(
        'titulo',
        'fecha_edicion',
      ),
    )); ?>
    </div>
  </div>

</div>
