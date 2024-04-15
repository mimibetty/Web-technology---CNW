<head>
    <meta charset="utf-8"/>
    <title> Chèn sinh viên </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .form-container {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .form-container h3 {
            text-align: center;
            color: #333333;
            padding-bottom: 20px;
        }

        .form-container table {
            width: 100%;
            margin: 0 auto;
        }

        .form-container table td {
            padding: 10px;
            font-size: 16px;
            color: #333333;
        }

        .form-container table input[type="text"] {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #cccccc;
            transition: box-shadow 0.3s ease-in-out;
        }

        .form-container table input[type="text"]:focus {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            outline: none;
        }

        .form-container input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            border: none;
            background-color: #00C1FF;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            display: block;
            margin: 20px auto;
        }

        .form-container input[type="submit"]:hover {
            background-color: #008abd;
        }
    </style>
</head>


<body class="form-container">

<h2>Thêm mới sinh viên</h2>
<form action="../Controller/C_Student.php" method="POST">
  <br>
  <label for="mssv">Mã SV:</label><br>
  <input type="text" id="mssv" name="mssv" required><br>
  
  <br>
  <label for="hoten">Họ tên:</label><br>
  <input type="text" id="hoten" name="hoten" required><br>
    
    <br>
    <label for="gioitinh">Giới tính:</label><br>
    <input type="radio" id="nam" name="gioitinh" value="1" required>
    <label for="nam">Nam</label><br>
    <input type="radio" id="nu" name="gioitinh" value="0">
    <label for="nu">Nữ</label><br>

  <br>
  <label for="khoa">Khoa:</label><br>
  <input type="text" id="khoa" name="khoa" required><br>
  <br>

  <input type="submit" name="Insert" value="Thêm mới">
  <h2> <a href="javascript:history.back()">Quay lại</a> </h2>

</form> 


</body>