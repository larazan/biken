<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Site_management extends BaseController
{

	function __construct()
	{
		parent::__construct();
    }

    public function index() {
        $data['kosong'] = [];
        $this->template->views('site/manage', $data);
    }

    public function manage() {
        
    } 
    
    function fetch_data_from_post()
	{
		$data['namaweb'] = $this->input->post('namaweb', true);
        $data['tagline'] = $this->input->post('tagline', true);
        $data['email'] = $this->input->post('email', true);
        $data['website'] = $this->input->post('website', true);
        $data['keyword'] = $this->input->post('keyword', true);
        $data['metatext'] = $this->input->post('metatext', true);
        $data['telepon'] = $this->input->post('telepon', true);
        $data['alamat'] = $this->input->post('alamat', true);
        $data['facebook'] = $this->input->post('facebook', true);
        $data['instagram'] = $this->input->post('instagram', true);
        $data['deskripsi'] = $this->input->post('deskripsi', true);
        $data['logo'] = $this->input->post('logo', true);
        $data['icon'] = $this->input->post('icon', true);
        $data['rekening'] = $this->input->post('rekening', true);
        $data['created_at'] = time();
		return $data;
	}

	function fetch_data_from_db($updated_id)
	{
		$query = $this->get_where($updated_id);
		foreach ($query->result() as $row) {
			$data['id_config'] = $row->id_config;
			$data['namaweb'] = $row->namaweb;
            $data['tagline'] = $row->tagline;
            $data['email'] = $row->email;
			$data['website'] = $row->website;
            $data['keyword'] = $row->keyword;
            $data['metatext'] = $row->metatext;
			$data['telepon'] = $row->telepon;
            $data['alamat'] = $row->alamat;
            $data['facebook'] = $row->facebook;
			$data['instagram'] = $row->instagram;
			$data['deskripsi'] = $row->deskripsi;
            $data['logo'] = $row->logo;
			$data['icon'] = $row->icon;
            $data['rekening'] = $row->rekening;
            $data['created_at'] = $row->created_at;
		}

		if (!isset($data)) {
			$data = "";
		}

		return $data;
	}

	function get($order_by)
	{
		$this->load->model('Mdl_site');
		$query = $this->Mdl_site->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by)
	{
		if ((!is_numeric($limit)) || (!is_numeric($offset))) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_site');
		$query = $this->Mdl_site->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_site');
		$query = $this->Mdl_site->get_where($id);
		return $query;
	}

	// function get_data_where($key) {
	//     $this->load->model('Mdl_site');
	//     $query = $this->Mdl_site->get_data_where($key);
	//     return $query;
	// }

	function get_where_custom($col, $value)
	{
		$this->load->model('Mdl_site');
		$query = $this->Mdl_site->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data)
	{
		$this->load->model('Mdl_site');
		$this->Mdl_site->_insert($data);
	}

	function _update($id, $data)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_site');
		$this->Mdl_site->_update($id, $data);
	}

	function _delete($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_site');
		$this->Mdl_site->_delete($id);
	}

	function count_where($column, $value)
	{
		$this->load->model('Mdl_site');
		$count = $this->Mdl_site->count_where($column, $value);
		return $count;
	}

	function get_max()
	{
		$this->load->model('Mdl_site');
		$max_id = $this->Mdl_site->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query)
	{
		$this->load->model('Mdl_site');
		$query = $this->Mdl_site->_custom_query($mysql_query);
		return $query;
	}

	function count_all()
	{
		$this->load->model('Mdl_site');
		$count = $this->Mdl_site->_count_all();
		return $count;
	}

}