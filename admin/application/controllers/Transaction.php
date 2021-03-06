<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Transaction extends BaseController
{

	function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'your_server_key', 'production' => false);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->helper('url');
		$this->isLoggedIn();
	}

	public function index()
	{
		$this->template->views('transaction/manage');
    }
    
    // public function detail()
	// {
	// 	$this->template->views('transaction/detail');
	// }
	
	public function invoice()
	{
		$this->template->views('transaction/invoice');
    }

	public function manage()
	{
		$mysql_query = "SELECT * FROM tbl_requesttransaksi ORDER BY id DESC";
        $data['query'] = $this->_custom_query($mysql_query);
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('transaction/manage', $data);
	}

	function _set_to_opened($update_id) {
        $data['opened'] = 1;
        $this->_update($update_id, $data);
    }

	public function detail()
	{
		$this->load->library('session');

		$update_id = $this->uri->segment(3);
		$submit = $this->input->post('submit');

		if ($submit == "Cancel") {
			redirect('Transaction/manage');
		}

		if ($submit == "Submit") {
			// process the form
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'name', 'trim|required');
			
			if ($this->form_validation->run() == TRUE) {
				$data = $this->fetch_data_from_post();

				if (is_numeric($update_id)) {
					$this->_update($update_id, $data);
					$flash_msg = "The size were successfully updated.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					redirect('Transaction/create/' . $update_id);
				} else {
					$this->_insert($data);
					$update_id = $this->get_max();

					$flash_msg = "The size was successfully added.";
					$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
					$this->session->set_flashdata('item', $value);
					redirect('Transaction/create/' . $update_id);
				}
			}
		}

		if ((is_numeric($update_id)) && ($submit != "Submit")) {
			$data = $this->fetch_data_from_db($update_id);
		} else {
			$data = $this->fetch_data_from_post();
		}

		if (!is_numeric($update_id)) {
			$data['headline'] = "Tambah transaction";
		} else {
			$data['headline'] = "Edit transaction";
		}

		$this->_set_to_opened($update_id);
		$data['update_id'] = $update_id;
		$data['flash'] = $this->session->flashdata('item');

		$this->template->views('transaction/detail', $data);
	}

	function delete()
	{	
		$this->load->library('session');
		$update_id = $this->input->post('id');

		$submit = $this->input->post('submit', TRUE);
		if ($submit == "Delete") {
			// delete the item record from db
			$this->_delete($update_id);

			$flash_msg = "The transaction were successfully deleted.";
			$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
			$this->session->set_flashdata('item', $value);

			redirect('Transaction/manage');
		}
	}

	function fetch_data_from_post()
	{
		$data['name'] = $this->input->post('name', true);
		$data['size_status'] = $this->input->post('size_status', true);
		return $data;
	}

	function fetch_data_from_db($updated_id)
	{
		$query = $this->get_where($updated_id);
		foreach ($query->result() as $row) {
			$data['id'] = $row->id;
			$data['status_code'] = $row->status_code;
			$data['status_message'] = $row->status_message;
			$data['transaction_id'] = $row->transaction_id;
			$data['order_id'] = $row->order_id;
			$data['gross_amount'] = $row->gross_amount;
			$data['payment_type'] = $row->payment_type;
			$data['transaction_time'] = $row->transaction_time;
			$data['transaction_status'] = $row->transaction_status;
			$data['bank'] = $row->bank;
			$data['va_number'] = $row->va_number;
			$data['fraud_status'] = $row->fraud_status;
			$data['bca_va_number'] = $row->bca_va_number;
			$data['permata_va_number'] = $row->permata_va_number;
			$data['pdf_url'] = $row->pdf_url;
			$data['finish_redirect_url'] = $row->finish_redirect_url;
			$data['bill_key'] = $row->bill_key;
			$data['biller_code'] = $row->biller_code;
			$data['opened'] = $row->opened;
		}

		if (!isset($data)) {
			$data = "";
		}

		return $data;
	}

	function get($order_by)
	{
		$this->load->model('Mdl_transaction');
		$query = $this->Mdl_transaction->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by)
	{
		if ((!is_numeric($limit)) || (!is_numeric($offset))) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_transaction');
		$query = $this->Mdl_transaction->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_transaction');
		$query = $this->Mdl_transaction->get_where($id);
		return $query;
	}

	// function get_data_where($key) {
	//     $this->load->model('Mdl_transaction');
	//     $query = $this->Mdl_transaction->get_data_where($key);
	//     return $query;
	// }

	function get_where_custom($col, $value)
	{
		$this->load->model('Mdl_transaction');
		$query = $this->Mdl_transaction->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data)
	{
		$this->load->model('Mdl_transaction');
		$this->Mdl_transaction->_insert($data);
	}

	function _update($id, $data)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_transaction');
		$this->Mdl_transaction->_update($id, $data);
	}

	function _delete($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_transaction');
		$this->Mdl_transaction->_delete($id);
	}

	function count_where($column, $value)
	{
		$this->load->model('Mdl_transaction');
		$count = $this->Mdl_transaction->count_where($column, $value);
		return $count;
	}

	function get_max()
	{
		$this->load->model('Mdl_transaction');
		$max_id = $this->Mdl_transaction->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query)
	{
		$this->load->model('Mdl_transaction');
		$query = $this->Mdl_transaction->_custom_query($mysql_query);
		return $query;
	}

	function count_all()
	{
		$this->load->model('Mdl_transaction');
		$count = $this->Mdl_transaction->_count_all();
		return $count;
	}

	public function process()
    {
    	$order_id = $this->input->post('order_id');
    	$action = $this->input->post('action');
    	switch ($action) {
		    case 'status':
		        $this->status($order_id);
		        break;
		    case 'approve':
		        $this->approve($order_id);
		        break;
		    case 'expire':
		        $this->expire($order_id);
		        break;
		   	case 'cancel':
		        $this->cancel($order_id);
		        break;
		}

    }

	public function status($order_id)
	{
		echo 'test get status </br>';
		echo '<pre>';
		print_r ($this->veritrans->status($order_id) );
		echo '</pre>';

		/////////////////////////////////////////////////
		$response = $this->veritrans->status($order_id);
		$transaction_status = $response->transaction_status;

		$update = $this->db->update("update tbl_requesttransaksi set transaction_status='$transaction_status' where order_id='$order_id");

		if($update) {
			echo "status transaksi berhasil di update";
		} else {
			echo "status transaksi gagal di update";
		}
	}

	public function cancel($order_id)
	{
		echo 'test cancel trx </br>';
		echo $this->veritrans->cancel($order_id);
	}

	public function approve($order_id)
	{
		echo 'test get approve </br>';
		print_r ($this->veritrans->approve($order_id) );
	}

	public function expire($order_id)
	{
		echo 'test get expire </br>';
		print_r ($this->veritrans->expire($order_id) );
	}

}
