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
                <form method="GET" action="index.php">
                    <input type="hidden" class="" name="controller" value="CategoryController"/>
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
                    <h1>Categories Management</h1>

                    <div class="clear"></div>
                </div>
                <div class="block-fluid table-sorting">
                    <a href="index.php?controller=CategoryController&action=viewAddCategory" class="btn btn-add">Add Category</a>
                    <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable_2">
                        <thead>
                        <form method="POST" action="index.php?controller=CategoryController&action=handle">
                            <?php
                            if(!isset($_GET['order']) || $_GET['order']=='desc'){
                                $order = 'asc';
                            } else if($_GET['order']=='asc' ||$_GET['order']!=$order){
                                $order = 'desc';
                            }
                            ?>
                            <tr>
                                <th><input type="checkbox" id="checkAll"/></th>
                                <th width="15%" class="<?php if($_GET['action']=='sortId'){if($_GET['order']=='desc') echo "sorting_desc"; else echo 'sorting_asc';}?>">
                                    <a href="index.php?controller=CategoryController&action=sortId&order=<?php echo $order;?>&page=<?php echo $_GET['page'];?>" id="sortId">ID</a>
                                </th>
                                <th width="35%" class="<?php if($_GET['action']=='sortCategoryname'){if($_GET['order']=='desc') echo "sorting_desc"; else echo 'sorting_asc';}?>">
                                    <a href="index.php?controller=CategoryController&action=sortCategoryname&order=<?php echo $order;?>&page=<?php echo $_GET['page'];?>">Username</a>
                                </th>
                                <th width="20%" class="<?php if($_GET['action']=='sortActivate'){if($_GET['order']=='desc') echo "sorting_desc"; else echo 'sorting_asc';}?>">
                                    <a href="index.php?controller=CategoryController&action=sortActivate&order=<?php echo $order;?>&page=<?php echo $_GET['page'];?>">Activate</a>
                                </th>
                                <th width="10%" class="<?php if($_GET['action']=='sortTimeCreated'){if($_GET['order']=='desc') echo "sorting_desc"; else echo 'sorting_asc';}?>">
                                    <a href="index.php?controller=CategoryController&action=sortTimeCreated&order=<?php echo $order;?>&page=<?php echo $_GET['page'];?>">Time Created</a>
                                </th>
                                <th width="10%" class="<?php if($_GET['action']=='sortTimeUpdated'){if($_GET['order']=='desc') echo "sorting_desc"; else echo 'sorting_asc';}?>">
                                    <a href="index.php?controller=CategoryController&action=sortTimeUpdated&order=<?php echo $order;?>&page=<?php echo $_GET['page'];?>">Time Updated</a>
                                </th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($list_categories as $dt){?>
                            <tr>
                                <td><input type="checkbox" name="checkbox[]" value="<?php echo $dt['id']; ?>"/></td>
                                <td><?php echo $dt['id'];?></td>
                                <td><?php echo $dt['categoryname'];?></td>
                                <td><span class="text-success"><?php if($dt['activate']) echo "Activate"; else echo "Deactivate";?></span></td>
                                <td><?php echo $dt['time_created'];?></td>
                                <td><?php echo $dt['time_updated'];?></td>
                                <td><a href="index.php?controller=CategoryController&action=viewEditCategory&id=<?php echo $dt['id']; ?>" class="btn btn-info">Edit</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                    <div class="bulk-action">
                        <button class="btn btn-success" name="activate">Activate</button>
                        <button class="btn btn-danger" name="delete" onclick="return(confirm('Are you sure delete?'))">Delete</button>
                    </div><!-- /bulk-action-->
                    </form>
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