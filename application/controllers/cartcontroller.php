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
        //$this->view('front.orders',$data);
    }

    /* >>>>>>>>>>>>>>>>>>>> */
    #<---> add to cart<--->#
    /* <<<<<<<<<<<<<<<<<<<< */

    public function add($pro_id, $price, $number = 1) {
        Auth::userAuth();
        if (isset($_POST)) {
            $number = $_POST['q'];
        }
        $user_id = Session::name('user_id');
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
        $response = json_encode(array(number_format($total, 2, '.', ''), $cartItems));
        echo $response;
    }

    /* >>>>>>>>>>>>>>>>>>>> */
    #<--->   delete   <--->#
    /* <<<<<<<<<<<<<<<<<<<< */

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
                        <td>' . $cart->price . '</td>' .
                        '       <td>
                            <input style="width: 44px;" type="number" name="quantity" value="' . $cart->qty . '" min="1" onchange="updateQuantity(\'' . URL . '\',\'' . $cart->product . '\' ,this.value)">
                        </td>
                        <td><button class="btn-delete" onclick="deletePro(\'' . URL . '\', \'' . $cart->cart_id . '\')"><img src="../../public/img/delete.png"></button>
                        </td>' .
                        '   </tr>';
                $total = $total + ($cart->qty * $cart->price);
                $qty = $qty + ($cart->qty);
            }
            $listPro = $listPro . '  </tbody> 
            </table> 
                <div class="checkout">
                <label>Tổng tiền hàng: </label>
                <span id="cost">' . number_format($total, 2, '.', '')
                    . '
                </span>
                <button id="btn-checkout">Thanh toán</button>
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
                Redirect::to("cart/thank");
            } else {
                $this->set('cart', $this->Cart->getAllCart());
            }
        } else {
            echo var_dump($error);
        }
    }

}
