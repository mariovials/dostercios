<?php
/* @var $this DescargaController */
/* @var $model Descarga */

$this->breadcrumbs=array(
  'Descargas'=>array('/descarga/index'),
  $model->id=>array('/descarga/ver','id'=>$model->id),
  'Editar',
);

$this->menu = array(
  array('label'=>'Agregar Descarga',
    'url'=>array('/admin/descarga/agregar'),
    'linkOptions'=>array('class'=>'agregar accion'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Lista de Descargas',
    'url'=>array('/admin/descarga/'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver Descarga',
    'url'=>array('/admin/descarga/ver', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="descarga-editar">

  <div id="contenido-head">
    <h1>Editar Descarga</h1>
  </div>

  <div id="contenido-body">

    <?php echo $this->renderPartial('_form', array(
      'model'=>$model,
      'attributes'=>array(
        'nombre',
        'descripcion',
        'icono',
      ),
    )); ?>

  </div>

</div>
