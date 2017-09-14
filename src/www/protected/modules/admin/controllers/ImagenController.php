<?php

/**
 * Controlador para el modelo Imagen
 */
class ImagenController extends AdminController
{

  /**
   * Carga las accessControl (accessRules)
   */
  public function filters()
  {
    return array(
      'loadModel - agregar, index',
      'accessControl', // control de acceso a las actions
      // 'postOnly + eliminar', // solo se permite eliminar por POST
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
          'eliminar',
        ),
        'users'=>array('@'),
      ),
      array('deny')
    );
  }

  /**
   * Eliminar una instancia del modelo
   * @param integer $id el ID del modelo
   */
  public function actionEliminar($id)
  {
    $model = $this->_model;
    $model->delete();
  }

}
