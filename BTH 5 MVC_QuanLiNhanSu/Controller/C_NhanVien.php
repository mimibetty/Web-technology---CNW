<?php
include_once("../Model/M_NhanVien.php");
class Ctrl_NhanVien
{
    public function invoke()
    {

        if (isset($_REQUEST['mod1']))
        {
            include_once("../View/ThemNhanVien.html");
        }
        elseif (isset($_REQUEST['themnhanvien']))
        {
            $modelStaff =new Model_NhanVien();
            $ok = $modelStaff -> addNhanVien(trim($_REQUEST['IDNV']), trim($_REQUEST['Hoten']), trim($_REQUEST['IDPB']),trim($_REQUEST['Diachi']) );
            if ($ok)
            {
                header('Location:C_NhanVien.php');
            }
            else 
            {
                echo "Thêm nhân viên không thành công !'";
            }
        }
        elseif (isset($_REQUEST['mod2']))
        {
            $modelStaff =new Model_NhanVien();
            $staffList = $modelStaff -> getAllNhanVien();
            include_once("../View/XoaNhanVien.html");
        }
        elseif (isset($_REQUEST['deleteID']))
        {
            $modelStaff =new Model_NhanVien();
            $ok = $modelStaff->deleteNhanVien($_REQUEST['deleteID']);
            if ($ok) 
            {
                header('Location:C_NhanVien.php');
            }
            else 
            {
                echo " Xóa sinh viên không thành công !'";
            }
        }
        elseif (isset($_REQUEST['mod3']))
        {
            include_once("../View/SearchNhanVien.html");
        }
        elseif (isset($_REQUEST['searchNhanVien']))
        {
            $searchSelect=$_REQUEST['searchSelect'];
            $inputSearch=$_REQUEST['inputSearch'];
            // echo $searchSelect . " " . $inputSearch;
            $modelStaff =new Model_NhanVien();
            $staffList = $modelStaff -> searchNhanVien($searchSelect, $inputSearch);
            include_once("../View/NhanVienList.html");
        }
        elseif (isset($_REQUEST['department']))
        {
            $idpb=$_REQUEST['department'];
            $modelStaff =new Model_NhanVien();
            $staffList = $modelStaff->getStaffbyDepart($idpb);
        
            include_once("../View/NhanVienListByPB.html");
        }
        else
        {
            $modelStaff= new Model_NhanVien();
            $staffList = $modelStaff -> getAllNhanVien();
            include_once("../View/NhanVienList.html");
        }
    }

}
$C_NhanVien = new Ctrl_NhanVien();
$C_NhanVien->invoke();
?>