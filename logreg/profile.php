<?php
    include_once "header.php";

    include "classes/dbConn_class.php";
    include "classes/profile_class.php";
    include "classes/profile_conrol.php";
    include "classes/profile_view.php";
    $profileInfo = new ProfileInfoView();
?>


<section class="profile">
    <div class="profile-about">
      <h3>About</h3>
      <p>Name:   Age:    Gender:   </p>
        <?php
           $profileInfo->grabAbout($_SESSION["userid"]);
        ?>
    </div> 
    
</section>

