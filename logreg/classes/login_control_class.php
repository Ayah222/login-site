<?php
//This class handles user inputs when logged in
class LoginControl extends Login {
//properties
private $username;
private $password;
//assignined by the user, value = above variables values
public function __construct($username, $password) {
     $this->username = $username;
     $this->password = $password;
     
    }

    public function loginUser() {
        if($this->emptyFieled() == false) {
            // echo 
            header("location: ../index.php?error=emptyfield");
            exit();  
        }
        $this->getUser($this->username, $this->password);
    }    
    //Error handling, unfilled fields
    private function emptyFieled() {
        $result;
        if(empty($this->username) || empty($this->password)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

}