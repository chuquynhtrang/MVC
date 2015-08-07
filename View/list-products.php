<!DOCTYPE html>
<html lang="en">
<?php
include_once 'menu.php';
?>
<div class="content">


    <div class="breadLine">

        <ul class="breadcrumb">
            <li><a href="index.php?controller=ProductController&action=index&page=1">List Products</a></li>
        </ul>

    </div>

    <div class="workplace">

        <div class="row-fluid">
            <div class="span12 search">
                <form method="GET" action="index.php">
                    <input type="hidden" class="" name="controller" value="ProductController"/>
                    <input type="hidden" class="" name="action" value="index"/>
                    <input type="text" class="span11"  name="search" value="<?php if(isset($_GET['search'])) echo $_GET['search']; ?>"/>
                    <input type="hidden" class="" name="page" value="1"/>
                    <button class="btn span1" type="submit">Search</button>
                </form>
            </div>
        </div>
        <!-- /row-fluid-->

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
                        <form method="POST" action="index.php?controller=ProductController&action=index&page=<?php echo $_GET['page'];?>">
                            <?php
                            if(!isset($_GET['order']) || $_GET['order']=='desc'){
                                $order = 'asc';
                            } else if($_GET['order']=='asc' ||$_GET['order']!=$order){
                                $order = 'desc';
                            }
                            $class ='';
                            if(isset($_GET['sort'])){
                                if($_GET['order'] == 'desc')
                                    $class = 'sorting_desc';
                                else
                                    $class = 'sorting_asc';
                            }
                            if(isset($_GET['search']))
                                $href_search="index.php?controller=ProductController&action=index&search=".$_GET['search'];
                            $href="index.php?controller=ProductController&action=index";
                            ?>
                            <tr>
                                <th><input type="checkbox" id="checkAll"/></th>
                                <?php if(isset($_GET['search'])){ ?>
                                    <th width="10%" class=<?php echo $class;?>>
                                        <a href="<?php echo $href_search;?>&sort=id&order=<?php echo $order;?>&page=<?php echo $_GET['page'];?>" id="sortId">ID</a>
                                    </th>
                                    <th width="30%" class="<?php echo $class;?>">
                                        <a href="<?php echo $href_search;?>&sort=productname&order=<?php echo $order;?>&page=<?php echo $_GET['page'];?>">Productname</a>
                                    </th>
                                    <th width="15%" class="<?php echo $class;?>">
                                        <a href="<?php echo $href_search;?>&sort=price&order=<?php echo $order;?>&page=<?php echo $_GET['page'];?>">Price</a>
                                    </th>
                                    <th width="15%" class="<?php echo $class;?>">
                                        <a href="<?php echo $href_search;?>&sort=activate&order=<?php echo $order;?>&page=<?php echo $_GET['page'];?>">Activate</a>
                                    </th>
                                    <th width="10%" class="<?php echo $class;?>">
                                        <a href="<?php echo $href_search;?>&sort=time_created&order=<?php echo $order;?>&page=<?php echo $_GET['page'];?>">Time Created</a>
                                    </th>
                                    <th width="10%" class="<?php echo $class;?>">
                                        <a href="<?php echo $href_search;?>&sort=time_updated&order=<?php echo $order;?>&page=<?php echo $_GET['page'];?>">Time Updated</a>
                                    </th>
                                    <th width="10%">Action</th>
                                <?php }else{ ?>
                                    <th width="10%" class=<?php echo $class;?>>
                                        <a href="<?php echo $href;?>&sort=id&order=<?php echo $order;?>&page=<?php echo $_GET['page'];?>" id="sortId">ID</a>
                                    </th>
                                    <th width="20%" class="<?php echo $class;?>">
                                        <a href="<?php echo $href;?>&sort=productname&order=<?php echo $order;?>&page=<?php echo $_GET['page'];?>">Productname</a>
                                    </th>
                                    <th width="10%" class="<?php echo $class;?>">
                                        <a href="<?php echo $href;?>&sort=category_id&order=<?php echo $order;?>&page=<?php echo $_GET['page'];?>">Category</a>
                                    </th>
                                    <th width="15%" class="<?php echo $class;?>">
                                        <a href="<?php echo $href;?>&sort=price&order=<?php echo $order;?>&page=<?php echo $_GET['page'];?>">Price</a>
                                    </th>
                                    <th width="15%" class="<?php echo $class;?>">
                                        <a href="<?php echo $href;?>&sort=activate&order=<?php echo $order;?>&page=<?php echo $_GET['page'];?>">Activate</a>
                                    </th>
                                    <th width="10%" class="<?php echo $class;?>">
                                        <a href="<?php echo $href;?>&sort=time_created&order=<?php echo $order;?>&page=<?php echo $_GET['page'];?>">Time Created</a>
                                    </th>
                                    <th width="10%" class="<?php echo $class;?>">
                                        <a href="<?php echo $href;?>&sort=time_updated&order=<?php echo $order;?>&page=<?php echo $_GET['page'];?>">Time Updated</a>
                                    </th>
                                    <th width="10%">Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($list_products as $dt){;?>
                        <tr>
                            <td><input type="checkbox" name="checkbox[]" value="<?php echo $dt['id']; ?>"/></td>
                            <td><?php echo $dt['id'];?></td>
                            <td><?php echo $dt['productname'];?></td>
                            <td><a href="index.php?controller=ProductController&action=index&category_id=<?php echo $dt['category_id'];?>&page=1">
                                    <?php foreach($list as $key){
                                            if($dt['category_id'] == $key['id']) echo $key['categoryname'];
                                    } ?>
                                </a></td>
                            <td><?php echo $dt['price'];?></td>
                            <td><span class="<?php if($dt['activate']) echo 'text-success'; else echo 'text-error';?>"><?php if($dt['activate']) echo "Activate"; else echo "Deactivate";?></span></td>
                            <td><?php echo $dt['time_created'];?></td>
                            <td><?php echo $dt['time_updated'];?></td>
                            <td><a href="index.php?controller=ProductController&action=editProduct&id=<?php echo $dt['id']; ?>" class="btn btn-info">Edit</a></td>
                        </tr>
                        <?php } ?>
                    </table>
                    <div class="bulk-action">
                        <button class="btn btn-success" name="activate">Activate</button>
                        <button class="btn btn-danger" name="delete" onclick="return(confirm('Are you sure delete?'))">Delete</button>
                    </div><!-- /bulk-action-->
                    <div class="dataTables_paginate">
                        <?php echo $link; ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

        </div>
        <div class="dr"><span></span></div>

    </div>

</div>
<script>
    var input = document.getElementsByTagName('input');
    var selectAll = input[4];
    selectAll.onclick = function(){
        var state = (selectAll.checked) ? true : false;
        for (var i = 2; i < input.length; i++) {
            input[i].checked = state;
        }
    };
</script>

</body>
</html>
<?php
$_SESSION['page'] = $_GET['page'];
