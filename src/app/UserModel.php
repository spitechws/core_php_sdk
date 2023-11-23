<?php
class UserModel extends BaseModel
{
    private static $model = null;
    private function __construct()
    {
    }

    /**
     * returns user model
     *
     * @return UserModel
     */
    public static function model(): UserModel
    {
        if (self::$model == null) {
            self::$model = new UserModel();
        }
        return self::$model;
    }

    /**
     * login
     *
     * @param  string $email
     * @param  string $password
     * @return object|null
     */
    public function login(string $email, string $password)
    {
        try {
            $conn = Database::getInstance()->getConnection();
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            if ($user && password_verify($password, $user->password)) {
                // Unset the password before returning the user info for security
                unset($user->password);
                unset($user->created_at);
                Auth::login($user);
                return $user;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            Helper::log($e->getMessage());
            return null;
        }
    }

    /**
     * register
     * @param  string $name
     * @param  string $email
     * @param  string $password
     * @return void
     */
    public function register(string $name, string $email, string $password)
    {
        $isCreated = false;
        try {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $conn = Database::getInstance()->getConnection();

            //duplicate check
            $stmt = $conn->prepare("SELECT id FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            if ($user) {
                //already exist              
                Helper::setFlush(['error' => 'This email id already registered']);
            } else {
                //register new email
                $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_INT);
                if ($stmt->execute()) {
                    $isCreated = true;
                }
            }
        } catch (PDOException $e) {
            Helper::log($e->getMessage());
        }
        return $isCreated;
    }
}
