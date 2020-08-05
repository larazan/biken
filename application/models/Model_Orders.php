<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  class Model_Orders extends CI_Model {
    function __construct() {
      parent::__construct();
      $this->load->library(array('encryption'));
    }

    function getOrderList($ids) {
      $getAll = $this->db->get_where('tbl_order', array('shopper_id'=>$ids))->result();
      return $getAll;
    }

    function createOrderList($shopperId) {
      $all = $this->getOrderList($shopperId);
      $views = '';
      foreach ($all as $dt) {
        $items = explode(',', $dt->order_items);
        if(count($items) >0) {
          $itemsView = '';
          foreach ($items as $it) {
            $getItemId = $this->db->get_where('tbl_basket', array('id'=>$it))->row()->item_id;
            $itemDt = $this->db->get_where('tbl_product', array('product_id'=>$getItemId))->row();
            $itemsView .= '<div style="display: inline-block;"><img src="'.base_url().'admin/assets/product/'.$itemDt->product_image.'" style="display: inline-block;" width="10%">'.$itemDt->product_title.'</div><br>';
          }
        }
        $views .= '<tr>';
        $views .= '<td>'.$itemsView.'</td>';
        $views .= '<td>'.$this->getOrderStatus($dt->order_status).'<br>'.$dt->order_shipping.' : '.$dt->order_awb.'</td>';
        $views .= '<td>'.$this->getOrderAction($dt->order_status, $dt->order_id).'</td>';
        $views .= '</tr>';
      }
      return $views;
    }

    function getOrderStatus($sts) {
      $status = '';
      switch ($sts) {
        case '0':
          $status = 'Menunggu Pembayaran';
          break;
        case '1':
          $status = 'Dikemas';
          break;
        case '2':
          $status = 'Dikirim';
          break;
        case '3':
          $status = 'Diterima';
          break;
        case '4':
          $status = 'Dibatalkan';
          break;
        default:
          $status = 'Ada kesalahan!!!';
          break;
      }
      return $status;
    }

    function getOrderAction($sts, $ids) {
      $status = '';
      switch ($sts) {
        case '0':
          $status = '<button type="button" class="btn btn-sm btn-default btn-upload-bukti" data-ids="'.$ids.'">Upload Bukti Bayar</button>';
          break;
        case '1':
          $status = '<button type="button" class="btn btn-sm btn-info">Dikemas</button>';
          break;
        case '2':
          $status = '<button type="button" class="btn btn-sm btn-success btn-konfirmasi-diterima">Konfirmasi Terima Barang</button>';
          break;
        case '3':
          $status = '<button type="button" class="btn btn-sm btn-success">Barang Diterima</button>';
          break;
        case '4':
          $status = '<button type="button" class="btn btn-sm btn-danger">Dibatalkan</button>';
          break;
        default:
          $status = 'Ada kesalahan!!!';
          break;
      }
      return $status;
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

    function checkoutToken($token) {
      $encrypted_string = $this->encryption->encrypt($token);
      //remove dodge characters
      $checkout_token = str_replace('+', '-plus-', $encrypted_string);
      $checkout_token = str_replace('/', '-fwrd-', $checkout_token);
      $checkout_token = str_replace('=', '-eqls-', $checkout_token);
      return $checkout_token;
    }

    function decryptToken($token) {
      //remove dodge characters
      $session_id = str_replace('-plus-', '+', $token);
      $session_id = str_replace('-fwrd-', '/', $session_id);
      $session_id = str_replace('-eqls-', '=', $session_id);

      $token = $this->encryption->decrypt($session_id);
      return $token;
    }
  }
