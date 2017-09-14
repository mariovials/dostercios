<?php
/* @var $this CapituloController */
/* @var $model Capitulo */

$this->menu = array(
  array('label'=>'Agregar Capítulo',
    'url'=>array('/admin/capitulo/agregar', 'id'=>$model->serie_id),
    'linkOptions'=>array('class'=>'agregar accion'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver Capítulo',
    'url'=>array('/admin/capitulo/ver', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="capitulo-editar">

  <div id="contenido-head">
    <h1>Editar Capítulo</h1>
  </div>

  <div id="contenido-body">

    <?php echo $this->renderPartial('_form', array(
      'model'=>$model,
      'transaccion'=>$transaccion,
      'attributes'=>array(
        'serie_id',
        'titulo',
        'texto',
        'video',
        'fecha_publicacion',
        'miniatura',
      ),
    )); ?>

  </div>

</div>
