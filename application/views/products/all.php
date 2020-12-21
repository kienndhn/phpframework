
<div class="content">
        <div class="profile" style="max-width: 800px">
        <!-- <h5>Manufactures Management</h5>
        <input type="text" id='search_man' class="form-control w-50 mx-auto" placeholder="Search"> -->
        <h2 class="signup-heading">Tất cả sản phẩm</h2>
            <span style="width: 15%; line-height: 24px"><a href="<?php echo URL ?>/products/add">Thêm sản phẩm mới</a></span>
            <span>Search</span>
            <form style="display: inline-block;" action=""><input type="text" placeholder="enter a product"></form>

        <?php if($products ){  ?>
        <table class="all-product">
            <thead>
                <tr>
                    <th>stt</th>
                    <th>Tên</th>
                    <th>Người tạo</th>
                    <th>Trạng thái</th>
                    <th>Loại</th>
                    <th>Hãng</th>
                    <th>Ảnh</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                

                
                $i = 0;
                    foreach ( $products as $pro) { $i++ ?>                        
                    <tr>
                        <td><?php echo $i ?></td>
                        <td>
                            <a href="<?php echo URL ?>/products/show/<?php echo $pro->product_id?>" class="text-danger">
                                <?php echo $pro->name ?>
                            </a>
                        </td>
                        <td><?php echo $pro->creator ?></td>
                        <td>
                            <a href="<?php echo URL ?>/products/<?php echo $pro->active == 0 ? 'activate':'inActivate'?>/<?php echo $pro->product_id ?>">
                                <?php echo $pro->active == 0 ? '<i ></i>':'<i   text-success"></i>' ?>
                            </a>
                        </td>
                        <td><?php echo $pro->cat_name ?></td>
                        <td><?php echo $pro->man_name ?></td>
                        <td><img src="<?php echo URL ?>/uploads/<?php echo $pro->image ?>" alt="" style='height:50px;width:50px;border-radius:50%'></td>
                        <td>
                        <form  action="<?php echo URL ?>/products/delete/<?php echo $pro->product_id?>" method='GET'>
                            <input type="hidden" name="csrf" value="<?php //new Csrf(); echo Csrf::get()?>">
                            <button  type="submit" ><i ></i></button>
                        </form>
                            <a href="<?php echo URL ?>/products/edit/<?php echo $pro->product_id?>" ><i></i></a>
                        </td>
                    </tr>
                <?php } 
                
                ?>
            </tbody>
        </table>
        <?php }else{?>
                    <p class="text-center text-danger"><span class='btn btn-sm btn-danger' style='border-radius:50%'><i class="fa fa-warning"></i></span> Không có sản phẩm</p>
                    <?php  } ?>
        </div>          
    </div>