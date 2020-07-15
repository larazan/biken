<?php

class Cart extends CI_Controller 
{

    function __construct() {
        parent::__construct();
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

    function test2() {
        $str = "hello blue sky";

        $third_bit = $this->uri->segment(3);
        if ($third_bit != '') {
            $encrypted_string = $third_bit;
        } else {
            $encrypted_string = $this->_encrypt_string($str);
        }

        $decrypted_string = $this->_decrypt_string($encrypted_string);

        echo "string is $str<hr>";
        echo "encrypted string is $encrypted_string<hr>";
        echo "decrypted string is $decrypted_string<hr>";

        //create new encrypt
        $new_encrypted_string = $this->_encrypt_string($str);
        echo anchor('cart/test2/'.$new_encrypted_string, 'refresh');
    }

    function test() {
        $this->load->module('timedate');
        $newlyDate = '27/03/2018';
        $newDate = str_replace('/', '-', $newlyDate);
        $date = '2012-03-27';
        $time = strtotime($newDate);
        $result = $this->timedate->get_nice_date($time, 'indo');
        echo $result; 
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

    function _create_checkout_token($session_id) {
        $encrypted_string = $this->_encrypt_string($session_id);
        //remove dodge characters
        $checkout_token = str_replace('+', '-plus-', $encrypted_string);
        $checkout_token = str_replace('/', '-fwrd-', $checkout_token);
        $checkout_token = str_replace('=', '-eqls-', $checkout_token);
        return $checkout_token;
    }

    function _get_session_id_from_token($checkout_token) {       
        //remove dodge characters
        $session_id = str_replace('-plus-', '+', $checkout_token);
        $session_id = str_replace('-fwrd-', '/', $session_id);
        $session_id = str_replace('-eqls-', '=', $session_id);

        $session_id = $this->_decrypt_string($session_id);
        return $session_id;
    }

    function _generate_guest_account($checkout_token) {
        $this->load->module('site_security');
        $this->load->module('store_accounts');
        $customer_session_id = $this->_get_session_id_from_token($checkout_token);

        //create guest account
        $ref = $this->site_security->generate_random_string(4);
        $data['username'] = 'Guest'.$ref;
        $data['firstname'] = 'Guest';
        $data['lastname'] = 'Account';
        $data['date_made'] = time();
        $data['pword'] = $checkout_token;
        $this->store_accounts->_insert($data);

        //get the new account ID
        $new_account_id = $this->store_accounts->get_max();

        //update the existing store_basket table
        $mysql_query = "update store_basket set shopper_id=$new_account_id where session_id='$customer_session_id'";

        $query = $this->store_accounts->_custom_query($mysql_query);
    }

    function submit_choice() {
        $submit = $this->input->post('submit', TRUE);
        if ($submit == "No") {

            $checkout_token = $this->input->post('checkout_token', TRUE);
            $this->_generate_guest_account($checkout_token);
            redirect('cart/index'.$checkout_token);

        } elseif ($submit == "Yes") {
            redirect('youraccount/start');
        }
    }

    function go_to_checkout() {

        $shopper_id = $this->session->userdata('userId'); //$this->site_security->_get_user_id();

        if (!is_numeric($shopper_id)) {
            redirect('account');
        }

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
        $data['num_rows'] = $data['query']->num_rows();
        $data['showing_statement'] = $this->_get_showing_statement($data['num_rows']);

        $data['checkout_token'] = $this->uri->segment(3);
        $data['flash'] = $this->session->flashdata('item');
        redirect('checkout/'.$third_bit);
        // $this->load->view('pages/checkout', $data);
    }

    function _attempt_draw_checkout_btn($query) {
        $data['query'] = $query;
        $this->load->module('site_security');
        $shopper_id = $this->site_security->_get_user_id();
        $third_bit = $this->uri->segment(3);

        if ((!is_numeric($shopper_id)) AND ($third_bit == '')) {
            $this->_draw_checkout_btn_fake($query);
        } else {
            $this->_draw_checkout_btn_real($query);
        }
    }

    function _draw_checkout_btn_fake($query) {
        foreach ($query->result() as $row) {
            $session_id = $row->session_id;
        }

        $data['checkout_token'] = $this->_create_checkout_token($session_id);
        $this->load->view('checkout_btn_fake', $data);
    }

    function _draw_checkout_btn_real($query) {
        // $this->load->module('paypal');
        // $this->paypal->_draw_checkout_btn($query);

        foreach ($query->result() as $row) {
            $session_id = $row->session_id;
        }

        $data['checkout_token'] = $this->_create_checkout_token($session_id);
        $this->load->view('checkout_btn_fake', $data);
    }

    function index() {
        $this->load->library('session');
        $data['flash'] = $this->session->flashdata('item');

        $third_bit = $this->uri->segment(3);
        if ($third_bit != '') {
            $session_id = $this->_check_and_get_session_id($third_bit);
        } else {
            $session_id = $this->session->session_id;    
        }

        $shopper_id = $this->session->userdata('userId');

        if (!is_numeric($shopper_id)) {
            $shopper_id = 0;
        }

        $data['checkout_token'] = $this->_create_checkout_token($session_id);

        $table = 'tbl_basket';
        $data['query'] = $this->_fetch_cart_contents($session_id, $shopper_id, $table);
        $data['num_rows'] = $data['query']->num_rows();
        $data['showing_statement'] = $this->_get_showing_statement($data['num_rows']);
        $this->load->view('cart', $data);
    }

    function get_amount_product() {
        
    }

    function _get_showing_statement($num_items) {
        if ($num_items == 1) {
            $showing_statement = "Anda memiliki satu item di keranjang pemesanan";
        } else {
            $showing_statement = "Anda memilik ".$num_items." item di keranjang pemesanan";
        }
        return $showing_statement;
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

    function _draw_add_to_cart($item_id) {
        if (!is_numeric($item_id)) {
            redirect('site_security/not_allowed');
        }

        // fetch the colour options 
        $submitted_colour = $this->input->post('submitted_colour', TRUE);
        if ($submitted_colour == '') {
            $colour_options[''] = "Select...";
        }


        
        $data['item_id'] = $item_id;
        $this->load->view($view_file, $data);
    }

    public function getCarrier() {
		$this->db->where('status', 1);
    	$this->db->order_by('kurir_id');
		$query=$this->db->get('tbl_kurir');
		return $query;
	}

    function checkout($token) {
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

        $kurirList = $this->db->get_where('tbl_settings', array('type' => 'kurir'))->row()->description;
		if($kurirList != '') {
			$carriers = unserialize($kurirList);
		} else {
			$carriers = [];
		}
		$data['carrierList'] = $carriers;
        $data['carrier'] = $this->getCarrier();
        
        $table = 'tbl_basket';
        $data['query'] = $this->_fetch_cart_contents($session_id, $shopper_id, $table);
        $data['checkout_token'] = $token;
        $data['kota'] = $this->db->get_where('tbl_location', array('id_location' => 1))->row()->kabupaten;
        $data['shopper_id'] = $shopper_id;
		$this->load->view('pages/checkout', $data);
    }

    function process_checkout() {
        // get id user
        $shopper_id = $this->session->userdata('userId');
        $submit = $this->input->post('submit', TRUE);

        // check token
        $token = $this->input->post('checkout_token');
        $session_id = $this->_check_and_get_session_id($token);
        $customer_sess = $this->db->get_where('tbl_customer' , array('customer_id'=>$shopper_id))->row()->customer_sess;

        // input shipping address data
        if ($submit == 'Submit') {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('item_id', 'Item ID', 'required|numeric');
            $this->form_validation->set_rules('item_colour', 'Item Colour', 'numeric');
            $this->form_validation->set_rules('item_size', 'Item Size', 'numeric');
            $this->form_validation->set_rules('item_qty', 'Item Qty', 'required|numeric');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->_fetch_the_data();
                $data['shopper_id'] = $shopper_id;
                $data['courrier'] = $this->input->post('layanan', TRUE);

                // store shipping data to tbl_shipping
                if ($session_id == $customer_sess) {
                    $this->db->insert('tbl_shipping', $data);
                }
                
            }
            
        }
        
        // calculate total plus ongkir
        
              
        // store data to tbl_order

        
        // store data to tbl_shoppertrack
        $mysql_query = "SELECT * FROM tbl_basket WHERE session_id = $session_id";
        $query = $this->db->query($mysql_query);
        foreach ($query->result() as $row) {
            $data['session_id'] = $row->session_id;
            $data['item_title'] = $row->item_title;
            $data['price'] = $row->price;
            $data['tax'] = $row->tax;
            $data['item_id'] = $row->item_id;
            $data['item_size'] = $row->item_size;
            $data['item_qty'] = $row->item_qty;
            $data['item_colour'] = $row->item_colour;
            $data['date_added'] = $row->date_added;
            $data['shopper_id'] = $row->shopper_id;
            $data['ip_address'] = $row->ip_address;

            $this->db->insert('tbl_shoppertrack', $data);
        }
          // delete data from tbl_basket
        $mysql_query = "delete from store_basket where session_id='$session_id'";
        $query = $this->db->query($mysql_query);

        
        // send email to customer

        $table = 'tbl_shoppertrack';
        $data['query'] = $this->_fetch_cart_contents($session_id, $shopper_id, $table);
        $this->load->view('pages/invoice', $data);
    }

    function _fetch_the_data() {
        $data['firstname'] = $this->input->post('firstname', TRUE);
        $data['lastname'] = $this->input->post('lastname', TRUE);
        $data['phone'] = $this->input->post('phone', TRUE);
        $data['email'] = $this->input->post('email', TRUE);
        $data['province'] = $this->input->post('province', TRUE);
        $data['city'] = $this->input->post('city', TRUE);  
        $data['zipcode'] = $this->input->post('zipcode', TRUE);
        $data['address'] = $this->input->post('address', TRUE); 
        $data['created_at'] = time(); 
        $data['shopper_id'] = $shopper_id;       
        return $data;
    }

}