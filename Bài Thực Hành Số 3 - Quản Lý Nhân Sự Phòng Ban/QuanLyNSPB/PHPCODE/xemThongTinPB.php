<?php
    echo '<head><title>Xem thông tin Phòng ban</title></head>';

    echo '<div style="margin: auto; max-width: 400px; text-align: center;">';
    echo '<h3> Xem thông tin Phòng ban </h3><br>';

    echo '<table border = "2" width = 100% style="text-align: center;">';
    echo '<caption>Dữ liệu truy xuất từ từ bảng Phongban</caption>';
    echo '<tr><th>IDPB</th> <th>Tenpb</th> <th>Mota</th> </tr>';


    $link = mysqli_connect("localhost", "root", "", "DULIEU");
    $result = mysqli_query($link, "SELECT * FROM phongban;");

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
            <td>$row[IDPB]</td>
            <td>$row[Tenpb]</td>".
            "<td> <a href='xemThongTinNVPB.php?phongban=".$row['IDPB']."'>".$row['Mota']."</a></td>".
            "</tr>";
    }

    echo '</table>';
    echo '</div>';
?>