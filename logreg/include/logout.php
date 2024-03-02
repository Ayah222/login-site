<?php

session_start();
//clears session variables
seaaion_unset();
session_destroy();

header("location: ../index.php?error=none");