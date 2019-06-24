<?php
/**
 * Archivo de la clase ActiveRecord
 * @author Mario Vial <mariovials@gmail.com>
 *
 * Última revisión 20/07/2015
 */

/**
 * Clase Active Record
 * Esta clase mejora la implementación de CActiveRecord
 * @author Mario Vial <mariovials@gmail.com>
 * @version 1.3
 */
class ActiveRecord extends CActiveRecord {

  const ID = null;
  const LOGUEABLE = false;
  const ALIAS = 't';

  /**
   * Atributos originales.
   *
   * Si es un nuevo registro, serán los atributos por defecto del modelo.
   * Si es un registro que existía, serán los atributos que tenía en el momento
   * de obterlo.
   * @var array
   */
  private $_oldAttributes = array();

  /**
   * Variable que es true si el registro existe en la BD.
   * Si el registro está eliminado falso.
   * Puede ocuparse despues del evento delete()
   * Sirve para log
   * @var boolean
   */
  private $_alive;

  protected $default_label_link = 'nombre';

  public function init()
  {
  }

  public function getOldAttributes()
  {
    return $this->_oldAttributes;
  }

  public function setOldAttributes($value)
  {
    $this->_oldAttributes = $value;
  }

  /**
   * Devuelve los attribuos que han cambiado
   * @return array array(key=>new value)
   */
  public function whatChanged()
  {
    if ($this->isNewRecord)
      return $this->attributes;
    return array_diff_assoc($this->attributes, $this->oldAttributes);
  }

  public function getChangedAttributes()
  {
    return $this->whatChanged();
  }

  /**
   * Determina si el atributo indicado ha cambiado.
   * Si no se recibe un atributo retorna verdadero si cualquiera de sus
   * atributos ha cambiado.
   * @param  string  $attribute nombre del atributo
   * @return boolean
   * @author Mario Vial <mariovials@gmail.com> 2014-02-24 02:42
   */
  public function hasChanged($attribute = null)
  {
    if ($attribute !== null) {
      if (isset($this->changedAttributes[$attribute]))
        return true;
    } else {
      return ($this->changedAttributes) ? true : false;
    }
    return false;
  }

  /**
   * El nombre de la clase/modelo
   * @return string
   */
  public function getModelName()
  {
    return get_class($this);
  }

  /**
   * Establece la descripción para los atributos
   * @return array descripciones de los atributos
   * ('atributo'=>'descripcion')
   * @author Mario Vial <mariovials@gmail.com>
   */
  protected function attributeDescriptions()
  {
    return array();
  }

  public function getAttributeDescriptions()
  {
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
  protected function attributeSuggestions()
  {
    return array();
  }

  public function getAttributeSuggestions()
  {
    return $this->attributeSuggestions();
  }

  /**
   * Indica cuales son los atributos que son archivos.
   * Se indica de la forma
   * atributo=>/path/to/files/folder/
   * Requiere implementar ActiveForm
   * @return array
   */
  public function filesAttributes()
  {
    return array(
    );
  }

  public function getFilesAttributes()
  {
    return $this->filesAttributes();
  }

  public function cargarPorAttributo($atributo, $valor) {
    $valor = strtr(utf8_decode($valor),
      utf8_decode('áéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙãõÃÕäëïöüÄËÏÖÜâêîôûÂÊÎÔÛ'),
      'aeiouAEIOUaeiouAEIOUaeiouAEIOUaoAOaeiouAEIOUaeiouAEIOU'
    );
    return $this->find("translate(
        $atributo,
        'áéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙãõÃÕäëïöüÄËÏÖÜâêîôûÂÊÎÔÛ',
        'aeiouAEIOUaeiouAEIOUaeiouAEIOUaoAOaeiouAEIOUaeiouAEIOU'
      ) ILIKE '$valor'
    ");
  }

  /**
   * La lista de atributos en formato DATE (de postgres)
   * los cuales serán convertidos a formato europeo de fecha dd/mm/yyyy
   * para ser mostrados y manipulados en la interfaz
   * y serán almacenados siempre en formato ISO yyyy-mm-dd
   * @return array atributos que son fecha
   */
  protected function dateAttributes()
  {
    return array();
  }

  /**
   * Permite llamar a los dateAttributes como atributo de un modelo
   * @return array atributos fecha
   */
  public function getDateAttributes()
  {
    return $this->dateAttributes();
  }

  public function beforeValidate()
  {
    foreach ($this->filesAttributes as $attribute => $path) {
      getFile($this, $attribute);
    }
    return parent::beforeValidate();
  }

  protected function afterValidate()
  {
    foreach ($this->filesAttributes as $attribute => $path) {
      $file = $this->{$attribute};
      if (is_object($file) && get_class($file) === 'CUploadedFile') {
        // $this->{$attribute} = $file->name;
      } else {
        $this->{$attribute} = $this->oldAttributes[$attribute];
      }
    }
    return parent::afterValidate();
  }

  /**
   * Se ejecuta antes de guardar el modelo en la base de datos.
   * Formatea una fecha a ISO
   * @return void
   */
  protected function beforeSave()
  {
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
  protected function afterSave()
  {
    // Requiere @file extensions/file_helper.php
    foreach ($this->filesAttributes as $attribute => $path) {
      saveFile($this, $attribute, $path);
      if ($this->hasChanged($attribute)
        && isset($this->oldAttributes[$attribute])) {
        $path_anterior = $this->filesAttributes[$attribute]
          . $this->id . '_' . $this->oldAttributes[$attribute];
        deleteFile($path_anterior);
      }
    }
    foreach ($this->dateAttributes as $attribute) {
      // Requiere @file time_helper.php
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
  protected function afterFind()
  {
    foreach ($this->dateAttributes() as $attribute) {
      // Requiere @file time_helper.php
      $this->{$attribute} = feur($this->{$attribute});
    }
    $this->_oldAttributes = $this->attributes;
    return parent::afterFind();
  }

  protected function beforeDelete()
  {
    foreach ($this->filesAttributes as $attribute => $path) {
      deleteFile($this->pathFileAttribute($attribute));
    }
    return parent::beforeDelete();
  }

  public function pathFileAttribute($attribute, $web=true) {
    // por defecto devuelve el path relativo web
    if($web)
      return getUrl($this, $attribute, $this->filesAttributes[$attribute]);
    // de lo contrario devuelve el absoluto del server
    else
      return Yii::app()->baseUrl.'/'.getUrl($this, $attribute, $this->filesAttributes[$attribute]);
  }

  /**
   * Obtiene el nombre del controlador por defecto para un modelo
   *
   * Si el modelo tiene establecida la variable "default_controller_name"
   * retorna eso, de lo contrario, retorna el nombre del modelo, convertido
   * camel2dash
   *
   * @return string
   */
  public function getDefault_controller()
  {
    if(property_exists($this, 'default_controller_name')
      && !$this->default_controller_name) {
      return $this->default_controller_name;
    }
    else {
      return camel2dash($this->modelName); // Requiere php_helper.php
    }
  }

  /**
   * @todo Documentar
   */
  public function getFicha_titulo()
  {
    return "Datos de $this->modelName";
  }

  /**
   * Valida antes de realizar una búsqueda.
   *
   * Aplica las reglas de validación del modelo
   * y limpia atributos que contienen errores.
   * Esto permite buscar solo por atributos que cumplen las reglas.
   *
   * Debe agregar la linea en el método search del modelo
   * $this->searchValidation();
   *
   * @mvial <mariovials@gmail.com> 2014-01-08 18:38
   */
  protected function searchValidation()
  {
    if(!$this->validate())
      foreach ($this->errors as $attribute => $errors)
        unset($this->{$attribute});
  }

  /**
   * Link HTML al detalle del modelo.
   *
   * Genera un tag HTML <a>
   *
   * <a href="/$this->default_controller/ver/$this->tableSchema->primaryKey"
   *   >$this->default_label_link</a>
   * Usa el atributo default_label_link, para definir el label del link
   *
   * @param  string  $controller controlador
   * @param  string  $modelAttribute atributo del modelo para el label de link
   * @param  boolean $attribute indica si se usa $modelAttribute como atributo
   *  del modelo como string literalmente ej: $modelAttribute="Detalles"
   * @return string TAG a HTML
   */
  public function link($template = "{label}") {

    $controller = $this->default_controller;
    $label = str_replace("{label}", $this->{$this->default_label_link}, $template);
    $module = '';
    if (Yii::app()->controller->module) {
      $module = '/' . Yii::app()->controller->module->id;
    }
    return CHtml::link($label,
      array("$module" . '/' . camel2dash($controller).'/ver',
        'id' => $this->{$this->tableSchema->primaryKey}
      )
    );

  }

  /**
   * Obtiene la url para ocuparla directamente en un link
   * @param  string $controller se utiliza para sobrescribir el controlador por
   * defecto
   * @return string             la Url
   */
  public function getUrlLink($controller=null) {
    $controller = ($controller)?$controller:$this->default_controller;
    $module = '';
    if (Yii::app()->controller->module) {
      $module = '/' . Yii::app()->controller->module->id;
    }
    return "$module" . '/'
      . camel2dash($controller) . '/'
      . $this->{$this->tableSchema->primaryKey};
  }

  public function url($public=true)
  {
    if ($public) {

    } else {

    }
    $controller = $this->default_controller;
    return Yii::app()->createUrl("$controller/{$this->{$this->tableSchema->primaryKey}}");
  }

  /**
   * Retorna el nombre principal de la clase para ser usado en la aplicación
   * en titulos, listas, enlaces, etc.
   * Si la clase tiene un atributo llamado 'titulo', no se usará este método.
   * Si la clase no tiene un atributo llamado 'titulo', ni llamado 'nombre'
   * se devolverá el ID (clave primaria).
   * @return string
   * @author Mario Vial <mariovials@gmail.com> 2015-07-20 01:11
   */
  public function getTitulo()
  {
    if($this->hasAttribute('nombre')) {
      return $this->nombre;
    }
    return $this->{$this->tableSchema->primaryKey};
  }

  /**
   * @return true si se debe logear
   */
  public function getIsLogueable()
  {
    return static::LOGUEABLE;
  }

}
