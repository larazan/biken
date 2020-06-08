<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class User extends BaseController
{

	function __construct()
	{
		parent::__construct();
		$this->isLoggedIn();
	}

	public function index()
	{
		$this->template->views('users/manage');
	}

	public function manage()
	{
		$data['query'] = $this->get('userId');
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('users/manage', $data);
	}

	public function create()
	{
		$this->load->library('session');

		$update_id = $this->uri->segment(3);
		$submit = $this->input->post('submit');

		if ($submit == "Cancel") {
			redirect('User/manage');
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
					redirect('user/create/' . $update_id);
				} else {
					$this->_insert($data);
					$update_id = $this->get_max();

					$flash_msg = "The user account was successfully added.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					redirect('user/create/' . $update_id);
				}
			}
		}

		if ((is_numeric($update_id)) && ($submit != "Submit")) {
			$data = $this->fetch_data_from_db($update_id);
		} else {
			$data = $this->fetch_data_from_post();
		}

		if (!is_numeric($update_id)) {
			$data['headline'] = "Tambah User";
		} else {
			$data['headline'] = "Edit User";
		}


		$data['update_id'] = $update_id;
		$data['flash'] = $this->session->flashdata('item');

		$this->template->views('users/create', $data);
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

			redirect('user/manage');
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
		$this->load->model('Mdl_user');
		$query = $this->Mdl_user->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by)
	{
		if ((!is_numeric($limit)) || (!is_numeric($offset))) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_user');
		$query = $this->Mdl_user->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_user');
		$query = $this->Mdl_user->get_where($id);
		return $query;
	}

	// function get_data_where($key) {
	//     $this->load->model('Mdl_user');
	//     $query = $this->Mdl_user->get_data_where($key);
	//     return $query;
	// }

	function get_where_custom($col, $value)
	{
		$this->load->model('Mdl_user');
		$query = $this->Mdl_user->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data)
	{
		$this->load->model('Mdl_user');
		$this->Mdl_user->_insert($data);
	}

	function _update($id, $data)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_user');
		$this->Mdl_user->_update($id, $data);
	}

	function _delete($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_user');
		$this->Mdl_user->_delete($id);
	}

	function count_where($column, $value)
	{
		$this->load->model('Mdl_user');
		$count = $this->Mdl_user->count_where($column, $value);
		return $count;
	}

	function get_max()
	{
		$this->load->model('Mdl_user');
		$max_id = $this->Mdl_user->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query)
	{
		$this->load->model('Mdl_user');
		$query = $this->Mdl_user->_custom_query($mysql_query);
		return $query;
	}

	function count_all()
	{
		$this->load->model('Mdl_user');
		$count = $this->Mdl_user->_count_all();
		return $count;
	}
}
