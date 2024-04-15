<?php
session_start();
include_once("../Model/M_Login.php");

if (isset($_REQUEST['register'])) {
    $username = $_REQUEST['username'];
    $pass = $_REQUEST['password'];
    $modelLogin =new Model_Login();
    $check = $modelLogin ->addAccount($username, $pass);
    if ($check) {
        $_SESSION['yourAccount'] = $username;
        header('Location: ../Controller/C_Student.php?mod0=main');
        exit;    
    }
    else {
        header('Location: ../View/Login-fail.php');
    }
}
else if (isset($_REQUEST['login']))
{
    $username = $_REQUEST['txtUserName'];
    $pass = $_REQUEST['txtPassword'];
    $modelLogin =new Model_Login();
    $check = $modelLogin ->checkLogin($username, $pass);
   

    if ($check) {
        $_SESSION['yourAccount'] = $username;
        header('Location: ../Controller/C_Student.php?mod0=main');
        exit;    
    }
    else {
        header('Location: ../View/Login-fail.php');
    }
}
else
{
    include_once("../View/Login.php");
}

?>