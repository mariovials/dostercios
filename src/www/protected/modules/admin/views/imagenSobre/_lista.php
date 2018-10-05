<?php
/* @var $this ImagenPortadaController */
/* @var $data ImagenPortada */
?>

<div class="item">

  <div class="informacion">
    <a href="<?php echo $data->getUrlLink() ?>">
      <div class="campo imagen">
        <img src="<?php echo $data->pathFileAttribute('imagen') ?>" alt="">
      </div>
    </a>
  </div>

  <div class="opciones">
    <?php
    echo CHtml::link('', array('/admin/imagen-sobre/ver', 'id'=>$data->id), array('class'=>'detalles'));
    echo CHtml::link('', array('/admin/imagen-sobre/editar', 'id'=>$data->id), array('class'=>'editar'));
    echo CHtml::link('', '#', array('class'=>'eliminar', 'submit'=>array('/admin/imagen-sobre/eliminar', 'id'=>$data->id), 'confirm'=>'¿Estás seguro de eliminar?'));
    // echo CHtml::link('', array('/sitio/imagen-sobre', 'id'=>$data->id), array('class'=>'ver'));
    ?>
  </div>

</div>
