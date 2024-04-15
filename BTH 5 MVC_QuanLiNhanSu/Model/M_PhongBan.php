<?php
include_once("E_PhongBan.php");
class Model_PhongBan
{
    public function __construct(){}
    public function getAllPhongBan()
    {
        $link = mysqli_connect("localhost","root", "") or die ("Khong the ket noi den CSDL MySQL");
        mysqli_select_db($link, "DULIEU");
        $sql = "select * from phongban";
        $rs = mysqli_query($link, $sql);
        $i = 0;
        $departments = [];
        while($row = mysqli_fetch_array($rs))
        {
            $id = $row['IDPB'];
            $name = $row['Tenpb'];
            $mota = $row['Mota'];
            $departments[$i++] = new Entity_PhongBan($id, $name, $mota);
        }
        return $departments;
    }

    public function addPhongBan($id, $name, $mota)
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MySQL");
        mysqli_select_db($link, "DULIEU");
        $sql = "insert into phongban(IDPB, Tenpb, Mota) values ('$id', '$name', '$mota')";
        $rs= mysqli_query($link, $sql);
        return $rs;
    }
    public function updatePhongBanDetail($id, $name, $mota)
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MySQL");
        mysqli_select_db($link, "DULIEU");
    
        // Use prepared statements to prevent SQL injection
        $sql = "UPDATE phongban SET Tenpb = ?, Mota = ? WHERE IDPB = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $name, $mota, $id);
        $rs = mysqli_stmt_execute($stmt);
    
        mysqli_close($link); // Close the database connection
    
        return $rs;
    }

    public function getPBdetails($id)
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MySQL");
        mysqli_select_db($link, "dulieu");

        $sql = "SELECT * FROM phongban WHERE IDPB='$id'";
        $rs = mysqli_query($link, $sql);

        $row = mysqli_fetch_array($rs);
        
        mysqli_close($link); 

        return $row;
    }
}
?>