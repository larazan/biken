<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homes extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model(array('Model_Basket', 'Model_Checkout'));
	}
	public function index()
	{
		$this->load->view('pages/homes');
	}

	public function test() {
		$shopperId = $this->session->userId;
		$str = $this->db->select('id')->get_where('tbl_basket', array('basket_status'=>1, 'picked_status'=>1, 'shopper_id'=>$shopperId))->result_array();
		// $imp = implode(",", $str["id"]);
		$imp = implode(', ', array_map(function ($entry) {
			return $entry['id'];
		}, $str));
		$token = $this->Model_Checkout->checkoutToken($imp);
		$dec = $this->Model_Checkout->decryptToken($token);
		var_dump($str);
		var_dump($imp);
		var_dump($token);
		var_dump($dec);
	}

	public function testcost() {
		$get = json_decode($this->rajaongkir->costpro('501', 'city', '444', 'city', '1000', 'jne:tiki'), true);
		$arr = [];
		// for ($i=0; $i < $get['rajaongkir']['results']; $i++) { 
		// 	array_push($arr, array(
		// 		'code'=>$get['rajaongkir']['results'][0]['code'],
		// 		'name'=>$get['rajaongkir']['results'][0]['name'],
		// 	));
		// }
		// var_dump(print_r($get));
		echo '<pre>'; print_r(json_encode($get["rajaongkir"]["results"])); echo '</pre>';
	}

	public function getCities($ids) {
		$getCity = $this->rajaongkir->city($ids);
		$cities = json_decode($getCity, true);
		$cityList = [];
		foreach ($cities['rajaongkir']['results'] as $dt) {
			array_push($cityList, array(
				'city_id'=>$dt['city_id'],
				'province_id'=>$dt['province_id'],
				'province'=>$dt['province'],
				'type'=>$dt['type'],
				'city_name'=>$dt['city_name'],
				'postal_code'=>$dt['postal_code']
			));
		}
		$data['list'] = $cityList;
		echo json_encode($data);
	}

	public function getCost() {
		$origin = 444;//$this->input->post('origin');
		$destination = $this->input->post('destination');
		$weight = $this->input->post('weight');
		$courier = 'jne:jnt:sicepat';//$this->input->post('courier');
		$get = json_decode($this->rajaongkir->costpro($origin, 'city', $destination, 'city', $weight, $courier), true);
		$data['get'] = $get;
		$data['code'] = $get['rajaongkir']['results'][0]['code'];
		$data['name'] = $get['rajaongkir']['results'][0]['name'];
		// $data['costList'] = $get['rajaongkir']['results'][0]['costs'];
		$data['costList'] = $get['rajaongkir']['results'];
		echo json_encode($data);
	}

	public function standard() {
		$all = $this->db->join('tbl_subsubcategory', 'tbl_subsubcategory.subsub_id = tbl_product.product_category')->get_where('tbl_product', array('product_status'=>1))->result_array();
		$terbaru = [];
		foreach ($all as $dt) {
			array_push($terbaru, array(
				'pic' => $dt["product_image"],
				'ctg' => $dt["subsub_name"],
				'title' => $dt["product_title"],
				'price' => $dt["product_price"],
				'url' => $dt["product_url"].'.'.$dt["product_id"]
			));
		}
		$data["items"] = $terbaru;
		
		$this->load->view('pages/homes-standard', $data);
	}

	public function medium() {
		$shopperId = $this->session->userId;
		$data["cart"] = $this->Model_Basket->cartItemsCount($shopperId);
		$data["cartList"] = $this->Model_Basket->getCartDropList($shopperId);
		$data["subCartList"] = $this->Model_Basket->getSubTotalCartList($shopperId);
		$all = $this->db->join('tbl_subsubcategory', 'tbl_subsubcategory.subsub_id = tbl_product.product_category')->get_where('tbl_product', array('product_status'=>1))->result_array();
		$terbaru = [];
		foreach ($all as $dt) {
			array_push($terbaru, array(
				'pic' => $dt["product_image"],
				'ctg' => $dt["subsub_name"],
				'title' => $dt["product_title"],
				'price' => $dt["product_price"],
				'url' => $dt["product_url"].'.'.$dt["product_id"],
				'ids' => $dt["product_id"]
			));
		}
		$data["items"] = $terbaru;
		$this->load->view('pages/homes-medium', $data);
	}

	public function store() {
		$this->load->view('pages/store');
	}

	public function storeStandard() {
			$getCtg = $this->db->select('tbl_product.product_category, tbl_subsubcategory.subsub_name, count(tbl_product.product_id) as jumlah')->join('tbl_subsubcategory', 'tbl_subsubcategory.subsub_id = tbl_product.product_category')->group_by('tbl_product.product_category')->get('tbl_product')->result();
			$srch = $this->input->get('search');
			$order = $this->input->get('order');
			$inCtg = $this->input->get('ctg');
			$ctgQue = ($inCtg != '')?explode(',', $inCtg):NULL;
			$orderQue = ($order == 'murah')?'tbl_product.product_price ASC':'tbl_product.updated_at DESC';
			$page = ($this->uri->segment(2) != 1) ? ($this->uri->segment(2)-1)*9 : 0;
			$this->getList($orderQue, $ctgQue, $srch);
			$allcount = $this->db->count_all_results('tbl_product');
			$data["order"] = $order;
			$data["ctg"] = $getCtg;
			$data["inCtg"] = $inCtg;
			$data["allcount"] = $allcount;
			$config['base_url'] = base_url().'shop';
			$config['total_rows'] = $allcount;
			$config['reuse_query_string'] = true;
			$config['use_page_numbers'] = TRUE;
			$config["uri_segment"] = 2;
			$config['per_page'] = 9;
		  $config["num_links"] = 4;
			$config['attributes'] = array('class'=>'page-link');
		  $config['full_tag_open'] = '<ul class="store-pagination">';
		  $config['full_tag_close'] = '</ul>';
		  $config['first_tag_open'] = '<li class="page-item">';
		  $config['first_tag_close'] = '</li>';
		  // $config['prev_link'] = '<i class="fa fa-angle-left">';
		  $config['prev_tag_open'] = '<li class="page-item prev">';
		  $config['prev_tag_close'] = '</li>';
		  // $config['next_link'] = '<i class="fa fa-angle-right">';
		  $config['next_tag_open'] = '<li class="page-item">';
		  $config['next_tag_close'] = '</li>';
		  $config['last_tag_open'] = '<li class="page-item">';
		  $config['last_tag_close'] = '</li>';
		  $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		  $config['cur_tag_close'] = '</a></li>';
		  $config['num_tag_open'] = '<li class="page-item">';
			$config['num_tag_close'] = '</li>';
			$config['first_url'] = base_url().'shop/1?'.http_build_query($_GET);
			$this->pagination->initialize($config);
			$data['page'] = $page;
			$this->getList($orderQue, $ctgQue, $srch);
			$data['listdata'] = $this->db->limit($config["per_page"], $page)->get('tbl_product')->result();
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('pages/store-standard', $data);
	}

	public function storeMedium() {
		$shopperId = $this->session->userId;
		$data["cart"] = $this->Model_Basket->cartItemsCount($shopperId);
		$data["cartList"] = $this->Model_Basket->getCartDropList($shopperId);
		$data["subCartList"] = $this->Model_Basket->getSubTotalCartList($shopperId);
		$getCtg = $this->db->select('tbl_product.product_category, tbl_subsubcategory.subsub_name, count(tbl_product.product_id) as jumlah')->join('tbl_subsubcategory', 'tbl_subsubcategory.subsub_id = tbl_product.product_category')->group_by('tbl_product.product_category')->get('tbl_product')->result();
		$srch = $this->input->get('search');
		$order = $this->input->get('order');
		$inCtg = $this->input->get('ctg');
		$ctgQue = ($inCtg != '')?explode(',', $inCtg):NULL;
		$orderQue = ($order == 'murah')?'tbl_product.product_price ASC':'tbl_product.updated_at DESC';
		$page = ($this->uri->segment(2) != 1) ? ($this->uri->segment(2)-1)*9 : 0;
		$this->getList($orderQue, $ctgQue, $srch);
		$allcount = $this->db->count_all_results('tbl_product');
		$data["order"] = $order;
		$data["ctg"] = $getCtg;
		$data["inCtg"] = $inCtg;
		$data["allcount"] = $allcount;
		$config['base_url'] = base_url().'shoplist';
		$config['total_rows'] = $allcount;
		$config['reuse_query_string'] = true;
		$config['use_page_numbers'] = TRUE;
		$config["uri_segment"] = 2;
		$config['per_page'] = 9;
		$config["num_links"] = 4;
		$config['attributes'] = array('class'=>'page-link');
		$config['full_tag_open'] = '<ul class="store-pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		// $config['prev_link'] = '<i class="fa fa-angle-left">';
		$config['prev_tag_open'] = '<li class="page-item prev">';
		$config['prev_tag_close'] = '</li>';
		// $config['next_link'] = '<i class="fa fa-angle-right">';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['first_url'] = base_url().'shoplist/1?'.http_build_query($_GET);
		$this->pagination->initialize($config);
		$data['page'] = $page;
		$this->getList($orderQue, $ctgQue, $srch);
		$data['listdata'] = $this->db->limit($config["per_page"], $page)->get('tbl_product')->result();
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/store-medium', $data);
}

	public function getList($order, $ctg, $srch) {
		if(isset($srch)) {
			$this->db->like('tbl_product.product_title', $srch);
		}
		if(isset($ctg)) {
			$this->db->where_in('tbl_product.product_category', $ctg);
		}
		$this->db->where('tbl_product.product_status', 1);
		$this->db->join('tbl_subsubcategory', 'tbl_subsubcategory.subsub_id = tbl_product.product_category');
		$this->db->order_by($order);
	}

	public function details() {
		$data['itemData'] = $this->db->get_where('tbl_product', array('product_id'=>1))->row();
		$this->load->view('pages/details', $data);
	}

	public function detailsStandard() {
		$getProv = $this->rajaongkir->province();
		$data['provinces'] = json_decode($getProv, true);
		$ids = $this->uri->segment(2);
		$exp = explode('.', $ids);		
		$data['itemData'] = $this->db->get_where('tbl_product', array('product_id'=>$exp[1]))->row();
		$this->load->view('pages/details-standard', $data);
	}

	public function detailsMedium() {
		$shopperId = $this->session->userId;
		$data["cart"] = $this->Model_Basket->cartItemsCount($shopperId);
		$data["cartList"] = $this->Model_Basket->getCartDropList($shopperId);
		$data["subCartList"] = $this->Model_Basket->getSubTotalCartList($shopperId);
		$getProv = $this->rajaongkir->province();
		$data['provinces'] = json_decode($getProv, true);
		$ids = $this->uri->segment(2);
		$exp = explode('.', $ids);		
		$data['itemData'] = $this->db->get_where('tbl_product', array('product_id'=>$exp[1]))->row();
		$this->load->view('pages/details-medium', $data);
	}

	public function profiles()
	{
		$this->load->view('pages/profiles');
	}

	public function tracking()
	{
		$this->load->view('pages/tracking');
	}

	public function feed()
	{
		$this->load->view('pages/feed');
	}

	public function info()
	{
		$this->load->view('pages/info');
	}

	public function payment()
	{
		$this->load->view('pages/payment');
	}

	public function cart()
	{
		$this->load->view('pages/cart');
	}

	public function cartMedium() {
		$shopperId = $this->session->userId;
		$data["cart"] = $this->Model_Basket->cartItemsCount($shopperId);
		$data["cartList"] = $this->Model_Basket->getCartDropList($shopperId);
		$data["subCartList"] = $this->Model_Basket->getSubTotalCartList($shopperId);
		$data["cartMainList"] = $this->Model_Basket->getCartList($shopperId);
		$data["subMainList"] = $this->Model_Basket->getSubTotalMainCartList($shopperId);
		$this->load->view('pages/cart-medium', $data);
	}

	public function checkout()
	{
		$this->load->view('pages/checkout');
	}

	public function checkoutMedium() {
		$shopperId = $this->session->userId;
		$str = $this->db->select('id')->get_where('tbl_basket', array('basket_status'=>1, 'picked_status'=>1, 'shopper_id'=>$shopperId))->result_array();
		$imp = implode(',', array_map(function ($entry) {
			return $entry['id'];
		}, $str));
		if($shopperId == '') {
			redirect('account');
		}
		$getProv = $this->rajaongkir->province();
		$data['provinces'] = json_decode($getProv, true);
		$data["billing"] = $this->Model_Checkout->getBillingInfo($shopperId);
		$data["bankList"] = $this->Model_Checkout->getBankList();
		$data["checkoutItems"] = $this->Model_Checkout->getCheckoutItems($shopperId);
		$data["weightItems"] = $this->Model_Checkout->getSumWeight($shopperId);
		$data["items"] = $imp;
		$data["checkoutSum"] = 'Rp'.number_format($this->Model_Checkout->getSumCheckout($shopperId));
		$data["cart"] = $this->Model_Basket->cartItemsCount($shopperId);
		$data["cartList"] = $this->Model_Basket->getCartDropList($shopperId);
		$data["subCartList"] = $this->Model_Basket->getSubTotalCartList($shopperId);
		$data["cartMainList"] = $this->Model_Basket->getCartList($shopperId);
		$data["subMainList"] = $this->Model_Basket->getSubTotalMainCartList($shopperId);
		$this->load->view('pages/checkout-medium', $data);
	}

	public function transaction()
	{
		$this->load->view('pages/transaksi');
	}

	public function detail_trans()
	{
		$this->load->view('pages/detail_trans');
	}

	public function register()
	{
		$this->load->view('pages/register');
	}

}
