<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Basketnew extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model(array('Model_Basket'));
  }

	public function addToBasket($itemId) {
    $shopperId = $this->session->userId;
    $qty = ($this->input->post('qty') != '')?$this->input->post('qty'):1;
    if($shopperId != '') {
      $sess = $this->session->session_id;
      $ip = $this->input->ip_address();
      $dt = array(
        'session_id'=>$sess,
        'item_id'=>$itemId,
        'shopper_id'=>$shopperId,
        'item_qty'=>$qty,
        'ip_address'=>$ip,
        'date_added'=>time()
      );
      $ins = $this->Model_Basket->insertBasket($dt);
      $cartCount = $this->Model_Basket->cartItemsCount($shopperId);
      $cartList = $this->Model_Basket->getCartDropList($shopperId);
      $subCartList = $this->Model_Basket->getSubTotalCartList($shopperId);
      echo json_encode(array('success'=>TRUE, 'carts'=>$cartCount, 'cartList'=>$cartList, 'subCartList'=>$subCartList));
    }
    else {
      echo json_encode(array('success'=>FALSE, 'error'=>'Silahkan Login Terlebih Dahulu'));
    }
  }

  public function deleteBasketItem($itemId) {
    $shopperId = $this->session->userId;
    $this->Model_Basket->deleteBasket($itemId);
    $cartCount = $this->Model_Basket->cartItemsCount($shopperId);
    $cartList = $this->Model_Basket->getCartDropList($shopperId);
    $subCartList = $this->Model_Basket->getSubTotalCartList($shopperId);
    echo json_encode(array('success'=>TRUE, 'carts'=>$cartCount, 'cartList'=>$cartList, 'subCartList'=>$subCartList));
  }

  public function deleteMainBasketItem($itemId) {
    $shopperId = $this->session->userId;
    $this->Model_Basket->deleteBasket($itemId);
    $cartCount = $this->Model_Basket->cartItemsCount($shopperId);
    $cartList = $this->Model_Basket->getCartDropList($shopperId);
    $subCartList = $this->Model_Basket->getSubTotalCartList($shopperId);
    $cartMainList = $this->Model_Basket->getCartList($shopperId);
    $subMainList = $this->Model_Basket->getSubTotalMainCartList($shopperId);
    echo json_encode(array('success'=>TRUE, 'carts'=>$cartCount, 'cartList'=>$cartList, 'subCartList'=>$subCartList, 'cartMainList'=>$cartMainList, 'subMainList'=>$subMainList));
  }

  public function updateBasketQty($itemId) {
    $shopperId = $this->session->userId;
    $qty = $this->input->post('qty');
    $this->Model_Basket->updateBasketQty($itemId, array('item_qty'=>$qty));
    $cartCount = $this->Model_Basket->cartItemsCount($shopperId);
    $cartList = $this->Model_Basket->getCartDropList($shopperId);
    $subCartList = $this->Model_Basket->getSubTotalCartList($shopperId);
    $cartMainList = $this->Model_Basket->getCartList($shopperId);
    $subMainList = $this->Model_Basket->getSubTotalMainCartList($shopperId);
    echo json_encode(array('success'=>TRUE, 'carts'=>$cartCount, 'cartList'=>$cartList, 'subCartList'=>$subCartList, 'cartMainList'=>$cartMainList, 'subMainList'=>$subMainList));
  }
}
