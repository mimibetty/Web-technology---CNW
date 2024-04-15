<?php   
$link = mysqli_connect("localhost","root","") or die("Khong the ket noi den CSDL MySQL");
mysqli_select_db($link,"dulieu");

$searchField = isset($_GET['find']) ? $_GET['find'] : '';
$searchText = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM nhanvien";
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

echo '<div style="text-align: center;">';
echo '<form method="GET" action="">';
echo '<input name="find" type="radio" value="ID" '.($searchField === 'ID' ? 'checked' : '').'/>ID';
echo '<input name="find" type="radio" value="Hoten" '.($searchField === 'Hoten' ? 'checked' : '').'/>Họ tên';
echo '<input name="find" type="radio" value="Diachi" '.($searchField === 'Diachi' ? 'checked' : '').'/>Địa chỉ';
echo '<input type="text" name="search" id="findNV" value="'.$searchText.'">';
echo '<input type="submit" value="Tìm">';
echo '</form>';
echo '</div>';

echo '<form method="POST" action="xulixoaNV.php">';
echo '<table border="1" width="100%">';
echo '<tr><th>Ma so NV</th><th>Ho ten</th><th>Ma so PB</th><th>Dia chi</th><th>Chọn</th></tr>';

while($row = mysqli_fetch_array($rs))
{
    echo '<tr><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td>
    <td>
    <input type="checkbox" name="'.$row[0].'" value="'.$row[0].'">
    </td></tr>';
}

echo '</table>';

echo '<div style="text-align: center;">';
echo '<input type="submit" name="delete" value="Xóa" style="margin-top: 10px;">';
echo '</div>';
echo '</form>';

mysqli_close($link);
?>