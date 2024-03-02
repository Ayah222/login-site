<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charest="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   
</head>
<body>

<header>
    <nav> 
        <ul class="menu-member">    
            <?php
                if(isset($_SESSION["username"])) {
            ?> 
               <li><a href="profile.php"><?php echo $_SESSION["username"]; ?></a></li>
               <li><a href="include/logout.php" class="header-log">LOGOUT</a></li>
        
            <?php
                }
                else {

            ?>
               <li><a href="#">RGISTER</a></li>
               <li><a href="#" class="header-log">LOGIN</a></li>
            <?php
                }
            ?>
        </ul>
    </nav>    
</header>

</body>
</html>
    
    
