<?php
/* @var $this CapituloController */
/* @var $model Capitulo */

$this->menu = array(
  array('label'=>'Agregar Capítulo',
    'url'=>array('/admin/capitulo/agregar', 'id'=>$model->serie_id),
    'linkOptions'=>array('class'=>'agregar accion'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Editar Capítulo',
    'url'=>array('/admin/capitulo/editar', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'editar accion'),
  ),
  array('label'=>'Eliminar Capítulo',
    'url'=>'#',
    'linkOptions'=>array('class'=>'eliminar accion',
      'submit'=>array('/admin/capitulo/eliminar', 'id'=>$model->id),
      'confirm'=>'¿Estás seguro de eliminar?'
  )),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver en sitio',
    'url'=>array($model->url()),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="capitulo-ver">

  <div id="contenido-head">
    <h1><?php echo $model->titulo ?></h1>
  </div>

  <div id="contenido-body">

    <?php $this->renderPartial('_ficha', array(
      'model' => $model,
      'campos' => array(
        'serie_id',
        'titulo',
        'texto',
        'video',
        'fecha_publicacion',
        'fecha_edicion',
        'miniatura',
        'resumen',
        'imagenes',
        'orden',
      ),
    )); ?>

  </div>

</div>
