<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Feed extends BaseController
{

	function __construct()
	{
		parent::__construct();
    }

    public function index() {
        $data['insta_id'] = 'lincungstudio2';
        $this->load->view('feed', $data);
    }
    
}