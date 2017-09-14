<?php
/* @var $this EtiquetaController */
/* @var $data Etiqueta */
?>

<div class="item">

  <div class="informacion">
    <div class="campo link">
      <?php echo $data->link(); ?>
    </div>
    <div class="campo cantidad">
      <?php
      echo count(EtiquetaItem::model()->findAll("etiqueta_id = {$data->id}")); ?> entradas
    </div>
  </div>

  <div class="opciones">
    <?php
    echo CHtml::link('', array('/admin/etiqueta/ver', 'id'=>$data->id),
      array('class'=>'detalles'));
    echo CHtml::link('', array('/admin/etiqueta/editar', 'id'=>$data->id),
      array('class'=>'editar'));
    echo CHtml::link('', '#',
      array('class'=>'eliminar',
      'submit'=>array('/admin/etiqueta/eliminar', 'id'=>$data->id),
      'confirm'=>'¿Estás seguro de eliminar?'));
    echo CHtml::link('', array('/admin/etiqueta/', 'id'=>$data->id),
      array('class'=>'ver'));
    ?>
  </div>

</div>
