<?php
$link = mysqli_connect('localhost', 'root', '') or die("Couldn't connect to database");
mysqli_select_db($link, 'dulieu');
$myID = $_REQUEST['IDNV'];

$rs = mysqli_query($link, 'SELECT IDNV FROM nhanvien');

while($row = mysqli_fetch_array($rs, MYSQLI_BOTH))
{
    $myID = $_REQUEST[$row['IDNV']];
    $rs1 = mysqli_query($link, "DELETE FROM nhanvien WHERE IDNV IN (SELECT IDNV FROM nhanvien WHERE IDNV = '$myID')");
}
mysqli_free_result($rs);
mysqli_close($link);
header("Location: xoaNV.php");
exit();
?>