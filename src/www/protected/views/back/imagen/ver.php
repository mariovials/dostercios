<?php
/* @var $this ImagenController */
/* @var $model Imagen */

$this->breadcrumbs=array(
  'Imagens'=>array('/imagen/index'),
  $model->id,
);

$this->menu = array(
  array('label'=>'Agregar Imagen',
    'url'=>array('/imagen/agregar'),
    'linkOptions'=>array('class'=>'agregar accion'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Lista de Imagens',
    'url'=>array('/imagen'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Editar Imagen',
    'url'=>array('/imagen/editar', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'editar accion'),
  ),
  array('label'=>'Eliminar Imagen',
    'url'=>'#',
    'linkOptions'=>array('class'=>'eliminar accion',
      'submit'=>array('/imagen/eliminar', 'id'=>$model->id),
      'confirm'=>'¿Estás seguro de eliminar?'
  )),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver en sitio',
    'url'=>array('/imagen'),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="imagen-ver">

  <div id="contenido-head">
    <h1><?php echo $model->titulo ?></h1>
  </div>

  <div id="contenido-body">

    <?php $this->renderPartial('_ficha', array(
      'model' => $model,
      'campos' => array(
        'nombre',
      ),
    )); ?>

  </div>

</div>
