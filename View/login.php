<!DOCTYPE html>
<html lang="en">
<head>
    <div class="loginBox">
    <title>NTQ Solution Admin Control Panel</title>

    <link rel="icon" type="image/ico" href="favicon.ico"/>
</head>

<link href="css/stylesheets.css" rel="stylesheet" type="text/css" />
    
<body>


        <div class="loginHead">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
            <img src="img/logo.png" alt="NTQ Solution Admin Control Panel" title="NTQ Solution Admin Control Panel"/>
        </div>
        <form class="form-horizontal" action="index.php?controller=LoginController&action=checkLogin" method="POST">
            <div class="control-group">
                <label for="inputUsername">Username</label>                
                <input type="text" id="inputUsername" name="username"/>
            </div>
            <div class="control-group">
                <label for="inputPassword">Password</label>                
                <input type="password" id="inputPassword" name = "password"/>
            </div>
            <div class="control-group" style="margin-bottom: 5px;">                
                <label class="checkbox"><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <div class="form-actions">
                <button type="submit" name = "submit" class="btn btn-block">Sign in</button>
            </div>
        </form>
        
    </div>    
    
</body>
</html>