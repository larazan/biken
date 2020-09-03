<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Dashboard extends BaseController {
	public function __construct() {
		parent::__construct();
		$this->load->model(array('Model_Basket', 'Model_Checkout', 'Model_Orders'));
		$this->isLoggedIn();
	}
	public function index() {
		$shopperId = $this->session->userId;		
		$data["profiles"] = $this->Model_Checkout->getBillingInfo($shopperId);
		$data["cart"] = $this->Model_Basket->cartItemsCount($shopperId);
		$data["cartList"] = $this->Model_Basket->getCartDropList($shopperId);
		$data["subCartList"] = $this->Model_Basket->getSubTotalCartList($shopperId);
		$this->load->view('pages/profiles-dashboard-medium', $data);
	}

	public function profiles() {
		$shopperId = $this->session->userId;
		$data['provinces'] = json_decode($this->rajaongkir->province(), true);
		$data["profiles"] = $this->Model_Checkout->getBillingInfo($shopperId);
		$data["cart"] = $this->Model_Basket->cartItemsCount($shopperId);
		$data["cartList"] = $this->Model_Basket->getCartDropList($shopperId);
		$data["subCartList"] = $this->Model_Basket->getSubTotalCartList($shopperId);
		$this->load->view('pages/profiles-profiles-medium', $data);
	}

	public function transaction() {
		$shopperId = $this->session->userId;
		$data["orderList"] = $this->Model_Orders->createOrderList($shopperId);
		$data["profiles"] = $this->Model_Checkout->getBillingInfo($shopperId);
		$data["cart"] = $this->Model_Basket->cartItemsCount($shopperId);
		$data["cartList"] = $this->Model_Basket->getCartDropList($shopperId);
		$data["subCartList"] = $this->Model_Basket->getSubTotalCartList($shopperId);
		$this->load->view('pages/profiles-transaction-medium', $data);
	}

	public function thankyou() {
		$shopperId = $this->session->userId;
		$data["orderList"] = $this->Model_Orders->createOrderList($shopperId);
		$data["profiles"] = $this->Model_Checkout->getBillingInfo($shopperId);
		$data["cart"] = $this->Model_Basket->cartItemsCount($shopperId);
		$data["cartList"] = $this->Model_Basket->getCartDropList($shopperId);
		$data["subCartList"] = $this->Model_Basket->getSubTotalCartList($shopperId);
		$this->load->view('pages/thankyou', $data);
	}

	public function uploadBukti() {
		$shopperId = $this->session->userId;
		$filename = $_FILES['bukti']['name'];
		$nama_baru = str_replace(' ', '_', $filename);		
		$nmfile = date("YmdHis").'_'.$nama_baru;
		$config['upload_path']          = './admin/assets/paymentproof/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1024;
		$config['max_width']            = 1024;
		$config['max_height']           = 1024;
		$config['file_name']						= $nmfile;
		$this->load->library('upload', $config);

		$ids = $this->input->post('modalids');
		if (!$this->upload->do_upload('bukti')){
			$error = array('error' => $this->upload->display_errors());
			redirect('myprofile/transaction');
		}
		else{
			$fileinfo = $this->upload->data();
			$data = array('order_payment' => $fileinfo['file_name'], 'updated_at'=>time());
			$up = $this->db->update('tbl_order', $data, array('order_id'=>$ids));
			$this->Mail->sendMailApprove($shopperId, 'Admin');
			$this->Mail->sendMailApprove($shopperId, 'User');
			redirect('myprofile/transaction');
		}
	}

	public function getBuktiBayar($ids) {
		$get = $this->db->get_where('tbl_order', array('order_id'=>$ids))->row()->order_payment;
		$img = '<img src="'.base_url().'admin/assets/paymentproof/'.$get.'" class="img-responsive" width="100%">';
		echo json_encode(array('img'=>$img));
	}

}
