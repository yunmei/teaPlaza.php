<?php
date_default_timezone_set('PRC');
// change the following paths if necessary
$yii=dirname(__FILE__).'/yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
$global = dirname(__FILE__) . '/yii/global.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
require_once($global);

$app = Yii::createWebApplication($config);
mb_internal_encoding(app()->charset);
$app->run();