

<div class="content">
        <div class="profile" style="max-width: 800px">
        <!-- <h5>Manufactures Management</h5>
        <input type="text" id='search_man' class="form-control w-50 mx-auto" placeholder="Search"> -->
        <h2 class="signup-heading">Tất cả danh mục</h2>
            <span style="width: 15%; line-height: 24px"><a href="<?php echo URL ?>/categories/add">Thêm danh mục mới</a></span>
            <span>Search</span>
            <form style="display: inline-block;" action=""><input type="text" placeholder="enter a product"></form>

        <?php if($categories ){  ?>
        <table class="all-product">
            <thead>
                <tr>
                    <th>Stt</th>
                    <th>Tên</th>
                    <th>Người tạo</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php 

                
                $i = 0;
                    foreach ( $categories as $cat) { $i++ ?>                        
                    <tr>
                        <td><?php echo $i ?></td>
                        <td>
                            <!--<a href="<?php echo URL ?>/categories/show/<?php echo $cat->cat_id?>" class="text-danger">-->
                                <?php echo $cat->cat_name ?>
                            <!--</a>-->
                        </td>
                        <td><?php echo $cat->creator ?></td>
                            <td>
                                <a href="<?php echo URL ?>/manufactures/<?php echo $cat->active == 0 ? 'activate':'inActivate'?>/<?php echo $cat->cat_id ?>">
                                    <?php echo $cat->active == 0 ? '<i class="fa fa-thumbs-down text-secondary"></i>':'<i class="fa fa-thumbs-up  text-success"></i>' ?>
                                </a>
                            </td>
                        <td>
                        <form style="display: inline-block;"class='' action="<?php echo URL ?>/categories/delete/<?php echo $cat->cat_id?>" method='GET'>
                            <input type="hidden" name="csrf" value="<?php new Csrf(); echo Csrf::get()?>">
                            <button type="submit" >Delete</button>
                        </form>
                            <button ><a href="<?php echo URL ?>/categories/edit/<?php echo $cat->cat_id?>" class="">Edit</a></button>
                        </td>
                    </tr>
                <?php } 
                
                ?>
            </tbody>
        </table>
        <?php }else{?>
                    <p class="text-center text-danger"><span class='btn btn-sm btn-danger' style='border-radius:50%'><i class="fa fa-warning"></i></span> There is no Brands</p>
                    <?php  } ?>
        </div>          
    </div>