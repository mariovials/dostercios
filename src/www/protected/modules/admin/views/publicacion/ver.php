<?php
/* @var $this PublicacionController */
/* @var $model Publicacion */

$this->breadcrumbs=array(
  'Publicaciones'=>array('/publicacion'),
  $model->titulo,
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

  array('label'=>'Editar Publicación',
    'url'=>array('/admin/publicacion/editar', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'editar accion'),
  ),
  array('label'=>'Eliminar Publicación',
    'url'=>'#',
    'linkOptions'=>array('class'=>'eliminar accion',
      'submit'=>array('/admin/publicacion/eliminar', 'id'=>$model->id),
      'confirm'=>'¿Estás seguro de eliminar?'
  )),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver en sitio',
    'url'=>array('/publicacion/' . $model->url),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="publicacion-ver">

  <div id="contenido-head">
    <h1><?php echo $model->titulo ?></h1>
  </div>

  <div id="contenido-body">

    <?php $this->renderPartial('_ficha', array(
      'model' => $model,
      'campos' => array(
        'titulo',
        'archivo',
        'insercion',
        'visor',
        'resumen',
        'informacion',
        'fecha_publicacion',
        'fecha_edicion',
        'miniatura',
        'url',

        'etiquetas',
        'descargas',
      ),
    )); ?>

  </div>

</div>
