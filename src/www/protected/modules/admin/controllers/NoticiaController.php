<?php

/**
 * Controlador para el modelo Noticia
 */
class NoticiaController extends AdminController {

  /**
   * Carga las accessControl (accessRules)
   */
  public function filters()
  {
    return array(
      'loadModel - agregar, index, cargarImagenes',
      'accessControl', // control de acceso a las actions
      'postOnly + eliminar', // solo se permite eliminar por POST
    );
  }

  /**
   * Especifica las reglas de control de acceso
   *
   * Las reglas de acceso para modelos específicos se controlan en
   * Model::puede($action)
   *
   * Las reglas de acceso para listar y administrar varios modelos
   * se controlan con roles
   */
  public function accessRules()
  {
    return array(
      array('allow',
        'actions' => array(
          'agregar',
          'index',
          'administrar',
          'ver',
          'editar',
          'eliminar',
          'cargarImagenes',
        ),
        'users' => array('@'),
      ),
      array('deny')
    );
  }

  /**
   * Ver la lista de todas instancias del modelo
   */
  public function actionIndex()
  {

    $dataProvider = new CActiveDataProvider('Noticia');
    $this->render('index', array(
      'dataProvider' => $dataProvider,
    ));
  }

  /**
   * Detalle del modelo
   * @param integer $id el ID del modelo
   */
  public function actionVer($id)
  {

    $model = $this->_model;

    $this->render('ver', array(
      'model' => $model,
    ));
  }

  /**
   * Agrega una nueva instancia del modelo
   */
  public function actionAgregar($transaccion = null)
  {

    $model = new Noticia;
    if (!$transaccion) {
      $transaccion = $model->nuevaTransaccion();
    }

    if(isset($_POST['Noticia'])) {
      if (!isset($_POST['Noticia']['transaccion'])) {
        $transaccion = $model->nuevaTransaccion();
      }
      $model->attributes = $_POST['Noticia'];
      if($model->save()) {
        $this->redirect(array('/admin/noticia/ver', 'id' => $model->id));
      }
    }

    $this->render('agregar', array(
      'model' => $model,
      'transaccion' => $transaccion,
    ));
  }

  /**
   * Editar una instancia del modelo
   * @param integer $id el ID del modelo
   */
  public function actionEditar($id, $transaccion=null)
  {

    $model = $this->_model;
    if (!$transaccion) {
      $transaccion = $model->nuevaTransaccion();
    }

    if(isset($_POST['Noticia'])) {
      $model->attributes = $_POST['Noticia'];
      if($model->save()) {
        $this->redirect(array('/admin/noticia/ver', 'id' => $model->id));
      }
    }

    $this->render('editar', array(
      'model' => $model,
      'transaccion' => $transaccion,
    ));
  }

  /**
   * Eliminar una instancia del modelo
   * @param integer $id el ID del modelo
   */
  public function actionEliminar($id)
  {

    $model = $this->_model;
    $model->delete();

    // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
    if(!isset($_GET['ajax']))
      $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/admin/noticia/'));
  }

  public function cargarImagenes($transaccion)
  {
    $images_arr = array();
    $target_dir = Yii::getPathOfAlias('webroot') . "/tmp/{$transaccion}";
    foreach($_FILES['Noticia']['name']['imagenes'] as $key => $val){
      if ($_FILES['Produccion']['size']['imagenes'][$key] < 2000000) {
        $target_file = $target_dir . $_FILES['Noticia']['name']['imagenes'][$key];
        if(move_uploaded_file($_FILES['Noticia']['tmp_name']['imagenes'][$key], $target_file)) {
          $imagen = new Imagen;
          $imagen->nombre = $val;
          $imagen->transaccion = $transaccion;
          if ($imagen->save()) {
            echo '<div class="preview"><img src="'.BASE_URL."/tmp/{$transaccion}{$val}".'" alt="'.$val.'" /></div>';
          } else {
            D($imagen->errors);
            header('HTTP/1.1 500 Internal Server Booboo');
          }
        }
      } else  {
        echo D("Imagen muy grande. 2MB máximo");
      }
    }
    die();
  }

  /**
   * Se usa para cargar las imagenes. Vinculado desde js (subir_foto.js)
   * @param  string $transaccion ID transacción
   * @return void
   * @author Mario Vial <mariovials@gmail.com> 2015-08-06 12:13
   */
  public function actionCargarImagenes($transaccion)
  {
    $this->cargarImagenes($transaccion);
  }

}
