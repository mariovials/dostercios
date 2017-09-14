<?php
/* @var $this NoticiaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
  'Noticias',
);

$this->menu = array(
  array('label'=>'Agregar Noticia',
    'url'=>array('/admin/noticia/agregar'),
    'linkOptions'=>array('class'=>'agregar accion')
  ),
  array('linkOptions'=>array('class'=>'separador')),
);
?>

<div id="admin/noticia-index">

  <div id="contenido-head">
    <h1>Noticias</h1>
  </div>

  <div id="contenido-body">
    <div class="lista noticia admin">
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
