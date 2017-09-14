<?php

/**
 * @author Mario Vial <mariovials@gmail.com> 2015-08-16 11:08
 */
class ActiveForm extends CActiveForm {

  public $errorMessageCssClass = 'error';

  public function description($model, $attribute) {
    if(isset($model->attributeDescriptions[$attribute]))
      return '<div class="description">'.$model->attributeDescriptions[$attribute].'</div>';
    else
      return '';
  }

  public function suggestion($model, $attribute) {
    if(isset($model->attributeSuggestions[$attribute]))
      return '<div class="suggestion">'.$model->attributeSuggestions[$attribute].'</div>';
    else
      return '';
  }

  public function datepicker($model, $attribute, $opts=array()) {

    $this->widget('JuiDatePicker', array(
      'model'=>$model,
      'attribute'=>$attribute,
      'options'=>isset($opts['options'])?$opts['options']:array(),
      'htmlOptions'=>isset($opts['htmlOptions'])?$opts['htmlOptions']:array(),
      'language'=>isset($opts['language'])?$opts['language']:'es',
    ));

  }

  /**
   * busca en la base de datos los campos similares y ofrece una lista
   */
  public function autocomplete($model, $attribute, $opts=array()) {

    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
      'model'=>$model,
      'attribute'=>$attribute,
      'sourceUrl'=>array('/sistema/get',
        'model'=>get_class($model),
        'atributo'=>$attribute),
      'options'=>isset($opts['options'])?$opts['options']:array(),
      'htmlOptions'=>isset($opts['htmlOptions'])?$opts['htmlOptions']:array(),
    ));

  }

  public function label($model, $attribute, $htmlOptions = array()) {
    return '<div class="label">'.$this->labelEx($model, $attribute).'</div>';
  }

}
