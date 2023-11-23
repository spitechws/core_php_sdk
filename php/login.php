<?php
require_once '../config.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    Helper::redirect(BASE_URL)->with(['error' => 'Form token expired']);
}

if (Helper::csrfValidate()) {
    $email = Helper::sanitize($_POST['email']);
    $password = Helper::sanitize($_POST['password']);
    $user = UserModel::model()->login($email, $password);
    if ($user) {
        Helper::redirect('user/index.php')->with(['user' => $user])->go();
    } else {
        Helper::redirect(BASE_URL)->with(['error' => 'invalid login details']);
    }
} else {
    Helper::redirect(BASE_URL)->with(['error' => 'Form token expired']);
}
