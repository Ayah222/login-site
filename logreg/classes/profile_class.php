<?php
//model class
class Profile extends dbConn_class {
    
    protected function getProfileInfo($userID) {
        $statement = $this->connect()->prepare('SELECT * FROM profile WHERE users_id = ?;');
        if($statement->execute(array($userId))) {
            $statement = null;
            header("lcation: profile.php?error=stmtfailed");
            exit();
         
        }
        //if did'nt get any data from database
        if($statement->rowCount()== 0) {
            $statement = null;
            header("lcation: profile.php?error=profilenotfound");
            exit();

        }
          //fetch using pdo as associative array and refrencing data to column of names inside the database
          $profileData = $statement->fetchAll(PDO::FETCH_ASSOC);
          return $profileData;
    }

    //Updates profile information, can add more user infon sections later
    protected function setNewInfo($profileAbout) {
        $statement = $this->connect()->prepare('UPDATE profile SET profile_about =? WHERE users_id = ?;');

        if($statement->execute(array($profileAbout))) {
            $statement = null;
            header("lcation: profile.php?error=stmtfailed");
            exit();
         
        }

          $statement = null;
    }

    protected function setProfileInfo($profileAbout, $userId) {
        $statement = $this->connect()->prepare('INSERT INTO profile(profile_about, users_id) VALUES (?);');

        if($statement->execute(array($profileAbout))) {
            $statement = null;
            header("lcation: profile.php?error=stmtfailed");
            exit();
         
        }

          $statement = null;
    }

}