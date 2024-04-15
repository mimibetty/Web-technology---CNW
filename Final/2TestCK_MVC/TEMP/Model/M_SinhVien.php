<?php
include_once("E_SinhVien.php");
class Model_SinhVien
{
    public function __construct(){}
    public function getAllSinhVien()
    {
        $link = mysqli_connect("localhost","root", "") or die ("Khong the ket noi den CSDL MySQL");
        mysqli_select_db($link, "DULIEU");
        $sql = "select * from SinhVien";
        $rs = mysqli_query($link, $sql);
        $i = 0;
        $staffs = [];
        while($row = mysqli_fetch_array($rs))
        {
            $id = $row['IDNV'];
            $name = $row['Hoten'];
            $idpb = $row['IDPB'];
            $address = $row['Diachi'];
            $staffs[$i++] = new Entity_SinhVien($id, $name, $idpb, $address);
        }
        return $staffs;
    }
    public function getStaffbyDepart($idpb)
    {
        $link = mysqli_connect("localhost","root", "") or die ("Khong the ket noi den CSDL MySQL");
        mysqli_select_db($link, "DULIEU");
        $sql = "select * from SinhVien where idpb = '$idpb' ";
        $rs = mysqli_query($link, $sql);
        $i = 0;
        $staffs = [];
        while($row = mysqli_fetch_array($rs))
        {
            $id = $row['IDNV'];
            $name = $row['Hoten'];
            $idpb = $row['IDPB'];
            $address = $row['Diachi'];
            $staffs[$i++] = new Entity_SinhVien($id, $name, $idpb, $address);
        }
        return $staffs;
    }
    public function addSinhVien($id, $name, $idpb, $address)
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MySQL");
        mysqli_select_db($link, "DULIEU");
        $sql = "insert into SinhVien(IDNV, Hoten, IDPB, Diachi) values ('$id', '$name', '$idpb', '$address')";
        $rs= mysqli_query($link, $sql);
        return $rs;
    }
    // public function updateSinhVienDetail($id, $name, $idpb, $address)
    // {
    //     $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MySQL");
    //     mysqli_select_db($link, "DULIEU");
    //     $sql = "update SinhVien set Hoten = '$name', IDPB = '$idpb', Diachi = '$address' where IDNV=$id";
    //     $rs = mysqli_query($link, $sql);
    // }


    public function deleteSinhVien($id)
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MySQL");
        mysqli_select_db($link, "DULIEU");
        $sql = "DELETE FROM SinhVien WHERE IDNV = '$id'";
        $rs = mysqli_query($link, $sql);
        return $rs;
    }
    public function searchSinhVien($searchField, $searchText)
    {
        $link = mysqli_connect("localhost", "root", "") or die("Không thể kết nối đến CSDL MySQL");
        mysqli_select_db($link, "dulieu");
        $sql = "SELECT * FROM SinhVien";
        if (!empty($searchField) && !empty($searchText)) {
            if ($searchField === 'ID') {
                $sql .= " WHERE IDNV LIKE '%$searchText%'";
            } elseif ($searchField === 'Hoten') {
                $sql .= " WHERE HOTEN LIKE '%$searchText%'";
            } elseif ($searchField === 'Diachi') {
                $sql .= " WHERE DIACHI LIKE '%$searchText%'";
            }
        }
        
        $rs = mysqli_query($link, $sql);
        $staffs = [];
        if (mysqli_num_rows($rs) > 0) {
            $i = 0;
            while($row = mysqli_fetch_array($rs))
            {
                $id = $row['IDNV'];
                $name = $row['Hoten'];
                $idpb = $row['IDPB'];
                $address = $row['Diachi'];
                $staffs[$i++] = new Entity_SinhVien($id, $name, $idpb, $address);
            }
        }
        return $staffs;
    }
}

?>