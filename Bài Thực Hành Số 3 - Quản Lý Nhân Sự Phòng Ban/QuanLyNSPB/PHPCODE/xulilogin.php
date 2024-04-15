<?php
$user = $_REQUEST['txtUserName'];
$pass = $_REQUEST['txtPassword'];
$link = mysqli_connect('localhost', 'root', '') or die('Could not connect to the database');
$db_selected = mysqli_select_db($link, 'dulieu');
$rs = "";

if ($user == "" || $pass == "") {
    header("Location: login.php");
} else {
    $rs = mysqli_query($link, "select * from admin where username = '$user' and password = '$pass'");

    if (mysqli_num_rows($rs) == 0) {
        header("Location: login.php");
    } else {
        header("Location: menuAdmin.php");
    }
}
?>
