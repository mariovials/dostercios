<?php
/**
 * Archivo de la clase ActiveRecord
 * @author Mario Vial <mariovials@gmail.com>
 *
 * Última revisión 25/08/2013
 */

/**
 * Clase Active Record
 * Esta clase mejora la implementación de CActiveRecord
 * @author Mario Vial <mariovials@gmail.com>
 * @version 1.1
 */
class FormModel extends CFormModel {

  /**
   * El nombre de la clase/modelo
   * @return string
   */
  public function getModelName() {
    return get_class($this);
  }

  /**
   * Establece la descripción para los atributos
   * @return array descripciones de los atributos
   * ('atributo'=>'descripcion')
   * @author Mario Vial <mariovials@gmail.com>
   */
  protected function attributeDescriptions() {
    return array();
  }

  public function getAttributeDescriptions() {
    return $this->attributeDescriptions();
  }

  public function attributeDescription($attribute) {
    return isset($this->attributeDescriptions[$attribute])?
      $this->attributeDescriptions[$attribute]:'';
  }

  /**
   * Establece la sugerencia para los atributos
   * @return array sugerencia para el formulario de los atributos
   * ('atributo'=>'descripcion')
   * @author Mario Vial <mariovials@gmail.com>
   */
  protected function attributeSuggestions() {
    return array();
  }

  public function getAttributeSuggestions() {
    return $this->attributeSuggestions();
  }

  /**
   * Indica cuales son los atributos que son archivos.
   * Se indica de la forma
   * atributo=>/path/to/files/folder/
   * Requiere implementar ActiveForm
   * @return array
   */
  public function filesAttributes() {
    return array();
  }

  public function getFilesAttributes() {
    return $this->filesAttributes();
  }

  public function cargarPorAttributo($atributo, $valor) {
    return $this->find("translate(
        $atributo,
        'áéíóúÁÉÍÓÚäëïöüÄËÏÖÜ',
        'aeiouAEIOUaeiouAEIOU') ILIKE '$valor'
    ");
  }

  /**
   * La lista de atributos en formato DATE (de postgres)
   * los cuales serán convertidos a formato europeo de fecha dd/mm/yyyy
   * para ser mostrados y manipulados en la interfaz
   * y serán almacenados siempre en formato ISO yyyy-mm-dd
   * @return array atributos que son fecha
   */
  protected function dateAttributes() {
    return array();
  }

  /**
   * Permite llamar a los dateAttributes como atributo de un modelo
   * @return array atributos fecha
   */
  public function getDateAttributes() {
    return $this->dateAttributes();
  }

  public function beforeValidate() {
    foreach ($this->filesAttributes as $attribute => $path) {
      getFile($this, $attribute);
    }
    return parent::beforeValidate();
  }

  /**
   * Se ejecuta antes de guardar el modelo en la base de datos.
   * Formatea una fecha a ISO
   * @return void
   */
  protected function beforeSave() {
    foreach ($this->dateAttributes as $attribute) {
      $this->{$attribute} = fiso($this->{$attribute});
    }
    return parent::beforeSave();
  }

  /**
   * Se ejecuta después de guardar.
   * Vuelve a convertir a formato EUROPEO la fecha para realizar otros procesos
   * @return void
   */
  protected function afterSave() {
    foreach ($this->filesAttributes as $attribute => $path) {
      saveFile($this, $attribute, $path);
    }
    foreach ($this->dateAttributes as $attribute) {
      $this->{$attribute} = feur($this->{$attribute});
    }
    return parent::afterSave();
  }

  /**
   * Se ejecuta despues de obtener un registro de la base de datos.
   * Pone en mayúsculas y formatea la fecha de acuerdo a lo indicado en cada
   * modelo
   * @return void
   */
  protected function afterFind() {
    foreach ($this->dateAttributes() as $attribute) {
      $this->{$attribute} = feur($this->{$attribute});
    }
    return parent::afterFind();
  }

  protected function afterValidate() {
    if($this->hasErrors())
      foreach ($this->filesAttributes as $attribute => $path) {
        $file = $this->{$attribute};
        if(is_object($file) && get_class($file) === 'CUploadedFile')
          $this->{$attribute} = $file->name;
        else unset($this->{$attribute});
      }
    return parent::afterValidate();
  }

  public function pathFileAttribute($attribute, $web=true) {
    // por defecto devuelve el path relativo web
    if($web)
      return getUrl($this, $attribute, $this->filesAttributes[$attribute]);
    // de lo contrario devuelve el absoluto del server
    else
      return Yii::getPathOfAlias('webroot').getUrl($this, $attribute, $this->filesAttributes[$attribute]);
  }

  /**
   * Link HTML al detalle del modelo.
   * Usa el atributo default_label_link, para definir el label del link
   * <a href="/$this->default_controller_name/ver/$this->tableSchema->primaryKey"
   *   >$this->default_label_link</a>
   * @param  string  $controller controlador del detalle
   * @param  string  $modelAttribute atributo del modelo para el label de link
   * @param  boolean $attribute indica si se usa $modelAttribute como atributo
   *  del modelo como string literalmente ej: $modelAttribute="Detalles"
   * @return string TAG a HTML
   */
  public function getLink($action=null, $controller=null, $modelAttribute=null,
    $attribute=true) {

    $action = ($action)?$action:'ver';
    $controller = ($controller)?$controller:$this->default_controller_name;
    $modelAttribute =
      ($modelAttribute)?$modelAttribute:$this->default_label_link;

    return CHtml::link(($attribute)?$this->{$modelAttribute}:$modelAttribute,
      array('/'.camel2dash($controller).'/'.$action,
        'id'=>$this->{$this->tableSchema->primaryKey}
    ));

  }

  public function getUrlLink($controller=null) {
    $controller = ($controller)?$controller:$this->default_controller_name;
    return '/'.camel2dash($controller).'/'.$this->{$this->tableSchema->primaryKey};
  }

}
