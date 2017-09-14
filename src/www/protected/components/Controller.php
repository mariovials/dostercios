<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base
 * class.
 */
class Controller extends CController {

  /**
   * Inicializa el nombre de la página
   * @return void
   * @author Mario Vial <mariovials@gmail.com> 2015-01-26 16:12
   */
  public function init()
  {
    parent::init();
    $nombre_principal = Parametro::model()->get('nombre');
    $this->title      = $nombre_principal;
    Yii::app()->name  = $nombre_principal;
    $this->description = Parametro::model()->get('nombre');
  }

	/**
	 * @var string the default layout for the controller view. Defaults to
	 * '//layouts/column1', meaning using a single column layout.
	 * See 'protected/views/layouts/column1.php'.
	 */
	public $layout='public/main';

	/**
	 * @var array the breadcrumbs of the current page. The value of this property
	 * will be assigned to {@link CBreadcrumbs::links}.
	 * Please refer to {@link CBreadcrumbs::links} for more details on how to
	 * specify this property.
	 */
	public $breadcrumbs=array();

	public $menu = array();

	/**
   * El title de la pagina web
   * @var string
   * @author Mario Vial <mariovials@gmail.com> 2015-01-26 16:13
   */
  public $title;

  /**
   * El meta description de la página web
   * @var string
   * @author Mario Vial <mariovials@gmail.com> 2015-01-26 16:13
   */
	public $description;

  /**
   * Carga scripts en la página
   *
   * @param array $files direccion de los archivos a cargar
   * @param boolean $ext indica si el archivo es interno o externo
   */
  public function cargar_js($file, $ext=false) {

    $cs = Yii::app()->getClientScript();
    $dir = BASE_URL . "/js/{$file}";
    $cs->registerScriptFile($dir, CClientScript::POS_END);

  }

  /**
   * Carga los archivos de jquery
   *
   * @param boolean $ui, si viene seteado a true,
   * carga tambien los componentes de JQUERY UI
   */
  public function cargar_jquery($ui=false) {

    Yii::app()->clientScript->registerCoreScript('jquery');
    if($ui) app()->clientScript->registerCoreScript('jquery.ui');
  }

  public function cargar_jui() {
    Yii::app()->clientScript->registerCoreScript('jquery.ui');
  }

  /**
   * Crea una URL con formato de guión (-) en vez de camelCase
   *
   * Creates a relative URL for the specified action defined in this controller.
   * @param string $route the URL route. This should be in the format of 'ControllerID/ActionID'.
   * If the ControllerID is not present, the current controller ID will be prefixed to the route.
   * If the route is empty, it is assumed to be the current action.
   * If the controller belongs to a module, the {@link CWebModule::getId module ID}
   * will be prefixed to the route. (If you do not want the module ID prefix, the route should start with a slash '/'.)
   * @param array $params additional GET parameters (name=>value). Both the name and value will be URL-encoded.
   * If the name is '#', the corresponding value will be treated as an anchor
   * and will be appended at the end of the URL.
   * @param string $ampersand the token separating name-value pairs in the URL.
   * @return string the constructed URL
   * @author Mario Vial <mariovials@gmail.com> 2015-07-02 11:26
  public function createUrl($route,$params=array(),$ampersand='&') {
    if($route==='')
      $route=camel2dash($this->getId()).'/'.camel2dash($this->getAction()->getId());
    elseif(strpos($route,'/')===false)
      $route=camel2dash($this->getId()).'/'.$route;
    if($route[0]!=='/' && ($module=$this->getModule())!==null)
      $route=camel2dash($this->getId()).'/'.$route;
    return Yii::app()->createUrl(trim($route,'/'),$params,$ampersand);
  }
   */

}
