
<div class="content">
    <div class="container-cart" style="text-align: center">
        <h5  class="signup-heading">Đơn của bạn</h5>
        <div class="card my-3">
            
            <div class="">
                <table class="order-table" >
                    <?php Auth::userGuest();
                    if ($orderDetails) {
                        ?>
                        <thead class='text-truncate'>
                        <th>Stt</th>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        </thead>
                        <?php
                        $i = 0;
                        foreach ($orderDetails as $order) {
                            $i++
                            ?>
                            <tbody>
                            <td><?php echo $i ?></td>
                            <td><?php echo $order->product_name ?></td>
                            <td><?php echo number_format($order->product_price, 2) ?>$</td>
                            <td><?php echo $order->product_qty ?></td>
                            <td><?php echo number_format($order->product_price * $order->product_qty, 2) ?>$</td>
                            </tbody>
                                <?php }
                            } else {
                                ?>
                        <p class="text-center text-danger"><span class='btn btn-sm btn-danger' style='border-radius:50%'><i class="fa fa-warning"></i></span> There is no Orders</p>
<?php }
?>

                </table>
            </div>
        </div>
    </div>
</div>
<?php
//require_once ROOT ."/views/inc/footer.php" ?>