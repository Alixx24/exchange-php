<?php


use Controller\Auth\LoginController;
use Controller\Auth\RegisterController;
use Controller\Customer\PermissionConroller;
use Controller\Exchange\LatestConvetController;
use Controller\Exchange\ListingLastContoller;

if (basename($_SERVER['SCRIPT_FILENAME']) === 'index.php') {

    require_once 'Controller/Exchange/ListingLastContoller.php';
    require_once 'Controller/Exchange/LatestConvetController.php';

    $ListingLast = new ListingLastContoller();

    $ListingLast->list();
    
    $lastConvertEthToUsd = new LatestConvetController();
    $lastConvertEthToUsd->convertEthToUSD();
}

//post method
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die;
}
if ($_POST['login']) {

    $email = $_POST["email"];
    include '../Controller/Auth/LoginController.php';
    $loginController = new LoginController();
    $loginController->checkEmail($email);
}


if ($_POST['register']) {

    $email = $_POST["email"];
    include '../Controller/Auth/RegisterController.php';
    $registerController = new RegisterController();
    $registerController->register($email);
}

if ($_POST['permissions']) {
    include '../Controller/Customer/PermissionController.php';
    $permissions = new PermissionConroller();
    $permissions->show();
}
