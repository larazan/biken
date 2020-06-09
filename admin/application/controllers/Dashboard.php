<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Dashboard extends BaseController {
	
	function __construct() {
		parent::__construct();
		$this->isLoggedIn();
	}

	public function index() {
		$this->template->views('dashboard');
    }
    

    
}	