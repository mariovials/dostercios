<?php
/* @var $this PublicacionController */
/* @var $model Publicacion */

$this->breadcrumbs=array(
  'Publicaciones'=>array('/publicacion'),
  'Agregar',
);

$this->menu = array(
  array('label'=>'Lista de Publicaciones',
    'url'=>array('/admin/publicacion/'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),
);
?>

<div id="publicacion-agregar">

  <div id="contenido-head">
    <h1>Agregar Publicación</h1>
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
