<head>
    <meta charset="utf-8"/>
    <title> Chèn thông tin nhân viên </title>
    <script lang="JavaScript">
     
    </script>
</head>


<body> 
    <div style = "margin: auto; max-width: 600px; text-align: center;">     
        <h3> Trang chèn thông tin nhân viên </h3>

        <form action="XulichenNV.php" method="POST">
            <label for="idnv">IDNV:</label>
            <input type="text" id="idnv" name="idnv" required><br>
            <label for="hoten">Họ tên:</label>
            <input type="text" id="hoten" name="hoten" required><br>
            <label for="idpb">IDPB:</label>
            <input type="text" id="idpb" name="idpb" required><br>
            <label for="diachi">Địa chỉ:</label>
            <input type="text" id="diachi" name="diachi" required><br>
            
            <input type="submit" value="Submit">
            <a href="javascript:history.back()">Cancel</a>

        </form>

    </div>

</body>