<?php

/**
 * This is the model class for table "noticia".
 *
 * The followings are the available columns in table 'noticia':
 * @property integer $id
 * @property string $titulo
 * @property string $texto
 * @property string $video
 * @property string $fecha_publicacion
 * @property string $fecha_edicion
 * @property string $miniatura
 * @property string $resumen
 */
class Noticia extends DTActiveRecord
{

  const ID = 4; // ok
  const ALIAS = 'no'; // ok

  protected $default_controller_name = 'noticia';
  protected $default_label_link = 'titulo';
  protected $transaccion;

  protected $_puede_ir_en_portada = true;
  protected $_tiene_etiquetas = true;

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return Noticia the static model class
   */
  public static function model($className=__CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'noticia';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {

    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('titulo, fecha_edicion', 'required'),
      array('url', 'unique'),
      array('portada', 'numerical', 'integerOnly'=>true, 'min'=>0, 'max'=>2),
      array('titulo, video, miniatura, url', 'length', 'max'=>2000),
      array('texto, fecha_publicacion, resumen, miniatura, transaccion,
        etiquetas',
        'safe'),
      // The following rule is used by search().
      // Please remove those attributes that should not be searched.
      array('id, titulo, texto, video, fecha_publicacion, fecha_edicion, miniatura, resumen', 'safe', 'on'=>'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {

    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
      'portadaModel'=>array(self::HAS_ONE, 'Portada',
        array('entidad_id'=>'id'),
        'condition' => 'tabla_id = '.self::ID,
      ),
      'imagenesItem'=>array(self::HAS_MANY, 'ImagenItem',
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
      'video'=>'Video',
      'fecha_publicacion'=>'Fecha de publicación',
      'fecha_edicion'=>'Fecha de edición',
      'miniatura'=>'Miniatura',
      'resumen'=>'Resumen',
      'imagenes' => 'Imágenes',
      'url'=>'Dirección URL pública',
      'portada'=>'Mostrar en portada',
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
      'video' => 'iFrame para incrustar el video',
      'resumen'=>'Para la miniatura',
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
      'video' => 'Usar ancho de 100% y alto de 580px',
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
      'fecha_edicion'
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
      'miniatura' => "/img/noticia/{$this->id}/"
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
    $criteria->compare('texto', $this->texto, true);
    $criteria->compare('video', $this->video, true);
    $criteria->compare('fecha_publicacion', $this->fecha_publicacion, true);
    $criteria->compare('fecha_edicion', $this->fecha_edicion, true);
    $criteria->compare('miniatura', $this->miniatura, true);
    $criteria->compare('resumen', $this->resumen, true);

    return new CActiveDataProvider($this, array(
      'criteria'=>$criteria,
    ));
  }

  public function beforeValidate()
  {
    $this->fecha_edicion = date('d/m/Y H:i:s');
    return parent::beforeValidate();
  }

  public function beforeSave()
  {
    if($this->isNewRecord && $this->fecha_publicacion == '') {
      $this->fecha_publicacion = date('d/m/Y');
    }
    return parent::beforeSave();
  }

  public function afterSave()
  {
    if ($this->isNewRecord) {
      mkdir($this->pathImagen(true));
    }
    $this->vincularImagenes();
    return parent::afterSave();
  }

  public function afterDelete()
  {
    rrmdir($this->pathImagen(true));
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

  public function getUrlCompleta()
  {
    return Yii::app()->request->hostInfo . $this->url();
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
          Yii::getPathOfAlias('webroot') . "{$this->pathImagen()}/{$imagen->filename}"
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

  /**
   * @author Mario Vial <mariovials@gmail.com> 2015-11-25 11:52
   */
  public function pathImagen($root = false)
  {
    $path = "/img/noticia/{$this->id}";
    if ($root) {
      $path = Yii::getPathOfAlias('webroot') . $path;
    }
    return $path;
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

  public function defaultScope()
  {
    return array(
      'order' => 'fecha_publicacion DESC',
    );
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
