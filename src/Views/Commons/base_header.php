<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;500&display=swap" rel="stylesheet">
<!-- Bootstrap cdn  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<title>Transfer MVC PHP Application</title>
    

    <!-- <script src="https://www.unpkg.com/feather-icons"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <link rel="stylesheet" href="/css/styles.css">
    
   

</head>
<body>
<header>
    <h2>Send and transfer your files online for free !</h2>
</header>
<!-- test navbar css -->

<?php
use App\Services\Security;
if (Security::isConnected()) {
    include_once __DIR__ . '/menu_connected.php';
} else {
    include_once __DIR__ . '/menu_not_connected.php';
}
?>


<main>
