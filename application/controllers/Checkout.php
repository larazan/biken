<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{

    function __construct()
	{
		parent::__construct();
    }

	public function index($enc)
	{
        $shopper_id = $this->session->userdata('userId');
        $third_bit = $this->uri->segment(3);
        if ($third_bit != '') {
            $session_id = $this->_check_and_get_session_id($third_bit);
        } else {
            $session_id = $this->session->session_id;    
        }

        if (!is_numeric($shopper_id)) {
            $shopper_id = 0;
        }
        $table = 'tbl_basket';
        $data['query'] = $this->_fetch_cart_contents($session_id, $shopper_id, $table);
        $data['checkout_token'] = $third_bit;
        $data['shopper_id'] = $shopper_id;
		$this->load->view('pages/checkout', $data);
    }

    function _encrypt_string($str) {
        $this->load->library('encryption');
        $encrypted_string = $this->encryption->encrypt($str);
        return $encrypted_string;
    }

    function _decrypt_string($str) {
        $this->load->library('encryption');
        $decrypted_string = $this->encryption->decrypt($str);
        return $decrypted_string;
    }

    function _get_session_id_from_token($checkout_token) {       
        //remove dodge characters
        $session_id = str_replace('-plus-', '+', $checkout_token);
        $session_id = str_replace('-fwrd-', '/', $session_id);
        $session_id = str_replace('-eqls-', '=', $session_id);

        $session_id = $this->_decrypt_string($session_id);
        return $session_id;
    }
    
    function _check_and_get_session_id($checkout_token) {
        $session_id = $this->_get_session_id_from_token($checkout_token);
        
        if ($session_id == '') {
            redirect(base_url());
        }

        $mysql_query = "SELECT * FROM tbl_basket WHERE session_id = $session_id";
        $this->db->where('session_id', $session_id);
        $query =  $this->db->get('tbl_basket');
        $num_rows = $query->num_rows();
        
        if ($num_rows < 1) {
            redirect(base_url());
        }

        return $session_id;
    }
    
    function _fetch_cart_contents($session_id, $shopper_id, $table) {
    
        $mysql_query = "
            SELECT $table.*,
                tbl_product.*,
                tbl_product.product_id AS prod_id,
                $table.id AS basket_id
            FROM $table LEFT JOIN tbl_product ON $table.item_id = tbl_product.product_id    
        ";

        if ($shopper_id > 0) {
            $where_condition = "WHERE $table.shopper_id=$shopper_id";
        } else {
            $where_condition = "WHERE $table.session_id='$session_id'";
        }

        $order_by = " ORDER BY $table.id DESC";

        $mysql_query.=$where_condition;
        $mysql_query.=$order_by;
        $query = $this->db->query($mysql_query);
        return $query;
    }
}
