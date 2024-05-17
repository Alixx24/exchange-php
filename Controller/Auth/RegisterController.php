<?php

namespace Controller\Auth;

use Models\Database;

require_once '../Models/Database.php';

class RegisterController extends Database
{
    public $connect;
    public function register($email)
    {

        $pdo = $this->connect();
        if (isset($_POST['register']) && isset($_POST['email']) && $_POST['email'] != null && isset($_POST['password']) && $_POST['password'] != null) {

            $email = $_POST['email'];
            $sql = "SELECT email FROM users WHERE email = ?";
            $statement = $pdo->prepare($sql);
            $statement->execute([$email]);
            $user = $statement->fetch();

            if ($user == false) {

                $password = $_POST['password'];
                $hashedPass =  password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO users(name, email, password) VALUES (?, ?, ?)";
                $statement = $pdo->prepare($sql);
                $result = $statement->execute([$_POST['nickName'], $_POST['email'], $hashedPass]);
                var_dump($result);
            } else {
                var_dump('email already exist');
            }
        

            echo 'created User';
        } else {
            echo 'requrred all Filled!';
        }
    }
}
