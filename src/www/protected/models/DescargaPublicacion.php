<?php

/**
 * This is the model class for table "descarga_publicacion".
 *
 * The followings are the available columns in table 'descarga_publicacion':
 * @property integer $id
 * @property integer $publicacion_id
 * @property integer $descarga_id
 * @property string $texto
 *
 * The followings are the available model relations:
 * @property Publicacion $publicacion
 * @property Descarga $descarga
 */
class DescargaPublicacion extends ActiveRecord {

  protected $default_controller_name = 'descargaPublicacion';
  protected $default_label_link = 'nombre';

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return DescargaPublicacion the static model class
   */
  public static function model($className=__CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'descarga_publicacion';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {

    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('publicacion_id, descarga_id', 'required'),
      array('publicacion_id, descarga_id', 'numerical', 'integerOnly'=>true),
      array('texto', 'safe'),
      // The following rule is used by search().
      // Please remove those attributes that should not be searched.
      array('id, publicacion_id, descarga_id, texto', 'safe', 'on'=>'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {

    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
      'publicacion'=>array(self::BELONGS_TO, 'Publicacion', 'publicacion_id'),
      'descarga'=>array(self::BELONGS_TO, 'Descarga', 'descarga_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
      'id'=>'ID',
      'publicacion_id'=>'Publicacion',
      'descarga_id'=>'Descarga',
      'texto'=>'Texto',
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
  public function filesAttributes() {
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
    $criteria->compare('publicacion_id', $this->publicacion_id);
    $criteria->compare('descarga_id', $this->descarga_id);
    $criteria->compare('texto', $this->texto, true);

    return new CActiveDataProvider($this, array(
      'criteria'=>$criteria,
    ));
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
