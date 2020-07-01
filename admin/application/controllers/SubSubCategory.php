<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class SubSubCategory extends BaseController
{

	function __construct()
	{
		parent::__construct();
		$this->isLoggedIn();
	}

	function tes() {
		// $mysql_query = "SELECT tbl_subsubcategory.*, tbl_subcategory.*, tbl_subsubcategory.created_at AS subsub_date FROM tbl_subsubcategory LEFT JOIN tbl_subcategory ON tbl_subsubcategory.subcat_id = tbl_subcategory.sub_id ORDER BY subsub_id DESC";
		$mysql_query = "SELECT tbl_subsubcategory.*, tbl_subcategory.*, tbl_category.*, tbl_subcategory.created_at AS sub_date, tbl_subsubcategory.created_at AS subsub_date  FROM tbl_subsubcategory LEFT JOIN tbl_subcategory ON tbl_subsubcategory.subcat_id = tbl_subcategory.sub_id LEFT JOIN tbl_category ON tbl_subcategory.cat_id = tbl_category.id ORDER BY subsub_id DESC";
        $query = $this->_custom_query($mysql_query);
	}

	public function index()
	{
		$this->template->views('subsubcategory/manage');
	}

	public function manage()
	{
		$mysql_query = "SELECT tbl_subsubcategory.*, tbl_subcategory.*, tbl_category.*, tbl_subcategory.created_at AS sub_date, tbl_subsubcategory.created_at AS subsub_date  FROM tbl_subsubcategory LEFT JOIN tbl_subcategory ON tbl_subsubcategory.subcat_id = tbl_subcategory.sub_id LEFT JOIN tbl_category ON tbl_subcategory.cat_id = tbl_category.id ORDER BY subsub_id DESC";
		// $mysql_query = "SELECT tbl_subsubcategory.*, tbl_subcategory.*, tbl_subsubcategory.created_at AS subsub_date FROM tbl_subsubcategory LEFT JOIN tbl_subcategory ON tbl_subsubcategory.subcat_id = tbl_subcategory.sub_id ORDER BY subsub_id DESC";
        $data['query'] = $this->_custom_query($mysql_query);
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('subsubcategory/manage', $data);
	}

	public function create()
	{
		$this->load->library('session');

		$update_id = $this->uri->segment(3);
		$submit = $this->input->post('submit');

		if ($submit == "Cancel") {
			redirect('SubSubCategory/manage');
		}

		if ($submit == "Submit") {
			// process the form
			$this->load->library('form_validation');
			$this->form_validation->set_rules('subsub_name', 'subsubcategory name', 'trim|required');
		
			if ($this->form_validation->run() == TRUE) {
				$data = $this->fetch_data_from_post();

				if (is_numeric($update_id)) {
					$data['updated_at'] = time();
					$this->_update($update_id, $data);
					$flash_msg = "The subsubcategory were successfully updated.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					redirect('SubSubCategory/create/' . $update_id);
				} else {
					$this->_insert($data);
					$update_id = $this->get_max();

					$flash_msg = "The subsubcategory was successfully added.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					// redirect('SubSubCategory/create/' . $update_id);
					redirect('SubSubCategory/manage');
				}
			}
		}

		if ((is_numeric($update_id)) && ($submit != "Submit")) {
			$data = $this->fetch_data_from_db($update_id);
		} else {
			$data = $this->fetch_data_from_post();
		}

		if (!is_numeric($update_id)) {
			$data['headline'] = "Tambah SubSubCategory";
		} else {
			$data['headline'] = "Edit SubSubCategory";
		}

		$mysql_query = "SELECT tbl_subcategory.*, tbl_category.*, tbl_subcategory.created_at AS sub_date FROM tbl_subcategory LEFT JOIN tbl_category ON tbl_subcategory.cat_id = tbl_category.id ORDER BY sub_id DESC";
        $query = $this->_custom_query($mysql_query);
        $data['subcategories'] = $query; //$this->_custom_query("SELECT * FROM tbl_subcategory ORDER BY sub_id DESC");
		$data['update_id'] = $update_id;
		$data['flash'] = $this->session->flashdata('item');

		$this->template->views('subsubcategory/create', $data);
	}

	function delete()
	{	
		$this->load->library('session');
		$update_id = $this->input->post('id');

		$submit = $this->input->post('submit', TRUE);
		if ($submit == "Delete") {
			// delete the item record from db
			$this->_delete($update_id);

			$flash_msg = "The subsubcategory were successfully deleted.";
			$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
			$this->session->set_flashdata('item', $value);

			redirect('SubSubCategory/manage');
		}
	}

	function fetch_data_from_post()
	{
        $data['subcat_id'] = $this->input->post('subcat_id', true);
		$data['subsub_name'] = $this->input->post('subsub_name', true);
		$data['subsubcat_url'] = url_title($this->input->post('subsub_name', true));
		$data['subsub_status'] = $this->input->post('subsub_status', true);
		$data['created_at'] = time();
		return $data;
	}

	function fetch_data_from_db($updated_id)
	{
		$query = $this->get_where($updated_id);
		foreach ($query->result() as $row) {
            $data['subsub_id'] = $row->subsub_id;
            $data['subcat_id'] = $row->subcat_id;
			$data['subsub_name'] = $row->subsub_name;
			$data['subsubcat_url'] = $row->subsubcat_url;
			$data['subsub_status'] = $row->subsub_status;
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
		$this->load->model('Mdl_subsubcategory');
		$query = $this->Mdl_subsubcategory->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by)
	{
		if ((!is_numeric($limit)) || (!is_numeric($offset))) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_subsubcategory');
		$query = $this->Mdl_subsubcategory->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_subsubcategory');
		$query = $this->Mdl_subsubcategory->get_where($id);
		return $query;
	}

	// function get_data_where($key) {
	//     $this->load->model('Mdl_subsubcategory');
	//     $query = $this->Mdl_subsubcategory->get_data_where($key);
	//     return $query;
	// }

	function get_where_custom($col, $value)
	{
		$this->load->model('Mdl_subsubcategory');
		$query = $this->Mdl_subsubcategory->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data)
	{
		$this->load->model('Mdl_subsubcategory');
		$this->Mdl_subsubcategory->_insert($data);
	}

	function _update($id, $data)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_subsubcategory');
		$this->Mdl_subsubcategory->_update($id, $data);
	}

	function _delete($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_subsubcategory');
		$this->Mdl_subsubcategory->_delete($id);
	}

	function count_where($column, $value)
	{
		$this->load->model('Mdl_subsubcategory');
		$count = $this->Mdl_subsubcategory->count_where($column, $value);
		return $count;
	}

	function get_max()
	{
		$this->load->model('Mdl_subsubcategory');
		$max_id = $this->Mdl_subsubcategory->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query)
	{
		$this->load->model('Mdl_subsubcategory');
		$query = $this->Mdl_subsubcategory->_custom_query($mysql_query);
		return $query;
	}

	function count_all()
	{
		$this->load->model('Mdl_subsubcategory');
		$count = $this->Mdl_subsubcategory->_count_all();
		return $count;
	}
}
