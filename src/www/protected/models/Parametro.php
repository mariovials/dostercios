<?php

/**
 * This is the model class for table "parametro".
 *
 * The followings are the available columns in table 'parametro':
 * @property integer $id
 * @property string $nombre
 * @property string $codigo
 * @property string $tipo
 * @property string $valor
 * @property string $descripcion
 */
class Parametro extends ActiveRecord {

  protected $default_controller_name = 'parametro';
  protected $default_label_link = 'nombre';

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return Parametro the static model class
   */
  public static function model($className=__CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'parametro';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {

    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('nombre, codigo, tipo', 'required'),
      array('nombre', 'length', 'max'=>500),
      array('codigo', 'length', 'max'=>100),
      array('tipo', 'length', 'max'=>10),
      array('valor', 'safe'),
      array('descripcion', 'safe'),
      // The following rule is used by search().
      // Please remove those attributes that should not be searched.
      array('id, nombre, codigo, tipo, valor, descripcion', 'safe', 'on'=>'search'),
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
      'codigo'=>'Codigo',
      'tipo'=>'Tipo',
      'valor'=>'Valor',
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
    $criteria->compare('nombre', $this->nombre, true);
    $criteria->compare('codigo', $this->codigo, true);
    $criteria->compare('tipo', $this->tipo, true);
    $criteria->compare('valor', $this->valor, true);
    $criteria->compare('descripcion', $this->descripcion, true);

    return new CActiveDataProvider($this, array(
      'criteria'=>$criteria,
    ));
  }

  public function getTiposPhpLD() {
    return array(
      'boolean'=>'Booleano',
      'integer'=>'Número',
      'string'=>'Texto',
    );
  }

  public function getValor_php() {
    $valor = $this->valor;
    settype($valor, $this->tipo);
    return $valor;
  }

  public static function get($codigo=null) {
    if($codigo) {
      $p = self::model()->find("codigo = '$codigo'");
      if ($p)
        return $p->valor_php;
    } else
      return '';
  }

}
