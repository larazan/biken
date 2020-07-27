<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  class Model_Checkout extends CI_Model {
    function __construct() {
      parent::__construct();
      $this->load->library(array('encryption'));
    }

    function getBillingInfo($shopperId) {
      $getData = $this->db->get_where('tbl_customer', array('customer_id'=>$shopperId, 'customer_status'=>1))->row();
      return $getData;
    }

    function getBankList() {
      $getData = $this->db->get_where('tbl_bank', array('status'=>1))->result();
      return $getData;
    }

    function getCheckoutItems($shopperId) {
      $getData = $this->db->join('tbl_product', 'tbl_product.product_id = tbl_basket.item_id')->get_where('tbl_basket', array('tbl_basket.shopper_id'=>$shopperId, 'tbl_basket.basket_status'=>1))->result();
      return $getData;
    }

    function getSumCheckout($shopperId) {
      $getData = $this->db->select('sum(tbl_product.product_price*tbl_basket.item_qty) as sum')->join('tbl_product', 'tbl_product.product_id = tbl_basket.item_id')->get_where('tbl_basket', array('tbl_basket.shopper_id'=>$shopperId, 'tbl_basket.basket_status'=>1))->row();
      $sum = $getData->sum;
      return $sum;
    }

    function penyebut($nilai) {
      $nilai = abs($nilai);
      $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
      $temp = "";
      if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
      } else if ($nilai <20) {
        $temp = ($nilai - 10). " belas";
      } else if ($nilai < 100) {
        $temp = ($nilai/10)." puluh";
      } else if ($nilai < 200) {
        $temp = " seratus";
      } else if ($nilai < 1000) {
        $temp = ($nilai/100) . " ratus";
      } else if ($nilai < 2000) {
        $temp = " seribu";
      } else if ($nilai < 1000000) {
        $temp = ($nilai/1000) . " ribu";
      } else if ($nilai < 1000000000) {
        $temp = ($nilai/1000000) . " juta";
      } else if ($nilai < 1000000000000) {
        $temp = ($nilai/1000000000) . " milyar";
      } else if ($nilai < 1000000000000000) {
        $temp = ($nilai/1000000000000) . " trilyun";
      }     
      return $temp;
    }
   
    function terbilang($nilai) {
      if($nilai<0) {
        $hasil = "minus ". trim($this->penyebut($nilai));
      } else {
        $hasil = trim($this->penyebut($nilai));
      }     		
      return $hasil;
    }

    function checkoutToken() {
      $encrypted_string = $this->encryption->encrypt($this->session->session_id);
      //remove dodge characters
      $checkout_token = str_replace('+', '-plus-', $encrypted_string);
      $checkout_token = str_replace('/', '-fwrd-', $checkout_token);
      $checkout_token = str_replace('=', '-eqls-', $checkout_token);
      return $checkout_token;
    }
  }
