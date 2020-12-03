
<?php //require_once ROOT ."/views/inc/header.php" ?>
    <div class="mt-4">
        <h5 class="text-center"><?php echo $product->name ?></h5>
        <div class="card">
            <div class="card-header">
                <h6><?php echo $product->name ?></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <img src="<?php echo URL ?>/uploads/<?php echo $product->image ?>" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-sm-6 mt-2">
                        <ul class="list-unstyled">
                            <li class='my-2'>
                                <strong><i class="fa fa-product-hunt"></i> Product: </strong> <?php echo $product->name ?>
                            </li>
                            <li class='my-2'>
                                <strong><i class="fa fa-money"></i> Price: </strong><span class="badge badge-info"> <?php echo $product->price ?>$</span>
                            </li>
                            
                            <li class='my-2'>
                                <strong><i class="fa fa-heart"></i> Color: </strong> <?php echo $product->color ?>
                            </li>
                            <li class='my-2'>
                                <strong><i class="fa fa-black-tie"></i> Size: </strong> <?php echo $product->size ?>
                            </li>
                            <li class='my-2'>
                            <li class='my-2'>
                                <strong><i class="fa fa-suitcase"></i> Brand: </strong> <?php echo $product->man_name ?>
                            </li>
                            <li class='my-2'>
                                <strong><i class="fa fa-tag"></i> Category: </strong> <?php echo $product->cat_name?>
                            </li>
                                <strong><i class="fa fa-list-alt"></i> Description: </strong> <?php echo $product->description ?>
                            </li>
                            
                            <li class='my-2'>
                                <strong><i class="fa fa-user"></i> Creator: </strong> <?php echo $product->creator ?>
                            </li>
                            <li class='my-2'>
                                <strong><i class="fa fa-calendar"></i> Date: </strong> <?php echo $product->created_at ?>
                            </li>
                        </ul>
                        <strong><i class="fa fa-picture-o"></i> Gallary</strong>
                        <?php 
                        if(count($gallary) > 0){?>
                        
                        <?php 
                            foreach ($gallary as $image) {?>
                            <span>
                                <a href="<?php echo URL ?>/uploads/<?php echo $image->product_id ?>/<?php echo $image->image_name ?>" data-fancybox="gallery" data-caption="<?php echo $image->image_name ?>">
                                    <img class='img-fluid' style='width:80px;height:80px' src="<?php echo URL ?>/uploads/<?php echo $image->product_id ?>/<?php echo $image->image_name ?>" alt="" />
                                </a>
                            </span>
                        <?php }
                        }else{?>
                            <span class="text-danger">No gallary for this product</span>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="<?php echo URL ?>/home/index" class="btn btn-secondary btn-sm" style="font-size:13px"><i class="fa fa-arrow-left"></i> Go Back</a>
                <a href="<?php echo URL ?>/carts/add/<?php echo $product->product_id ?>/<?php echo $product->price  ?>" class="btn btn-danger btn-sm" style="font-size:13px">Add To Cart <i class="fa fa-shopping-cart"></i></a>
            </div>
        </div>
    </div>
<?php //require_once ROOT ."/views/inc/footer.php" ?>