<?php

/**
 *
 */
class NewPasswordController
{
    
    private $id;
    private $username;
    private $oldPassword;
    private $newPassword;
    private $newPassword1;

    public function __construct($username, $oldPassword, $newPassword, $newPassword1)
    {
        $this->username = htmlspecialchars(rtrim($username));
        $this->oldPassword = htmlspecialchars(rtrim($oldPassword));
        $this->newPassword = htmlspecialchars(rtrim($newPassword));
        $this->newPassword1 = htmlspecialchars(rtrim($newPassword1));
    }

    public function newPassword()
    {
        if ($this->newPassword != $this->newPassword1) {
            return false;
        }

        $searchUser = $this->parseJson();

        if ($searchUser == true) {
            $result = $this->updateJson();
        } else {
            return false;
        }
        
        return $result;
    }

    private function parseJson()
    {
        $file = file_get_contents("../Models/login.json");

        $json = json_decode($file);

        foreach ($json as $item) {
            for ($i=0; $i < count($item); $i++) {
                if ($item[$i]->username == $this->username && $item[$i]->password == $this->oldPassword) {
                    $this->id = $item[$i]->id;
                    return true;
                }
            }
        }

         return false;
    }

    private function updateJson()
    {
        $file = file_get_contents("../Models/login.json");

        $json = json_decode($file);

        foreach ($json as $item) {
            for ($i=0; $i < count($item); $i++) {
                if ($item[$i]->id == $this->id) {
                    $item[$i]->password = $this->newPassword;
                }
            }
        }

        $item = json_encode($item);
        $item = '{"users": '. $item .'}';
        
        $file = fopen("../Models/login.json", "r+");
        ftruncate($file, 0);
        fwrite($file, $item);
        fclose($file);

        return true;
    }
}
