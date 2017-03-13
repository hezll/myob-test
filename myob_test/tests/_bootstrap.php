<?php
// Composer
require_once('../vendor/autoload.php');

// Set environment
defined('YII_ENV') or define('YII_ENV', 'test');

// Environment
$dotenv = new \Dotenv\Dotenv('../');
$dotenv->load();
$dotenv->required('TEST_DB_DSN');
$dotenv->required('TEST_DB_USERNAME');
$dotenv->required('TEST_DB_PASSWORD');



defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');

defined('YII_APP_BASE_PATH') or define('YII_APP_BASE_PATH', dirname(dirname(__DIR__)));


require_once(YII_APP_BASE_PATH . '/vendor/yiisoft/yii2/Yii.php');
require_once(YII_APP_BASE_PATH . '/common/config/bootstrap.php');
require_once(YII_APP_BASE_PATH . '/backend/config/bootstrap.php');

Yii::setAlias('@tests', dirname(dirname(__DIR__)));
