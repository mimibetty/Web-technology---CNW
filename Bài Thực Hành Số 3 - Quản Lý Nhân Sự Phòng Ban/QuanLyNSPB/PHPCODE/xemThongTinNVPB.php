<?php
    echo "<head><title> Xem nhân viên tại phòng ban</title></head>";
    echo "<div style='margin: auto; max-width: 400px; text-align: center;'>";

    $pb_value = $_GET['phongban'];

    echo '<h3> Xem nhân viên tại một phòng ban </h3>';
    echo '<table border = "2" width = 100% style="text-align: center;">';
    echo '<caption>'."Bảng thông tin nhân viên tại phòng ban ".$pb_value.'</caption>';
    echo '<TR><TH>IDNV</TH><TH>Hoten</TH><TH>IDPB</TH><TH>Diachi</TH></TR>';

    $link = mysqli_connect("localhost", "root", "", "DULIEU");
    $result = mysqli_query($link, "SELECT * FROM nhanvien WHERE IDPB="."'".$pb_value."';");

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
            <td>$row[IDNV]</td>
            <td>$row[Hoten]</td>
            <td>$row[IDPB]</td>
            <td>$row[Diachi]</td>
            </tr>";
    }
    $var_value = 111;


    echo '</table>';
    echo '</div>';
?>