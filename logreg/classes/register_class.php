<?php
//This class handles database changes/info according to register control
class Register extends DbConnect {

    protected function setUser($username, $password, $email) {
        $statement = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ?, ?);');
        
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if(!$statement->execute(array($username, $hashedPwd, $email))) {
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        }
        $statement = null;
    }
  
  
    protected function checkUser($username, $email) {
        //check if the data already exist in the database
        $statement = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');
        
        if(!$statement->execute(array($username, $email))) {
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();

        }

        $resultCheck;
        if($statement->rowCount() > 0) {
            $resultCheck = false;
        }
        else {
            $resultCheck = true; 
        }
        return $resultCheck; 
   }
   //grab user's ID to create a profile
   protected function getUserId($username) {
    $statement = $this->connect()->prepare('SELECT users_id FROM users WHERE users_uid = ?;');
    if($statement->execute(array($username))) {
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
      //fetch data using pdo as associative array and refrencing data to column of names inside the database
      $profileData = $statement->fetchAll(PDO::FETCH_ASSOC);

      return $profileData;
}

}