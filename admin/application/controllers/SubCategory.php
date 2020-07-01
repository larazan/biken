<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class SubCategory extends BaseController
{

	function __construct()
	{
		parent::__construct();
		$this->isLoggedIn();
	}

	public function index()
	{
        // $this->template->views('subcategory/manage');
        $mysql_query = "SELECT tbl_subcategory.*, tbl_category.*, tbl_subcategory.created_at AS sub_date FROM tbl_subcategory LEFT JOIN tbl_category ON tbl_subcategory.cat_id = tbl_category.id ORDER BY sub_id DESC";
        $query = $this->_custom_query($mysql_query);

        foreach($query->result() as $row) {
            var_dump($row);
        }

       
	}

	public function manage()
	{
        // $mysql_query = "SELECT * FROM tbl_subcategory ORDER BY sub_id DESC";
        $mysql_query = "SELECT tbl_subcategory.*, tbl_category.*, tbl_subcategory.created_at AS sub_date FROM tbl_subcategory LEFT JOIN tbl_category ON tbl_subcategory.cat_id = tbl_category.id ORDER BY sub_id DESC";
        $data['query'] = $this->_custom_query($mysql_query);
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('subcategory/manage', $data);
	}

	public function create()
	{
		$this->load->library('session');

		$update_id = $this->uri->segment(3);
		$submit = $this->input->post('submit');

		if ($submit == "Cancel") {
			redirect('SubCategory/manage');
		}

		if ($submit == "Submit") {
			// process the form
			$this->load->library('form_validation');
			$this->form_validation->set_rules('sub_name', 'subcategory name', 'trim|required');
		
			if ($this->form_validation->run() == TRUE) {
				$data = $this->fetch_data_from_post();

				if (is_numeric($update_id)) {
					$data['updated_at'] = time();
					$this->_update($update_id, $data);
					$flash_msg = "The subcategory were successfully updated.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					redirect('SubCategory/create/' . $update_id);
					// redirect('Category/manage');
				} else {
					$this->_insert($data);
					$update_id = $this->get_max();

					$flash_msg = "The subcategory was successfully added.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					// redirect('SubCategory/create/' . $update_id);
					redirect('SubCategory/manage');
				}
			}
		}

		if ((is_numeric($update_id)) && ($submit != "Submit")) {
			$data = $this->fetch_data_from_db($update_id);
		} else {
			$data = $this->fetch_data_from_post();
		}

		if (!is_numeric($update_id)) {
			$data['headline'] = "Tambah SubCategory";
		} else {
			$data['headline'] = "Edit SubCategory";
		}

        $data['categories'] = $this->_custom_query("SELECT * FROM tbl_category ORDER BY id DESC");
		$data['update_id'] = $update_id;
		$data['flash'] = $this->session->flashdata('item');

		$this->template->views('subcategory/create', $data);
	}

	function delete()
	{	
		$this->load->library('session');
		$update_id = $this->input->post('id');

		$submit = $this->input->post('submit', TRUE);
		if ($submit == "Delete") {
			// delete the item record from db
			$this->_delete($update_id);

			$flash_msg = "The subcategory were successfully deleted.";
			$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
			$this->session->set_flashdata('item', $value);

			redirect('SubCategory/manage');
		}
	}

	function fetch_data_from_post()
	{
        $data['cat_id'] = $this->input->post('cat_id', true);
		$data['sub_name'] = $this->input->post('sub_name', true);
		$data['subcat_url'] = url_title($this->input->post('sub_name', true));
		$data['sub_status'] = $this->input->post('sub_status', true);
		$data['created_at'] = time();
		return $data;
	}

	function fetch_data_from_db($updated_id)
	{
		$query = $this->get_where($updated_id);
		foreach ($query->result() as $row) {
            $data['sub_id'] = $row->sub_id;
            $data['cat_id'] = $row->cat_id;
			$data['sub_name'] = $row->sub_name;
			$data['subcat_url'] = $row->subcat_url;
			$data['sub_status'] = $row->sub_status;
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
		$this->load->model('Mdl_subcategory');
		$query = $this->Mdl_subcategory->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by)
	{
		if ((!is_numeric($limit)) || (!is_numeric($offset))) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_subcategory');
		$query = $this->Mdl_subcategory->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_subcategory');
		$query = $this->Mdl_subcategory->get_where($id);
		return $query;
	}

	// function get_data_where($key) {
	//     $this->load->model('Mdl_subcategory');
	//     $query = $this->Mdl_subcategory->get_data_where($key);
	//     return $query;
	// }

	function get_where_custom($col, $value)
	{
		$this->load->model('Mdl_subcategory');
		$query = $this->Mdl_subcategory->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data)
	{
		$this->load->model('Mdl_subcategory');
		$this->Mdl_subcategory->_insert($data);
	}

	function _update($id, $data)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_subcategory');
		$this->Mdl_subcategory->_update($id, $data);
	}

	function _delete($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_subcategory');
		$this->Mdl_subcategory->_delete($id);
	}

	function count_where($column, $value)
	{
		$this->load->model('Mdl_subcategory');
		$count = $this->Mdl_subcategory->count_where($column, $value);
		return $count;
	}

	function get_max()
	{
		$this->load->model('Mdl_subcategory');
		$max_id = $this->Mdl_subcategory->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query)
	{
		$this->load->model('Mdl_subcategory');
		$query = $this->Mdl_subcategory->_custom_query($mysql_query);
		return $query;
	}

	function count_all()
	{
		$this->load->model('Mdl_subcategory');
		$count = $this->Mdl_subcategory->_count_all();
		return $count;
	}
}
