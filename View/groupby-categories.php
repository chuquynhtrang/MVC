<!DOCTYPE html>
<html lang="en">
<?php
include_once 'menu.php';
?>

<div class="content">
    <div class="breadLine">

        <ul class="breadcrumb">
            <li><a href="index.php?controller=CategoryController&action=index&page=1">List Categories</a></li>
        </ul>

    </div>
    <div class="workplace">

        <div class="row-fluid">
            <div class="span12 search">
                <form>
                    <input type="text" class="span11" placeholder="Some text for search..." name="search"/>
                    <button class="btn span1" type="submit">Search</button>
                </form>
            </div>
        </div>
    <div class="row-fluid">

        <div class="span12">
            <div class="head">
                <div class="isw-grid"></div>
                <h1>Products Management</h1>

                <div class="clear"></div>
            </div>
            <div class="block-fluid table-sorting">
                <a href="index.php?controller=ProductController&action=viewAddProduct" class="btn btn-add">Add Product</a>
                <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable_2">
                    <thead>
                    <form method="POST" action="index.php?controller=ProductController&action=handle">
                        <tr>
                            <th><input type="checkbox" id="checkAll"/></th>
                            <th width="10%" class="sorting"><a href="index.php?controller=ProductController&action=index&category_id&sort=">ID</a></th>
                            <th width="20%" class="sorting"><a href="#">Product Name</a></th>
                            <th width="10%" class="sorting"><a href="#">Catogory_id</a> </th>
                            <th width="15%" class="sorting"><a href="#">Price</a></th>
                            <th width="15%" class="sorting"><a href="#">Activate</a></th>
                            <th width="10%" class="sorting"><a href="#">Time Created</a></th>
                            <th width="10%" class="sorting"><a href="#">Time Updated</a></th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($list as $key) {?>
                        <tr>
                            <td><input type="checkbox"> </td>
                            <td width="10%"><?php echo $key['id'];?></td>
                            <td width="20%"><?php echo $key['productname'];?></td>
                            <td width="10%"><?php echo $key['category_id'];?></td>
                            <td width="10%"><?php echo $key['price'];?></td>
                            <td width="10%"><span class="<?php if($key['activate']) echo 'text-success'; else echo 'text-error';?>"><?php if($key['activate']) echo "Activate"; else echo "Deactivate";?></span></td></td>
                            <td width="10%"><?php echo $key['time_created'];?></td>
                            <td width="10%"><?php echo $key['time_updated'];?></td>
                            <td><a href="#" class="btn btn-info">Edit</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="bulk-action">
                    <button class="btn btn-success" name="activate">Activate</button>
                    <button class="btn btn-danger" name="delete" onclick="return(confirm('Are you sure delete?'))">Delete</button>
                </div><!-- /bulk-action-->
                </form>
                <div class="dataTables_paginate">
                    <a class="first paginate_button paginate_button_disabled" href="#">First</a>
                    <a class="previous paginate_button paginate_button_disabled" href="#">Previous</a>
                        <span>
                            <a class="paginate_active" href="#">1</a>
                            <a class="paginate_button" href="#">2</a>
                        </span>
                    <a class="next paginate_button" href="#">Next</a>
                    <a class="last paginate_button" href="#">Last</a>
                </div>
                <div class="clear"></div>
            </div>
        </div>

    </div>
    <div class="dr"><span></span></div>

</div>

</div>
</body>
</html>