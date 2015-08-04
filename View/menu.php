
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

    <title>NTQ Solution Admin Control Panel</title>

    <link rel="icon" type="image/ico" href="favicon.ico"/>

    <link href="css/stylesheets.css" rel="stylesheet" type="text/css"/>

</head>
<body>

<div class="header">
    <a class="logo" href="index.php?controller=CategoryController&action=index&page=1">
        <img src="img/logo.png" alt="NTQ Solution - Admin Control Panel" title="NTQ Solution - Admin Control Panel"/>
    </a>

</div>

<div class="menu">

    <div class="breadLine">
        <div class="arrow"></div>
        <div class="adminControl active">
            <?php echo "Hi, ". $_SESSION['username'];?>
        </div>
    </div>

    <div class="admin">
        <div class="image">
            <img src="upload/<?php echo $_SESSION['username']; ?>.jpg" class="img-polaroid"/>
        </div>
        <ul class="control">
            <li><span class="icon-cog"></span> <a href="index.php?controller=UserController&action=viewEditUser&id=<?php echo $_SESSION['id'];?>">Update Profile</a></li>
            <li><span class="icon-share-alt"></span> <a href="index.php?controller=LogoutController&action=logout">Logout</a></li>
        </ul>
    </div>

    <ul class="navigation">
        <li>
            <a href="index.php?controller=CategoryController&action=index&page=1">
                <span class="isw-grid"></span><span class="text">Categories</span>
            </a>
        </li>
        <li>
            <a href="index.php?controller=ProductController&action=index&page=1">
                <span class="isw-list"></span><span class="text">Products</span>
            </a>
        </li>
        <li>
            <a href="index.php?controller=UserController&action=index&page=1">
                <span class="isw-user"></span><span class="text">Users</span>
            </a>
        </li>
    </ul>

</div>
</body>