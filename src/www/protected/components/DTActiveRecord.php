<?php
/**
 * Archivo de la clase ActiveRecord
 * @author Mario Vial <mariovials@gmail.com>
 *
 * Última revisión 20/07/2015
 */

/**
 * Clase Active Record
 * Esta clase mejora la implementación de CActiveRecord
 * @author Mario Vial <mariovials@gmail.com>
 * @version 1.3
 */
class DTActiveRecord extends ActiveRecord {

  protected $_portada;
  protected $_puede_ir_en_portada = false;

  /**
   * Para manipular la gestión de etiquetas
   * @var boolean
   */
  protected $_tiene_etiquetas = false;
  protected $_etiquetas = '';

  public function beforeDelete()
  {
    if ($this->_tiene_etiquetas) {

      $ID = static::ID;
      $etiquetasItem = EtiquetaItem::model()->findAll("
        tabla_id = {$ID} AND
        entidad_id = {$this->id}
      ");

      foreach ($etiquetasItem as $etiquetaItem) {
        $etiquetaItem->delete();
      }

    }
    return parent::beforeDelete();
  }

  /**
   * Se ejecuta después de guardar.
   *
   * Guarda o elimina el elemento de la portada.
   *
   * @return void
   */
  public function afterSave()
  {
    if ($this->_puede_ir_en_portada) {
      if (!$this->estaEnPortada() && $this->portada) {
        $portada = new Portada;
        $portada->tabla_id = static::ID;
        $portada->entidad_id = $this->id;
        $portada->tipo = $this->portada;
        $portada->fecha_edicion = $this->fecha_edicion;
        $portada->save();
      } else if (!$this->portada && $this->estaEnPortada()) {
        $portada = $this->portadaModel;
        $portada->delete();
      } else if ($this->estaEnPortada() && $this->portada) {
        $portada = $this->portadaModel;
        $portada->tipo = $this->portada;
        $portada->fecha_edicion = $this->fecha_edicion;
        $portada->save();
      }
    }
    if ($this->_tiene_etiquetas) {
      $this->vincularEtiquetas();
    }
    return parent::afterSave();
  }

  /**
   * Establece el tipo de portada
   * @return void
   * @todo mejorar, ya que se usa siempre esto, cuando no siempre es necesario
   */
  public function afterFind()
  {
    $portada = $this->portadaModel;
    if ($portada) {
      $this->portada = $portada->tipo;
    }
    if ($this->_tiene_etiquetas) {
      $this->etiquetas = implode(', ', $this->etiquetasActuales());
      $this->etiquetas .= ($this->etiquetas) ? ', ' : '';
    }
    return parent::afterFind();
  }

  public function getPortada()
  {
    return $this->_portada;
  }

  public function setPortada($value=null)
  {
    $this->_portada = $value;
  }

  public function getEtiquetas()
  {
    return $this->_etiquetas;
  }
  public function setEtiquetas($value='')
  {
    $this->_etiquetas = $value;
  }

  public function estaEnPortada()
  {
    $ID = static::ID;
    return $this->portadaModel;
  }

  public function portadaTexto()
  {
    if ($this->estaEnPortada()) {
      if ($this->portadaModel->tipo == 1) {
        $tipo = 'normal';
      } else {
        $tipo = 'grande';
      }
      return "Si, en tamaño $tipo";
    }
    return "No";
  }

  public function imagenPortada()
  {
    if (static::ID == Entrevista::ID) {
      return $this->pathFileAttribute('miniatura');
    }
    if (static::ID == Serie::ID) {
      return $this->pathFileAttribute('imagen');
    }
    if (static::ID == Capitulo::ID) {
      return $this->pathFileAttribute('miniatura');
    }
    if (static::ID == Noticia::ID) {
      return $this->pathFileAttribute('miniatura');
    }
    if (static::ID == Produccion::ID) {
      return $this->pathFileAttribute('miniatura');
    }
    if (static::ID == Publicacion::ID) {
      return $this->pathFileAttribute('miniatura');
    }
  }

  public function vincularEtiquetas()
  {
    $etiquetasTodas = array();
    foreach (Etiqueta::model()->findAll() as $etiqueta) {
      $etiquetasTodas[] = $etiqueta->nombre;
    }
    $etiquetasActuales = $this->etiquetasActuales();
    $etiquetas = array_filter(array_map('trim', explode(',', $this->etiquetas)));

    // agregar a la Base de datos
    $etiquetasNuevas = array_diff($etiquetas, $etiquetasTodas);
    foreach ($etiquetasNuevas as $etiqueta) {
      $etiquetaModel = Etiqueta::agregarEtiqueta($etiqueta);
      $etiquetaModel->agregarAItem(static::ID, $this->id);
    }
    $etiquetas = array_diff($etiquetas, array_diff($etiquetas, $etiquetasTodas));

    // eliminar de las asignaciones
    $etiquetasAEliminar = array_diff($etiquetasActuales, $etiquetas);
    foreach ($etiquetasAEliminar as $etiqueta) {
      $etiqueta = Etiqueta::model()->find("nombre = '$etiqueta'");
      EtiquetaItem::borrarEtiquetaItem(static::ID, $this->id, $etiqueta->id);
    }

    // vincular
    $etiquetasAVincular = array_diff($etiquetas, $etiquetasActuales);
    foreach ($etiquetasAVincular as $etiqueta) {
      $etiqueta = Etiqueta::model()->find("nombre = '$etiqueta'");
      $etiqueta->agregarAItem(static::ID, $this->id, $etiqueta->id);
    }
  }

  public function etiquetasActuales($model = false)
  {
    $ID = static::ID;
    $etiquetasItem = EtiquetaItem::model()->findAll("
      tabla_id = {$ID} AND
      entidad_id = {$this->id}
    ");
    $etiquetas = array();
    foreach ($etiquetasItem as $etiquetaItem) {
      if ($model) {
        $etiquetas[] = $etiquetaItem->etiqueta;
      } else {
        $etiquetas[] = $etiquetaItem->etiqueta->nombre;
      }
    }
    return $etiquetas;
  }

  public function getRelacionadas()
  {
    if ($this->etiquetas) {
      $ID = static::ID;
      $etiquetasItem = EtiquetaItem::model()->findAll("
        tabla_id = {$ID} AND
        entidad_id = {$this->id}
      ");
      foreach ($etiquetasItem as $etiquetaItem) {
        $etiquetas[] = "ei.etiqueta_id = {$etiquetaItem->etiqueta_id}";
      }
      $where = "(" . implode(' OR ', $etiquetas) . ")";
      $where .= " AND ei.entidad_id <> {$this->id}";

      $resultados = Yii::app()->db->createCommand()
        ->select('ei.tabla_id, ei.entidad_id, COUNT(*)')
        ->from('etiqueta_item ei')
        ->where($where)
        ->group('ei.tabla_id, ei.entidad_id')
        ->order('count DESC')
        ->limit(3)
        ->queryAll();

      $models = array();
      foreach ($resultados as $r) {
        $model = Tabla::model()->findByPk($r['tabla_id'])->model;
        $models[] = $model::model()->findByPk($r['entidad_id']);
      }
    } else {
      $models = $this->findAll(array('limit' => '3'));
    }

    return $models;
  }

  public function getTipoMiniatura()
  {
    return $this->modelName;
  }

}
