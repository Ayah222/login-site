<?php
//This class handles registering user's data
class RegisterControl extends Register {
//properties
private $username;
private $email;
private $password;
private $repeatPass;
//assignined by the user, value = above variables values
public function __construct($username, $email, $password, $repeatPass) {
     $this->username = $username;
     $this->email = $email;
     $this->password = $password;
     $this->repeatPass = $repeatPass;
    }

    public function registerUser() {
        if($this->emptyFieled() == false) {
            // echo "a field is empty!";
            header("location: ../index.php?error=emptyfield");
            exit();
        }
        if($this->missmatchPass() == false) {
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if($this->uidIsTaken()== false) {
            // echo "Username or Email is taken!";
            header("location: ../index.php?error=username");
            exit();
        }
        
        $this->setUser($this->username, $this->password, $this->email);
    }

        //Error handling, unfilled fields
    private function emptyFieled() {
        $result;
        if(empty($this->username) || empty($this->email) || empty($this->password) || empty($this->repeatPass)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
    

    private function missmatchPass() {
        $result;
        if($this->password !== $this->repeatPass) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function uidIsTaken() {
        $result;
        if(!$this->checkUser($this->username, $this->email)) {
           $result = false;
        }
        else {
           $result = true;
        }
        return $result;
     }

     public function grabUserId($username) {
         $userId = $this->getUserId($username);
         //first row and column name
         return $userId[0]["users_id"];
     }

}