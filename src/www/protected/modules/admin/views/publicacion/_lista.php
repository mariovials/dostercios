<?php
/* @var $this PublicacionController */
/* @var $data Publicacion */
?>

<div class="item">

  <div class="informacion">
    <div class="campo link">
      <?php echo $data->link(); ?>
    </div>
    <div class="campo resumen">
      <?php echo CHtml::encode($data->resumen); ?>
    </div>
	<?php /*
    <div class="campo titulo">
      <?php echo CHtml::encode($data->titulo); ?>
    </div>
    <div class="campo informacion">
      <?php echo CHtml::encode($data->informacion); ?>
    </div>
    <div class="campo archivo">
      <?php echo CHtml::encode($data->archivo); ?>
    </div>
    <div class="campo insercion">
      <?php echo CHtml::encode($data->insercion); ?>
    </div>
    <div class="campo visor">
      <?php echo CHtml::encode($data->visor); ?>
    </div>
    <div class="campo fecha_publicacion">
      <?php echo CHtml::encode($data->fecha_publicacion); ?>
    </div>
    <div class="campo fecha_edicion">
      <?php echo CHtml::encode($data->fecha_edicion); ?>
    </div>
    <div class="campo miniatura">
      <?php echo CHtml::encode($data->miniatura); ?>
    </div>
    <div class="campo url">
      <?php echo CHtml::encode($data->url); ?>
    </div>
	*/ ?>
  </div>

  <div class="opciones">
    <?php
    echo CHtml::link('', array('/admin/publicacion/ver', 'id'=>$data->id),
      array('class'=>'detalles'));
    echo CHtml::link('', array('/admin/publicacion/editar', 'id'=>$data->id),
      array('class'=>'editar'));
    echo CHtml::link('', '#',
      array('class'=>'eliminar',
      'submit'=>array('/admin/publicacion/eliminar', 'id'=>$data->id),
      'confirm'=>'¿Estás seguro de eliminar?'));
    echo CHtml::link('', array($data->url()),
      array('class'=>'ver'));
    ?>
  </div>

</div>
