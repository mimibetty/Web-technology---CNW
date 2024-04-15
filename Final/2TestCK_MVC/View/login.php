<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fabcdf;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
            color: #333333;
            padding-bottom: 20px;
            border-bottom: 1px solid #eeeeee;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 16px;
            color: #333333;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #cccccc;
            transition: box-shadow 0.3s ease-in-out;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="password"]:focus {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            outline: none;
        }

        .form-group input[type="submit"],
        .form-group input[type="button"] {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            border: none;
            background-color: #00C1FF;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .form-group input[type="submit"]:hover,
        .form-group input[type="button"]:hover {
            background-color: #008abd;
        }

        .error-message {
            color: #ff0000;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form action="../Controller/C_Login.php" name="f1" method="POST">
            <div class="form-group">
                <label for="txtUserName">Tên đăng nhập</label>
                <input type="text" name="txtUserName" id="txtUserName">
            </div>
            <div class="form-group">
                <label for="txtPassword">Mật khẩu</label>
                <input type="password" name="txtPassword" id="txtPassword">
            </div>
            <div class="form-group">
                <input type="submit" value="Đăng nhập" name="login" onclick="check()">
                <input type="button" name="butReset" value="Hủy" onclick="reset()">
            </div>
        </form>
    </div>
</body>

</html>
<script>
    function check() {
        var tendn = document.f1.txtUserName.value
        var password = document.f1.txtPassword.value
        if (tendn == "") {
            window.alert("Chưa nhập tên đăng nhập!")
        } else if (password == "") {
            window.alert("Chưa nhập mật khẩu!")
        }
    }

    function reset() {
        document.getElementById("txtUserName").value = "";
        document.getElementById("txtPassword").value = "";
    }
</script>