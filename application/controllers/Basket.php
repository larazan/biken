<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Basket extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
    }

    function tes2() {
        $this->Mail->sendMailCheckout(2, 'Customer');
        
        // $order_id = 1;

        // $data['shop_name'] = $this->db->get_where('tbl_settings', array('type' => 'shop_name'))->row()->description;
        // $data['address'] = $this->db->get_where('tbl_settings', array('type' => 'address'))->row()->description;
        // $data['phone'] = $this->db->get_where('tbl_settings', array('type' => 'phone'))->row()->description;
        // $data['email'] = $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description;
        // $data['logo'] = $this->db->get_where('tbl_settings', array('type' => 'logo'))->row()->description;

        // $orders = $this->db->get_where('tbl_order', array('order_id' => $order_id))->row();
        
        // // get item
        // $items = explode(",", $orders->order_items);
        // $this->db->where_in('product_id', $items);
        // $products = $this->db->get('tbl_product');

        // $data['orders'] = $orders;
        // $data['products'] = $products;
        // $data['order_id'] = $order_id;

        // $from = $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description;
        // $email_customer = $from;
        // $subject = 'barang sudah diterima ';
        // $body = $this->load->view('mail/mailArrival', $data, true);

        // $config = Array(
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'ssl://smtp.gmail.com',
        //     'smtp_port' => 465,
        //     'smtp_user' => 'forheron@gmail.com',
        //     'smtp_pass' => 'labeneamata',
        //     'mailtype'  => 'html',
        //     'charset'   => 'utf-8',
        //     // 'smtp_crypto' => 'tls'
        // );
        // $this->load->library('email', $config);

        // $this->email->set_newline("\r\n");

        // $this->email->from('forheron@gmail.com', 'Sistem ');
        // $this->email->to('zamroni666@gmail.com');
        // $this->email->subject($subject);
        // $this->email->message($body);
        // // $this->email->bcc($from);
        // // $this->email->cc($from);

        // if ($this->email->send() == false) {
        //     show_error($this->email->print_debugger());
        // } else {
        //     return TRUE;
        // }
    }

    function tes() {
        // $sess = $this->session->session_id;
        // echo $sess;

        $user_id = 1;
        $shipping_code = '643545-54646-1290';
        
        $data['shop_name'] = $this->db->get_where('tbl_settings', array('type' => 'shop_name'))->row()->description;
        $data['address'] = $this->db->get_where('tbl_settings', array('type' => 'address'))->row()->description;
        $data['phone'] = $this->db->get_where('tbl_settings', array('type' => 'phone'))->row()->description;
        $data['email'] = $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description;
        $data['logo'] = $this->db->get_where('tbl_settings', array('type' => 'logo'))->row()->description;

        $this->db->where('customer_id', $user_id);
        $data['query'] = $this->db->get('tbl_customer');
        $data['user_id'] = $user_id;
        $data['shipping_code'] = $shipping_code;

        $from = $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description;
        $email_customer = App::getCustomer($user_id)->customer_email;
        $subject = 'thank for registration ';
        $body = $this->load->view('mail/mailShipping', $data, true);

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'forheron@gmail.com',
            'smtp_pass' => 'labeneamata',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            // 'smtp_crypto' => 'tls'
        );
        $this->load->library('email', $config);

        $this->email->set_newline("\r\n");

        $this->email->from('forheron@gmail.com', 'Sistem ');
        $this->email->to('zamroni666@gmail.com');
        $this->email->subject($subject);
        $this->email->message($body);
        // $this->email->bcc($from);
        // $this->email->cc($from);

        if ($this->email->send() == false) {
            show_error($this->email->print_debugger());
        } else {
            return TRUE;
        }
    }

    function arrivalConfirmation() {
        $data['shop_name'] = $this->db->get_where('tbl_settings', array('type' => 'shop_name'))->row()->description;
        $data['address'] = $this->db->get_where('tbl_settings', array('type' => 'address'))->row()->description;
        $data['phone'] = $this->db->get_where('tbl_settings', array('type' => 'phone'))->row()->description;
        $data['email'] = $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description;
        $data['logo'] = $this->db->get_where('tbl_settings', array('type' => 'logo'))->row()->description;

        $order_id = 2;

        $orders = $this->db->get_where('tbl_order', array('order_id' => $order_id))->row();
        
        // get item
        $items = explode(",", $orders->order_items);
        $this->db->where_in('product_id', $items);
        $products = $this->db->get('tbl_product');

        $data['orders'] = $orders;
        $data['products'] = $products;
        $data['order_id'] = $order_id;
        $this->load->view('mail/mailArrival', $data);
    }

    function index() {
        $this->load->view('detail');
    }

    public function num_exists($next_number) {
        $next_number = sprintf('%06d', $next_number);
        $records = $this->db->where('no_order', 'ORD'.$next_number)->get('store_orders')->num_rows();
        if ($records > 0) {
            return $this->num_exists($next_number + 1);
        } else {
            return $next_number;
        }
    }
    
    function generate_order_number() {
        $query = $this->db->query('SELECT no_order, id FROM tbl_orders WHERE id = (SELECT MAX(id))');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $ord_number = intval(substr($row->no_order, -4));
            $next_number = $ord_number + 1;
            if ($next_number < 1) {
                $next_number = 1;
            }
            $next_number = $this->num_exists($next_number);

            return sprintf('%06d', $next_number);
        } else {
            return sprintf('%06d', 1);
        }
    }

	function add_to_basket() {

        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Submit") {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('item_url', 'Item url', 'required');
            $this->form_validation->set_rules('item_colour', 'Item Colour', 'numeric');
            $this->form_validation->set_rules('item_size', 'Item Size', 'numeric');
            $this->form_validation->set_rules('item_qty', 'Item Qty', 'required|numeric');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->_fetch_the_data();
                // $data = $this->_avoid_cart_conflicts($data);
                $this->_insert($data);

                // insert data to store orders
                // $this->store_orders->_insert($data);
                // generate and update no_order
                // $basket_id = $this->store_orders->get_max();
                // $no_order = 'ORD'.$this->generate_order_number();
                // $data_order = array(
                //     'no_order' => $no_order,
                // );

                // $this->store_orders->_update($basket_id, $data_order);
                // $item = $this->input->post('item_id', TRUE);
              
                redirect('cart');
            } else {
                $refer_url = $_SERVER['HTTP_REFERER'];
                $error_msg = validation_errors("<p style='color:red;'>", "</p>");
                $this->session->flashdata('item', $error_msg);
                redirect($refer_url);
            }
        }
    }

    function _fetch_the_data() {
        $this->load->library('session');
        // get id from slug
        $item_url = $this->input->post('item_url', TRUE);
        $item_id = $this->db->get_where('tbl_product', array('product_url' => $item_url))->row()->product_id;
       
        
        $item_data = $this->fetch_data_from_db($item_id);
        $item_price = ($this->input->post('price', TRUE)) ? ($this->input->post('price', TRUE)) : $item_data['product_price'];
        $item_qty = $this->input->post('item_qty', TRUE);
        $item_size = $this->input->post('item_size', TRUE);
        $item_colour = $this->input->post('item_colour', TRUE);
        $shopper_id = $this->session->userdata('userId'); //$this->site_security->_get_user_id();

        if (!is_numeric($shopper_id)) {
            $shopper_id = 0;
        }

        $data['session_id'] = $this->session->session_id;
        $data['item_title'] = $item_data['product_title'];
        $data['price'] = $item_price*$item_qty;
        $data['item_id'] = $item_id;
        $data['item_size'] = $this->_get_value('size', $item_size);
        $data['item_qty'] = $item_qty;  
        $data['item_colour'] = $this->_get_value('colour', $item_colour);
        $data['date_added'] = time(); 
        $data['shopper_id'] = $shopper_id;       
        $data['basket_tag'] = $this->generate_random_string(29);
        $data['ip_address'] = $this->input->ip_address();
        return $data;
    }

    function remove() {
        $update_id = $this->uri->segment(3);
        // get id from basket tag
        $id = $this->db->get_where('tbl_basket', array('basket_tag' => $update_id))->row()->id;
        $allowed = $this->_make_sure_remove_allowed($id);
        if ($allowed == FALSE) {
            redirect('cart');
        }

        $this->_delete($id);
        redirect('cart');
    }

    function _make_sure_remove_allowed($update_id) {
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $session_id = $row->session_id;
            $shopper_id = $row->shopper_id;
        }

        if (!isset($shopper_id)) {
            return FALSE;
        }

        $customer_session_id = $this->session->session_id;
        $customer_shopper_id = $this->session->userdata('userId'); //$this->site_security->_get_user_id();

        if (($session_id == $customer_session_id) OR ($shopper_id == $customer_shopper_id)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function fetch_data_from_db($updated_id)
	{
		$mysql_query = "SELECT * FROM tbl_product WHERE product_id = $updated_id";
        $query = $this->_custom_query($mysql_query);
		foreach ($query->result() as $row) {
			$data['product_id'] = $row->product_id;
			$data['product_title'] = $row->product_title;
			$data['sku'] = $row->sku;
			$data['product_description'] = $row->product_description;
			$data['product_image'] = $row->product_image;
			$data['product_price'] = $row->product_price;
			$data['product_weight'] = $row->product_weight;
			$data['product_quantity'] = $row->product_quantity;
			$data['product_category'] = $row->product_category;
			$data['product_brand'] = $row->product_brand;
			$data['product_view'] = $row->product_view;
			$data['product_url'] = $row->product_url;
			$data['product_status'] = $row->product_status;
			$data['created_at'] = $row->created_at;
			$data['updated_at'] = $row->updated_at;
		}

		if (!isset($data)) {
			$data = "";
		}

		return $data;
	}

    function _get_value($value_type, $update_id) {
        if($value_type == 'size') {
            $mysql_query = "SELECT * FROM tbl_size WHERE size_id = $update_id";
            $query = $this->_custom_query($mysql_query);
            foreach ($query->result() as $row) {
                $item_size = $row->name;
            }
            if (!isset($item_size)) {
                $item_size = '';
            }
            $value = $item_size;
        } else {
            $mysql_query = "SELECT * FROM tbl_color WHERE color_id = $update_id";
            $query = $this->_custom_query($mysql_query);
            foreach ($query->result() as $row) {
                $item_colour = $row->name;
            }
            if (!isset($item_colour)) {
                $item_colour = '';
            }
            $value = $item_colour;
        }
        return $value;
    }

    function generate_random_string($length)
    {
        $characters = '23456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
	
	function get($order_by)
	{
		$this->load->model('Mdl_basket');
		$query = $this->Mdl_basket->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by)
	{
		if ((!is_numeric($limit)) || (!is_numeric($offset))) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_basket');
		$query = $this->Mdl_basket->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_basket');
		$query = $this->Mdl_basket->get_where($id);
		return $query;
	}

	// function get_data_where($key) {
	//     $this->load->model('Mdl_basket');
	//     $query = $this->Mdl_basket->get_data_where($key);
	//     return $query;
	// }

	function get_where_custom($col, $value)
	{
		$this->load->model('Mdl_basket');
		$query = $this->Mdl_basket->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data)
	{
		$this->load->model('Mdl_basket');
		$this->Mdl_basket->_insert($data);
	}

	function _update($id, $data)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_basket');
		$this->Mdl_basket->_update($id, $data);
	}

	function _delete($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_basket');
		$this->Mdl_basket->_delete($id);
	}

	function count_where($column, $value)
	{
		$this->load->model('Mdl_basket');
		$count = $this->Mdl_basket->count_where($column, $value);
		return $count;
	}

	function get_max()
	{
		$this->load->model('Mdl_basket');
		$max_id = $this->Mdl_basket->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query)
	{
		$this->load->model('Mdl_basket');
		$query = $this->Mdl_basket->_custom_query($mysql_query);
		return $query;
	}

	function count_all()
	{
		$this->load->model('Mdl_basket');
		$count = $this->Mdl_basket->_count_all();
		return $count;
	}
}
