<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//App
define('APP_DEBUG', true);
define('APP_ROOT', __DIR__);
define('APP_LOG', APP_ROOT . '/log');
define('BASE_URL', 'http://localhost/html/assignment/');
define('LOGIN_PAGE', 'index.php');

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

// $name = 'ganesh';
// $email = 'ganeshsoni@gmail.com';
// $password = password_hash('test', PASSWORD_DEFAULT);
// $result = UserModel::model()->register($name, $email, $password);
// if ($result) {
//     echo "user created successfully";
// } else {
//     echo "user not created";
// }

// $user = UserModel::model()->login('ganeshsoni@gmail.com', 'test');

// Helper::debug($user);
