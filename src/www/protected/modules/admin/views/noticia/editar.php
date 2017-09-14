<?php
/* @var $this NoticiaController */
/* @var $model Noticia */

$this->breadcrumbs=array(
  'Noticias'=>array('/noticia/index'),
  $model->id=>array('/noticia/ver','id'=>$model->id),
  'Editar',
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

  array('label'=>'Ver Noticia',
    'url'=>array('/admin/noticia/ver', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="noticia-editar">

  <div id="contenido-head">
    <h1>Editar Noticia</h1>
  </div>

  <div id="contenido-body">

    <?php echo $this->renderPartial('_form', array(
      'model'=>$model,
      'transaccion' => $transaccion,
      'attributes'=>array(
        'titulo',
        'texto',
        'video',
        'fecha_publicacion',
        'fecha_edicion',
        'miniatura',
        'resumen',
      ),
    )); ?>

  </div>

</div>
