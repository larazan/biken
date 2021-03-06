<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  class Model_Basket extends CI_Model {
    function __construct() {
      parent::__construct();
      $this->load->library(array('encryption'));
    }

    function insertBasket($data) {
      $this->db->insert('tbl_basket', $data);
    }

    function deleteBasket($ids) {
      $this->db->delete('tbl_basket', array('id'=>$ids));
    }

    function updateBasketQty($ids, $data) {
      $this->db->update('tbl_basket', $data, array('id'=>$ids));
    }

    function cartItemsCount($shopperId) {
      $count = $this->db->where(array('shopper_id'=>$shopperId, 'basket_status'=>1))->from('tbl_basket')->count_all_results();
      return $count;
    }

    function getCartDropList($shopperId) {
      $all = $this->db->join('tbl_product', 'tbl_product.product_id = tbl_basket.item_id')->where(array('tbl_basket.shopper_id'=>$shopperId, 'tbl_basket.basket_status'=>1))->from('tbl_basket')->order_by('tbl_basket.id', 'DESC')->get()->result();
      $list = $this->createCartDropList($all);
      return $list;
    }

    function getCartList($shopperId) {
      $all = $this->db->join('tbl_product', 'tbl_product.product_id = tbl_basket.item_id')->where(array('tbl_basket.shopper_id'=>$shopperId, 'tbl_basket.basket_status'=>1))->from('tbl_basket')->order_by('tbl_basket.id', 'DESC')->get()->result();
      $list = $this->createCartList($all);
      return $list;
    }

    function getSubTotalCartList($shopperId) {
      $sumPrice = $this->db->select('sum(tbl_product.product_price*tbl_basket.item_qty) as sum')->join('tbl_product', 'tbl_product.product_id = tbl_basket.item_id')->where('tbl_basket.shopper_id', $shopperId)->where('tbl_basket.basket_status', 1)->get('tbl_basket')->row();
      return ($sumPrice->sum > 0)?$this->terbilang($sumPrice->sum):0;
    }

    function getSubTotalMainCartList($shopperId) {
      $sumPrice = $this->db->select('sum(tbl_product.product_price*tbl_basket.item_qty) as sum')->join('tbl_product', 'tbl_product.product_id = tbl_basket.item_id')->where('tbl_basket.shopper_id', $shopperId)->where('tbl_basket.basket_status', 1)->get('tbl_basket')->row();
      return ($sumPrice->sum > 0)?number_format($sumPrice->sum):0;
    }

    function createCartDropList($data) {
      $cartList = '';
      if(count($data) > 0) {
        foreach ($data as $dt) {
          $cartList .= '<div class="product-widget">';
          $cartList .= '<div class="product-img">';
          $cartList .= '<img src="'.base_url().'admin/assets/product/'.$dt->product_image.'" alt="">';
          $cartList .= '</div>';
          $cartList .= '<div class="product-body">';
          $cartList .= '<h3 class="product-name"><a href="'.base_url().'electros/'.$dt->product_url.'.'.$dt->product_id.'">'.$dt->product_title.'</a></h3>';
          $cartList .= '<h4 class="product-price"><span class="qty">'.$dt->item_qty.'x</span>Rp'.$this->terbilang($dt->product_price).'</h4>';
          $cartList .= '</div>';
          $cartList .= '<button class="delete delete-cart-list-btn" type="button" data-itemid="'.$dt->id.'"><i class="fa fa-close"></i></button>';
          $cartList .= '</div>';
        }
      }
      else {
        $cartList = '<h4>Cart Empty</h4>';
      }
      return $cartList;
    }

    function createCartList($data) {
      $cartList = '';
      if(count($data) > 0) {
        foreach ($data as $dt) {
          if (strlen($dt->product_description) >= 100) {
            $shortDesc = substr($dt->product_description, 0, 100). " ... " . substr($dt->product_description, -5);
          }
          else {
            $shortDesc = $dt->product_description;
          }
          $picked = ($dt->picked_status == 1)?'<button class="btn btn-success btn-sm picked-change" data-basketid="'.$dt->id.'" data-status="0"><i class="fa fa-check"></i></button>':'<button class="btn btn-default btn-sm picked-change" data-basketid="'.$dt->id.'" data-status="1"><i class="fa fa-minus"></i></button>';
          $cartList .= '<tr>';
					$cartList .= '<td data-th="Product">';
					$cartList .= '<div class="row">';
          $cartList .= '<div class="col-sm-2 hidden-xs"><img src="'.base_url().'admin/assets/product/'.$dt->product_image.'" alt="..." class="img-responsive"/></div>';
          $cartList .= '<div class="col-sm-10">';
					$cartList .= '<h4 class="nomargin">'.$dt->product_title.'</h4>';
					$cartList .= '<p>'.$shortDesc.'</p>';
					$cartList .= '</div>';
					$cartList .= '</div>';
					$cartList .= '</td>';
					$cartList .= '<td data-th="Quantity">';
					$cartList .= '<input type="number" class="form-control text-center cart-qty" data-basketid="'.$dt->id.'" value="'.$dt->item_qty.'">';
          $cartList .= '</td>';
          $cartList .= '<td data-th="Price">Rp'.number_format($dt->product_price).'</td>';
					$cartList .= '<td data-th="Subtotal" class="text-center">Rp'.number_format($dt->item_qty*$dt->product_price).'</td>';
					$cartList .= '<td class="actions" data-th="">';
					$cartList .= $picked;
					$cartList .= '<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>';
					$cartList .= '</td>';
					$cartList .= '</tr>';
          // $cartList .= '<tr>';
          // $cartList .= '<td class="col-md-3">';
          // $cartList .= '<div class="media">';
          // $cartList .= '<a class="thumbnail pull-left" href="'.base_url().'electros/'.$dt->product_url.'.'.$dt->product_id.'"> <img class="media-object" src="'.base_url().'admin/assets/product/'.$dt->product_image.'" style="width: 25%; height: auto;"></a>';
          // $cartList .= '<div class="media-body">';
          // $cartList .= '<h4 class="media-heading"><a href="'.base_url().'electros/'.$dt->product_url.'.'.$dt->product_id.'">'.$dt->product_title.'</a></h4>';
          // $cartList .= '</div>';
          // $cartList .= '</div>';
          // $cartList .= '</td>';
          // $cartList .= '<td class="col-md-1" style="text-align: center">';
          // $cartList .= '<input type="number" class="form-control cart-qty" data-basketid="'.$dt->id.'" value="'.$dt->item_qty.'">';
          // $cartList .= '</td>';
          // $cartList .= '<td class="col-md-2 text-center"><strong>Rp'.number_format($dt->product_price).'</strong></td>';
          // $cartList .= '<td class="col-md-2 text-center"><strong>Rp'.number_format($dt->item_qty*$dt->product_price).'</strong></td>';
          // $cartList .= '<td class="col-md-1"><button type="button" class="btn btn-danger delete-cart-list-btn" data-itemid="'.$dt->id.'"><i class="fa fa-close"></i> Remove</button></td>';
          // $cartList .= '</tr>';
        }
      }
      else {
        $cartList = '<tr><td colspan="5"><h3>Cart Empty</h3></td></tr>';
      }
      return $cartList;
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
