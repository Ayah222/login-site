<?php
//This class handles database changes/info according to contoller class
class Login extends DbConnect {

    protected function getUser($username, $password) {
        $statement = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?;');

        //error checks
        if(!$statement->execute(array($username, $password))) {
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        }
        // no result from Query
        if(!$statement->rowCount() == 0) {
           
            $statement = null;
            header("location: ../index.php?error=usernotound");
            exit();
        }
        $hashedpwd = $statement->fetchAll(PDO::FETCH_ASSOC);
        $checkpwd = password_verify($password, $hashedpwd[0]["users_pwd"]);

        if($checkpwd == false) {
           
            $statement = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        //if the user's data match to what is in the database
        elseif($checkpwd == true) {
            $statement = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?
             AND users_pwd = ?;');
           
            if(!$statement->execute(array($username, $username, $password))) {
                $statement = null;
                header("location: ../index.php?error=statementfailed");
                exit();
            }

            if(!$statement->rowCount() == 0) {
           
                $statement = null;
                header("location: ../index.php?error=usernotound");
                exit();
    
            }

            $user = $statement-> fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["username"] = $user[0]["users_id"];
            $_SESSION["username"] = $user[0]["users_uid"];

        }

        $statement = null;
    }
       
}