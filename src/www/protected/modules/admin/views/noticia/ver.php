<?php
/* @var $this NoticiaController */
/* @var $model Noticia */

$this->breadcrumbs=array(
  'Noticias'=>array('/noticia/index'),
  $model->id,
);

$this->menu = array(
  array('label'=>'Agregar Noticia',
    'url'=>array('/admin/noticia/agregar'),
    'linkOptions'=>array('class'=>'agregar accion'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Lista de Noticias',
    'url'=>array('/admin/noticia/'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Editar Noticia',
    'url'=>array('/admin/noticia/editar', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'editar accion'),
  ),
  array('label'=>'Eliminar Noticia',
    'url'=>'#',
    'linkOptions'=>array('class'=>'eliminar accion',
      'submit'=>array('/admin/noticia/eliminar', 'id'=>$model->id),
      'confirm'=>'¿Estás seguro de eliminar?'
  )),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver en sitio',
    'url'=>$model->urlCompleta,
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="noticia-ver">

  <div id="contenido-head">
    <h1><?php echo $model->titulo ?></h1>
  </div>

  <div id="contenido-body">

    <?php $this->renderPartial('_ficha', array(
      'model' => $model,
      'campos' => array(
        'titulo',
        'texto',
        'video',
        'fecha_publicacion',
        'fecha_edicion',
        'miniatura',
        'resumen',
        'imagenes',
        'etiquetas',
      ),
    )); ?>

  </div>

</div>
