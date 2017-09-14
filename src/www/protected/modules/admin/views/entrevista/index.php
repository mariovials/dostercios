<?php
/* @var $this EntrevistaController */
/* @var $dataProvider CActiveDataProvider */

$this->menu = array(
  array('label'=>'Agregar Entrevista',
    'url'=>array('/admin/entrevista/agregar'),
    'linkOptions'=>array('class'=>'agregar')),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver en sitio', 'url'=>array('/entrevistas'),
    'linkOptions'=>array('class'=>'ver')),
);
?>

<div id="entrevista-index">

  <h1>Entrevistas</h1>

  <div class="lista entrevista admin">

    <div class="lista entrevista admin">
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
