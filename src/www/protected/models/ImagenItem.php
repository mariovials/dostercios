<?php

/**
 * This is the model class for table "imagen_item".
 *
 * The followings are the available columns in table 'imagen_item':
 * @property integer $id
 * @property integer $tabla_id
 * @property integer $entidad_id
 *
 * The followings are the available model relations:
 * @property Tabla $tabla
 */
class ImagenItem extends CActiveRecord {

  protected $default_controller_name = 'imagenItem';
  protected $default_label_link = 'nombre';

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return ImagenItem the static model class
   */
  public static function model($className=__CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'imagen_item';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {

    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('tabla_id, entidad_id', 'required'),
      array('tabla_id, entidad_id', 'numerical', 'integerOnly'=>true),
      // The following rule is used by search().
      // Please remove those attributes that should not be searched.
      array('id, tabla_id, entidad_id', 'safe', 'on'=>'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {

    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
      'imagen'=>array(self::BELONGS_TO, 'Imagen', 'imagen_id'),
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

    return new CActiveDataProvider($this, array(
      'criteria'=>$criteria,
    ));
  }

  public function afterDelete()
  {
    switch ($this->tabla_id) {
      case 1:
        deleteFile("/img/entrevista/{$this->entidad_id}/{$this->imagen->filename}");
        break;
      case 3:
        $path = $this->entidad()->pathImagen() . "/{$this->imagen->filename}";
        deleteFile($path);
        break;
      case 4: // Noticia
        $path = $this->entidad()->pathImagen() . "/{$this->imagen->filename}";
        deleteFile($path);
        break;

      default:
        break;
    }
    return parent::afterDelete();
  }

  public function entidad()
  {
    switch ($this->tabla_id) {
      case 3:
        $model = Capitulo::model()->findByPk($this->entidad_id);
        break;
      case 4: // Noticia
        $model = Noticia::model()->findByPk($this->entidad_id);
        break;

      default:
        break;
    }
    return $model;
  }

}
