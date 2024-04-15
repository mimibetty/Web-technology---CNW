<?php   


$link = mysqli_connect("localhost","root","") or die("Khong the ket noi den CSDL MySQL");

mysqli_select_db($link,"dulieu");

$sql = "select * from phongban";

$rs = mysqli_query($link, $sql);

echo '<table border="1" width="100%">';
echo '<caption>Phòng ban </Caption>';

echo '<tr><th>Ma so PB</th><th>Ten PB</th><th>Mo ta</th></tr>';

while($row = mysqli_fetch_array($rs))
{
    echo '<form action="form_capnhatPB.php" method="POST">';
    echo '<input type="hidden" name="department" value="'.$row[0].'">';
    echo '<tr><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td><input type="submit" value="Cập nhật"></td></tr>';
    echo '</form>';
}
echo '</table>';
mysqli_close($link);
?>