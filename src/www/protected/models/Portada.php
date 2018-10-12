<?php

/**
 * This is the model class for table "portada".
 *
 * The followings are the available columns in table 'portada':
 * @property integer $id
 * @property integer $tabla_id
 * @property integer $entidad_id
 * @property integer $tipo
 *
 * The followings are the available model relations:
 * @property Tabla $tabla
 */
class Portada extends ActiveRecord {

  protected $default_controller_name = 'portada';
  protected $default_label_link = 'nombre';

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return Portada the static model class
   */
  public static function model($className=__CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'portada';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {

    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('tabla_id, entidad_id', 'required'),
      array('tabla_id, entidad_id, tipo', 'numerical', 'integerOnly'=>true),
      // The following rule is used by search().
      // Please remove those attributes that should not be searched.
      array('id, tabla_id, entidad_id, tipo', 'safe', 'on'=>'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {

    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
      'tabla'=>array(self::BELONGS_TO, 'Tabla', 'tabla_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
      'id'=>'ID',
      'tabla_id'=>'Tabla',
      'entidad_id'=>'Entidad',
      'tipo'=>'Tipo',
    );
  }

  /**
   * Establece la descripción para los atributos
   * @return array descripciones de los atributos
   * ('atributo'=>'descripcion')
   * @author Mario Vial <mariovials@gmail.com>
   */
  public function attributeDescriptions() {
    return array(
    );
  }

  /**
   * Establece la sugerencia para los atributos
   * @return array sugerencia para el formulario de los atributos
   * ('atributo'=>'descripcion')
   * @author Mario Vial <mariovials@gmail.com>
   */
  public function attributeSuggestions() {
    return array(
    );
  }

  /**
   * La lista de atributos en formato de fecha o fecha-hora
   * los cuales serán convertidos a formato europeo de fecha dd/mm/yyyy
   * para ser mostrados y manipulados en la interfaz
   * y serán almacenados siempre en formato ISO yyyy-mm-dd
   * @return array atributos que son fecha
   */
  protected function dateAttributes() {
    return array(
    );
  }

  /**
   * Indica cuales son los atributos que son archivos.
   * Se indica de la forma
   * 'atributo' => "/path/to/files/folder/"
   * Requiere implementar ActiveForm
   * @return array
   */
  public function fileAttributes() {
    return array(
    );
  }

  /**
   * Retrieves a list of models based on the current search/filter conditions.
   * @return CActiveDataProvider the data provider that can return the models
   * based on the search/filter conditions.
   */
  public function search() {

    // Warning: Please modify the following code to remove attributes that
    // should not be searched.

    $criteria=new CDbCriteria;
    $criteria->compare('id', $this->id);
    $criteria->compare('tabla_id', $this->tabla_id);
    $criteria->compare('entidad_id', $this->entidad_id);
    $criteria->compare('tipo', $this->tipo);

    return new CActiveDataProvider($this, array(
      'criteria'=>$criteria,
    ));
  }

  public function entidad()
  {
    $tabla = $this->tabla;
    $modelName = $tabla->descripcion;
    $entidad_id = $this->entidad_id;
    return $modelName::model()->findByPk($entidad_id);
  }

  /**
   * Control de acceso a las acciones para el modelo

   * @param  string $action la "action" del controlador
   * @return boolean

   * @author Mario Vial <mariovials@gmail.com>
   */
  public function puede($action, $u=null) {
    if($u===null)
      $u = user();

    switch ($action) {

      case 'ver':
        return true;
        break;

      case 'editar':
        return false;
        break;

      case 'eliminar':
        return false;
        break;

      default:
        return false;
        break;

    }
  }

  public function tipoTexto()
  {
    if ($this->tipo == 1) return 'normal proporcion2-1';
    if ($this->tipo == 2) return 'grande proporcion1-1';
    return '';
  }

  public function defaultScope()
  {
    return array(
      'order' => 'fecha_publicacion DESC',
    );
  }

}
