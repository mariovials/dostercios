<?php
/* @var $this ImagenController */
/* @var $data Imagen */
?>

<div class="item">

  <div class="informacion">
    <div class="campo link">
      <?php echo $data->link(); ?>
    </div>
    <div class="campo nombre">
      <?php echo CHtml::encode($data->nombre); ?>
    </div>
  </div>

  <div class="opciones">
    <?php
    echo CHtml::link('', array('/imagen/ver', 'id'=>$data->id),
      array('class'=>'detalles'));
    echo CHtml::link('', array('/imagen/editar', 'id'=>$data->id),
      array('class'=>'editar'));
    echo CHtml::link('', '#',
      array('class'=>'eliminar',
      'submit'=>array('/imagen/eliminar', 'id'=>$data->id),
      'confirm'=>'¿Estás seguro de eliminar?'));
    echo CHtml::link('', array('/sitio/imagen', 'id'=>$data->id),
      array('class'=>'ver'));
    ?>
  </div>

</div>
