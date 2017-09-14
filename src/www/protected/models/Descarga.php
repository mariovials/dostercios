<?php

/**
 * This is the model class for table "descarga".
 *
 * The followings are the available columns in table 'descarga':
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $icono
 *
 * The followings are the available model relations:
 * @property DescargaPublicacion[] $descargaPublicacions
 */
class Descarga extends ActiveRecord {

  protected $default_controller_name = 'descarga';
  protected $default_label_link = 'nombre';

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return Descarga the static model class
   */
  public static function model($className=__CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'descarga';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {

    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('nombre', 'required'),
      array('nombre, icono', 'length', 'max'=>2000),
      array('descripcion', 'safe'),
      // The following rule is used by search().
      // Please remove those attributes that should not be searched.
      array('id, nombre, descripcion, icono', 'safe', 'on'=>'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {

    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
      'descargaPublicaciones'=>array(self::HAS_MANY, 'DescargaPublicacion', 'descarga_id'),
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
      'icono'=>'Ícono',
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
      'icono' => '/img/descarga/'
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
    $criteria->compare('icono', $this->icono, true);

    return new CActiveDataProvider($this, array(
      'criteria'=>$criteria,
    ));
  }

  public function afterSave()
  {
    // Agrega la columna de la nueva forma de descarga a los modelos existentes
    Yii::app()->db->createCommand("
      INSERT INTO descarga_publicacion (descarga_id, publicacion_id)
        SELECT
          {$this->id},
          q.id
        FROM (
          SELECT
            p.id AS \"id\"
          FROM
            publicacion p
          WHERE
            p.id NOT IN (
              SELECT dp.publicacion_id
              FROM descarga_publicacion dp
              WHERE dp.descarga_id = {$this->id}
            )
        ) AS q
    ")->execute();
    return parent::afterSave();
  }

  public function beforeDelete()
  {
    foreach ($this->descargaPublicaciones as $descargaPublicacion) {
      $descargaPublicacion->delete();
    }
    return parent::beforeDelete();
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
