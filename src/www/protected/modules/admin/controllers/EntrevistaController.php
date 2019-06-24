<?php

class EntrevistaController extends AdminController
{

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
        'actions'=>array(
          'agregar',
          'cargarImagenes',
          'index',
          'ver',
          'editar',
          'eliminar',
        ),
        'users'=>array('@'),
      ),
      array('deny')
    );
  }

  /**
   * Lists all models.
   */
  public function actionIndex()
  {
    $dataProvider = new CActiveDataProvider('Entrevista');
    $this->render('index', array(
      'dataProvider' => $dataProvider,
    ));
  }

  /**
   * Displays a particular model.
   * @param integer $id the ID of the model to be displayed
   */
  public function actionVer($id)
  {
    $this->render('ver', array(
      'model' => $this->loadModel($id),
    ));
  }

  /**
   * Crea un nuevo modelo.
   * Si la creación es exitosa, será redirecionado a la página 'ver'.
   */
  public function actionAgregar($transaccion=null)
  {
    $model = new Entrevista;
    if (!$transaccion) {
      $transaccion = $model->nuevaTransaccion();
    }

    if (isset($_POST['Entrevista'])) {
      if (!isset($_POST['Entrevista']['transaccion'])) {
        $transaccion = $model->nuevaTransaccion();
      }
      $model->attributes = $_POST['Entrevista'];
      if ($model->save()) {
        $this->redirect(array('/admin/entrevista/ver', 'id' => $model->id));
      }
    }

    $this->render('agregar', array(
      'model' => $model,
      'transaccion' => $transaccion,
    ));
  }

  /**
   * Updates a particular model.
   * If editar is successful, the browser will be redirected to the 'ver' page.
   * @param integer $id the ID of the model to be editard
   */
  public function actionEditar($id, $transaccion=null)
  {
    $model = $this->loadModel($id);
    if (!$transaccion) {
      $transaccion = $model->nuevaTransaccion();
    }

    if (isset($_POST['Entrevista'])) {
      $model->attributes = $_POST['Entrevista'];
      if ($model->save()) {
        $this->redirect(array('/admin/entrevista/ver', 'id' => $model->id));
      }
    }

    $this->render('editar', array(
      'model' => $model,
      'transaccion' => $transaccion,
    ));
  }

  /**
   * Deletes a particular model.
   * If deletion is successful, the browser will be redirected to the 'administrar' page.
   * @param integer $id the ID of the model to be deleted
   */
  public function actionEliminar($id)
  {

    $this->loadModel($id)->delete();

    // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
    if(!isset($_GET['ajax']))
      $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/admin/entrevista'));
  }

  public function cargarImagenes($transaccion)
  {
    $images_arr = array();
    $target_dir = Yii::getPathOfAlias('webroot') . "/tmp/{$transaccion}";
    foreach($_FILES['Entrevista']['name']['imagenes'] as $key => $val) {
      if ($_FILES['Entrevista']['size']['imagenes'][$key] < 2000000) {
        $target_file = $target_dir . $_FILES['Entrevista']['name']['imagenes'][$key];
        if(move_uploaded_file($_FILES['Entrevista']['tmp_name']['imagenes'][$key], $target_file)) {
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
