<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Midtrans extends BaseController
{
	 
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
      
		$this->load->helper('url');
        $this->isLoggedIn();
    }

	function do_update() {
		$data['description'] = $this->input->post('midtrans_key');
		$this->db->where('type' , 'midtrans_key');
		$this->db->update('tbl_settings' , $data);

		$flash_msg = "The key were successfully added.";
		$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
		$this->session->set_flashdata('item', $value);
		redirect('midtrans/manage');             
	}

    public function manage() {
		$this->load->library('session');
		
		$data['flash'] = $this->session->flashdata('item');
        $this->template->views('midtrans/manage', $data);
    }     

	

}