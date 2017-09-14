<?php
/* @var $this SerieController */
/* @var $data Serie */
?>

<div class="item">

  <div class="informacion">
    <div class="campo doble con-etiquetas">
      <div class="campo link titulo">
        <?php echo $data->link(); ?>
      </div>
      <div class="campo etiquetas">
        <?php echo $data->etiquetas ?>
      </div>
    </div>
    <div class="campo fecha_edicion doble" style="float: right">
      <div class="campo label">
        <?php echo $data->getAttributeLabel('fecha_edicion') ?>
      </div>
      <div class="campo">
        <?php echo CHtml::encode($data->fecha_edicion); ?>
      </div>
    </div>
  </div>

  <div class="opciones">
    <?php
    echo CHtml::link('', array('/admin/serie/ver', 'id'=>$data->id),
      array('class'=>'detalles'));
    echo CHtml::link('', array('/admin/serie/editar', 'id'=>$data->id),
      array('class'=>'editar'));
    echo CHtml::link('', '#', array('class'=>'eliminar',
      'submit'=>array('/admin/serie/eliminar', 'id'=>$data->id),
      'confirm'=>'¿Estás seguro de eliminar?'));
    echo CHtml::link('', array($data->url()),
      array('class'=>'ver'));
    ?>
  </div>

</div>
