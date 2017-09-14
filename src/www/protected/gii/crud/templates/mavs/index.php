<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $dataProvider CActiveDataProvider */

<?php
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label',
);\n";
?>

$this->menu=array(
  array('label'=>'Agregar <?php echo $this->modelClass; ?>', 'url'=>array('agregar'),
    'linkOptions'=>array('class'=>'agregar')),
);
?>

<div id="<?php echo $this->class2id($this->getModelClass()) ?>-index">

  <h1><?php echo $label; ?></h1>

  <div class="lista <?php echo $this->class2id($this->getModelClass()) ?> admin">

  <?php echo "<?php"; ?> $this->widget('zii.widgets.CListView', array(
  	'dataProvider'=>$dataProvider,
  	'itemView'=>'_lista',
  )); ?>

  </div>

</div>
