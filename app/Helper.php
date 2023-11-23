<?php

class Helper extends App
{
    private $url;
    private static $flashKey = 'flush';
    private $redirectCalled = false;
    private $flashData;

    /**
     * asset
     *
     * @param  mixed $url
     * @return string
     */
    public static function asset($url): string
    {
        return BASE_URL . $url;
    }

    /**
     * base_url
     *
     * @return string
     */
    public static function base_url(): string
    {
        return BASE_URL;
    }

    /**
     * log message when debug is true
     *
     * @param  mixed $message
     * @return void
     */
    public static function log($message)
    {
        if (APP_DEBUG) {
            // Get backtrace information
            $backtrace = debug_backtrace();
            $caller = isset($backtrace[1]) ? $backtrace[1] : null;

            // Extracting file name and line number
            $fileName = $caller['file'] ?? 'unknown file';
            $lineNumber = $caller['line'] ?? 'unknown line';

            // Format the current date and time
            $date = date('Y-m-d H:i:s');

            // Format the log message with file name and line number
            $logMessage = "[$date] [$fileName:$lineNumber] $message" . PHP_EOL;

            $path = APP_LOG . '/app.log';
            file_put_contents($path, $logMessage, FILE_APPEND | LOCK_EX);
        }
    }

    /**
     * debug
     *
     * @param  mixed $arg
     * @param  mixed $exit
     * @return void
     */
    public static function debug($arg, $exit = 1)
    {
        echo "<pre>";
        print_r($arg);
        echo "</pre>";
        if ($exit) {
            exit;
        }
    }

    /**
     * generate csrf token 
     *
     * @return void
     */
    public static function csrf()
    {
        // Generate CSRF token
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        echo '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($_SESSION['csrf_token']) . '">';
    }

    /**
     * validate csrf token
     *
     * @return void
     */
    public static function csrfValidate()
    {
        if (ENABLE_CSRF) {
            return isset($_POST[CSRF_TOKEN]) && hash_equals($_SESSION[CSRF_TOKEN], $_POST[CSRF_TOKEN]);
        } else {
            return true;
        }
    }

    /**
     * redirect
     *
     * @param  string $url
     * @return Helper
     */
    public static function redirect(string $url): Helper
    {
        $helper = new static();
        $helper->url = self::url($url);
        return $helper;
    }



    /**
     * with
     *
     * @param  mixed $flashData
     * @return Helper
     */
    public function with($flashData): Helper
    {
        $this->flashData = $flashData;
        return $this;
    }

    /**
     * go
     *
     * @return void
     */
    public function go()
    {
        $this->redirectCalled = true;
        $this->executeRedirect();
    }

    /**
     * executeRedirect
     *
     * @return void
     */
    private function executeRedirect()
    {
        // Store flash data in session
        if (!empty($this->flashData)) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            foreach ($this->flashData as $key => $value) {
                $_SESSION[$key] = $value;
            }
        }
        // Redirect
        header("Location: {$this->url}");
        exit;
    }




    /**
     * return session data
     *
     * @param  string $key
     * @return void
     */
    public static function getFlush(string $key)
    {
        return isset($_SESSION[self::$flashKey][$key]) ? $_SESSION[self::$flashKey][$key] : '';
    }

    /**
     * sanitize for xss
     *
     * @param  mixed $value
     * @return string
     */
    public static function sanitize($value): string
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }



    /**
     * url
     *
     * @param  mixed $url
     * @return string
     */
    public static function url($url): string
    {
        if (!empty($url)) {
            return BASE_URL . $url;
        } else {
            return BASE_URL;
        }
    }

    /**
     * __destruct
     *
     * @return void
     */
    public function __destruct()
    {
        if (!$this->redirectCalled) {
            $this->executeRedirect();
        }
    }
}
