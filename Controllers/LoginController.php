<?php

/**
 *
 */
class LoginController
{
    
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = htmlspecialchars(rtrim($username));
        $this->password = htmlspecialchars(rtrim($password));
    }

    public function login()
    {
        $result = $this->parseJson();

        if ($result == true) {
            $_SESSION['username'] = $this->username;
        }
        
        return $result;
    }

    private function parseJson()
    {
        $json = file_get_contents("Models/login.json");

        $json = json_decode($json);

        foreach ($json as $item) {
            for ($i=0; $i < count($item); $i++) {
                if ($item[$i]->username == $this->username && $item[$i]->password == $this->password) {
                    return true;
                }
            }
        }

         return false;
    }

    public function toString()
    {
        echo $this->username . ' ' . $this->password;
    }

    public function deconnexion()
    {
        session_destroy();
        header('Location: ../');
    }
}
