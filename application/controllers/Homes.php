<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homes extends CI_Controller {
	public function index() {
		$this->load->view('pages/homes');
	}

	public function store() {
		$this->load->view('pages/store');
	}

	public function details() {
		$data['itemData'] = $this->db->get_where('tbl_product', array('product_id'=>3))->row();
		$this->load->view('pages/details', $data);
	}

	public function profiles() {
		$this->load->view('pages/profiles');
	}

	public function tracking() {
		$this->load->view('pages/tracking');
	}

	public function feed() {
		$this->load->view('pages/feed');
	}

	public function info() {
		$this->load->view('pages/info');
	}

	public function payment() {
		$this->load->view('pages/payment');
	}

	public function cart() {
		$this->load->view('pages/cart');
	}

	public function checkout() {
		$this->load->view('pages/checkout');
	}
}
