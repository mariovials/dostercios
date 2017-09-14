<?php
/* @var $this ImagenPortadaController */
/* @var $model ImagenPortada */

$this->menu = array(
  array('label'=>'Agregar Imágen Portada',
    'url'=>array('/admin/imagen-portada/agregar'),
    'linkOptions'=>array('class'=>'agregar accion'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Lista de Imágenes Portada',
    'url'=>array('/admin/imagen-portada'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Editar Imágen Portada',
    'url'=>array('/admin/imagen-portada/editar', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'editar accion'),
  ),
  array('label'=>'Eliminar Imágen Portada',
    'url'=>'#',
    'linkOptions'=>array('class'=>'eliminar accion',
      'submit'=>array('/admin/imagen-portada/eliminar', 'id'=>$model->id),
      'confirm'=>'¿Estás seguro de eliminar?'
  )),
);
?>

<div id="imagen-portada-ver">

  <div id="contenido-head">
    <h1><?php echo $model->titulo ?></h1>
  </div>

  <div id="contenido-body">

    <?php $this->renderPartial('_ficha', array(
      'model' => $model,
      'campos' => array(
        'imagen',
      ),
    )); ?>

  </div>

</div>
