<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	function __construct() {
        parent::__construct();
	}

	public function index() {
		$this->template->views('users/manage');
	}

    public function create() {
        $this->template->views('users/create');
    }
	
}	