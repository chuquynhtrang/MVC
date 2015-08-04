<!DOCTYPE html>
<html lang="en">
<?php
include "menu.php";
?>
<div class="content">


    <div class="breadLine">

        <ul class="breadcrumb">
            <li><a href="index.php?controller=UserController&action=index&page=1">List Users</a> <span class="divider">></span></li>
            <li class="active">Edit</li>
        </ul>

    </div>

    <div class="workplace">

        <div class="row-fluid">

            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Users Management</h1>

                    <div class="clear"></div>
                </div>
                <div class="block-fluid">
                    <form method="POST" action="index.php?controller=UserController&action=editUser&id=<?php echo $_GET['id'];?> " enctype="multipart/form-data">
                    	<div class="row-form">
                            <div class="span3">Username:</div>
                            <div class="span9"><input type="text" name = "username" value="<?php echo $data['username']; ?>"/></div>
                            <div class="clear"></div>
                        </div> 
                    	<div class="row-form">
                            <div class="span3">Email:</div>
                            <div class="span9"><input type="text" name = "email" value="<?php echo $data['email']; ?>"/></div>
                            <div class="clear"></div>
                        </div> 
                    	<div class="row-form">
                            <div class="span3">Password:</div>
                            <div class="span9"><input type="text" name = "password" value="<?php echo $data['password']; ?>"/></div>
                            <div class="clear"></div>
                        </div> 
                    	<div class="row-form">
                            <div class="span3">Upload Avatar:</div>
                            <div class="span9">
                            <img src="upload/<?php echo $data['username']; ?>.jpg" /><br/>
                            <input type="file" name="avatar" size="19">
                            </div>
                            <div class="clear"></div>
                        </div> 
                        <div class="row-form">
                            <div class="span3">Activate:</div>
                            <div class="span9">
                                <select name="activate">
                                    <option value="2">choose a option...</option>
                                    <option value="1" <?php if($data['activate']==1) echo "selected";?>>Activate</option>
                                    <option value="0" <?php if($data['activate']==0) echo "selected";?>>Deactivate</option>
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                        	<button class="btn btn-success" type="submit" name="update">Update</button>
							<div class="clear"></div>
                        </div>
                    </form>
                    <div class="clear"></div>
                </div>
            </div>

        </div>
        <div class="dr"><span></span></div>

    </div>

</div>

</body>
</html>
<?php