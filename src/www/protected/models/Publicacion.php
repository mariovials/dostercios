<?php

/**
 * This is the model class for table "publicacion".
 *
 * The followings are the available columns in table 'publicacion':
 * @property integer $id
 * @property string $titulo
 * @property string $archivo
 * @property string $insercion
 * @property integer $visor
 * @property string $resumen
 * @property string $informacion
 * @property string $fecha_publicacion
 * @property string $fecha_edicion
 * @property string $miniatura
 * @property string $url
 *
 * The followings are the available model relations:
 * @property DescargaPublicacion[] $descargaPublicacions
 */
class Publicacion extends DTActiveRecord {

  const ID = 13;
  const ALIAS = 'pu';

  protected $default_controller_name = 'publicacion';
  protected $default_label_link = 'titulo';

  protected $transaccion;
  protected $_puede_ir_en_portada = true;
  protected $_tiene_etiquetas = true;

  public $descarga;

  const INTERNO = 1;
  const EXTERNO = 2;
  const NINGUNO = 3;

  public $visores = array(
    self::INTERNO => 'Interno (el archivo en PDF inscrustado directamente)',
    self::EXTERNO => 'Externo (un iFrame de un sitio externo)',
    self::NINGUNO => 'Ninguno'
  );

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return Publicacion the static model class
   */
  public static function model($className=__CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'publicacion';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {

    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('titulo, url', 'required'),
      array('portada, visor', 'numerical', 'integerOnly'=>true),
      array('autor', 'length', 'max'=>512),
      array('isbn', 'length', 'max'=>64),
      array('anio', 'numerical', 'min'=>1000, 'max'=>9999, 'integerOnly'=>true),
      array('editorial', 'length', 'max'=>512),
      array('idioma', 'length', 'max'=>32),
      array('diseno', 'length', 'max'=>512),
      array('miniatura', 'file', 'maxSize'=>200000,
        'allowEmpty'=>true,
        'on'=>'update'),
      array('titulo, archivo, miniatura, url', 'length', 'max'=>2000),
      array('insercion, resumen, resumen_miniatura, informacion, fecha_publicacion, etiquetas, descarga', 'safe'),
      // The following rule is used by search().
      // Please remove those attributes that should not be searched.
      array('id, titulo, archivo, insercion, visor, resumen, informacion, fecha_publicacion, fecha_edicion, miniatura, url', 'safe', 'on'=>'search'),

      // valida las descargas
      array('descargas', 'validarDescargas'),

    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {

    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
      'descargas'=>array(self::HAS_MANY, 'DescargaPublicacion', 'publicacion_id'),
      'imagenesItem'=>array(self::HAS_MANY, 'ImagenItem',
        array('entidad_id'=>'id'),
        'condition' => 'tabla_id = '.self::ID,
      ),
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
      'archivo'=>'Archivo',
      'insercion'=>'Inserción',
      'visor'=>'Visor',
      'resumen'=>'Resumen',
      'informacion'=>'Información',
      'fecha_publicacion'=>'Fecha de publicación',
      'fecha_edicion'=>'Fecha Edición',
      'miniatura'=>'Miniatura',
      'url'=>'Dirección URL pública',
      'etiquetas'=>'Etiquetas',
      'autor'=>'Autor',
      'isbn'=>'ISBN',
      'anio'=>'Año',
      'editorial'=>'Editorial',
      'idioma'=>'Idioma',
      'diseno'=>'Diseño editorial',
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
      'insercion'=>'Fragmento de código para insertar visor externo',
      'miniatura'=>'Portada o Carátula',
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
      'insercion' => 'Usar ancho de 100% y alto de 580px',
      'miniatura'=>'Se suguiere de 450px aprox.',
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

  /**
   * Indica cuales son los atributos que son archivos.
   * Se indica de la forma
   * 'atributo' => "/path/to/files/folder/"
   * Requiere implementar ActiveForm
   * @return array
   */
  public function filesAttributes() {
    return array(
      'miniatura'=>"/img/publicacion/{$this->id}/",
      'archivo'=>"/publicaciones/",
    );
  }

  public function beforeValidate()
  {
    $descargaPublicaciones = array();
    foreach ($this->descargas as $descargaPublicacion) {
      $descargasPublicacionModel = new DescargaPublicacion;
      $descargasPublicacionModel->attributes = $descargaPublicacion;
      $descargaPublicaciones[] = $descargasPublicacionModel;
    }
    $this->descargas = $descargaPublicaciones;
    return parent::beforeValidate();
  }

  public function validarDescargas() {
    $valido = true;
    foreach ($this->descargas as $descargaPublicacion) {
      $valido = $descargaPublicacion->validate() && $valido;
    }
    return $valido;
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
      mkdir(Yii::getPathOfAlias('webroot') . "/img/publicacion/{$this->id}/");
    }
    foreach ($this->descargas as $descargaPublicacion) {
      $descargaPublicacion->publicacion_id = $this->id;
      $descargaPublicacion->save();
    }
    return parent::afterSave();
  }

  public function beforeDelete()
  {
    $portadaModel = $this->portadaModel;
    if ($portadaModel) {
      $portadaModel->delete();
    }
    foreach ($this->descargas as $descarga) {
      $descarga->delete();
    }
    return parent::beforeDelete();
  }

  public function afterDelete()
  {
    foreach ($this->imagenes as $imagen) {
      $imagen->delete();
    }
    rmdir(Yii::getPathOfAlias('webroot') . "/img/publicacion/{$this->id}/");
    return parent::afterDelete();
  }

  public function getImagenes()
  {
    $imagenes = array();
    foreach ($this->imagenesItem as $imagen_item) {
      $imagenes[] = $imagen_item->imagen;
    }
    return $imagenes;
  }

  public function getTipoMiniatura()
  {
    return 'Editorial';
  }

  public function getUrlCompleta()
  {
    return Yii::app()->request->hostInfo . $this->url();
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

  public function nuevaTransaccion()
  {
    return $transaccion = sha1(md5(base64_encode(openssl_random_pseudo_bytes(12))));
  }

  public function vincularImagenes()
  {
    $imagenes = Imagen::model()->findAll("transaccion = '{$this->transaccion}'");
    foreach ($imagenes as $imagen) {
      $imagen_item = new ImagenItem;
      $imagen_item->tabla_id = self::ID;
      $imagen_item->entidad_id = $this->id;
      $imagen_item->imagen_id = $imagen->id;
      if ($imagen_item->save()) {
        rename(
          Yii::getPathOfAlias('webroot') . "/tmp/{$this->transaccion}{$imagen->nombre}",
          Yii::getPathOfAlias('webroot') . "/img/publicacion/{$this->id}/{$imagen->id}_{$imagen->nombre}"
        );
        $imagen->transaccion = '';
        $imagen->save();
      }
    }
  }

  static public function buscar($q=null)
  {
    return self::model()->findAll("titulo ~* E'\\\m$q'");
  }

  public function defaultScope()
  {
    return array(
      'order' => 'fecha_edicion DESC',
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
    $criteria->compare('titulo', $this->titulo, true);
    $criteria->compare('archivo', $this->archivo, true);
    $criteria->compare('insercion', $this->insercion, true);
    $criteria->compare('visor', $this->visor);
    $criteria->compare('resumen', $this->resumen, true);
    $criteria->compare('informacion', $this->informacion, true);
    $criteria->compare('fecha_publicacion', $this->fecha_publicacion, true);
    $criteria->compare('fecha_edicion', $this->fecha_edicion, true);
    $criteria->compare('miniatura', $this->miniatura, true);
    $criteria->compare('url', $this->url, true);

    return new CActiveDataProvider($this, array(
      'criteria'=>$criteria,
    ));
  }

  public function opcionesVisor()
  {
    return $this->visores;
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
