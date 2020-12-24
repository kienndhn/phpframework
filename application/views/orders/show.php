<div class="content">
    <div class="container-cart" style="text-align: center">
        <div class="profile">
            <h2 class="signup-heading">Chi tiết đơn hàng</h2>



            <div class="custom-div">
                <div class="signup-heading" style="font-size: 30px">
                    Chi tiết khách hàng
                </div>
                <div class="card-body">
                    <table class="order-table">
                        <thead class='text-truncate'>
                        <th>tên khách</th>
                        <th>SDT</th>
                        </thead>
                        <tbody>
                        <td> <?php Session::get('user_name') ?></td>
                        <td><?php echo $shipping->mobile ?></td>
                        </tbody>

                    </table>
                </div>
            </div>


            <div class="custom-div">
                <div class="signup-heading" style="font-size: 30px">
                    Chi tiết vận chuyển
                </div>
                <div class="card-body">
                    <table class="order-table">
                        <thead class='text-truncate'>
                        <th>Tên người nhận</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        </thead>
                        <tbody>
                        <td><?php echo $shipping->full_name ?></td>
                        <td>
                            <?php echo $shipping->address ?>, 
                            <?php echo $shipping->city ?>
                        </td>
                        <td><?php echo $shipping->mobile ?></td>
                        <td><?php echo $shipping->email ?></td>
                        </tbody>

                    </table>
                </div>
            </div>



            <div class="custom-div">
                <div class="signup-heading" style="font-size: 30px">
                    Chi tiết đơn hàng
                </div>
                <div class="card-body">
                    <table class="order-table">
                        <thead class='text-truncate'>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền tiền</th>
                        </thead>
                        <?php
                        $i = 0;
                        foreach ($orderDetails as $order) {
                            $i++
                            ?>
                            <tbody>
                            <td><?php echo $order->product_id ?></td>
                            <td><?php echo $order->product_name ?></td>
                            <td><?php echo number_format($order->product_price, 2) ?>$</td>
                            <td><?php echo $order->product_qty ?></td>
                            <td><?php echo number_format($order->product_price * $order->product_qty, 2) ?>$</td>
                            </tbody>
                        <?php }
                        ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>