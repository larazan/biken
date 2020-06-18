<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class RajaOngkir extends BaseController
{
	 
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
        // $this->form_validation->CI=& $this;
		$this->load->helper('text');
        $this->isLoggedIn();
        $this->key_api_rajaongkir = $this->db->get_where('tbl_settings', array('type' => 'rajaongkir_key'))->row()->description;
    }

    function _api_ongkir_post($origin, $des, $qty, $cour)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=" . $origin . "&destination=" . $des . "&weight=" . $qty . "&courier=" . $cour,
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				/* masukan api key disini*/
				"key: $this->key_api_rajaongkir"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return $err;
		} else {
			return $response;
		}
	}





	function _api_ongkir($data)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			//CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=12",
			//CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
			CURLOPT_URL => "http://api.rajaongkir.com/starter/" . $data,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				/* masukan api key disini*/
				"key: $this->key_api_rajaongkir"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return  $err;
		} else {
			return $response;
		}
	}


	public function provinsi()
	{

		$provinsi = $this->_api_ongkir('province');
		$data = json_decode($provinsi, true);
		echo json_encode($data['rajaongkir']['results']);
	}


	public function lokasi()
	{

		$this->load->view('ongkir');
	}

	public function kota($provinsi = "")
	{
		if (!empty($provinsi)) {
			if (is_numeric($provinsi)) {
				$kota = $this->_api_ongkir('city?province=' . $provinsi);
				$data = json_decode($kota, true);
				echo json_encode($data['rajaongkir']['results']);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	public function tarif($origin, $des, $qty, $cour)
	{
		$berat = $qty * 1000;
		$tarif = $this->_api_ongkir_post($origin, $des, $berat, $cour);
		$data = json_decode($tarif, true);
		echo json_encode($data['rajaongkir']['results']);
	}

	function do_update() {
		$data['description'] = $this->input->post('rajaongkir_key');
		$this->db->where('type' , 'rajaongkir_key');
		$this->db->update('tbl_settings' , $data);
	
		$flash_msg = "The key were successfully added.";
		$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
		$this->session->set_flashdata('item', $value);
		redirect('rajaOngkir/manage');             
	}

    public function manage() {
		$this->load->library('session');

		$data['flash'] = $this->session->flashdata('item');
        $this->template->views('rajaongkir/manage', $data);
    }     

	function get($order_by)
	{
		$this->load->model('Mdl_site');
		$query = $this->Mdl_site->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by)
	{
		if ((!is_numeric($limit)) || (!is_numeric($offset))) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_site');
		$query = $this->Mdl_site->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_site');
		$query = $this->Mdl_site->get_where($id);
		return $query;
	}

	// function get_data_where($key) {
	//     $this->load->model('Mdl_site');
	//     $query = $this->Mdl_site->get_data_where($key);
	//     return $query;
	// }

	function get_where_custom($col, $value)
	{
		$this->load->model('Mdl_site');
		$query = $this->Mdl_site->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data)
	{
		$this->load->model('Mdl_site');
		$this->Mdl_site->_insert($data);
	}

	function _update($id, $data)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_site');
		$this->Mdl_site->_update($id, $data);
	}

	function _delete($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_site');
		$this->Mdl_site->_delete($id);
	}

	function count_where($column, $value)
	{
		$this->load->model('Mdl_site');
		$count = $this->Mdl_site->count_where($column, $value);
		return $count;
	}

	function get_max()
	{
		$this->load->model('Mdl_site');
		$max_id = $this->Mdl_site->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query)
	{
		$this->load->model('Mdl_site');
		$query = $this->Mdl_site->_custom_query($mysql_query);
		return $query;
	}

	function count_all()
	{
		$this->load->model('Mdl_site');
		$count = $this->Mdl_site->_count_all();
		return $count;
	}

}