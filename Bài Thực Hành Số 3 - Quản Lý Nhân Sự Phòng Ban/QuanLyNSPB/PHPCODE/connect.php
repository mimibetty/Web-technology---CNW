<?php  
$link = mysql_connect("localhost","root","") or die ("Khong the
ket noi den CSDL MySQL" . mysql_error());
// //Lựa chọn cơ sở dữ liệu
// mysql_select_db("DULIEU",$link);
// $rs = mysql_query("SELECT * FROM NHANVIEN");
// ECHO'<table border ="1" width ="100%">';
// ECHO'<caption> Du lieu bang Nhan vien </Caption>';
// // tieu de cua bang chua du lieu khi hien thi tren web

// echo '<TR><TH>INDN</TH><TH> Ho ten </TH> <TH> IDPB </TH> <TH>DIA CHI </TH></TR> ';

// while ($row = mysql_fetch_array($rs , MYSQL_BOTH)) {
//     echo '<TR><TD>.$row['IDNV'].'</TD><TD>'.$row['Hoten'].'</TD><TD>'.$row['IDPB'].'</TD><TD>'.$row['Diachi'].</TD></TR>';  
// }

// echo '</TABLE';
// mysql_close($link);
// //mysqli_close($link);
// mysql_free_result($rs);

// // mysqli_free_result($rs);


?>