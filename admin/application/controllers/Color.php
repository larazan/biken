<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Color extends BaseController
{

	function __construct()
	{
		parent::__construct();
		$this->isLoggedIn();
	}

	public function index()
	{
		$this->template->views('color/manage');
	}

	public function manage()
	{
		$mysql_query = "SELECT * FROM tbl_color ORDER BY color_id DESC";
        $data['query'] = $this->_custom_query($mysql_query);
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('color/manage', $data);
	}

	public function create()
	{
		$this->load->library('session');

		$update_id = $this->uri->segment(4);
		$submit = $this->input->post('submit');

		if ($submit == "Cancel") {
			redirect('color/manage');
		}

		if ($submit == "Submit") {
			// process the form
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'name', 'trim|required');
		
			// var_dump($this->input->post());
			// die();

			if ($this->form_validation->run() == TRUE) {
				$data = $this->fetch_data_from_post();

				if (is_numeric($update_id)) {
					$this->_update($update_id, $data);
					$flash_msg = "The color were successfully updated.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					redirect('color/create/' . $update_id);
				} else {
					$this->_insert($data);
					$update_id = $this->get_max();

					$flash_msg = "The color was successfully added.";
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
		$update_id = $this->input->post('id');

		$submit = $this->input->post('submit', TRUE);
		if ($submit == "Delete") {
			// delete the item record from db
			$this->_delete($update_id);

			$flash_msg = "The color were successfully deleted.";
			$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
			$this->session->set_flashdata('item', $value);

			redirect('color/manage');
		}
	}

	function fetch_data_from_post()
	{
		$data['name'] = $this->input->post('name', true);
		$data['color_status'] = $this->input->post('color_status', true);
		return $data;
	}

	function fetch_data_from_db($updated_id)
	{
		$query = $this->get_where($updated_id);
		foreach ($query->result() as $row) {
			$data['color_id'] = $row->color_id;
			$data['name'] = $row->name;
			$data['color_status'] = $row->color_status;
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
