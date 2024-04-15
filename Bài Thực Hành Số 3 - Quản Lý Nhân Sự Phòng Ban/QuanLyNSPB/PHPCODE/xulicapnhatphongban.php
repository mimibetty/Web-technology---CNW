<?php
    $IDPB = $_REQUEST['IDPB'];
    $tenpb=$_REQUEST['TenPB'];
    $mota = $_REQUEST['MotaPB'];


    $link = mysqli_connect("localhost","root","") or die("Khong the ket noi");
    mysqli_select_db($link,"dulieu");
    $result=mysqli_query($link," UPDATE phongban SET Tenpb ='$tenpb', Mota = '$mota' WHERE IDPB='$IDPB'");
    if($result)
    {
        header("Location:capnhatPB.php");

    }
?>