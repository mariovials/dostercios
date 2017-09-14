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
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
  '$label'=>array('/$url/index'),
  'Agregar',
);\n";
?>

$this->menu = array(
  array('label'=>'Lista de <?php echo $label; ?>',
    'url'=>array('<?php echo $this->createUrl(); ?>'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),
);
?>

<div id="<?php echo camel2dash($this->modelClass) ?>-agregar">

  <div id="contenido-head">
    <h1>Agregar <?php echo $this->class2name($this->modelClass); ?></h1>
  </div>

  <div id="contenido-body">

    <?php
    echo "<?php echo \$this->renderPartial('_form', array(
      'model'=>\$model,
      'attributes'=>array(\n";
    foreach ($this->tableSchema->columns as $column) {
      if($column->autoIncrement) continue;
      echo "        '{$column->name}',\n";
    }
    echo "      ),\n";
    echo "    )); ?>\n";
    ?>

  </div>

</div>
