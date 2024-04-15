<html>
    <head>
        <title> Xem chi tiết học sinh </title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1> Chi tiết học sinh <?php echo $student->id; ?></h1>
        <hr>
        <p style="font-size: 150%">
        <?php
            echo "<b>".$student->name."</b><br>";
            echo "Age: ".$student->age."<br>";
            echo "University: ".$student->university."<br>";
        ?>
        </p>

        <hr>
        <h1> <a href="javascript:history.back()">Back</a> </h1>
    </body>
</html>