<?php
/* @var $this ImagenPortadaController */
/* @var $model ImagenPortada */

$this->menu = array(
  array('label'=>'Agregar Imágen Sobre Dostercios',
    'url'=>array('/admin/imagen-sobre/agregar'),
    'linkOptions'=>array('class'=>'agregar accion'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Lista de Imágenes Sobre Dostercios',
    'url'=>array('/admin/imagen-sobre'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Editar Imágen Sobre Dostercios',
    'url'=>array('/admin/imagen-sobre/editar', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'editar accion'),
  ),
  array('label'=>'Eliminar Imágen Sobre Dostercios',
    'url'=>'#',
    'linkOptions'=>array('class'=>'eliminar accion',
      'submit'=>array('/admin/imagen-sobre/eliminar', 'id'=>$model->id),
      'confirm'=>'¿Estás seguro de eliminar?'
  )),
);
?>

<div id="imagen-sobre-ver">

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
