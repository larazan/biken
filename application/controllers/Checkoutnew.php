<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Checkoutnew extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: PUT, GET, POST');
		header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

		$params = array('server_key' => $this->db->get_where('tbl_settings', array('type' => 'midtrans_key'))->row()->description, 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
		$this->load->model(array('Model_Checkout'));
	}

	function test() {
		$this->load->view('pages/thankyou');
	}

	public function getCheckoutCost()
	{
		$shopperId = $this->session->userId;
		$shipping = $this->input->post('shipping');
		$sumChk = $this->Model_Checkout->getSumCheckout($shopperId);
		$sumAll = $shipping + $sumChk;
		echo json_encode(array('shipping' => number_format($shipping), 'sumchk' => $sumChk, 'sumall' => 'Rp' . number_format($sumAll)));
	}

	public function proceedCheckout()
	{
		$shopperId = $this->session->userId;
		if ($shopperId == '') {
			redirect('account');
		}
		$name = $this->input->post('shipping-name');
		$mail = $this->input->post('email');
		$tlp = $this->input->post('tel');
		$province = $this->input->post('province');
		$city = $this->input->post('city');
		$provinsi = $this->input->post('provinsi');
		$kota = $this->input->post('kota');
		$address = $this->input->post('address');
		$courier = $this->input->post('shipping');
		$bank = $this->input->post('bank');
		$ordernotes = $this->input->post('ordernotes');
		$weight = $this->input->post('weight');
		$items = $this->input->post('items');
		$shippingcost = $this->input->post('shipping-cost');
		$sumcost = $this->input->post('sum-cost');
		$sumAll = (int)$sumcost + (int)$shippingcost;
		$orderCode = date('mY') . time() . $shopperId;
		$insDt = array(
			'shopper_id' => $shopperId, 'bank_id' => $bank, 'order_name' => $name, 'order_mail' => $mail, 'order_phone' => $tlp, 'order_province' => $province, 'order_city' => $city, 'order_address' => $address, 'shipping_detail' => $courier, 'order_notes' => $ordernotes, 'order_weight' => $weight, 'order_items' => $items, 'shipping_cost' => $shippingcost, 'order_cost' => $sumcost, 'order_total' => $sumAll, 'order_date' => time(), 'order_status' => 0, 'updated_at' => time(), 'order_code' => $orderCode
		);

		// persiapan snap midtrans
		// get all data product
		$basket = $this->db->get_where('tbl_basket', array('id' => $items))->row();
		$item_qty = $basket->item_qty;
		$item_id = $basket->item_id;
		$product = $this->db->get_where('tbl_product', array('product_id' => $item_id))->row();
		$product_title = $product->product_title;
		$product_id = $product->product_id;
		$product_price = $product->product_price;

		// submit to token function
		// $this->token(
		// 	$product_id, 
		// 	$product_title, 
		// 	$item_qty, 
		// 	$product_price, 
		// 	$sumcost, 
		// 	$shippingcost, 
		// 	$name, 
		// 	$mail, 
		// 	$tlp, 
		// 	$address, 
		// 	$kota
		// );

		$ins = $this->Model_Checkout->insertOrder($insDt);
		if ($ins > 0) {
			$orderid = $this->db->insert_id();
			$this->Model_Checkout->moveFrombasket($items);
			$this->Mail->sendMailCheckout($orderid, 'Customer');
			$this->Mail->sendMailCheckout($orderid, 'Admin');
			echo json_encode(array(
				'status' => TRUE,
				'product_id' => $product_id,
				'product_title' => $product_title,
				'item_qty' => (int)$item_qty,
				'product_price' => (int)$product_price,
				'sumcost' => (int)$sumcost,
				'gross_amount' => $sumAll,
				'shippingcost' => (int)$shippingcost,
				'customer_name' => $name,
				'customer_mail' => $mail,
				'customer_tlp' => $tlp,
				'customer_address' => $address,
				'customer_kota' => $kota
			));
		} else {
			echo json_encode(array('status' => FALSE));
		}
	}

	public function token()
	{

		// Required
		// $transaction_details = array(
		//   'order_id' => rand(),
		//   'gross_amount' => $total, // no decimal allowed for creditcard
		// );

		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => $this->input->post('gross_amount'), // no decimal allowed for creditcard
		);

		// // Optional
		$item1_details = array(
			'id' => $this->input->post('id'),
			'price' => $this->input->post('price'),
			'quantity' => $this->input->post('quantity'),
			'name' => $this->input->post('name')
		);

		// Optional
		$item2_details = array(
			'id' => 'a2',
			'price' => $this->input->post('shipping'),
			'quantity' => 1,
			'name' => "Ongkir"
		);

		// Optional
		$item_details = array($item1_details, $item2_details);
		// $item_details = $this->tes();

		// Optional
		$billing_address = array(
			'first_name'    => $this->input->post('cusName'), //"Andri",
			'last_name'     => "",
			'address'       => $this->input->post('cusAddress'), //"Mangga 20",
			'city'          => $this->input->post('cusCity'), // "Jakarta",
			'postal_code'   => "",
			'phone'         => $this->input->post('cusTelp'), //"081122334455",
			'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
			'first_name'    => $this->input->post('cusName'), //"Andri",
			'last_name'     => "",
			'address'       => $this->input->post('cusAddress'), //"Mangga 20",
			'city'          => $this->input->post('cusCity'), // "Jakarta",
			'postal_code'   => "",
			'phone'         => $this->input->post('cusTelp'), //"081122334455",
			'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
			'first_name'    => $this->input->post('cusName'), //"Andri2",
			'last_name'     => "",
			'email'         => $this->input->post('cusMail'), //"andri@litani.com",
			'phone'         => $this->input->post('cusTelp'), //"081122334455",
			'billing_address'  => $billing_address,
			'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'minute',
			'duration'  => 2
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}
}
