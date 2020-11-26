
<?php// require_once ROOT ."/views/inc/header.php" ?>
<div class=" my-4 mx-auto">
        <h3 class='text-center my-4'>Our Prouducts</h3>
        <form action="<?php echo URL ?>/home/search" method='POST' class='d-md-none w-50 mx-auto'>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <button class="input-group-text"><i class="fa fa-search"></i></button>
                </div>
                <input type="text" name='search' class="form-control" placeholder='Search'>
            </div>
        </form>
    <?php require_once ROOTDIR ."/views/inc/slider.php" ?>

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <h5>Categories</h5>
                <ul class="list-unstyled">
                <?php 
                if($categories){

                    foreach ($categories as $cat) {?>
                        <li><a href="<?php echo URL ?>/home/getProByCat/<?php echo $cat->cat_id ?>"><?php echo $cat->cat_name ?></a></li>
                    <?php }
                }else {?>
                        <p class="text-center text-danger"><span class='btn btn-sm btn-danger' style='border-radius:50%'><i class="fa fa-warning"></i></span> There is no categories</p>
                        <?php  }
                    ?>
                </ul>

                <h5>Brands</h5>
                <ul class="list-unstyled">
                <?php 
                if($manufactures){

                    foreach ($manufactures as $man) {?>
                        <li><a href="<?php echo URL ?>/home/getProByMan/<?php echo $man->man_id ?>"><?php echo $man->man_name ?></a></li>
                    <?php }
                }else{?>
                    <p class="text-center text-danger"><span class='btn btn-sm btn-danger' style='border-radius:50%'><i class="fa fa-warning"></i></span> There is no Brands</p>
                    <?php  }
                ?>
                </ul>
                <hr class='bg-dark'>
            </div>
            
            <?php 
            if($products){

                foreach ($products as $pro) {?>
                    <div class="col-lg-3 col-md-4 col-sm-4 my-2">
                        <div class="card position-relative" >
                            <span class="badge badge-success position-absolute p-1 "><?php echo $pro->price?>$</span>
                            <img style='height:200px' class="img-fluid" src="<?php echo URL ?>/uploads/<?php echo $pro->image ?>" alt="Card image cap">
                            <div class="card-body">
                                <h6 class="card-title"><?php echo $pro->name ?></h6>
                                <a href="<?php echo URL ?>/home/show/<?php echo $pro->product_id ?>" class="btn btn-info btn-sm py-1 float-left" style="font-size:13px">Details</a>
                                <a href="<?php echo URL ?>/carts/add/<?php echo $pro->product_id ?>/<?php echo $pro->price ?>" class="btn btn-danger btn-sm py-1 float-right" style="font-size:13px"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                    </div>
                <?php }
            }else {?>
                <p class="text-center text-danger"><span class='btn btn-sm btn-danger' style='border-radius:50%'><i class="fa fa-warning"></i></span> There is no Products</p>
                <?php  }
            ?>
        </div>
    </div>
<?php //require_once ROOT ."/views/inc/footer.php" ?>