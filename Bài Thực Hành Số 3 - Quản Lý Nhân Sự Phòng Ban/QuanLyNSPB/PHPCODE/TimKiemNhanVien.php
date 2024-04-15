<head> 
<meta charset="utf-8"/> 
<title>Trang tìm kiếm nhân viên</title>
</head>

<body>
    <div style = "margin: auto; max-width: 600px; text-align: center;">     
        <h3> Trang tìm kiếm nhân viên </h3>

        <form name="SearchForm" style="margin: auto; max-width: 300px; border: 1px solid black; padding: 10px;" method="POST">
            <strong>Tìm kiếm thông tin</strong>
            <br>
            <label for="TieuChi">Chọn tiêu chí tìm kiếm: </label> 
            <select name = "TieuChi" id = "TieuChi"> 
                <option value="IDNV">Mã nhân viên </option>
                <option value="Hoten">Họ tên </option>
                <option value="IDPB">Mã phòng ban </option>
                <option value="Diachi">Địa chỉ </option>
            </select>

            <br>
            <label for="search_box">Tìm: </label>
            <input type="text" name="SearchBox" id="SearchBox">
            <br>
            <button name="SearchButton" id="SearchButton"> Tìm </button>
        </form>



        <?php
          if (isset($_POST['SearchBox'])) $value_search = $_POST['SearchBox'];
            else $value_search = "";
            if (isset($_POST['TieuChi'])) $value_search_what = $_POST['TieuChi'];
            else $value_search_what = "";
            
            echo "<h3> Kết quả tìm kiếm cho: \"".$value_search."\" </h3>";
            echo '<table border = "2" width = 100% style="text-align: center;">';
            echo '<TR><TH>IDNV</TH><TH>Hoten</TH><TH>IDPB</TH><TH>Diachi</TH></TR>';

            // nếu nội dung tìm rỗng thì sẽ SELECT ALL
            if (! empty($value_search))  // su dung %like% để lấy substring , dùng like để lấy chính xác string
                $sql_command = "SELECT * FROM nhanvien WHERE " . $value_search_what . " LIKE '%" . $value_search . "%';";
                // $sql_command = "SELECT * FROM nhanvien WHERE " . $value_search_what . " LIKE " . "'" . $value_search . "';";
            else $sql_command = "SELECT * FROM nhanvien;";
            // echo "COMMAND: <code>" . $sql_command . "</code>";


            $link = mysqli_connect("localhost", "root", "", "DULIEU") or die("Không thể kết nối tới cơ sở dữ liệu");
            $result = mysqli_query($link, $sql_command);
        
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>
                    <td>$row[IDNV]</td>
                    <td>$row[Hoten]</td>
                    <td>$row[IDPB]</td>
                    <td>$row[Diachi]</td>
                    </tr>";
            }
            echo '</table>';

        ?>
    </div>
</body>