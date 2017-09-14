<?php
/* @var $this PublicacionController */
/* @var $model Publicación */

$this->breadcrumbs=array(
  'Publicaciones'=>array('/publicacion/index'),
  $model->titulo=>array('/publicacion/ver','id'=>$model->id),
  'Editar',
);

$this->menu = array(
  array('label'=>'Agregar Publicación',
    'url'=>array('/admin/publicacion/agregar'),
    'linkOptions'=>array('class'=>'agregar accion'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Lista de Publicaciones',
    'url'=>array('/admin/publicacion/'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver Publicación',
    'url'=>array('/admin/publicacion/ver', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="publicacion-editar">

  <div id="contenido-head">
    <h1>Editar Publicación</h1>
  </div>

  <div id="contenido-body">

    <?php echo $this->renderPartial('_form', array(
      'model'=>$model,
      'attributes'=>array(
        'titulo',
        'archivo',
        'insercion',
        'visor',
        'resumen',
        'informacion',
        'fecha_publicacion',
        'fecha_edicion',
        'miniatura',
        'resumen_miniatura',
        'url',
      ),
    )); ?>

  </div>

</div>
