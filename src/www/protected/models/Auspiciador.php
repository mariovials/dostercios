<?php

/**
 * This is the model class for table "auspiciador".
 *
 * The followings are the available columns in table 'auspiciador':
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $imagen
 * @property string $fecha_creacion
 * @property string $fecha_edicion
 */
class Auspiciador extends ActiveRecord {

  const ID = 11; // ok
  const LOGUEABLE = true;
  const ALIAS = 'au'; //

  protected $default_controller_name = 'auspiciador';
  protected $default_label_link = 'nombre';

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return Auspiciador the static model class
   */
  public static function model($className=__CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'auspiciador';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {

    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('nombre, fecha_creacion, fecha_edicion', 'required'),
      array('nombre', 'length', 'max'=>200),
      array('imagen', 'length', 'max'=>2000),
      array('imagen', 'safe'),
      array('descripcion', 'safe'),
      // The following rule is used by search().
      // Please remove those attributes that should not be searched.
      array('id, nombre, descripcion, imagen, fecha_creacion, fecha_edicion', 'safe', 'on'=>'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {

    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
      'id'=>'ID',
      'nombre'=>'Nombre',
      'descripcion'=>'Descripción',
      'imagen'=>'Imagen',
      'fecha_creacion'=>'Fecha de creación',
      'fecha_edicion'=>'Fecha de edición',
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
      'fecha_creacion',
      'fecha_edicion',
    );
  }

  /**
   * Indica cuales son los atributos que son archivos.
   * Se indica de la forma
   * 'atributo' => "/path/to/files/folder/"
   * Requiere implementar ActiveForm
   * @return array
   */
  public function filesAttributes() {
    return array(
      'imagen' => '/img/auspiciador/',
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
    $criteria->compare('nombre', $this->nombre, true);
    $criteria->compare('descripcion', $this->descripcion, true);
    $criteria->compare('imagen', $this->imagen, true);
    $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
    $criteria->compare('fecha_edicion', $this->fecha_edicion, true);

    return new CActiveDataProvider($this, array(
      'criteria'=>$criteria,
    ));
  }

  public function beforeValidate()
  {
    if ($this->isNewRecord) {
      $this->fecha_creacion = date('d/m/Y H:i:s');
    }
    $this->fecha_edicion = date('d/m/Y H:i:s');
    return parent::beforeValidate();
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

}
