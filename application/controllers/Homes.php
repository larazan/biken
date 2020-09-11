<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homes extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
    	$this->load->model(array('Model_Basket', 'Model_Checkout'));
	}

	public function index()
	{
		// banner
		$data['banner'] = $this->db->get_where('tbl_banner', array('banner_status' => 1));
		// produk unggulan
		// $data['products'] = $this->db->get_where('tbl_product', array('product_status' => 1));
		// semua produk
		$data['products'] = $this->db->get_where('tbl_product', array('product_status' => 1), 8);
		// brand 
		$data['brand'] = $this->db->get_where('tbl_brand', array('status' => 1), 6);

		$this->load->view('halaman/home', $data);
	}


}
