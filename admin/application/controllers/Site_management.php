<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Site_management extends BaseController
{
	private $loca = './assets/settings/';
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
        // $this->form_validation->CI=& $this;
		$this->load->helper('text');
		$this->isLoggedIn();
    }

    function _compress($file_name) {
		// create thumbnail
		$config['image_library'] = 'gd2';
		$config['source_image'] = $this->loca.$file_name;
		$config['new_image'] = $this->loca.'2080x1000/'.$file_name;
		$config['maintain_ratio'] = TRUE;
		$config['width']         = 2080;
		$config['height']       = 1000;
	
		// $this->image_lib->initialize($config);
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}
	
	function do_update() {
		$data['description'] = $this->input->post('shop_name');
		$this->db->where('type' , 'shop_name');
		$this->db->update('tbl_settings' , $data);

		$data['description'] = $this->input->post('tagline');
		$this->db->where('type' , 'tagline');
		$this->db->update('tbl_settings' , $data);
	
		$data['description'] = $this->input->post('address');
		$this->db->where('type' , 'address');
		$this->db->update('tbl_settings' , $data);
	
		$data['description'] = $this->input->post('phone');
		$this->db->where('type' , 'phone');
		$this->db->update('tbl_settings' , $data);
	
		$data['description'] = $this->input->post('email');
		$this->db->where('type' , 'email');
		$this->db->update('tbl_settings' , $data);
	
		$data['description'] = $this->input->post('author');
		$this->db->where('type' , 'author');
		$this->db->update('tbl_settings' , $data);
	
		$data['description'] = $this->input->post('description');
		$this->db->where('type' , 'description');
		$this->db->update('tbl_settings' , $data);
	
		$data['description'] = $this->input->post('keyword');
		$this->db->where('type' , 'keyword');
		$this->db->update('tbl_settings' , $data);

		$data['description'] = $this->input->post('metatext');
		$this->db->where('type' , 'metatext');
		$this->db->update('tbl_settings' , $data);
	
		$data['description'] = $this->input->post('rekening_pembayaran');
		$this->db->where('type' , 'rekening_pembayaran');
		$this->db->update('tbl_settings' , $data);
	
		$data['description'] = $this->input->post('facebook');
		$this->db->where('type' , 'facebook');
		$this->db->update('tbl_settings' , $data);
	
		$data['description'] = $this->input->post('instagram');
		$this->db->where('type' , 'instagram');
		$this->db->update('tbl_settings' , $data);
	
	
		$flash_msg = "The file were successfully added.";
		$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
		$this->session->set_flashdata('item', $value);
		redirect('site_management/manage');             
	}
	
	function upload_logo() {
		$this->load->library('upload');
	
		$nmfile = "logo_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
	   
		$config['upload_path'] = $this->loca; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '2048'; //maksimum besar file 2M
		$config['max_width']  = '1288'; //lebar maksimum 1288 px
		$config['max_height']  = '768'; //tinggi maksimu 768 px    
		$config['file_name'] = $nmfile; //nama yang terupload nantinya
	
		$this->upload->initialize($config);
	
		if($_FILES['name_field']['name'])
		{
			if ($this->upload->do_upload('name_field'))
			{
				$gbr = $this->upload->data();
				$data = array(
				  'description' =>$gbr['file_name'],
				);
	
				$this->db->where('type' , 'logo');
				$this->db->update('settings' , $data);
	
				$nama = $this->db->get_where('settings' , array('type' =>'logo'))->row()->description;
				
				//hapus image dari server
				   
				// lokasi folder image
				$map = $_SERVER['DOCUMENT_ROOT'];
				$path = $this->loca . '/';
				//lokasi gambar secara spesifik
				$image1 = $path.$nama;
				//hapus image
				unlink($image1);
	
				//pesan yang muncul jika berhasil diupload pada session flashdata
				$flash_msg = "The logo file were successfully added.";
				$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
				$this->session->set_flashdata('item', $value);
				redirect('site_management/manage');              
			}
			else
			{
				//pesan yang muncul jika terdapat error dimasukkan pada session flashdata
				$flash_msg = "The logo file were could not be added.";
				$value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
				$this->session->set_flashdata('item', $value);
				redirect('site_management/manage');                
			}
		}
	}

	function upload_icon() {
		$this->load->library('upload');
	
		$nmfile = "icon_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
	   
		$config['upload_path'] = $this->loca; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '2048'; //maksimum besar file 2M
		$config['max_width']  = '1288'; //lebar maksimum 1288 px
		$config['max_height']  = '768'; //tinggi maksimu 768 px    
		$config['file_name'] = $nmfile; //nama yang terupload nantinya
	
		$this->upload->initialize($config);
	
		if($_FILES['name_field']['name'])
		{
			if ($this->upload->do_upload('name_field'))
			{
				$gbr = $this->upload->data();
				$data = array(
				  'description' =>$gbr['file_name'],
				);
	
				$this->db->where('type' , 'icon');
				$this->db->update('settings' , $data);
	
				$nama = $this->db->get_where('settings' , array('type' =>'icon'))->row()->description;
				
				//hapus image dari server
				   
				// lokasi folder image
				$map = $_SERVER['DOCUMENT_ROOT'];
				$path = $this->loca . '/';
				//lokasi gambar secara spesifik
				$image1 = $path.$nama;
				//hapus image
				unlink($image1);
	
				//pesan yang muncul jika berhasil diupload pada session flashdata
				$flash_msg = "The icon file were successfully added.";
				$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
				$this->session->set_flashdata('item', $value);
				redirect('site_management/manage');              
			}
			else
			{
				//pesan yang muncul jika terdapat error dimasukkan pada session flashdata
				$flash_msg = "The file were could not be added.";
				$value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
				$this->session->set_flashdata('item', $value);
				redirect('site_management/manage');                
			}
		}
	}
	
	function upload_background() {
		$this->load->library('upload');
	
		$nmfile = "bg_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
	   
		$config['upload_path'] = $this->loca; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '2048'; //maksimum besar file 2M
		$config['max_width']  = '1288'; //lebar maksimum 1288 px
		$config['max_height']  = '768'; //tinggi maksimu 768 px    
		$config['file_name'] = $nmfile; //nama yang terupload nantinya
	
		$this->upload->initialize($config);
	
		if($_FILES['name_field2']['name'])
		{
			if ($this->upload->do_upload('name_field2'))
			{
				$gbr = $this->upload->data();
				$data = array(
				  'description' =>$gbr['file_name'],
				);
	
				$this->db->where('type' , 'homepage_background');
				$this->db->update('settings' , $data);
	
				$nama = $this->db->get_where('settings' , array('type' =>'homepage_background'))->row()->description;
				
				//hapus image dari server
				   
				// lokasi folder image
				$map = $_SERVER['DOCUMENT_ROOT'];
				$path = $this->loca . '/';
				$path2 = $this->loca . '/2080x1000/';
				//lokasi gambar secara spesifik
				$image1 = $path.$nama;
				$image2 = $path2.$nama;
				//hapus image
				unlink($image1);
				unlink($image2);
	
				$this->_compress($nmfile);
				//pesan yang muncul jika berhasil diupload pada session flashdata
				$flash_msg = "The file were successfully added.";
				$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
				$this->session->set_flashdata('item', $value);
				redirect('site_management/manage');              
			}
			else
			{
				//pesan yang muncul jika terdapat error dimasukkan pada session flashdata
				$flash_msg = "The file were could not be added.";
				$value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
				$this->session->set_flashdata('item', $value);
				redirect('site_management/manage');                
			}
		}
	}

    public function manage() {
		$this->load->library('session');

		$data['flash'] = $this->session->flashdata('item');
        $this->template->views('site/manage', $data);
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