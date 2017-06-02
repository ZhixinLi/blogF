<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <style>
        @media screen and (min-width: 700px) {
            #login_form {
                border: solid 1px black;
                width: 50%;
                margin: 0 auto;
                text-align: center;
                margin-top: 10%;
            }
        }

        @media screen and (max-width: 960px) {
            #login_form {
                border: solid 1px black;
                width: 100%;
                margin: 0 auto;
                text-align: center;
                margin-top: 30%;
                font-size: 2em;
            }

            label {
                padding-top: 10px;
                padding-bottom: 10px;
            }

            button {
                font-size: 1em;
            }

            input {
                height: 40px;
            }
        }
    </style>
</head>

<body>
<form action="../index.php/dologin" method="post" id="login_form">
    <label style="display:block;text-align: center;">
        后台登陆
    </label>
    <hr>

    <label style="display:block;">
        账号:<input type="text" name="user">
    </label>

    <label style="display:block;">
        密码:<input type="password" name="pwd">
    </label>
    <hr>
    <button type="submit" style="margin-bottom: 10px;">登录</button>
</form>
</body>
</html>