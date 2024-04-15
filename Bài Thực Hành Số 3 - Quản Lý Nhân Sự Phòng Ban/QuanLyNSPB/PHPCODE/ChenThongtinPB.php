<head>
    <meta charset="utf-8"/>
    <title> Chèn thông tin phòng ban </title>
    <script lang="JavaScript">
     
    </script>
</head>


<body> 
    <div style = "margin: auto; max-width: 600px; text-align: center;">     
        <h3> Trang chèn thông tin phòng ban </h3>

        <form action="XulichenPB.php" method="POST">
            <label for="idpb">IDPB:</label>
            <input type="text" id="idpb" name="idpb" required><br>
            <label for="tenpb">Tenpb:</label>
            <input type="text" id="tenpb" name="tenpb" required><br>
            <label for="mota">Mota:</label>
            <input type="text" id="mota" name="mota" required><br>
            <input type="submit" value="Submit">
            <a href="javascript:history.back()">Cancel</a>

        </form>

    </div>

</body>