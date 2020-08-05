<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Checkoutnew extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model(array('Model_Checkout'));
  }

  public function getCheckoutCost() {
    $shopperId = $this->session->userId;
    $shipping = $this->input->post('shipping');
    $sumChk = $this->Model_Checkout->getSumCheckout($shopperId);
    $sumAll = $shipping+$sumChk;
    echo json_encode(array('shipping'=>number_format($shipping), 'sumchk'=>$sumChk,'sumall'=>'Rp'.number_format($sumAll)));
  }

  public function proceedCheckout() {
    $shopperId = $this->session->userId;
    if($shopperId == '') {
			redirect('account');
		}
    $name = $this->input->post('shipping-name');
    $mail = $this->input->post('email');
    $tlp = $this->input->post('tel');
    $province = $this->input->post('province');
    $city = $this->input->post('city');
    $address = $this->input->post('address');
    $courier = $this->input->post('shipping');
    $bank = $this->input->post('bank');
    $ordernotes = $this->input->post('ordernotes');
    $weight = $this->input->post('weight');
    $items = $this->input->post('items');
    $shippingcost = $this->input->post('shipping-cost');
    $sumcost = $this->input->post('sum-cost');
    $sumAll = (int)$sumcost + (int)$shippingcost;
    $insDt = array(
      'shopper_id'=>$shopperId, 'bank_id'=>$bank, 'order_name'=>$name, 'order_mail'=>$mail, 'order_phone'=>$tlp, 'order_province'=>$province, 'order_city'=>$city, 'order_address'=>$address, 'shipping_detail'=>$courier, 'order_notes'=>$ordernotes, 'order_weight'=>$weight, 'order_items'=>$items, 'shipping_cost'=>$shippingcost, 'order_cost'=>$sumcost, 'order_total'=>$sumAll, 'order_date'=>time(), 'order_status'=>0, 'updated_at'=>time()
    );
    $ins = $this->Model_Checkout->insertOrder($insDt);
    if($ins > 0) {
      $this->Model_Checkout->moveFrombasket($items);
      echo json_encode(array('status'=>TRUE));
    }
    else {
      echo json_encode(array('status'=>FALSE));
    }
  }
}
