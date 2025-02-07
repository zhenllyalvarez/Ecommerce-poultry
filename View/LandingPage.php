<?php

session_start();
if (isset($_COOKIE["isLoggedIn"])) {
    header("Location: /simple_ecommerce/View/Dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>E-commerce</title>
</head>

<body>
    <?php include ($_SERVER['DOCUMENT_ROOT']) . "/simple_ecommerce/Components/LandingPage/Navbar.php" ?>
    <?php include ($_SERVER["DOCUMENT_ROOT"]) . "/simple_ecommerce/Components/LandingPage/Intro.php" ?>
    <?php include ($_SERVER['DOCUMENT_ROOT']) . "/simple_ecommerce/Components/LandingPage/Product.php" ?>
    <?php include ($_SERVER['DOCUMENT_ROOT']) . "/simple_ecommerce/Components/LandingPage/Service.php" ?>
</body>

</html>