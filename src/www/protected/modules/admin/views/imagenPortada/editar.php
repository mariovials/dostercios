<?php
/* @var $this ImagenPortadaController */
/* @var $model ImagenPortada */

$this->breadcrumbs=array(
  'Imágenes Portada'=>array('/imagen-portada/index'),
  $model->id=>array('/imagen-portada/ver','id'=>$model->id),
  'Editar',
);

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

  array('label'=>'Ver Imágen Portada',
    'url'=>array('/imagen-portada/ver', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="imagen-portada-editar">

  <div id="contenido-head">
    <h1>Editar ImagenPortada</h1>
  </div>

  <div id="contenido-body">

    <?php echo $this->renderPartial('_form', array(
      'model'=>$model,
      'attributes'=>array(
        'imagen',
      ),
    )); ?>

  </div>

</div>
