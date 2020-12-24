
<div class="content">
    <div class="container-cart">
        <div class="profile" id="content">
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
                                <td><?php echo Random::currency_format($cart->price) ?></td>
                                <td>
                                    <input style="width: 44px;" type="number" name="quantity" value="<?php echo $cart->qty ?>" min="1" max="10" onchange="updateQuantity('<?php echo URL ?>', '<?php echo $cart->product ?>', this.value)">
                                </td>
                                <td>

                                    <button class='btn-delete' onclick="deletePro('<?php echo URL ?>', '<?php echo $cart->cart_id ?>')">Xóa</button>

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
                    <div class="signup" style="margin: auto">
                        <label class="signup-label"><h1 class="signup-heading" style="font-size: 20px">Tổng: </h1></label>
                        <span id="cost">
                            <?php echo Random::currency_format($total); ?>
                        </span>
                        <h2 class="signup-heading">Thông tin thanh toán</h2>
                        <form action="<?php echo URL ?>/cart/checkout" method="POST" class="signup-form" autocomplete="off">
                            <label for="name" class="signup-label">Tên người nhận</label>
                            <input type="text" id="name" name="name" class="signup-input" required placeholder="Nhập tên người nhận">
                            <label for="phone" class="signup-label">Email</label>
                            <input type="email" id="email" name="email" class="signup-input" required title="nhập sai định dạng" placeholder="Nhập email"  value="">
                            <label for="phone" class="signup-label">Số điện thoại</label>
                            <input type="tel" id="phone" name="mobile" class="signup-input" required placeholder="ex: 0123456789" title="Số điện thoại có 10 số" pattern="[0-9]{10}">
                            <label for="province" class="signup-label">Tỉnh/ thành phố</label>
                            <input type="text" id="city" name="city" class="signup-input" required placeholder="thành phố">
                            <label for="street" class="signup-label">Địa chỉ</label>
                            <input type="text" id="address" name="address"class="signup-input" required placeholder="enter your street">
                            <label class="signup-label">Cách thanh toán</label><br>
                            <div >
                                <input list="browsers" name="payment_method" required class="signup-input">
                                <datalist id="browsers">
                                    <option value="Thanh toán khi nhận hàng">
                                    <option value="Thanh toán qua ví điện tử">
                                </datalist>
                            </div>
                            <br>
                            <input type="hidden" name="csrf" value="<?php
                            new Csrf();
                            echo Csrf::get()
                            ?>">
                            <input type="hidden" name="qty" value='<?php echo $qty ?>'>
                            <input type="hidden" name="total" value='<?php echo $total ?>'>
                            <input type="submit" name="billTo" class="signup-submit" value="Đặt hàng"></button>
                        </form>
                    </div>


                </div>
            <?php } else { ?>
                <div>
                    <span class="signup-heading" style="display: grid; font-size: 30px">Không có sản phẩm trong giỏ</span>
                </div>
            <?php } ?>
        </div>
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
