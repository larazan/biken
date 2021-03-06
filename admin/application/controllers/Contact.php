<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Contact extends BaseController
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->helper('text');
        $this->isLoggedIn();
	}

	public function index()
	{
		$this->template->views('contact/manage');
	}

	public function manage()
	{
		$mysql_query = "SELECT * FROM tbl_contact ORDER BY contact_id DESC";
        $data['query'] = $this->_custom_query($mysql_query);
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('contact/manage', $data);
	}

	public function create()
	{
		$this->load->library('session');

		$update_id = $this->uri->segment(4);
		$submit = $this->input->post('submit');

		if ($submit == "Cancel") {
			redirect('contact/manage');
		}

		if ($submit == "Submit") {
			// process the form
			$this->load->library('form_validation');
			$this->form_validation->set_rules('contact_name', 'name', 'trim|required');
		
			// var_dump($this->input->post());
			// die();

			if ($this->form_validation->run() == TRUE) {
				$data = $this->fetch_data_from_post();

				if (is_numeric($update_id)) {
					$this->_update($update_id, $data);
					$flash_msg = "The contact were successfully updated.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					redirect('contact/create/' . $update_id);
				} else {
					$this->_insert($data);
					$update_id = $this->get_max();

					$flash_msg = "The contact was successfully added.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					redirect('contact/create/' . $update_id);
				}
			}
		}

		if ((is_numeric($update_id)) && ($submit != "Submit")) {
			$data = $this->fetch_data_from_db($update_id);
		} else {
			$data = $this->fetch_data_from_post();
		}

		if (!is_numeric($update_id)) {
			$data['headline'] = "Tambah Contact";
		} else {
			$data['headline'] = "Edit Contact";
		}


		$data['update_id'] = $update_id;
		$data['flash'] = $this->session->flashdata('item');

		$this->template->views('contact/create', $data);
	}

	function delete()
	{	
		$this->load->library('session');
		$update_id = $this->input->post('id');

		$submit = $this->input->post('submit', TRUE);
		if ($submit == "Delete") {
			// delete the item record from db
			$this->_delete($update_id);

			$flash_msg = "The contact were successfully deleted.";
			$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
			$this->session->set_flashdata('item', $value);

			redirect('contact/manage');
		}
	}

	function fetch_data_from_post()
	{
        $data['contact_name'] = $this->input->post('contact_name', true);
        $data['contact_email'] = $this->input->post('contact_email', true);
        $data['contact_phone'] = $this->input->post('contact_phone', true);
        $data['contact_msg'] = $this->input->post('contact_msg', true);
        $data['contact_status'] = $this->input->post('contact_status', true);
        $data['created_at'] = time();
		return $data;
	}

	function fetch_data_from_db($updated_id)
	{
		$query = $this->get_where($updated_id);
		foreach ($query->result() as $row) {
			$data['contact_id'] = $row->contact_id;
            $data['contact_name'] = $row->contact_name;
            $data['contact_email'] = $row->contact_email;
            $data['contact_phone'] = $row->contact_phone;
            $data['contact_msg'] = $row->contact_msg;
            $data['contact_status'] = $row->contact_status;
            $data['created_at'] = $row->created_at;
		}

		if (!isset($data)) {
			$data = "";
		}

		return $data;
	}

	function get($order_by)
	{
		$this->load->model('Mdl_contact');
		$query = $this->Mdl_contact->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by)
	{
		if ((!is_numeric($limit)) || (!is_numeric($offset))) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_contact');
		$query = $this->Mdl_contact->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_contact');
		$query = $this->Mdl_contact->get_where($id);
		return $query;
	}

	// function get_data_where($key) {
	//     $this->load->model('Mdl_contact');
	//     $query = $this->Mdl_contact->get_data_where($key);
	//     return $query;
	// }

	function get_where_custom($col, $value)
	{
		$this->load->model('Mdl_contact');
		$query = $this->Mdl_contact->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data)
	{
		$this->load->model('Mdl_contact');
		$this->Mdl_contact->_insert($data);
	}

	function _update($id, $data)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_contact');
		$this->Mdl_contact->_update($id, $data);
	}

	function _delete($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_contact');
		$this->Mdl_contact->_delete($id);
	}

	function count_where($column, $value)
	{
		$this->load->model('Mdl_contact');
		$count = $this->Mdl_contact->count_where($column, $value);
		return $count;
	}

	function get_max()
	{
		$this->load->model('Mdl_contact');
		$max_id = $this->Mdl_contact->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query)
	{
		$this->load->model('Mdl_contact');
		$query = $this->Mdl_contact->_custom_query($mysql_query);
		return $query;
	}

	function count_all()
	{
		$this->load->model('Mdl_contact');
		$count = $this->Mdl_contact->_count_all();
		return $count;
	}
}
