<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вхід</title>
    <link rel="stylesheet" href="web/css/auth.css">
    <script src="web/js/jquery.min.js" type="text/javascript"></script>
    <script src="web/js/checking.js" type="text/javascript"></script>
</head>
<body>
<div id="wrapper">
    <div id="formBlock">

        <div id="title">
            <span>Вхід</span>
        </div>

        <form action="admin/check" method="POST" id="authForm" autocomplete="off">
            <input type="text" class="field animation" name="login" id="login" placeholder="Логін">
            <input type="password" class="field animation" name="password" id="password" placeholder="Пароль">

            <div id="buttonBlock">
                <input type='submit' id="loginButton" class="animation" value='sign in'/>
            </div>
        </form>

    </div>
</div>
</body>
</html>