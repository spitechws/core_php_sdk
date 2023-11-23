<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


define('BASE_URL', 'http://localhost/html/inhouse/core_php_sdk/src/');
define('LOGIN_PAGE', 'index.php');

//App
define('APP_DEBUG', true);
define('APP_ROOT', __DIR__);
define('APP_LOG', APP_ROOT . '/log');


//Security
define('CSRF_TOKEN', 'csrf_token');
define('ENABLE_CSRF', true);

//database
define('DB_HOSTNAME', 'localhost');
define('DB_PORT', 3306);
define('DB_USER', 'root');
define('DB_PASSWORD', '1234');
define('DB_NAME', 'assignment');


//Auto loading
function myAutoloader($className)
{
    $path = APP_ROOT . "/app/";
    $file = $path . $className . '.php';

    if (file_exists($file)) {
        include $file;
    }
}
spl_autoload_register('myAutoloader');
