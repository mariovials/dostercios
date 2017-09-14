<?php
/**
 * List View por defecto
 */
Yii::import('zii.widgets.CListView');
class ListView extends CListView {
  public $summaryText = 'Mostrando de {start} al {end} de {count} resultados';
}
?>