<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Order extends BaseController
{

	function __construct()
	{
		parent::__construct();
		$this->isLoggedIn();
	}

	// 1594159200
	// 1594245600

	
	public function getCarrier() {
		$this->db->where('status', 1);
    	$this->db->order_by('kurir_id');
		$query=$this->db->get('tbl_kurir');
		return $query;
	}

	function getDatetimeNow($ket = 'today') {
		$tz_object = new DateTimeZone('Asia/Jakarta');
		$datetime = new DateTime();
		$datetime->setTimezone($tz_object);
		$now = strtotime($datetime->format('m-d-Y 00:00:00'));
		$oneDay = 86400;
		if($ket == 'today') {
			$result = $now; 
		} else {
			$result = $now + $oneDay; 
		}
		return $result;
	}

	public function today() {
		$today = $this->getDatetimeNow('today');
		$midnight = $this->getDatetimeNow('midnight');
		// $mysql_query = "SELECT * FROM tbl_order WHERE order_date = ";
		$this->db->select('*');
		$this->db->from('tbl_order');
		$this->db->where('order_date >', $today);
		$this->db->where('order_date <', $midnight);
		$query = $this->db->get();

		// foreach($query->result() as $res){
		// 	$res = $res;
		// }
		// echo "<pre>";
		// var_dump($res);

		$data['query'] = $query;
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('order/today', $data);
	}

	public function unpaid() {
		$status = 0;
		$this->db->select('*');
		$this->db->from('tbl_order');
		$this->db->where('order_status', $status);
		$query = $this->db->get();

		$data['query'] = $query;
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('order/unpaid', $data);
	}

	public function arrive() {
		$status = 3;
		$this->db->select('*');
		$this->db->from('tbl_order');
		$this->db->where('order_status', $status);
		$query = $this->db->get();

		$data['query'] = $query;
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('order/pending', $data);
	}

	public function process() {
		$status = 1;
		$this->db->select('*');
		$this->db->from('tbl_order');
		$this->db->where('order_status', $status);
		$query = $this->db->get();

		$data['query'] = $query;
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('order/process', $data);
	}

	public function send() {
		$status = 2;
		$this->db->select('*');
		$this->db->from('tbl_order');
		$this->db->where('order_status', $status);
		$query = $this->db->get();

		$data['query'] = $query;
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('order/send', $data);
	}

	public function getCustomer($cus_id) {
		$name = $this->db->get_where('tbl_customer', array('customer_id' => $cus_id))->row()->customer_name;
		return $name;
	}

	public function getBankName($bank_id) {
		$name = $this->db->get_where('tbl_bank', array('id' => $bank_id))->row()->title;
		return $name;
	}

	function getStatus($status) {
		// 0 => 'Unpaid / Belum dibayar'
		// 1 => 'Process / Dikemas'
		// 2 => 'Send / Konfirmasi Terima Barang'
		// 3 => 'Arrive / Barang Sampai'
		// 4 => 'Cancel / Dibatalkan'
		// default => 'Error' 

		switch ($status) {
			case 0:
				$status_label = "badge-danger";
				$result = 'Belum dibayar';
				break;
			
			case 1:
				$status_label = "badge-warning";
				$result = 'Barang Dikemas';
				break;

			case 2:
				$status_label = "badge-info";
				$result = 'Barang Dikirim';
				break;

			case 3:
				$status_label = "badge-success";
				$result = 'Barang Sampai';
				break;

			case 4:
				$status_label = "badge-danger";
				$result = 'Dibatalkan';
				break;

			default:
				$status_label = "badge-danger";
				$result = 'Error';
				break;
		}

		return '<span class="badge ' . $status_label . ' badge--wide">' . $result . '</span>';
	}

	function getProduct($order_items) {
		$items = explode(",", $order_items);
		
		$this->db->where_in('product_id', $items);
		$query = $this->db->get('tbl_product');

		return $query;
	}

	public function index()
	{
		$this->template->views('order/manage');
	}

	public function manage()
	{
		$mysql_query = "SELECT * FROM tbl_order ORDER BY order_id DESC";
        $data['query'] = $this->_custom_query($mysql_query);
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('order/manage', $data);
	}

	public function create()
	{
		$this->load->library('session');

		$update_id = $this->uri->segment(3);
		$submit = $this->input->post('submit');

		if ($submit == "Cancel") {
			redirect('order/manage');
		}

		if ($submit == "Submit") {
			// process the form
			$this->load->library('form_validation');
			$this->form_validation->set_rules('order_status', 'Order Status', 'trim|required');
			
			if ($this->form_validation->run() == TRUE) {
				$data = $this->fetch_data_from_post();

				if (is_numeric($update_id)) {
                    $data['updated_at'] = time();
					$this->_update($update_id, $data);
					$flash_msg = "The order were successfully updated.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					redirect('order/create/' . $update_id);
				} else {
					$this->_insert($data);
					$update_id = $this->get_max();

					$flash_msg = "The order was successfully added.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					redirect('order/create/' . $update_id);
				}
			}
		}

		if ((is_numeric($update_id)) && ($submit != "Submit")) {
			$data = $this->fetch_data_from_db($update_id);
			$data['customer_name'] = $this->getCustomer($data['shopper_id']);
			$data['bank_name'] = $this->getBankName($data['bank_id']);
		} else {
			$data = $this->fetch_data_from_post();
		}

		if (!is_numeric($update_id)) {
			$data['headline'] = "Tambah Order";
		} else {
			$data['headline'] = "Edit Order";
		}


		$data['update_id'] = $update_id;
		$data['flash'] = $this->session->flashdata('item');

		$this->template->views('Order/create', $data);
	}

	function delete()
	{	
		$this->load->library('session');
		$update_id = $this->input->post('id');

		$submit = $this->input->post('submit', TRUE);
		if ($submit == "Delete") {
			// delete the item record from db
			$this->_delete($update_id);

			$flash_msg = "The Order were successfully deleted.";
			$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
			$this->session->set_flashdata('item', $value);

			redirect('Order/manage');
		}
	}

	function detail() {
		$this->load->library('session');

		$update_id = $this->uri->segment(3);
		$submit = $this->input->post('submit');

		if ($submit == "Cancel") {
			redirect('order/manage');
		}

		if ($submit == "Submit") {
			// process the form
			$this->load->library('form_validation');
			$this->form_validation->set_rules('order_awb', 'No Resi', 'trim|required');
			
			if ($this->form_validation->run() == TRUE) {
				$data = $this->fetch_data_from_post();

				if (is_numeric($update_id)) {
                    $data['updated_at'] = time();
					$this->_update($update_id, $data);
					$flash_msg = "The order were successfully updated.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					redirect('order/detail/' . $update_id);
				} 
			}
		}

		if ((is_numeric($update_id)) && ($submit != "Submit")) {
			$data = $this->fetch_data_from_db($update_id);
			$data['customer_name'] = $this->getCustomer($data['shopper_id']);
			$data['bank_name'] = $this->getBankName($data['bank_id']);
			$data['status_name'] = $this->getStatus($data['order_status']);
			$data['products'] = $this->getProduct($data['order_items']);
			$data['shopper_id'] = $data['shopper_id'];
		} else {
			$data = $this->fetch_data_from_post();
		}

		
		$data['headline'] = "Detail Order";
		$data['carrier'] = $this->getCarrier();
		$data['update_id'] = $update_id;
		$data['flash'] = $this->session->flashdata('item');

		$this->template->views('order/detail', $data);
	}

	function shipping_alternative() {
		$this->load->library('session');

		$update_id = $this->input->post('order_id');
		$submit = $this->input->post('submit');

		if ($submit == "Cancel") {
			redirect('order/manage');
		}

		if ($submit == "Submit") {
			// process the form
			$this->load->library('form_validation');
			$this->form_validation->set_rules('order_shipping', 'Shipping', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				// update order shipping
				if (is_numeric($update_id)) {
                    $data['updated_at'] = time();
                    $data['order_shipping'] = $this->input->post('order_shipping');
                    // $data['order_status'] = 2; // send
					$this->_update($update_id, $data);
					$flash_msg = "The order shipping were successfully updated.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					redirect('order/detail/' . $update_id);
				} 
			} else {
				$flash_msg = "The order shipping were failed updated.";
				$value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
				$this->session->set_flashdata('item', $value);
				redirect('order/detail/' . $update_id);
			}
		}
	}

	function submit_resi() {
		$this->load->library('session');

		$update_id = $this->input->post('order_id');
		$submit = $this->input->post('submit');

		if ($submit == "Cancel") {
			redirect('order/manage');
		}

		if ($submit == "Submit") {
			// process the form
			$this->load->library('form_validation');
			$this->form_validation->set_rules('order_awb', 'No Resi', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				// update no resi
				// update status order
				if (is_numeric($update_id)) {
                    $data['updated_at'] = time();
                    $data['order_awb'] = $this->input->post('order_awb');
                    $data['order_status'] = 2; // send
					$this->_update($update_id, $data);

					// send mail tracking code
					$this->Mail->sendMailShipping($this->input->post('shopper_id'), $this->input->post('order_awb'));

					$flash_msg = "The order were successfully updated.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					redirect('order/detail/' . $update_id);
				} 
			} else {
				$flash_msg = "The order were failed updated.";
				$value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
				$this->session->set_flashdata('item', $value);
				redirect('order/detail/' . $update_id);
			}
		}
	}

	function fetch_data_from_post()
	{
		$data['order_id'] = $this->input->post('order_id', true);
        $data['shopper_id'] = $this->input->post('shopper_id', true);
        $data['bank_id'] = $this->input->post('bank_id', true);
        $data['order_name'] = $this->input->post('order_name', true);
		$data['order_mail'] = $this->input->post('order_mail', true);
		$data['order_phone'] = $this->input->post('order_phone', true);
		$data['order_province'] = $this->input->post('order_province', true);
		$data['order_city'] = $this->input->post('order_city', true);
		$data['order_address'] = $this->input->post('order_address', true);
		$data['order_notes'] = $this->input->post('order_notes', true);
		$data['shipping_detail'] = $this->input->post('shipping_detail', true);
		$data['order_items'] = $this->input->post('order_items', true);
        $data['order_shipping'] = $this->input->post('order_shipping', true);
        $data['order_awb'] = $this->input->post('order_awb', true);
        $data['order_weight'] = $this->input->post('order_weight', true);
		$data['shipping_cost'] = $this->input->post('shipping_cost', true);
		$data['order_cost'] = $this->input->post('order_cost', true);
		$data['order_total'] = $this->input->post('order_total', true);
		$data['order_payment'] = $this->input->post('order_payment', true);
		$data['order_status'] = $this->input->post('order_status', true);
		$data['order_date'] = time();
		$data['updated_at'] = time();
		return $data;
	}

	function fetch_data_from_db($updated_id)
	{
		$query = $this->get_where($updated_id);
		foreach ($query->result() as $row) {
			$data['order_id'] = $row->order_id;
	        $data['shopper_id'] = $row->shopper_id;
	        $data['bank_id'] = $row->bank_id;
	        $data['order_name'] = $row->order_name;
			$data['order_mail'] = $row->order_mail;
			$data['order_phone'] = $row->order_phone;
			$data['order_province'] = $row->order_province;
			$data['order_city'] = $row->order_city;
			$data['order_address'] = $row->order_address;
			$data['order_notes'] = $row->order_notes;
			$data['shipping_detail'] = $row->shipping_detail;
			$data['order_items'] = $row->order_items;
	        $data['order_shipping'] = $row->order_shipping;
	        $data['order_awb'] = $row->order_awb;
	        $data['order_weight'] = $row->order_weight;
			$data['shipping_cost'] = $row->shipping_cost;
			$data['order_cost'] = $row->order_cost;
			$data['order_total'] = $row->order_total;
			$data['order_payment'] = $row->order_payment;
			$data['order_status'] = $row->order_status;
			$data['order_date'] = $row->order_date;
			$data['updated_at'] = $row->updated_at;
		}

		if (!isset($data)) {
			$data = "";
		}

		return $data;
	}

	function get($order_by)
	{
		$this->load->model('Mdl_order');
		$query = $this->Mdl_order->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by)
	{
		if ((!is_numeric($limit)) || (!is_numeric($offset))) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_order');
		$query = $this->Mdl_order->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_order');
		$query = $this->Mdl_order->get_where($id);
		return $query;
	}

	// function get_data_where($key) {
	//     $this->load->model('Mdl_order');
	//     $query = $this->Mdl_order->get_data_where($key);
	//     return $query;
	// }

	function get_where_custom($col, $value)
	{
		$this->load->model('Mdl_order');
		$query = $this->Mdl_order->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data)
	{
		$this->load->model('Mdl_order');
		$this->Mdl_order->_insert($data);
	}

	function _update($id, $data)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_order');
		$this->Mdl_order->_update($id, $data);
	}

	function _delete($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_order');
		$this->Mdl_order->_delete($id);
	}

	function count_where($column, $value)
	{
		$this->load->model('Mdl_order');
		$count = $this->Mdl_order->count_where($column, $value);
		return $count;
	}

	function get_max()
	{
		$this->load->model('Mdl_order');
		$max_id = $this->Mdl_order->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query)
	{
		$this->load->model('Mdl_order');
		$query = $this->Mdl_order->_custom_query($mysql_query);
		return $query;
	}

	function count_all()
	{
		$this->load->model('Mdl_order');
		$count = $this->Mdl_order->_count_all();
		return $count;
	}
}
