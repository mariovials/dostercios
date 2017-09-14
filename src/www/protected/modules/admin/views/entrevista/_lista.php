<?php
/* @var $this EntrevistaController */
/* @var $data Entrevista */
?>

  <div class="item">
    <div class="informacion">
      <div class="campo doble con-etiquetas">

        <div class="campo titulo">
          <?php echo $data->link(); ?>
        </div>
        <div class="campo etiquetas">
          <?php echo $data->etiquetas ?>
        </div>
      </div>
      <div class="campo fecha_edicion doble" style="float: right">
        <div class="campo label">Fecha de edición</div>
        <div class="campo">
          <?php echo CHtml::encode($data->fecha_edicion); ?>
        </div>
      </div>
    </div>
  <div class="opciones">
    <?php
    echo CHtml::link('', array('/admin/entrevista/ver', 'id'=>$data->id),
      array('class'=>'detalles'));
    echo CHtml::link('', array('/admin/entrevista/editar', 'id'=>$data->id),
      array('class'=>'editar'));
    echo CHtml::link('', '#',
      array('class'=>'eliminar',
      'submit'=>array('/admin/entrevista/eliminar', 'id'=>$data->id),
      'confirm'=>'¿Estás seguro de eliminar?'));
    echo CHtml::link('', $data->url(),
      array('class'=>'ver')); ?>
  </div>
</div>
