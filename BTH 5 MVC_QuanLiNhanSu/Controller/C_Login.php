<?php
include_once("../Model/M_Login.php");

        if (isset($_REQUEST['login']))
        {
            $username = $_REQUEST['txtUserName'];
            $pass = $_REQUEST['txtPassword'];
            $modelLogin =new Model_Login();
            $check = $modelLogin ->checkLogin($username, $pass);
            if ($check) {
                include_once("../View/MenuAdmin.php");
            }
        }
        else
        {
            include_once("../View/Login.html");
        }
?>