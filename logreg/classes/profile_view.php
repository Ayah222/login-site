<?php

class ProfileView extends Profile {

public function grabAbout($userId) {
    $profileInfo = $this->getProfileInfo($userId);
    echo $profileInfo[0]["profile_about"];

}


    
}