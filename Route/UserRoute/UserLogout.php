<?php
session_start();
session_destroy();

setcookie("isLoggedIn", "", time() - 86400, "/");
header("Location: /simple_ecommerce/View/LandingPage.php");
exit();