<?php

/**
 * This is the model class for table "serie".
 *
 * The followings are the available columns in table 'serie':
 * @property integer $id
 * @property string $titulo
 * @property string $texto
 * @property string $fecha_publicacion
 * @property string $imagen
 */
class Serie extends DTActiveRecord {

  const ID = 2;
  const ALIAS = 'se';

  protected $default_controller_name = 'serie';
  protected $default_label_link = 'titulo';

  protected $_puede_ir_en_portada = true;
  protected $_tiene_etiquetas = true;

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return Serie the static model class
   */
  public static function model($className=__CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'serie';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {

    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('titulo', 'required'),
      array('portada','numerical', 'integerOnly'=>true, 'min'=>0, 'max'=>2),
      array('titulo, imagen', 'length', 'max'=>2000),
      array('imagen', 'file', 'maxSize'=>600000,
        'allowEmpty'=>true,
        'on'=>'update'),
      array('url, texto, resumen, fecha_publicacion, etiquetas', 'safe'),
      // The following rule is used by search().
      // Please remove those attributes that should not be searched.
      array('id, titulo, texto, fecha_publicacion, imagen', 'safe', 'on'=>'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {

    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
      'capitulos' => array(self::HAS_MANY, 'Capitulo', 'serie_id', 'order'=>'orden DESC'),
      'portadaModel'=>array(self::HAS_ONE, 'Portada',
        array('entidad_id'=>'id'),
        'condition' => 'tabla_id = '.self::ID,
      ),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
      'id'=>'ID',
      'titulo'=>'Título',
      'texto'=>'Texto',
      'fecha_publicacion'=>'Fecha de publicación',
      'fecha_edicion'=>'Fecha de edición',
      'imagen'=>'Imagen',
      'portada'=>'Mostrar en portada',
      'imagenes' => 'Imágenes',
      'url'=>'Dirección URL pública',
      'etiquetas'=>'Etiquetas',
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
      'etiquetas'=>'Escriba las etiquetas separadas por coma o seleccione',
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
      'fecha_publicacion',
      'fecha_edicion',
    );
  }

  public function filesAttributes()
  {
    return array(
      'imagen' => "/img/serie/{$this->id}/",
    );
  }

  public function pathFileAttribute($attribute, $web=true)
  {
    if ($this->imagen) {
      return parent::pathFileAttribute('imagen');
    } else {
      return 'http://placehold.it/400x200/777/555';
    }
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
    $criteria->compare('titulo', $this->titulo, true);
    $criteria->compare('texto', $this->texto, true);
    $criteria->compare('fecha_publicacion', $this->fecha_publicacion, true);
    $criteria->compare('imagen', $this->imagen, true);

    return new CActiveDataProvider($this, array(
      'criteria'=>$criteria,
    ));
  }

  public function beforeSave()
  {
    if($this->isNewRecord && $this->fecha_publicacion == '') {
      $this->fecha_publicacion = date('d/m/Y');
    }
    $this->fecha_edicion = date('d/m/Y H:i:s');
    return parent::beforeSave();
  }

  public function afterSave()
  {
    if ($this->isNewRecord) {
      mkdir(Yii::getPathOfAlias('webroot') . '/img/serie/' . $this->id);
    }
    return parent::afterSave();
  }

  public function beforeDelete()
  {
    foreach ($this->capitulos as $capitulo) {
      $capitulo->delete();
    }
    return parent::beforeDelete();
  }

  public function afterDelete()
  {
    rrmdir(Yii::getPathOfAlias('webroot') . '/img/serie/' . $this->id);
    return parent::afterDelete();
  }

  public function getCantidadCapitulos()
  {
    return count($this->capitulos);
  }

  public function getUrlCompleta()
  {
    return Yii::app()->request->hostInfo . $this->url();
  }

  public function defaultScope()
  {
    return array(
      'order' => 'fecha_edicion DESC',
    );
  }

  static public function buscar($q=null)
  {
    return self::model()->findAll("titulo ~* E'\\\m$q'");
  }

  public function url($public=true)
  {
    $controller = $this->default_controller;
    if ($public) {
      return Yii::app()->createUrl("/$controller/{$this->url}");
    } else {
      return Yii::app()->createUrl("/$controller/{$this->{$this->tableSchema->primaryKey}}");
    }
  }

}
