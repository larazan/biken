<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homes extends CI_Controller {
	public function index() {
    $data['title'] = "Commerce Proto";
		$data['content']='menus/homes';
		$this->load->view('layouts/wrapper',$data);
	}

	public function shopList() {
		$data['title'] = "Commerce Proto";
		$data['content']='menus/shopList';
		$this->load->view('layouts/wrapper',$data);
	}

	public function productDetails() {
		$data['title'] = "Commerce Proto";
		$data['content']='menus/productDetails';
		$this->load->view('layouts/wrapper',$data);
	}

	public function cartList() {
		$data['title'] = "Commerce Proto";
		$data['content']='menus/cartList';
		$this->load->view('layouts/wrapper',$data);
	}
}
