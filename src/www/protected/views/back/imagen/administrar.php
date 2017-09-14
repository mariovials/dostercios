<?php
/* @var $this ImagenController */
/* @var $model Imagen */

$this->breadcrumbs=array(
  'Imagens'=>array('index'),
  'Administrar',
);

$this->menu = array(
  array('label'=>'Lista de Imagens', 'url'=>array('index'),
    'linkOptions'=>array('class'=>'lista nav')),
  array('label'=>'Agregar Imagen', 'url'=>array('agregar'),
    'linkOptions'=>array('class'=>'agregar accion')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
  $('.search-form').toggle();
  return false;
});
$('.search-form form').submit(function(){
  $('#imagen-grid').yiiGridView('update', {
    data: $(this).serialize()
  });
  return false;
});
");
?>

<div id="imagen-administrar">

  <div id="contenido-head">
    <h1>Administrar Imagens</h1>
  </div>

  <div id="contenido-body">

    <p>
    También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    o <b>=</b>) al comienzo de cada uno de sus valores de búsqueda para especificar cómo se debe hacer la comparación.
    </p>

    <?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
    <div class="search-form form" style="display:none">
    <?php $this->renderPartial('_busqueda', array(
      'model'=>$model,
    )); ?>
    </div>

    <?php $this->widget('zii.widgets.grid.CGridView', array(
      'id'=>'imagen-grid',
      'dataProvider'=>$model->search(),
      'filter'=>$model,
      'columns'=>array(
    		'id',
		'nombre',
        array(
          'class'=>'CButtonColumn',
        ),
      ),
    )); ?>
  </div>

</div>
