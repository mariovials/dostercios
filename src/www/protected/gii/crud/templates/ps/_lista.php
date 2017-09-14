<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
$id = camel2dash($this->getModelClass());
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $data <?php echo $this->getModelClass(); ?> */
?>

<div class="item">

  <div class="informacion">
    <div class="campo link">
      <?php echo "<?php echo \$data->link(); ?>\n"; ?>
    </div>
<?php
$count=0;
foreach($this->tableSchema->columns as $column) {
  if($column->isPrimaryKey) continue;
  if(++$count == 7) echo "\t<?php /*\n";
?>
    <div class="campo <?php echo $column->name ?>">
      <?php echo "<?php echo CHtml::encode(\$data->{$column->name}); ?>\n"; ?>
    </div>
<?php } if($count>=7) echo "\t*/ ?>\n"; ?>
  </div>

  <div class="opciones">
    <?php echo "<?php
    echo CHtml::link('', array('{$this->createUrl('ver')}', 'id'=>\$data->id),
      array('class'=>'detalles'));
    echo CHtml::link('', array('{$this->createUrl('editar')}', 'id'=>\$data->id),
      array('class'=>'editar'));
    echo CHtml::link('', '#',
      array('class'=>'eliminar',
      'submit'=>array('{$this->createUrl('eliminar')}', 'id'=>\$data->id),
      'confirm'=>'¿Estás seguro de eliminar?'));
    echo CHtml::link('', array('{$this->createUrl()}', 'id'=>\$data->id),
      array('class'=>'ver'));
    ?>\n" ?>
  </div>

</div>
