<?php
if (!isset($_COOKIE['isLoggedIn'])) {
    header("Location: /simple_ecommerce/View/LandingPage.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h1>Dashboard</h1>
    <a href="/simple_ecommerce/Route/UserRoute/UserLogout.php">Logout</a>
</body>

</html>