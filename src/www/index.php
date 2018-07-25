<?php
/**
 * @author Mario Vial <mariovials@gmail.com> 2015-10-28 11:55
 */

defined('YII_ENV') or define('YII_ENV', 'dev');
defined('YII_DEBUG') or define('YII_DEBUG', true);

ini_set('post_max_size', '1000M');
ini_set('upload_max_filesize', '1000M');
ini_set('max_execution_time', '2000');
ini_set('max_input_time', '2000');

date_default_timezone_set("Chile/Continental");

$yii    = dirname(__FILE__) . '/../lib/yii/framework/yii.php';
$config = dirname(__FILE__) . '/protected/config/leu.php';

require_once($yii);
Yii::createWebApplication($config)->run();
