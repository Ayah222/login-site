<?php
//handles connection to the database
class DbConnect {
    protected function connect() {
        try {
            $serverName = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ooplogin";
            $dbConn = new PDO('mysql:host=localhost;dbname=ooplogin', $username, $password);
            return $dbConn;
        }
        catch (PDOExceptin $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die(); 

        }
    }
}