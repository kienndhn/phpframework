

<div class="content">
    <?php if (Session::existed('admin_id')) { ?>
        <div class="profile" style="padding: 20px 0; border-radius: 10px;display: block;">

            
            <div style="border-radius: 1px; background-color:#f9f9f9; ">
                <div class="admin-ul">
                    <label for="man" class="signup-label">
                        <p style="font-size: 20px">Hãng:</p>
                    </label>
                    <ul class="admin-menu" id="man">
                        <li><div class="btn-add-to-cart"><button><a href="<?php echo URL ?>/manufactures/all">Tất cả</a></button></div></li>
                        <li><div class="btn-add-to-cart"><button><a href="<?php echo URL ?>/manufactures/add">Thêm mới</a></button></div></li>
                    </ul>
                </div>
                <div class="admin-ul">
                    <label for="man" class="signup-label">
                        <p style="font-size: 20px">Danh mục:</p>
                    </label>
                    <ul class="admin-menu">
                        <li><div class="btn-add-to-cart"><button><a href="<?php echo URL ?>/categories/all">Tất cả</a></button></div></li>
                        <li><div class="btn-add-to-cart"><button><a href="<?php echo URL ?>/categories/add">Thêm mới</a></button></div></li>
                    </ul>
                </div>
                <div class="admin-ul">
                    <label for="man" class="signup-label">
                        <p style="font-size: 20px">Sản Phẩm:</p>
                    </label>
                    <ul class="admin-menu">
                        <li><div class="btn-add-to-cart"><button><a href="<?php echo URL ?>/products/all">Tất cả</a></button></div></li>
                        <li><div class="btn-add-to-cart"><button><a href="<?php echo URL ?>/products/add">Thêm mới</a></button></div></li>
                    </ul>
                </div>
                <div class="admin-ul">
                    <label for="man" class="signup-label">
                        <p style="font-size: 20px">Đơn hàng:</p>
                    </label>
                    <ul class="admin-menu">
                        <li><div class="btn-add-to-cart"><button><a class="nav-link" href="<?php echo URL ?>/orders/all">Đơn đặt hàng</a></button></div></li>
                    </ul>
                </div>
            </div>

        </div>
    <?php } ?>
    <div class="profile">
        <div class= 'avatar'>
            <a href="<?php echo URL ?>/users/avatar/<?php Session::get('user_id') ?>" class=''>
                <img style='height:200px;width:200px;border-radius: 50%;' class="" src="<?php echo URL ?>/uploads/<?php Session::get('user_img') ?>" alt="Card image cap">
            </a>
            <div class="fullname">
                <h5 class=''><?php Session::get('user_name') ?></h5>
            </div>
        </div>

        <div class="">

            <div class="info-user">
                <ul class="">
                    <!--<li class=""><span class="key">ID </span><span><?php Session::get('user_id') ?></span></li>-->
                    <li class=""><span class="key">Tên </span><span><?php Session::get('user_name') ?></span></li>
                    <li class=""><span class="key">Email </span><span><?php echo $user->email ?></span></li>
                    </li>
                </ul>
            </div>
            <div class="fullname">
                <div class="btn-add-to-cart">
                    <button>
                        <a href="<?php echo URL ?>/users/edit/<?php echo Session::get('user_id') ?>" class="btn btn-sm btn-info float-right">Thay đổi thông tin</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
