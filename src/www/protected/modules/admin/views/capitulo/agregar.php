<?php
/* @var $this CapituloController */
/* @var $model Capitulo */

$this->menu = array(
  array('label'=>'Ver Serie',
    'url'=>array('/admin/serie/ver', 'id' => $model->serie_id),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),
);
?>

<div id="capitulo-agregar">

  <div id="contenido-head">
    <h1>Agregar Capítulo a Serie <?php echo $model->serie->titulo ?></h1>
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
