<?php
class Model_Login
{
    public function __construct(){}
    public function checkLogin($username, $password)
    {
        $link = mysqli_connect("localhost","root", "") or die ("Khong the ket noi den CSDL MySQL");
        mysqli_select_db($link, "test888");
        $sql = "select * from user where username = '$username' and password = '$password'";
        $rs = mysqli_query($link, $sql);
        if (mysqli_num_rows($rs) == 0) return 0;
        else return 1;
    }

    public function addAccount($_username, $_password)
    {
        $conn = mysqli_connect("localhost", "root", "", "test888") or die("Không thể kết nối tới cơ sở dữ liệu");
        $sql = "select * from user WHERE username = '". $_username . "';";
        $rs = mysqli_query($conn, $sql);

        // Đếm số lượng bản ghi
        $num_rows = mysqli_num_rows($rs);
        if ($num_rows == 0) {
            // Chèn thêm
            $sql = "insert into user(username, password) values ('$_username', '$_password')";
            $rs = mysqli_query($conn, $sql);
            
            if ($rs) {
                // Nếu truy vấn thành công, trả về 1
                return 1;
            } else {
                // Nếu truy vấn thất bại, trả về 0
                return 0;
            }

        } 
        else {
            echo "ID exist, can not insert ID:  " . $id;
            echo '<h1> <a href="javascript:history.back()">Quay lại</a> </h1>';
            // Nếu ID đã tồn tại, trả về 0
            return 0;
        }
    }
}

?>