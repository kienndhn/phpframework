
<div class="content">
        <div class="profile" style="max-width: 800px">
        <!-- <h5>Manufactures Management</h5>
        <input type="text" id='search_man' class="form-control w-50 mx-auto" placeholder="Search"> -->
        <h2 class="signup-heading">Đơn hàng</h2>
        <?php if($orders){?> 
        <table class="table table-dark table-responsive-md">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Người đặt</th>
                    <th>Tổng tiền</th>
                    <th>Hình thức thanh toán</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                

                
                    foreach ( $orders as $order) {?>                        
                    <tr>
                        <td><?php echo $order->order_id ?></td>
                        <td><?php echo $order->creator ?></td>
                        <td><?php echo $order->order_total ?>$</td>
                        <td><?php echo $order->method ?></td>
                            <td>
                                <a href="<?php echo URL ?>/orders/<?php echo $order->order_status == 0 ? 'activate':'inActivate'?>/<?php echo $order->order_id ?>">
                                    
                                </a>
                            </td>
                        <td>
                            <a href="<?php echo URL ?>/orders/delete/<?php echo $order->shipping_id?>">Xóa</i></a>
                            <a href="<?php echo URL ?>/orders/show/<?php echo $order->order_id?>">Xem</a>
                        </td>
                    </tr>
                <?php } 
                
                ?>
            </tbody>
        </table>
        <?php }else{?>
                    <p><span style='border-radius:50%'><i class="fa fa-warning"></i></span>Không có đơn hàng</p>
                    <?php  }?> 
    </div>
</div>