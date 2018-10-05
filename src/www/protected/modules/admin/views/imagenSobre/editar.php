<?php
/* @var $this ImagenPortadaController */
/* @var $model ImagenPortada */

$this->breadcrumbs=array(
  'Imágenes Sobre Dostercios'=>array('/imagen-sobre/index'),
  $model->id=>array('/imagen-sobre/ver','id'=>$model->id),
  'Editar',
);

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

  array('label'=>'Ver Imágen Sobre Dostercios',
    'url'=>array('/imagen-sobre/ver', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="imagen-sobre-editar">

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
