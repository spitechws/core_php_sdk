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
        if (isset($_SESSION[self::$userSessionKey]['user'])) {
            return $_SESSION[self::$userSessionKey]['user'];
        } else {
            self::logout();
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
        Helper::redirect(LOGIN_PAGE);
    }
}
