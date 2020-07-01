<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Location extends BaseController
{

	function __construct()
	{
		parent::__construct();
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

	public function tes() {	
		$id = $this->getProvinsi();
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=$id",
			//CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
			// CURLOPT_URL => "http://api.rajaongkir.com/starter/" . $data,
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
			// return $response;
			var_dump($response);
		}
	}
	
	public function getProvinsi() {
		$id_location = 1;
		$provinsi_id = $this->db->where('id_location', $id_location)->get('tbl_location')->row()->provinsi;
		if ($provinsi_id != '') {
			$id = $provinsi_id;
		} else {
			$id = '';
		}
		return $id;
	}

	public function getKota() {
		$id_location = 1;
		$kabupaten_id = $this->db->where('id_location', $id_location)->get('tbl_location')->row()->kabupaten;
		if ($kabupaten_id != '') {
			$id = $kabupaten_id;
		} else {
			$id = '';
		}
		return $id;
	}

	public function provinsi()
	{
		$provinsi = $this->_api_ongkir('province');
		$data = json_decode($provinsi, true);
		echo json_encode($data['rajaongkir']['results']);
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

	public function getCity() {
		$provinsi = $this->getProvinsi();
		$kota = $this->getKota();
		if (!empty($provinsi)) {
			if (is_numeric($provinsi)) {
				$kota = $this->_api_ongkir('city?id='.$kota.'&province=' . $provinsi);
				$data = json_decode($kota, true);
				echo json_encode($data['rajaongkir']['results']);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	public function manage()
	{
		$update_id = 1;
		$data = $this->fetch_data_from_db($update_id);
		$data['provinsi'] = $data['provinsi'];
		$data['kabupaten'] = $data['kabupaten'];
		$data['kecamatan'] = $data['kecamatan'];
		$data['query'] = $this->get_where('1');
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('location/manage', $data);
	}

	public function submit()
	{
		$this->load->library('session');

		$update_id = 1;
		$submit = $this->input->post('submit');

		if ($submit == "Submit") {
			// process the form
			$this->load->library('form_validation');
			$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
			
			if ($this->form_validation->run() == TRUE) {
				$data = $this->fetch_data_from_post();

				if (is_numeric($update_id)) {
					$data['updated_at'] = time();
					$this->_update($update_id, $data);
					$flash_msg = "The location were successfully updated.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					redirect('location/manage');
				} else {
					$this->_insert($data);
					$update_id = $this->get_max();

					$flash_msg = "The location was successfully added.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					redirect('location/manage');
				}
			}
		}

		if ((is_numeric($update_id)) && ($submit != "Submit")) {
			$data = $this->fetch_data_from_db($update_id);
		} else {
			$data = $this->fetch_data_from_post();
		}

		$data['update_id'] = $update_id;
		$data['flash'] = $this->session->flashdata('item');

		$this->template->views('location/manage', $data);
	}

	function fetch_data_from_post()
	{
		$data['provinsi'] = $this->input->post('provinsi', true);
		$data['kabupaten'] = $this->input->post('kabupaten', true);
		$data['created_at'] = time();
		return $data;
	}

	function fetch_data_from_db($updated_id)
	{
		$query = $this->get_where($updated_id);
		foreach ($query->result() as $row) {
			$data['id_location'] = $row->id_location;
			$data['provinsi'] = $row->provinsi;
			$data['kabupaten'] = $row->kabupaten;
			$data['kecamatan'] = $row->kecamatan;
			$data['created_at'] = $row->created_at;
			$data['updated_at'] = $row->updated_at;
		}

		if (!isset($data)) {
			$data = "";
		}

		return $data;
	}

	function get($order_by)
	{
		$this->load->model('Mdl_location');
		$query = $this->Mdl_location->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by)
	{
		if ((!is_numeric($limit)) || (!is_numeric($offset))) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_location');
		$query = $this->Mdl_location->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_location');
		$query = $this->Mdl_location->get_where($id);
		return $query;
	}

	// function get_data_where($key) {
	//     $this->load->model('Mdl_location');
	//     $query = $this->Mdl_location->get_data_where($key);
	//     return $query;
	// }

	function get_where_custom($col, $value)
	{
		$this->load->model('Mdl_location');
		$query = $this->Mdl_location->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data)
	{
		$this->load->model('Mdl_location');
		$this->Mdl_location->_insert($data);
	}

	function _update($id, $data)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_location');
		$this->Mdl_location->_update($id, $data);
	}

	function _delete($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_location');
		$this->Mdl_location->_delete($id);
	}

	function count_where($column, $value)
	{
		$this->load->model('Mdl_location');
		$count = $this->Mdl_location->count_where($column, $value);
		return $count;
	}

	function get_max()
	{
		$this->load->model('Mdl_location');
		$max_id = $this->Mdl_location->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query)
	{
		$this->load->model('Mdl_location');
		$query = $this->Mdl_location->_custom_query($mysql_query);
		return $query;
	}

	function count_all()
	{
		$this->load->model('Mdl_location');
		$count = $this->Mdl_location->_count_all();
		return $count;
	}
}
