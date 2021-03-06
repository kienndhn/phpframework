<?php

class HomeController extends Controller {

    public function index() {

        $this->set('title', 'Home');
        
        if (Session::existed('use_id')) {
            $cart = $this->Home->cartModel->getAllCart();
            $this->set('cart', $cart);
            $cartItems = 0;
            if ($cart) {
                foreach ($cart as $cart) {
                    $cartItems = $cartItems + $cart->qty;
                }
            } else {
                $cartItems = 0;
            }
            if (Session::existed('user_cart')) {
                Session::set('user_cart', $cartItems);
            }
        }
        $this->set('categories', $this->Home->categoryModel->getAllCat(1));
        $this->set('manufactures', $this->Home->manufactureModel->getAllMan(1));
        $this->set('products', $this->Home->productModel->getAllPro());
    }

    /* >>>>>>>>>>>>>>>>>>>> */
    #<---> search <--->#
    /* <<<<<<<<<<<<<<<<<<<< */

    public function search() {
        $this->set('title', 'Products');
        $searched = $_GET['search'];

        $this->set('categories', $this->Home->categoryModel->getAllCat(1));
        $this->set('manufactures', $this->Home->manufactureModel->getAllMan(1));
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $results = $this->Home->productModel->search($searched);
            $this->set('products', $results);
            //$this->view('front.index', $data);
        } else {
            //Redirect::to('home/index');
        }
    }

    public function livesearch() {

        $q = $_GET['q'];
        $products = $this->Home->productModel->getAllPro();
        $hint = "";
        $j = 0;
        if (strlen($q) > 0) {
            $hint = "";
            foreach ($products as $products) {
                if ($j > 10) {
                    break;
                }
                if (stristr($products->name, $q)) {
                    if ($hint == "") {
                        $j++;
                        $hint = '<a href="' . URL . '/home/details/' . $products->product_id . '" style="text-decoration: none;margin: 10px; display: flex;">' . $products->name . '</a>';
                    } else {
                        $j++;
                        $hint = $hint . '<br/><a href="' . URL . '/home/details/' . $products->product_id . '" style="text-decoration: none;margin: 10px; display: flex;">' . $products->name . '</a>';
                    }
                }
            }
        }
        if ($hint == "") {
            $response = "";
        } else {
            $response = $hint;
        }
        echo $response;
    }

    /* >>>>>>>>>>>>>>>>>>>> */
    #<--->  By Categ  <--->#
    /* <<<<<<<<<<<<<<<<<<<< */

    public function proCategory($cat_id) {
        $this->set('categories', $this->Home->categoryModel->getAllCat(1));
        $this->set('manufactures', $this->Home->manufactureModel->getAllMan(1));
        $category = $this->Home->categoryModel->show($cat_id);
        $this->set('products', $this->Home->productModel->getProByCat($cat_id));

        $this->set('title', $category->cat_name);

        if ($category && is_numeric($cat_id)) {
            //$this->view('front.ProCategory', $data);
        } else {
            Session::set('danger', 'this item not exist');
            Redirect::to('home/index');
        }
    }

    /* >>>>>>>>>>>>>>>>>>>> */
    #<--->  By Categ  <--->#
    /* <<<<<<<<<<<<<<<<<<<< */

    public function proManufacture($man_id) {
        $this->set('categories', $this->Home->categoryModel->getAllCat(1));
        $this->set('manufactures', $this->Home->manufactureModel->getAllMan(1));
        $manufacture = $this->Home->manufactureModel->show($man_id);
        $this->set('products', $this->Home->productModel->getProByMan($man_id));

        $this->set('title', $manufacture->man_name);

        if ($manufacture && is_numeric($man_id)) {
            // $this->view('front.ProManufacture', $data);
        } else {
            Session::set('danger', 'this item not exist');
            Redirect::to('home/index');
        }
        //$this->view('front.ProManufacture', $data);
    }

    /* >>>>>>>>>>>>>>>>>>>> */
    #<--->   show    <--->#
    /* <<<<<<<<<<<<<<<<<<<< */

    public function details($id) {
        $this->set('product', $this->Home->productModel->show($id));
        $product = $this->Home->productModel->show($id);
        $this->set('title', $product->name);
        $this->set('gallary', $this->Home->productModel->getGallary($id));
        if ($product && is_numeric($id)) {
            // $this->view('front.details', $data);
        } else {
            Session::set('danger', 'this item not exist');
            Redirect::to('home/index');
        }
    }

}
