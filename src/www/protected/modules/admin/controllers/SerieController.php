<?php

class SerieController extends AdminController
{

  /**
   * Carga las accessControl (accessRules)
   */
  public function filters()
  {
    return array(
      'loadModel - agregar, index',
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
   * Displays a particular model.
   * @param integer $id the ID of the model to be displayed
   */
  public function actionVer($id) {
    $this->render('ver', array(
      'model'=>$this->loadModel($id),
    ));
  }

  /**
   * Lists all models.
   */
  public function actionIndex() {
    $dataProvider = new CActiveDataProvider('Serie');
    $this->render('index',array(
      'dataProvider'=>$dataProvider,
    ));
  }

  /**
   * Crea un nuevo modelo.
   * Si la creación es exitosa, será redirecionado a la página 'ver'.
   */
  public function actionAgregar() {
    $model = new Serie;

    if(isset($_POST['Serie'])) {
      $model->attributes = $_POST['Serie'];
      if($model->save())
        $this->redirect(array('/admin/serie/ver','id'=>$model->id));
    }

    $this->render('agregar',array(
      'model'=>$model,
    ));
  }

  /**
   * Updates a particular model.
   * If editar is successful, the browser will be redirected to the 'ver' page.
   * @param integer $id the ID of the model to be editard
   */
  public function actionEditar($id) {

    $model = $this->loadModel($id);

    if(isset($_POST['Serie'])) {
      $model->attributes = $_POST['Serie'];
      if($model->save())
        $this->redirect(array('/admin/serie/ver','id'=>$model->id));
    }

    $this->render('editar',array(
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
      $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/admin/serie'));
  }

}
