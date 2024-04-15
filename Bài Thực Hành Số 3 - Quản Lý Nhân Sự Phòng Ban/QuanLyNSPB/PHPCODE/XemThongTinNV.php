<?php
    echo "<head><title> Xem thông tin Nhân vien </title></head>";

    echo "<div style='margin: auto; max-width: 500px; text-align: center;'>";
    echo "<h3> Xem thông tin bảng nhanvien </h3><br>";

    echo '<table border = "2" width = 100% style="text-align: center;">';
    echo '<caption>Dữ liệu từ bảng nhân viên</caption>';
    echo '<TR><TH>IDNV</TH><TH>Hoten</TH><TH>IDPB</TH><TH>Diachi</TH></TR>';

    $link = mysqli_connect("localhost", "root", "", "DULIEU") or die("game over");
    $result = mysqli_query($link, "SELECT * FROM nhanvien;");
       // $num_rows = mysqli_num_rows($result);
    // echo "$num_rows Rows\n"; 2 row

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
            <td>$row[IDNV]</td>
            <td>$row[1]</td>
            <td>$row[IDPB]</td>
            <td>$row[Diachi]</td>
            </tr>";
    }
    echo '</table>';
    echo "</div>";
?>