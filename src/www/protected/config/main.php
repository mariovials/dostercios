<?php

require_once(dirname(__FILE__).'/../extensions/file_helper.php');
require_once(dirname(__FILE__).'/../extensions/yii_helper.php');
require_once(dirname(__FILE__).'/../extensions/time_helper.php');
require_once(dirname(__FILE__).'/../extensions/php_helper.php');
require_once(dirname(__FILE__).'/../extensions/dev_helper.php');
require_once(dirname(__FILE__).'/../extensions/app_helper.php');

$baseUrl = (strlen(dirname($_SERVER['SCRIPT_NAME'])) > 1) ? dirname($_SERVER['SCRIPT_NAME']) : '';
define('BASE_URL', $baseUrl);

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
  'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
  'name'=>'DosTercios',

  'language'=>'es',
  'sourceLanguage'=>'es',

  // controlador por defecto
  'defaultController'=>'public/sitio',

  // preloading 'log' component
  'preload'=>array('log'),

  // autoloading model and component classes
  'import'=>array(
    'application.models.*',
    'application.components.*',
    'application.extensions.*',
    'application.modules.*',
    'application.extensions.widgets.*',
  ),

  'modules'=>array(
    'admin',
    'public',

    // uncomment the following to enable the Gii tool
    'gii'=>array(
      'class'=>'system.gii.GiiModule',
      'password'=>'1234',
      // If removed, Gii defaults to localhost only.
      // Edit carefully to taste.
      'ipFilters'=>array('192.168.56.*'),
      'generatorPaths'=>array(
        'application.gii',   // a path alias
      ),
    ),

  ),

  // application components
  'components'=>array(
    'widgetFactory'=>array(
      'widgets'=>array(
        'CLinkPager'=>array(
          'header'=>'',
          'cssFile'=> BASE_URL.'/css/pager.css',
        ),
      ),
    ),

    // reemplaza los archivos de jquery y jquery-ui
    'clientScript'=>array(
      'scriptMap'=>array(
        'jquery-ui.css'    => BASE_URL.'/css/jquery-ui.min.css',
        'jquery'           => BASE_URL.'/js/jquery-2.1.4.min.js',
        'jquery.js'        => BASE_URL.'/js/jquery-2.1.4.min.js',
        'jquery.min.js'    => BASE_URL.'/js/jquery-2.1.4.min.js',
        'jquery-ui.min.js' => BASE_URL.'/js/jquery-ui.min.js',
        'jquery.form'      => BASE_URL.'/js/jquery.form.js',
        'packery'          => BASE_URL.'/js/packery.pkgd.min.js',
        'slick'            => BASE_URL.'/js/slick.js',
      ),
      'packages'=>array(
        'jquery.ui'=>array(
          'basePath'=>dirname(__FILE__).'/',
          'baseUrl' => BASE_URL.'/',
          'js'=>array(
            'js/jquery-ui.min.js',
          ),
          'css'=>array(
            'css/jquery-ui.min.css',
            'css/jquery-ui.theme.css',
          ),
          'depends' => array(
            'jquery',
          ),
        ),
        'summernote' => array(
          'basePath' => dirname(__FILE__) . '/',
          'baseUrl' => BASE_URL . '/',
          'js' => array(
            'js/bootstrap.min.js',
            'js/summernote.min.js',
          ),
          'css' => array(
            'css/summernote.css',
            'css/bootstrap.min.css',
            'css/font-awesome.min.css',
          ),
          'depends' => array(
            'jquery',
          ),
        ),
        'slick' => array(
          'basePath' => dirname(__FILE__) . '/',
          'baseUrl' => BASE_URL . '/',
          'js' => array(
            'js/slick.min.js',
          ),
          'css' => array(
            'css/slick.css',
            'css/slick-theme.css',
          ),
          'depends'=>array(
            'jquery',
          ),
        ),
      )
    ),

    /**
     * Carga los mensajes de yii en español.
     * Debe estar la carpeta "es" original en yii/framework/messages/es
     * en /protected/messages/es
     */
    'coreMessages'=>array(
      'basePath'=>dirname(__FILE__).'/../messages/'
    ),

    'user'=>array(
      'loginUrl'=>array('/admin/sistema/entrar'),
      'allowAutoLogin'=>true,
    ),

    // uncomment the following to enable URLs in path-format
    'urlManager'=>array(
      'class'=>'ext.urlManager', // para convertir separador de guion a camelCase
      'urlFormat'=>'path',
      'showScriptName'=>false,
      'rules'=>array(

        '/inicio' => '/public',

        '/serie/<serie:[0-9a-zA-Z_\-]+>/<url:[0-9a-zA-Z_\-]+>' => 'public/capitulo/ver',

        '/admin/<controller:entrevista>/<action:cargarImagenes>/<id:\w+>' => '/admin/<controller>/<action>',
        '/admin/<controller:noticia>/<action:cargarImagenes>/<id:\w+>' => '/admin/<controller>/<action>',

        '/entrevistas'=>'/public/entrevista',
        '/series'=>'/public/serie',
        '/sobre'=>'/public/sitio/sobre',
        '/noticias'=>'/public/noticia',
        '/producciones'=>'/public/produccion',
        '/editorial'=>'/public/publicacion',

        // '/publicaciones'=>'/public/publicaciones',

        '<module>/<controller:[0-9a-zA-Z_\-]+>/<id:\d+>' => '<module>/<controller>/ver',
        '<module>/<controller:[0-9a-zA-Z_\-]+>/<action:[0-9a-zA-Z_\-]+>/<id:\d+>' => '<module>/<controller>/<action>',
        '<module>/<controller:[0-9a-zA-Z_\-]+>/<action:[0-9a-zA-Z_\-]+>' => '<module>/<controller>/<action>',

        '<controller:(entrevista|serie|noticia|produccion|publicacion)>/<url:[0-9a-zA-Z_\-]+>' => 'public/<controller>/ver',

      ),
    ),

    'db'=>array(
      'connectionString'=>"pgsql:host=localhost;port=5432;dbname=dosterci_os",
      'username'=>'dosterci',
      'password'=>'Q1qiGb2m38',
      'charset'=>'utf8',
      'enableParamLogging'=>true,
    ),

    'errorHandler'=>array(
      'errorAction'=>'/admin/sistema/error',
    ),

    'log'=>array(
      'class'=>'CLogRouter',
      'routes'=>array(
        array(
          'class'=>'CFileLogRoute',
          'levels'=>'error, warning',
        ),
        // uncomment the following to show log messages on web pages
        array(
          'class'=>'CWebLogRoute',
          'levels'=>'trace, info, profile, error, warning',
        ),
      ),
    ),

  ),

  // application-level parameters that can be accessed
  // using Yii::app()->params['paramName']
  'params'=>array(
    // this is used in contact page
    'adminEmail'=>'mariovials@gmail.com',
  ),
);
