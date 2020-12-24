<div class="content">
    <div class="container-cart" id="content">
        <div class="profile" style="max-width: 80%">
            <!-- <h5>Manufactures Management</h5>
            <input type="text" id='search_man' class="form-control w-50 mx-auto" placeholder="Search"> -->

            <?php if ($orders) { ?> 
                <h2 class="signup-heading">Đơn hàng</h2>
                <table class="order-table">
                    <thead>
                        <tr>
                            <th>Chi tiết</th>
                            <th>Người đặt</th>
                            <th>Tổng tiền</th>
                            <th>Hình thức thanh toán</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order) { ?>                        
                            <tr>
                                <td><a href="<?php echo URL ?>/cart/show/<?php echo $order->order_id ?>">Xem</a></td>
                                <td><?php echo $order->creator ?></td>
                                <td><?php echo Random::currency_format($order->order_total) ?></td>
                                <td><?php echo $order->method ?></td>
                                <td id="status-<?php echo $order->order_id ?>">
                                    <?php
                                    if ($order->order_status == 0) {
                                        echo 'Đã hủy';
                                    } else if ($order->order_status == 1) {
                                        echo 'Đang xử lý';
                                    } else {
                                        echo 'Đã giao';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <!--<a class="signup-submit" href="<?php echo URL ?>/cart/show/<?php echo $order->order_id ?>">Xem</a>-->
                                    <?php if ($order->order_status != 0 && $order->order_status != 2) { ?>
                                    <button style="font-size: 15px; background-color: red; margin-bottom: 5px" id="cancel-<?php echo $order->order_id ?>" class="signup-submit" onclick="cancelOrder('<?php echo URL ?>', '<?php echo $order->order_id ?>')">Hủy</button>
                                    <?php } ?>
                                    <?php if ($order->order_status != 2 && $order->order_status != 0) { ?>
                                        <button style="font-size: 15px; margin-bottom: 5px" id="done-<?php echo $order->order_id ?>" class="signup-submit" onclick="deliveredOrder('<?php echo URL ?>', '<?php echo $order->order_id ?>')">Đã nhận hàng</button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <h2 class="signup-heading">Không có đơn hàng</h2>
            <?php } ?> 
        </div>
    </div>
</div>
