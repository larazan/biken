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
    $name = $this->input->post('shipping-name');
    $mail = $this->input->post('email');
    $address = $this->input->post('address');
    $province = $this->input->post('province');
    $city = $this->input->post('city');
    $courier = $this->input->post('courier');
    $tlp = $this->input->post('tel');
    $bank = $this->input->post('bank');
    $ordernotes = $this->input->post('ordernotes');
  }
}
