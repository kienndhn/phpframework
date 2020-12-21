
<div class="content">
    <div class="container-cart" id="content">
        <?php
        Auth::userGuest();
        if ($cart) {
            ?>
            <table class="cart-detail"  >
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    $qty = 0;
                    foreach ($cart as $cart) {
                        ?>
                        <tr class="cart-product">
                            <td>
                                <img id="img-product" style="width: 50px;height: 50px;" src="<?php echo URL ?>/uploads/<?php echo $cart->pro_image ?>">

                            </td>
                            <td><?php echo $cart->pro_name ?></td>
                            <td><?php echo $cart->price ?></td>
                            <td>
                                <input style="width: 44px;" type="number" name="quantity" value="<?php echo $cart->qty ?>" min="1" onchange="updateQuantity('<?php echo URL ?>', '<?php echo $cart->product ?>', this.value)">
                            </td>
                            <td>

                                <button class='btn-delete' onclick="deletePro('<?php echo URL ?>', '<?php echo $cart->cart_id ?>')"><img src="../../public/img/delete.png"></button>

                            </td>
                        </tr>
                        <?php
                        $total = $total + ($cart->qty * $cart->price);
                        $qty = $qty + ($cart->qty);
                    }
                    ?>
                </tbody>
            </table>

            <div class="checkout">
                <div class="signup">
                    <label class="signup-label" ><h1 class="signup-heading" style="font-size: 20px">Tổng: </h1></label>
                    <span id="cost">
                        <?php echo number_format($total, 2, '.', ''); ?>
                    </span>
                    <h2 class="signup-heading">Thông tin thanh toán</h2>
                    <form action="<?php echo URL ?>/cart/checkout" method="POST" class="signup-form" autocomplete="off">
                        <label for="name" class="signup-label">Tên người nhận</label>
                        <input type="text" id="name" name="name" class="signup-input" required placeholder="Nhập tên người nhận">
                        <label for="phone" class="signup-label">Email</label>
                        <input type="tel" id="email" name="email" class="signup-input" required placeholder="Nhập email" pattern="[0-9]{10}(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])" value="">
                        <label for="phone" class="signup-label">Số điện thoại</label>
                        <input type="tel" id="phone" name="mobile" class="signup-input" required placeholder="ex: 0123456789" pattern="[0-9]{10}">
                        <label for="province" class="signup-label">Tỉnh/ thành phố</label>
                        <input type="text" id="city" name="city" class="signup-input" required placeholder="thành phố">
                        <label for="street" class="signup-label">Địa chỉ</label>
                        <input type="text" id="address" name="address"class="signup-input" required placeholder="enter your street">
                        <label class="signup-label">Cách thanh toán</label><br>
                        <div style="border: solid 1px; border-radius: 2px">
                            <input type="radio" id="payment" name="payment_method" value="Thanh toan khi nhan hang" checked>
                            <label for="payment">Thanh toán khi nhận hàng</label>
                        </div>
                        <br>
                        <input type="hidden" name="csrf" value="<?php new Csrf(); echo Csrf::get()?>">
                        <input type="hidden" name="qty" value='<?php echo $qty ?>'>
                        <input type="hidden" name="total" value='<?php echo $total ?>'>
                        <input type="submit" name="billTo" class="signup-submit" value="Đặt hàng"></button>
                    </form>
                </div>

                
            </div>
        <?php } ?>

    </div>
</div>
<script>
//    function deletePro(url, id) {
//        var xhttp = new XMLHttpRequest();
//        xhttp.onreadystatechange = function () {
//            if (this.readyState == 4 && this.status == 200) {
//                document.getElementById("content").innerHTML = this.responseText;
//            }
//        };
//        xhttp.open("GET", url + "/cart/delete/" + id, true);
//        xhttp.send();
//    }
</script>
