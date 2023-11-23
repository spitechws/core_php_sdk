<?php

class Auth extends App
{

    private static $userSessionKey = 'userAuth';

    /**
     * login
     *
     * @return void
     */
    public static function login($user)
    {
        if (isset($user)) {
            $_SESSION[self::$userSessionKey]['user'] = $user;
        }
    }

    /**
     * returns authenticated user 
     *
     * @return object
     */
    public static function user()
    {
        if (!empty($_SESSION[self::$userSessionKey]['user'])) {
            return $_SESSION[self::$userSessionKey]['user'];
        }
    }

    /**
     * logout
     *
     * @return void
     */
    public static function logout()
    {
        if (isset($_SESSION[self::$userSessionKey]['user'])) {
            unset($_SESSION[self::$userSessionKey]['user']);
        }
        session_destroy();
        Helper::redirect(LOGIN_PAGE);
    }
}
