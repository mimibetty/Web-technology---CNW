<html>
    <head>
        <meta charset="utf-8">
        <title> Cập nhật học sinh </title>
    </head>
    <body>
        <div style="text-align: center; margin: auto; max-width: 800px;">
            <h2> Danh sách học sinh <h2>
            
            <table border = "2" width = 100%>
                <tr>
                    <th>Mã SV</th>
                    <th>Họ tên</th>
                    <th>Giới tính</th>
                    <th>University</th>
                    <th>Xóa</th>
                </tr>
            <?php
                for ($i = 0; array_key_exists($i, $students); $i++) {
                    echo "<tr>";
                    echo "<td>" . $students[$i]->id . "</td>";
                    echo "<td>" . $students[$i]->name . "</td>";
                    echo "<td>" . $students[$i]->age . "</td>";
                    echo "<td>" . $students[$i]->university . "</td>";
                    
                    echo "<td>";
                    echo "<a href='?mod5=update&stid=".$students[$i]->id."'> Lưu lại </a>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
            </table>
        </div>
        <hr>
        <h1> <a href="javascript:history.back()">Quay lại</a> </h1>
    </body>
</html>