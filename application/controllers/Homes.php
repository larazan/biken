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
		$this->load->view('pages/details');
	}

	public function profiles() {
		$this->load->view('pages/profiles');
	}

	public function tracking() {
		$this->load->view('pages/tracking');
	}
}
