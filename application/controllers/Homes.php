<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homes extends CI_Controller {
	public function index() {
    $data['title'] = "Commerce Proto";
		$this->load->view('menus/homes', $data);
	}
}
