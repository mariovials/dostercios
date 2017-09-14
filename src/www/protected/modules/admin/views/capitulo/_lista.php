<?php
/* @var $this CapituloController */
/* @var $data Capitulo */
?>

<div class="item">

  <div class="informacion">
    <div class="campo fecha_publicacion doble" style="float: right">
      <div class="campo label">
        <?php echo $data->getAttributeLabel('fecha_edicion') ?>
      </div>
      <div class="campo">
        <?php echo CHtml::encode($data->fecha_edicion); ?>
      </div>
    </div>
    <div class="campo link">
      <?php echo $data->link(); ?>
    </div>
  </div>

  <div class="opciones">
    <?php
    echo CHtml::link('', array('/admin/capitulo/ver', 'id'=>$data->id),
      array('class'=>'detalles'));
    echo CHtml::link('', array('/admin/capitulo/editar', 'id'=>$data->id),
      array('class'=>'editar'));
    echo CHtml::link('', '#',
      array('class'=>'eliminar',
      'submit'=>array('/admin/capitulo/eliminar', 'id'=>$data->id),
      'confirm'=>'¿Estás seguro de eliminar?'));
    echo CHtml::link('', array($data->url()),
      array('class'=>'ver'));
    ?>
  </div>

</div>
