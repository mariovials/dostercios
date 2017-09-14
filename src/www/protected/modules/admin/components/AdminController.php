<?php
/**
 * Controlador para TODAS las acciones de administración
 * @author Mario Vial <mariovials@gmail.com> 2015-09-13 15:56
 */
class AdminController extends Controller {

  public $layout = 'main';

  /**
   * El modelo que maneja el controlador
   * @var Grupo
   */
  protected $_model;


  /**
   * Retorna la instancia del modelo por su clave primaria
   * y setea la variable _model del controlador
   * @param integer $id el ID del modelo
   */
  public function loadModel() {
    $model = $this->_modelName; // es una función
    if($this->_model === null) {
      $this->_model = $model::model()->findByPk(GET('id'));
      if($this->_model === null) {
        throw new CHttpException(404);
      }
    }
    return $this->_model;
  }

  /**
   * Carga el modelo que maneja el controlador
   */
  public function filterLoadModel($filterChain) {
    $this->loadModel();
    $filterChain->run();
  }

  /**
   * Si está definida la propiedad _modelName
   * la retorna
   * de lo contrario retorna el Id del controlador,
   * con mayúscula en la primera letra
   * Por convención de Yii, esto debería coincidir con el nombre del modelo
   * @return string
   * @author Mario Vial <mariovials@gmail.com> 2014-04-08 14:45
   */
  public function get_modelName() {
    if(property_exists($this, '_modelName'))
      return $this->_modelName;
    else return ucfirst($this->id);
  }

  /**
   * @return array action filters
   */
  public function filters() {
    return array(
      'accessControl', // perform access control for CRUD operations
      'postOnly + eliminar', // we only allow deletion via POST request
    );
  }

  /**
   * Specifies the access control rules.
   * This method is used by the 'accessControl' filter.
   * @return array access control rules
   */
  public function accessRules() {
    return array(
      array('allow',
        'actions'=>array('entrar', 'index', 'salir'),
        'users'=>array('*'),
      ),
    );
  }

}
