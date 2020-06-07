<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template->views('customer/manage');
	}

	public function manage()
	{
		$mysql_query = "SELECT * FROM tbl_customer ORDER BY customer_id DESC";
        $data['query'] = $this->_custom_query($mysql_query);
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('customer/manage', $data);
	}

	public function create()
	{
		$this->load->library('session');

		$update_id = $this->uri->segment(3);
		$submit = $this->input->post('submit');

		if ($submit == "Cancel") {
			redirect('customer/manage');
		}

		if ($submit == "Submit") {
			// process the form
			$this->load->library('form_validation');
			$this->form_validation->set_rules('customer_name', 'Username', 'trim|required');
			$this->form_validation->set_rules('customer_email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('customer_password', 'Password', 'required|max_length[20]');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|max_length[20]');
			$this->form_validation->set_rules('customer_phone', 'Telpon', 'trim|required|numeric|min_length[5]|max_length[13]');
			$this->form_validation->set_rules('customer_address', 'Alamat', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				$data = $this->fetch_data_from_post();

				if (is_numeric($update_id)) {
					$this->_update($update_id, $data);
					$flash_msg = "The customer account were successfully updated.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					redirect('customer/create/' . $update_id);
				} else {
					$this->_insert($data);
					$update_id = $this->get_max();

					$flash_msg = "The customer account was successfully added.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					redirect('customer/create/' . $update_id);
				}
			}
		}

		if ((is_numeric($update_id)) && ($submit != "Submit")) {
			$data = $this->fetch_data_from_db($update_id);
		} else {
			$data = $this->fetch_data_from_post();
		}

		if (!is_numeric($update_id)) {
			$data['headline'] = "Tambah Customer";
		} else {
			$data['headline'] = "Edit Customer";
		}


		$data['update_id'] = $update_id;
		$data['flash'] = $this->session->flashdata('item');

		$this->template->views('Customer/create', $data);
	}

	function delete()
	{	
		$this->load->library('session');
		$update_id = $this->input->post('id');

		$submit = $this->input->post('submit', TRUE);
		if ($submit == "Delete") {
			// delete the item record from db
			$this->_delete($update_id);

			$flash_msg = "The customer were successfully deleted.";
			$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
			$this->session->set_flashdata('item', $value);

			redirect('Customer/manage');
		}
	}

	function fetch_data_from_post()
	{
		$data['customer_name'] = $this->input->post('customer_name', true);
		$data['customer_password'] = $this->input->post('customer_password', true);
		$data['customer_email'] = $this->input->post('customer_email', true);
		$data['customer_phone'] = $this->input->post('customer_phone', true);
		$data['customer_address'] = $this->input->post('customer_address', true);
		$data['customer_city'] = $this->input->post('customer_city', true);
		$data['customer_status'] = $this->input->post('customer_status', true);
		$data['created_at'] = time();
		return $data;
	}

	function fetch_data_from_db($updated_id)
	{
		$query = $this->get_where($updated_id);
		foreach ($query->result() as $row) {
			$data['customer_id'] = $row->customer_id;
			$data['customer_name'] = $row->customer_name;
			$data['customer_password'] = $row->customer_password;
			$data['customer_email'] = $row->customer_email;
			$data['customer_phone'] = $row->customer_phone;
			$data['customer_address'] = $row->customer_address;
			$data['customer_city'] = $row->customer_city;
			$data['customer_status'] = $row->customer_status;
			$data['created_at'] = $row->created_at;
		}

		if (!isset($data)) {
			$data = "";
		}

		return $data;
	}

	function get($order_by)
	{
		$this->load->model('Mdl_customer');
		$query = $this->Mdl_customer->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by)
	{
		if ((!is_numeric($limit)) || (!is_numeric($offset))) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_customer');
		$query = $this->Mdl_customer->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_customer');
		$query = $this->Mdl_customer->get_where($id);
		return $query;
	}

	// function get_data_where($key) {
	//     $this->load->model('Mdl_customer');
	//     $query = $this->Mdl_customer->get_data_where($key);
	//     return $query;
	// }

	function get_where_custom($col, $value)
	{
		$this->load->model('Mdl_customer');
		$query = $this->Mdl_customer->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data)
	{
		$this->load->model('Mdl_customer');
		$this->Mdl_customer->_insert($data);
	}

	function _update($id, $data)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_customer');
		$this->Mdl_customer->_update($id, $data);
	}

	function _delete($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_customer');
		$this->Mdl_customer->_delete($id);
	}

	function count_where($column, $value)
	{
		$this->load->model('Mdl_customer');
		$count = $this->Mdl_customer->count_where($column, $value);
		return $count;
	}

	function get_max()
	{
		$this->load->model('Mdl_customer');
		$max_id = $this->Mdl_customer->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query)
	{
		$this->load->model('Mdl_customer');
		$query = $this->Mdl_customer->_custom_query($mysql_query);
		return $query;
	}

	function count_all()
	{
		$this->load->model('Mdl_customer');
		$count = $this->Mdl_customer->_count_all();
		return $count;
	}
}
