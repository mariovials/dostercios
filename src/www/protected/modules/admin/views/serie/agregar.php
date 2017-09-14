<?php
/* @var $this SerieController */
/* @var $model Serie */

$this->breadcrumbs=array(
  'Series'=>array('/serie/index'),
  'Agregar',
);

$this->menu = array(
  array('label'=>'Lista de Series',
    'url'=>array('/admin/serie'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),
);
?>

<div id="serie-agregar">

  <div id="contenido-head">
    <h1>Agregar Serie</h1>
  </div>

  <div id="contenido-body">

    <?php echo $this->renderPartial('_form', array(
      'model'=>$model,
      'attributes'=>array(
        'titulo',
        'texto',
        'fecha_publicacion',
        'imagen',
      ),
    )); ?>

  </div>

</div>
