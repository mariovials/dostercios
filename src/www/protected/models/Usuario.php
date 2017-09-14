<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id
 * @property string $usuario
 * @property string $nombre
 * @property string $password
 * @property string $descripcion
 */
class Usuario extends ActiveRecord {

  protected $default_controller_name = 'usuario';
  protected $default_label_link = 'nombre';

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return Usuario the static model class
   */
  public static function model($className=__CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'usuario';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {

    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('usuario, nombre, password', 'required'),
      array('usuario', 'length', 'max'=>20),
      array('nombre', 'length', 'max'=>500),
      array('password', 'length', 'max'=>32),
      array('descripcion', 'safe'),
      // The following rule is used by search().
      // Please remove those attributes that should not be searched.
      array('id, usuario, nombre, password, descripcion', 'safe', 'on'=>'search'),
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
      'usuario'=>'Usuario',
      'nombre'=>'Nombre',
      'password'=>'Password',
      'descripcion'=>'Descripcion',
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
    $criteria->compare('usuario', $this->usuario, true);
    $criteria->compare('nombre', $this->nombre, true);
    $criteria->compare('password', $this->password, true);
    $criteria->compare('descripcion', $this->descripcion, true);

    return new CActiveDataProvider($this, array(
      'criteria'=>$criteria,
    ));
  }

}