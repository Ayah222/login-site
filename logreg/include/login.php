<?php
//Navigate to here if, check if this page is accessed using POST submit from a form
if($_SERVER['REQUEST_METHOD']=='POST') {
    //grab the data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // link the classes
    include "../classes/dbConn_class.php";
    include "../classes/login_control_class.php";
    include "../classes/login_class.php";
    //creating object 
    $login = new LoginControl($username,$password);
    // Run error handlers & usr registeation
    $login->loginUser();
    // Send user back to front page
    header("location: ../index.php?error=none");




    

}    