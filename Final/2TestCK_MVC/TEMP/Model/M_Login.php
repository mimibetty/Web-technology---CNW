<?php
class Model_Login
{
    public function __construct(){}
    public function checkLogin($username, $password)
    {
        $link = mysqli_connect("localhost","root", "") or die ("Khong the ket noi den CSDL MySQL");
        mysqli_select_db($link, "DULIEU");
        $sql = "select * from admin where username = '$username' and password = '$password'";
        $rs = mysqli_query($link, $sql);
        if (mysqli_num_rows($rs) == 0) return 0;
        else return 1;
    }
}

?>