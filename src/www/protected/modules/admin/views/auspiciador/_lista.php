<?php
/* @var $this AuspiciadorController */
/* @var $data Auspiciador */
?>

<div class="item">

  <div class="informacion">
    <div class="campo link">
      <?php echo $data->link(); ?>
    </div>
    <div class="campo doble" style="float: right">
      <div class="campo label"><?php echo $data->getAttributeLabel('fecha_edicion') ?></div>
      <div class="campo fecha_edicion">
        <?php echo CHtml::encode($data->fecha_edicion); ?>
      </div>
    </div>
  </div>

  <div class="opciones">
    <?php
    echo CHtml::link('', array('/admin/auspiciador/ver', 'id'=>$data->id),
      array('class'=>'detalles'));
    echo CHtml::link('', array('/admin/auspiciador/editar', 'id'=>$data->id),
      array('class'=>'editar'));
    echo CHtml::link('', '#',
      array('class'=>'eliminar',
      'submit'=>array('/admin/auspiciador/eliminar', 'id'=>$data->id),
      'confirm'=>'¿Estás seguro de eliminar?'));
    echo CHtml::link('', array('/admin/auspiciador/', 'id'=>$data->id),
      array('class'=>'ver'));
    ?>
  </div>

</div>
