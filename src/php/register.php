<?php
require_once '../config.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    Helper::redirect('register.php')->with(['error' => 'Form token expired']);
}

if (Helper::csrfValidate()) {
    $name = Helper::sanitize($_POST['name']);
    $email = Helper::sanitize($_POST['email']);
    $password = Helper::sanitize($_POST['password']);
    $user = UserModel::model()->register($name, $email, $password);
    if ($user) {
        Helper::redirect('register.php')->with(['success' => "Account created successfully"])->go();
    } else {
        Helper::redirect('register.php');
    }
} else {
    Helper::redirect(BASE_URL)->with(['error' => 'Form token expired']);
}
