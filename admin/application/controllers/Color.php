<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Color extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template->views('color/manage');
	}

	public function manage()
	{
		$data['query'] = $this->get('userId');
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('color/manage', $data);
	}

	public function create()
	{
		$this->load->library('session');

		$update_id = $this->uri->segment(3);
		$submit = $this->input->post('submit');

		if ($submit == "Cancel") {
			redirect('color/manage');
		}

		if ($submit == "Submit") {
			// process the form
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|max_length[20]');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|max_length[20]');
			$this->form_validation->set_rules('mobile', 'Telpon', 'trim|required|numeric|min_length[5]|max_length[13]');

			if ($this->form_validation->run() == TRUE) {
				$data = $this->fetch_data_from_post();

				if (is_numeric($update_id)) {
					$data['updated_at'] = time();
					$this->_update($update_id, $data);
					$flash_msg = "The user account were successfully updated.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					redirect('color/create/' . $update_id);
				} else {
					$update_id = $this->get_max();

					$flash_msg = "The user account was successfully added.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					redirect('color/create/' . $update_id);
				}
			}
		}

		if ((is_numeric($update_id)) && ($submit != "Submit")) {
			$data = $this->fetch_data_from_db($update_id);
		} else {
			$data = $this->fetch_data_from_post();
		}

		if (!is_numeric($update_id)) {
			$data['headline'] = "Tambah Color";
		} else {
			$data['headline'] = "Edit Color";
		}


		$data['update_id'] = $update_id;
		$data['flash'] = $this->session->flashdata('item');

		$this->template->views('color/create', $data);
	}

	function delete()
	{	
		$this->load->library('session');
		$update_id = $this->input->post('user');

		$submit = $this->input->post('submit', TRUE);
		if ($submit == "Delete") {
			// delete the item record from db
			$this->_delete($update_id);

			$flash_msg = "The user were successfully deleted.";
			$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
			$this->session->set_flashdata('item', $value);

			redirect('color/manage');
		}
	}

	function fetch_data_from_post()
	{
		$data['name'] = $this->input->post('username', true);
		$data['password'] = getHashedPassword($this->input->post('password', true));
		$data['email'] = $this->input->post('email', true);
		$data['mobile'] = $this->input->post('mobile', true);
		$data['created_at'] = time();
		$data['updated_at'] = time();
		return $data;
	}

	function fetch_data_from_db($updated_id)
	{
		$query = $this->get_where($updated_id);
		foreach ($query->result() as $row) {
			$data['userId'] = $row->userId;
			$data['name'] = $row->name;
			$data['email'] = $row->email;
			$data['password'] = $row->password;
			$data['mobile'] = $row->mobile;
			$data['created_at'] = $row->created_at;
		}

		if (!isset($data)) {
			$data = "";
		}

		return $data;
	}

	function get($order_by)
	{
		$this->load->model('Mdl_color');
		$query = $this->Mdl_color->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by)
	{
		if ((!is_numeric($limit)) || (!is_numeric($offset))) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_color');
		$query = $this->Mdl_color->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_color');
		$query = $this->Mdl_color->get_where($id);
		return $query;
	}

	// function get_data_where($key) {
	//     $this->load->model('Mdl_color');
	//     $query = $this->Mdl_color->get_data_where($key);
	//     return $query;
	// }

	function get_where_custom($col, $value)
	{
		$this->load->model('Mdl_color');
		$query = $this->Mdl_color->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data)
	{
		$this->load->model('Mdl_color');
		$this->Mdl_color->_insert($data);
	}

	function _update($id, $data)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_color');
		$this->Mdl_color->_update($id, $data);
	}

	function _delete($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_color');
		$this->Mdl_color->_delete($id);
	}

	function count_where($column, $value)
	{
		$this->load->model('Mdl_color');
		$count = $this->Mdl_color->count_where($column, $value);
		return $count;
	}

	function get_max()
	{
		$this->load->model('Mdl_color');
		$max_id = $this->Mdl_color->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query)
	{
		$this->load->model('Mdl_color');
		$query = $this->Mdl_color->_custom_query($mysql_query);
		return $query;
	}

	function count_all()
	{
		$this->load->model('Mdl_color');
		$count = $this->Mdl_color->_count_all();
		return $count;
	}
}
