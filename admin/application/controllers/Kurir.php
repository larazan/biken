<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Kurir extends BaseController
{

	function __construct()
	{
		parent::__construct();
		$this->isLoggedIn();
	}

	public function index()
	{
		$this->template->views('kurir/manage');
	}

	public function manage()
	{
		$mysql_query = "SELECT * FROM tbl_kurir ORDER BY kurir_id DESC";
        $data['query'] = $this->_custom_query($mysql_query);
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('kurir/manage', $data);
	}

	public function create()
	{
		$this->load->library('session');

		$update_id = $this->uri->segment(3);
		$submit = $this->input->post('submit');

		if ($submit == "Cancel") {
			redirect('kurir/manage');
		}

		if ($submit == "Submit") {
			// process the form
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'name', 'trim|required');
			
			if ($this->form_validation->run() == TRUE) {
				$data = $this->fetch_data_from_post();

				if (is_numeric($update_id)) {
					$this->_update($update_id, $data);
					$flash_msg = "The kurir were successfully updated.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					redirect('kurir/create/' . $update_id);
				} else {
					$this->_insert($data);
					$update_id = $this->get_max();

					$flash_msg = "The kurir was successfully added.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					redirect('kurir/create/' . $update_id);
				}
			}
		}

		if ((is_numeric($update_id)) && ($submit != "Submit")) {
			$data = $this->fetch_data_from_db($update_id);
		} else {
			$data = $this->fetch_data_from_post();
		}

		if (!is_numeric($update_id)) {
			$data['headline'] = "Tambah kurir";
		} else {
			$data['headline'] = "Edit kurir";
		}


		$data['update_id'] = $update_id;
		$data['flash'] = $this->session->flashdata('item');

		$this->template->views('kurir/create', $data);
	}

	function delete()
	{	
		$this->load->library('session');
		$update_id = $this->input->post('id');

		$submit = $this->input->post('submit', TRUE);
		if ($submit == "Delete") {
			// delete the item record from db
			$this->_delete($update_id);

			$flash_msg = "The kurir were successfully deleted.";
			$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
			$this->session->set_flashdata('item', $value);

			redirect('kurir/manage');
		}
	}

	function fetch_data_from_post()
	{
        $data['name'] = $this->input->post('name', true);
        $data['value'] = $this->input->post('value', true);
        $data['status'] = $this->input->post('status', true);
        $data['created_at'] = time();
		return $data;
	}

	function fetch_data_from_db($updated_id)
	{
		$query = $this->get_where($updated_id);
		foreach ($query->result() as $row) {
			$data['kurir_id'] = $row->kurir_id;
            $data['name'] = $row->name;
            $data['value'] = $row->value;
            $data['status'] = $row->status;
            $data['created_at'] = $row->created_at;
            $data['updated_at'] = $row->updated_at;
		}

		if (!isset($data)) {
			$data = "";
		}

		return $data;
	}

	function get($order_by)
	{
		$this->load->model('Mdl_kurir');
		$query = $this->Mdl_kurir->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by)
	{
		if ((!is_numeric($limit)) || (!is_numeric($offset))) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_kurir');
		$query = $this->Mdl_kurir->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_kurir');
		$query = $this->Mdl_kurir->get_where($id);
		return $query;
	}

	// function get_data_where($key) {
	//     $this->load->model('Mdl_kurir');
	//     $query = $this->Mdl_kurir->get_data_where($key);
	//     return $query;
	// }

	function get_where_custom($col, $value)
	{
		$this->load->model('Mdl_kurir');
		$query = $this->Mdl_kurir->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data)
	{
		$this->load->model('Mdl_kurir');
		$this->Mdl_kurir->_insert($data);
	}

	function _update($id, $data)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_kurir');
		$this->Mdl_kurir->_update($id, $data);
	}

	function _delete($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_kurir');
		$this->Mdl_kurir->_delete($id);
	}

	function count_where($column, $value)
	{
		$this->load->model('Mdl_kurir');
		$count = $this->Mdl_kurir->count_where($column, $value);
		return $count;
	}

	function get_max()
	{
		$this->load->model('Mdl_kurir');
		$max_id = $this->Mdl_kurir->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query)
	{
		$this->load->model('Mdl_kurir');
		$query = $this->Mdl_kurir->_custom_query($mysql_query);
		return $query;
	}

	function count_all()
	{
		$this->load->model('Mdl_kurir');
		$count = $this->Mdl_kurir->_count_all();
		return $count;
	}
}
