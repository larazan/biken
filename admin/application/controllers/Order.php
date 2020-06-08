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

	function fetch_data_from_post()
	{
        $data['cus_id'] = $this->input->post('cus_id', true);
        $data['payment_id'] = $this->input->post('payment_id', true);
        $data['order_total'] = $this->input->post('order_total', true);
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
            $data['cus_id'] = $row->cus_id;
            $data['payment_id'] = $row->payment_id;
            $data['order_total'] = $row->order_total;
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
