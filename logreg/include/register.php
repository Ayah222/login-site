<?php
//Navigate to here, if a form is submitted
if($_SERVER['REQUEST_METHOD']=='POST') {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeatPass = $_POST["repeatPass"];
    //Get back and link the classes
    include "../classes/dbConn_class.php";
    include "../classes/register_class.php";
    include "../classes/register_control_class.php";
    //creating object 
    $register = new RegisterControl($username, $email, $password, $repeatPass);
    // Run error handlers & user registeation
    $register->registerUser();

    $userId = $register->grabUserId($username);

    //Instantiate profile_control class
    include "../classes/profile_class.php";
    include "../classes/profile_control.php";
    $profileInfo = new ProfileInfoConstruct($userId, $username);
    //run the method
    $profileInfo->defaultProileInfo();

    // Send user back to front page
    header("location: ../index.php?error=none");
}    