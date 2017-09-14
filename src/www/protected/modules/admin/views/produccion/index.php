<?php
/* @var $this ProduccionController */
/* @var $dataProvider CActiveDataProvider */

$this->menu = array(
  array('label'=>'Agregar Producción',
    'url'=>array('/admin/produccion/agregar'),
    'linkOptions'=>array('class'=>'agregar')),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver en sitio', 'url'=>array('/producciones'),
    'linkOptions'=>array('class'=>'ver')),
);
?>

<div id="produccion-index">

  <h1>Producciones</h1>

  <div class="lista produccion admin">

    <div class="lista produccion admin">
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
