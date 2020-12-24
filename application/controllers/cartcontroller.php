<?php

class CartController extends Controller {
    /* >>>>>>>>>>>>>>>>>>>> */
    #<--->   index    <--->#
    /* <<<<<<<<<<<<<<<<<<<< */

    public function cart() {
        Auth::userAuth();
        $this->set('title', 'Cart');
        $cartItems = 0;
        $cart = $this->Cart->getAllCart();
        $this->set('cart', $cart);
        if ($cart) {
            foreach ($cart as $cart) {
                $cartItems = $cartItems + $cart->qty;
            }
        } else {
            $cartItems = 0;
        }
        Session::set('user_cart', $cartItems);
    }

    /* >>>>>>>>>>>>>>>>>>>> */
    #<--->   Thank    <--->#
    /* <<<<<<<<<<<<<<<<<<<< */

    public function thank() {
        Auth::userAuth();
        $this->set('title', 'Thank You');
        $this->set('title2', 'Transaction Done');
        $this->view('front.thank', $data);
    }

    /* >>>>>>>>>>>>>>>>>>>> */
    #<--->   orders    <--->#
    /* <<<<<<<<<<<<<<<<<<<< */

    public function orders() {
        Auth::userAuth();
        $this->set('title', 'Orders');
        $this->set('orderDetails', $this->Cart->orderModel->getUserOrderDetalails(Session::name('user_id')));
        $this->set('orders', $this->Cart->orderModel->getAllUserOrder(Session::name('user_id')));
    }

    

    public function show($id) {
        Auth::userGuest();
        $user = Session::name('user_id');
        $order = $this->Cart->orderModel->showByUser($id, $user);
        if ($order) {
            $this->set('order', $order);
            $this->set('shipping', $this->Cart->orderModel->showShipping($order->shipping_id));
            $this->set('orderDetails', $this->Cart->orderModel->getAllOrderDetalails($order->order_id));
            $this->set('title', 'Order ' . $order->order_id);
        }
        
        //$this->view('orders.show', $data);
    }

    /* >>>>>>>>>>>>>>>>>>>> */
    #<---> add to cart<--->#
    /* <<<<<<<<<<<<<<<<<<<< */

    public function add($pro_id, $price, $number = 1) {
        Auth::userAuth();
        if (isset($_POST)) {
            $number = $_POST['q'];
        }
        if (Session::existed('user_id')) {
            $user_id = Session::name('user_id');
        }
        if ($this->Cart->findCartPro($pro_id, $user_id) > 0) {
            $this->Cart->addOne($pro_id, $number);
        } else {
            $this->Cart->addnew($pro_id, $user_id, $price);
        }
        $cart = $this->Cart->getAllCart();
        $this->set('cart', $cart);
        $cartItems = 0;
        if ($cart) {
            foreach ($cart as $cart) {
                $cartItems = $cartItems + $cart->qty;
            }
        } else {
            $cartItems = 0;
        }
        Session::set('user_cart', $cartItems);

        echo Session::get('user_cart');
    }

    /* >>>>>>>>>>>>>>>>>>>> */
    #<---> update Qty <--->#
    /* <<<<<<<<<<<<<<<<<<<< */

    public function updateQty($id) {
        Auth::userAuth();
        Csrf::CsrfToken();
        $q = $_POST['q'];

        if ($q < 1 && empty($q)) {
            
        } else {
            $this->Cart->updateQty($id, $q);
            Session::set('success', 'Qty has been updated');
        }
        $cart = $this->Cart->getAllCart();
        $this->set('cart', $cart);
        $cartItems = 0;
        if ($cart) {
            foreach ($cart as $ct) {
                $cartItems = $cartItems + $ct->qty;
            }
        } else {
            $cartItems = 0;
        }
        Session::set('user_cart', $cartItems);
        if ($cart) {
            $total = 0;
            $qty = 0;
            foreach ($cart as $cart) {
                $total = $total + ($cart->qty * $cart->price);
                $qty = $qty + ($cart->qty);
            }
        }
        $response = json_encode(array(Random::currency_format($total), $cartItems));
        echo $response;
    }

    /* >>>>>>>>>>>>>>>>>>>> */
    #<--->   delete   <--->#
    /* <<<<<<<<<<<<<<<<<<<< */

    public function cancelOrder($id) {

        Auth::userGuest();
        $user= Session::name('user_id');
        $inActivate = $this->Cart->orderModel->inActivate($id, $user);
        if ($inActivate) {
            Session::set('success', 'Item has been inActivated');
        }
        $response = json_encode(array('Đã hủy'));
        echo $response;
    }

    public function deliveredOrder($id) {
        Auth::userGuest();
        $user= Session::name('user_id');
        $inActivate = $this->Cart->orderModel->Done($id, $user);
        if ($inActivate) {
            Session::set('success', 'Item has been inActivated');
        }
        $response = json_encode(array('Đã giao'));
        echo $response;
    }
    
    public function delete($id) {
        Auth::userAuth();
        Csrf::CsrfToken();
        Session::set('success', 'Item has been deleted');
        $delete = $this->Cart->delete($id);
        $cart = $this->Cart->getAllCart();
        $this->set('cart', $cart);
        $cartItems = 0;
        if ($cart) {
            foreach ($cart as $ct) {
                $cartItems = $cartItems + $ct->qty;
            }
        } else {
            $cartItems = 0;
        }
        Session::set('user_cart', $cartItems);
        $listPro = "";
        if ($cart) {

            $listPro = '
            <table class="cart-detail"  >
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>' .
                    '<tbody>';
            $total = 0;
            $qty = 0;
            foreach ($cart as $cart) {
                $listPro = $listPro . '<tr>
                        <td>
                            <div class="product-img">' .
                        '<img id="img-product" src="' . URL . '/uploads/' . $cart->pro_image . '.">' .
                        '           </div>' .
                        '       </td>' .
                        '       <td>' . $cart->pro_name . '</td>
                        <td>' . Random::currency_format($cart->price) . '</td>' .
                        '       <td>
                            <input style="width: 44px;" type="number" name="quantity" value="' . $cart->qty . '" min="1" max=10 onchange="updateQuantity(\'' . URL . '\',\'' . $cart->product . '\' ,this.value)">
                        </td>
                        <td><button class="btn-delete" onclick="deletePro(\'' . URL . '\', \'' . $cart->cart_id . '\')">Xóa</button>
                        </td>' .
                        '   </tr>';
                $total = $total + ($cart->qty * $cart->price);
                $qty = $qty + ($cart->qty);
            }
            $listPro = $listPro . '  </tbody> 
            </table> <div class="checkout" >
                <div class="signup" style="margin: auto">
                    <label class="signup-label"><h1 class="signup-heading" style="font-size: 20px">Tổng: </h1></label>
                    <span id="cost">' . Random::currency_format($total) . '
                    </span>
                    <h2 class="signup-heading">Thông tin thanh toán</h2>
                    <form action="' . URL . '/cart/checkout" method="POST" class="signup-form" autocomplete="off">
                        <label for="name" class="signup-label">Tên người nhận</label>
                        <input type="text" id="name" name="name" class="signup-input" required placeholder="Nhập tên người nhận">
                        <label for="phone" class="signup-label">Email</label>
                        <input type="tel" id="email" name="email" class="signup-input" required placeholder="Nhập email" value="">
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
                        <input type="hidden" name="qty" value="' . $qty . '">
                        <input type="hidden" name="total" value="' . $total . '">
                        <input type="submit" name="billTo" class="signup-submit" value="Đặt hàng"></button>
                    </form>
                </div>

                
            </div>';
        } else {
            $listPro = '<div>
                <span class="signup-heading" style="display: grid; font-size: 30px">Không có sản phẩm trong giỏ</span>
            </div>';
        }
        $response = json_encode(array($listPro, $cartItems));
        echo $response;
    }

    /* >>>>>>>>>>>>>>>>>>>> */
    #<--->   delete   <--->#
    /* <<<<<<<<<<<<<<<<<<<< */

    public function clear() {
        Auth::userAuth();
        Csrf::CsrfToken();
        Session::set('success', 'All Item has been deleted');
        $delete = $this->Cart->clear();
        if ($delete) {
            Redirect::to('cart/cart');
        }
    }

    /* >>>>>>>>>>>>>>>>>>>> */
    #<--->  checkout  <--->#
    /* <<<<<<<<<<<<<<<<<<<< */

    public function checkout() {
        Auth::userGuest();
        if (isset($_SESSION['email'])) {
            Session::set('danger', "Verify Your account firstly <a href='" . URL . "/users/confirm'>Confirm Now</a>");
            Redirect::to('users/confirm');
        }
        Csrf::CsrfToken();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
            $name = $_POST['name'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $total = $_POST['total'];
            $qty = $_POST['qty'];


            if (empty($_POST['payment_method'])) {
                $this->set('errMethod', 'You must choose payment method');
                $error['errMethod'] = 'You must choose payment method';
            }


            if (empty($error['errName']) && empty($error['errMobile']) && empty($error['errAddress']) && empty($error['errCity']) && empty($error['errMethod'])) {

                $shipping_id = $this->Cart->orderModel->addToShipping($name, $email, $mobile, $address, $city);
                Session::set('shipping_id', $shipping_id);

                //complete order
                $payment_id = $this->Cart->orderModel->addToPayment($_POST['payment_method'], $shipping_id);

                $order_id = $this->Cart->orderModel->addToOrder(
                        Session::name('user_id'), $shipping_id, $payment_id
                        , $total
                );
                $cart = $this->Cart->getAllCart();
                $this->set('cart', $cart);
                foreach ($cart as $cart) {
                    $this->Cart->orderModel->addToOrderDetails(
                            $order_id, $cart->product, $cart->pro_name,
                            $cart->price, $cart->qty, Session::name('user_id')
                    );
                }

                $this->Cart->clear();
                Session::set('user_cart', '0');
                Redirect::to("cart/orders");
            } else {
                $this->set('cart', $this->Cart->getAllCart());
            }
        } else {
            echo var_dump($error);
        }
    }

}
