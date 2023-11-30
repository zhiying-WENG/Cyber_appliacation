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

<title>Transfer MVC PHP Application</title>
    

    <!-- <script src="https://www.unpkg.com/feather-icons"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <link rel="stylesheet" href="/css/styles.css">
    
   

</head>
<body>
<header>
    <h1>Transfer MVC PHP Application !</h1>
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
