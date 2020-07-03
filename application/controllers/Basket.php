<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Basket extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
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
            
            $this->form_validation->set_rules('item_id', 'Item ID', 'required|numeric');
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
        $item_id = $this->input->post('item_id', TRUE);
        
        $item_data = $this->fetch_data_from_db($item_id);
        $item_price = ($this->input->post('price', TRUE)) ? ($this->input->post('price', TRUE)) : $item_data['product_price'];
        $item_qty = $this->input->post('item_qty', TRUE);
        $item_size = $this->input->post('item_size', TRUE);
        $item_colour = $this->input->post('item_colour', TRUE);
        $shopper_id = ''; //$this->site_security->_get_user_id();

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
        $data['ip_address'] = $this->input->ip_address();
        return $data;
    }

    function remove() {
        $update_id = $this->uri->segment(3);
        $allowed = $this->_make_sure_remove_allowed($update_id);
        if ($allowed == FALSE) {
            redirect('cart');
        }

        $this->_delete($update_id);
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
        $this->load->module('site_security');
        $customer_shopper_id = $this->site_security->_get_user_id();

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
