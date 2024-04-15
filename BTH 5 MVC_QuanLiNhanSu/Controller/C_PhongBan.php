<?php
include_once("../Model/M_PhongBan.php");

       
        if (isset($_REQUEST['mod1']))
        {
            include_once("../View/ThemPhongBan.html");
        }
        else if (isset($_REQUEST['mod2']))
        {
            $modelPhongBan= new Model_PhongBan();
            $PBList = $modelPhongBan-> getAllPhongBan();
            include_once("../View/CapNhatPhongBan.html");
        }
        elseif (isset($_REQUEST['themphongban']))
        {
            $IDPB= $_REQUEST['IDPB'];
            $Tenpb= $_REQUEST['TenPB'];
            $Mota= $_REQUEST['MotaPB'];
            $modelPhongBan = new Model_PhongBan();
            $check = $modelPhongBan -> addPhongBan($IDPB, $Tenpb, $Mota);
            if ($check) 
            {
                header('Location:C_PhongBan.php');
            }
            else 
            {
                echo "Thêm phòng ban không thành công";
            }
          
        }
        elseif (isset($_REQUEST['updateID']))
        {
            $modelPhongBan = new Model_PhongBan();
            $id = $_REQUEST['updateID'];
            $PBdetails = $modelPhongBan -> getPBdetails($id);
            include_once("../View/FormCapNhatPB.html");
        }
        elseif (isset($_REQUEST['capnhatpb']))
        {
            $IDPB = $_REQUEST['IDPB'];
            $tenpb=$_REQUEST['TenPB'];
            $mota = $_REQUEST['MotaPB'];
            $modelPhongBan = new Model_PhongBan();
            $check = $modelPhongBan -> updatePhongBanDetail($IDPB, $tenpb,  $mota);
            if ($check)
            {
                header('Location:C_PhongBan.php');
            }
            else 

            {
                echo "Cập nhật không thành công";
            }
        }
        else if (isset($_REQUEST['xempb']))
        
        {
            $modelPhongBan= new Model_PhongBan();
            $PBList = $modelPhongBan-> getAllPhongBan();
            include_once("../View/PhongBanList.html");
        }

?>