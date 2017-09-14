<?php

/**
 * Controlador para el modelo Imagen
 */
class ImagenController extends AdminController {

  /**
   * Carga las accessControl (accessRules)
   */
  public function filters()
  {
    return array(
      'loadModel - agregar, index, administrar',
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
          'index',
          'administrar',
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
   * Detalle del modelo
   * @param integer $id el ID del modelo
   */
  public function actionVer($id)
  {

    $model = $this->_model;

    $this->render('ver', array(
      'model'=>$model,
    ));
  }

  /**
   * Agrega una nueva instancia del modelo
   */
  public function actionAgregar()
  {

    $model = new Imagen;

    if(isset($_POST['Imagen'])) {
      $model->attributes = $_POST['Imagen'];
      if($model->save()) {
        $this->redirect(array('ver', 'id'=>$model->id));
      }
    }

    $this->render('agregar', array(
      'model'=>$model,
    ));
  }

  /**
   * Editar una instancia del modelo
   * @param integer $id el ID del modelo
   */
  public function actionEditar($id)
  {

    $model = $this->_model;

    if(isset($_POST['Imagen'])) {
      $model->attributes = $_POST['Imagen'];
      if($model->save()) {
        $this->redirect(array('ver', 'id'=>$model->id));
      }
    }

    $this->render('editar', array(
      'model'=>$model,
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
      $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
  }

  /**
   * Ver la lista de todas instancias del modelo
   */
  public function actionIndex()
  {

    $dataProvider = new CActiveDataProvider('Imagen');
    $this->render('index', array(
      'dataProvider'=>$dataProvider,
    ));
  }

  /**
   * Administrar
   */
  public function actionAdministrar()
  {

    $model = new Imagen('search');
    $model->unsetAttributes();  // clear any default values
    if(isset($_GET['Imagen']))
      $model->attributes = $_GET['Imagen'];

    $this->render('administrar', array(
      'model'=>$model,
    ));
  }

}
