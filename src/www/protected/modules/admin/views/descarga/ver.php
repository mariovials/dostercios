<?php
/* @var $this DescargaController */
/* @var $model Descarga */

$this->breadcrumbs=array(
  'Descargas'=>array('/descarga/index'),
  $model->id,
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

  array('label'=>'Editar Descarga',
    'url'=>array('/admin/descarga/editar', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'editar accion'),
  ),
  array('label'=>'Eliminar Descarga',
    'url'=>'#',
    'linkOptions'=>array('class'=>'eliminar accion',
      'submit'=>array('/admin/descarga/eliminar', 'id'=>$model->id),
      'confirm'=>'¿Estás seguro de eliminar?'
  )),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver en sitio',
    'url'=>array('descarga'),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="descarga-ver">

  <div id="contenido-head">
    <h1><?php echo $model->titulo ?></h1>
  </div>

  <div id="contenido-body">

    <?php $this->renderPartial('_ficha', array(
      'model' => $model,
      'campos' => array(
        'nombre',
        'descripcion',
        'icono',
      ),
    )); ?>

  </div>

</div>
