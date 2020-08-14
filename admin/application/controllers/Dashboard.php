<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Dashboard extends BaseController {
	
	function __construct() {
		parent::__construct();
		$this->isLoggedIn();
	}

	public function index() {
		// get all product
		$data['productCount'] = $this->getCountProduct();
		$data['linkProduct'] = base_url().'product/manage';
		// get all user

		// get all order per month
		$this->template->views('dashboard', $data);
    }
    
	function getCountProduct() {
		$mysql_query = "SELECT * FROM tbl_product WHERE product_status = 1";
		$query = $this->db->query($mysql_query);
		if ($query->num_rows() > 0) {
			$count = $query->num_rows();
		} else {
			$count = 0;
		}

		return $count;
	}
	
	

}	