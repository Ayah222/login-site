<?php

class ProfileControl extends Profile {
    
    //userId for users counted in the database able(users_id), username = users_uid in the able
    private $userId;
    private $username;

    public function __construct($userId, $username) {
        $this->userId = $userId;
        $this->username = $username;


    }
    //goes to database and signs a default text in profile info
    public function defaultProileInfo() {
     $profileAbout = "Tell people about yourself";
     $profileAbout = "Hi! I am" . $this->username;
     $this->setProfileInfo($profileAbout, $this->userId);

    }
    
    //pass the information here that need to be updated + error handle
    public function updateProfileInfo($about) {
        //error handler
     if($this->emptyInputCheck($about) == true) {
        //profile settings is not created yet
        header("location: ../profilesettings.php?error=emptyinput");
        exit();
     }
       //update info
       $this->setProfileInfo($about, $this->userId);
    }
    
    //chec for empty input
    Private function emptyInputCheck($about) {
        $result;
        if (empty($about)) {
             $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }
    
}