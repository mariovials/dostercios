<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
$url = camel2dash($this->getModelClass());
$name = $this->class2name($this->modelClass);
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($name);
echo "\$this->breadcrumbs=array(
  '$label'=>array('/$url/index'),
  \$model->{$nameColumn},
);\n";
?>

$this->menu = array(
  array('label'=>'Agregar <?php echo $name; ?>',
    'url'=>array('<?php echo $this->createUrl('agregar'); ?>'),
    'linkOptions'=>array('class'=>'agregar accion'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Lista de <?php echo $label; ?>',
    'url'=>array('<?php echo $this->createUrl(); ?>'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Editar <?php echo $name; ?>',
    'url'=>array('<?php echo $this->createUrl('editar'); ?>', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),
    'linkOptions'=>array('class'=>'editar accion'),
  ),
  array('label'=>'Eliminar <?php echo $name; ?>',
    'url'=>'#',
    'linkOptions'=>array('class'=>'eliminar accion',
      'submit'=>array('<?php echo $this->createUrl('eliminar'); ?>', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),
      'confirm'=>'¿Estás seguro de eliminar?'
  )),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver en sitio',
    'url'=>array('<?php echo $url; ?>'),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="<?php echo camel2dash($this->modelClass) ?>-ver">

  <div id="contenido-head">
    <h1><?php echo "<?php echo \$model->titulo ?>"; ?></h1>
  </div>

  <div id="contenido-body">

    <?php echo "<?php \$this->renderPartial('_ficha', array(
      'model' => \$model,
      'campos' => array(\n";
    foreach ($this->tableSchema->columns as $column) {
      if($column->autoIncrement) continue;
      echo "        '{$column->name}',\n";
    }
    echo "      ),\n";
    echo "    )); ?>\n";
    ?>

  </div>

</div>
