<?php
/* @var $this SerieController */
/* @var $model Serie */

$this->breadcrumbs=array(
  'Series'=>array('/serie/index'),
  $model->id=>array('/serie/ver','id'=>$model->id),
  'Editar',
);

$this->menu = array(
  array('label'=>'Agregar Serie',
    'url'=>array('/admin/serie/agregar'),
    'linkOptions'=>array('class'=>'agregar accion'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Lista de Series',
    'url'=>array('/admin/serie'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver Serie',
    'url'=>array('/admin/serie/ver', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="serie-editar">

  <div id="contenido-head">
    <h1>Editar Serie</h1>
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
