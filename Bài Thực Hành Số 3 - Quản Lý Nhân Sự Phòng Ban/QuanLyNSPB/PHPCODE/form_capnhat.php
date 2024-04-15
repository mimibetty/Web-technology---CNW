<?php
    echo '<head><title>Xem thông tin Phòng ban</title></head>';

    echo '<div style="margin: auto; max-width: 400px; text-align: center;">';
    echo '<h3> Xem thông tin Phòng ban </h3><br>';

    echo '<table border = "2" width = 100% style="text-align: center;">';
    echo '<caption>Dữ liệu truy xuất từ từ bảng Phongban</caption>';
    echo '<tr><th>IDPB</th> <th>Tenpb</th> <th>Mota</th> <th>Cap nhat </th> </tr>';


    $pb_value = $_GET['phongban'];
    $link = mysqli_connect("localhost", "root", "", "DULIEU");
    $query_string = "SELECT * FROM phongban WHERE IDPB LIKE '$pb_value';";
    $result = mysqli_query($link, $query_string);
    echo $query_string;

    echo $result['IDPB'];
    // while ($row = mysqli_fetch_array($result)) {
    //     echo "<tr>
    //         <td>$row[IDPB]</td>
    //         <td>$row[Tenpb]</td>.
    //         <td> $row[Mota]</td>.

    //         </tr>";
    // }

            // <td> <a href='form_capnhat.php?phongban=".$row['IDPB']."'> xxx </a> </td>".
    echo '</table>';
    echo '</div>';
?>