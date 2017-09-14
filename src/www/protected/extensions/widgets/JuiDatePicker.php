<?php 

/**
 * Extension para definir las opciones por defecto de CJuiDatePicker
 */
Yii::import('zii.widgets.jui.CJuiDatePicker');
class JuiDatePicker extends CJuiDatePicker {

  public $language = 'es';
  
  public $defaultOptions = array(
    'dateFormat' => 'dd/mm/yy',
    'showOtherMonths' => true,
    'selectOtherMonths' => true,
    'changeYear' => true,
    'changeMonth' => true,
  );
}
