<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Banner extends BaseController
{

    private $loca = './assets/banner/';

	function __construct()
	{
        parent::__construct();
        $this->load->library('form_validation');
        // $this->form_validation->CI=& $this;
        $this->load->helper('text');
        $this->isLoggedIn();
	}

	public function index()
	{
		$this->template->views('banner/manage');
	}

	public function manage()
	{
		$mysql_query = "SELECT * FROM tbl_banner ORDER BY banner_id DESC";
        $data['query'] = $this->_custom_query($mysql_query);
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('banner/manage', $data);
    }
    
    function hapus_gambar($image) {
        // lokasi folder image
        $path_real = $this->loca;
        $path_compress = $path_real.'870x342/';
        //lokasi gambar secara spesifik
        $image1 = $path_real.$image;
        $image2 = $path_compress.$image;
        //hapus image
        unlink($image1);
        unlink($image2);
    }

	function create() {
        error_reporting(0);
        $this->load->library('session');

        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit');

        if ($submit == "Cancel") {
            redirect('banner/manage');
        }

        if ($submit == "Submit") {

            // var_dump($_FILES['banner_img']['name'] == '');
            // die();

            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('banner_name', 'Nama banner', 'trim|required');
            // $this->form_validation->set_rules('body', 'Isi Artikel', 'required');
            // $this->form_validation->set_rules('banner_img', 'Gambar', 'required|callback_upload_image');

            if ($this->form_validation->run() == TRUE) {
                // $data = $this->fetch_data_from_post();

                // ganti titik dengan _
                $filename = $_FILES['banner_img']['name'];
                $new_filename = str_replace(".", "_", substr($filename, 0, strrpos($filename, ".")) ).".".end(explode('.',$filename));
                $nama_baru = str_replace(' ', '_', $new_filename);
                
                $nmfile = date("ymdHis").'_'.$nama_baru;
                $loc = $this->loca;

                $config['upload_path']   = $loc;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['overwrite'] = FALSE;
                $config['remove_spaces'] = TRUE;
                $config['file_name'] = $nmfile;

                $this->load->library('upload');
                $this->upload->initialize($config);

                $tags = $this->input->post('tag');

                // jika ada file yg di upload
                if ($_FILES['banner_img']['name'] != '') {
                    if($_FILES['banner_img']['name'])
                    {
                        if ($this->upload->do_upload('banner_img'))
                        {
                            $data = array(
                                'banner_name' => $this->input->post('banner_name', true),
                                'banner_img' => $nmfile,
                                'banner_status' =>  $this->input->post('banner_status', true),
                                'created_at' => time(),
                                'updated_at' => time()
                            );                            

                            if (is_numeric($update_id)) {
                                $data_old = $this->fetch_data_from_db($update_id);

                                $banner_img = $data_old['banner_img'];

                                // hapus gambar
                                $this->hapus_gambar($banner_img);

                                $this->_update($update_id, $data);

                                $flash_msg = "The banner were successfully updated.";
                                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                                $this->session->set_flashdata('item', $value);
                                // redirect('banner/create/'.$update_id);
                                redirect('banner/manage');

                            } else {
                                $this->_insert($data);
                                $update_id = $this->get_max();

                                $flash_msg = "The banner was successfully added.";
                                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                                $this->session->set_flashdata('item', $value);
                                // redirect('banner/create/'.$update_id);
                                redirect('banner/manage');
                            }
                            

                        } else {
                            $flash_msg = "Upload failed!.";
                            $value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                            $this->session->set_flashdata('item', $value);
                            redirect('banner/create/'.$update_id);
                        }
                    }
                } else {
                    $data = array(
                        'banner_name' => $this->input->post('banner_name', true),
                        // 'banner_img' => $nmfile,
                        'banner_status' =>  $this->input->post('banner_status', true),
                        'created_at' => time(),
                        'updated_at' => time()
                    );   

                    if (is_numeric($update_id)) {
                        $this->_update($update_id, $data);

                        $flash_msg = "The banner were successfully updated.";
                        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        // redirect('banner/create/'.$update_id);
                        redirect('banner/manage');
                    } else {
                        $this->_insert($data);
                        $update_id = $this->get_max();

                        $flash_msg = "The banner was successfully added.";
                        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        // redirect('banner/create/'.$update_id);
                        redirect('banner/manage');
                    }

                }

            }
        }

        if ((is_numeric($update_id)) && ($submit!="Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Tambah Banner";
        } else {
            $data['headline'] = "Update Banner";
        }

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $this->template->views('banner/create', $data);
    }

	function delete()
	{	
        $this->load->library('session');
        $update_id = $this->input->post('id');
        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Delete") {
            // delete featured image
            $this->_process_delete($update_id);

            // delete the item record from db
            $this->_delete($update_id); 
            
            $flash_msg = "The banner were successfully deleted.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            redirect('banner/manage');
        }
    }
    
    function _process_delete($update_id){
        $data = $this->fetch_data_from_db($update_id);
        $big_pic = $data['banner_img'];
        $small_pic = $big_pic;

        $path_real = $this->loca;
        $path_compress = $path_real.'870x342/';

        $big_pic_path = $path_real.$big_pic;
        $small_pic_path = $path_compress.$small_pic;

        if (file_exists($big_pic_path)) {
            unlink($big_pic_path);
        } 

        if (file_exists($small_pic_path)) {
            unlink($small_pic_path);
        } 

        unset($data);
        $data['banner_img'] = "";
        $this->_update($update_id, $data);
    }

	function fetch_data_from_post()
	{
        $data['banner_name'] = $this->input->post('banner_name', true);
        $data['banner_caption'] = $this->input->post('banner_caption', true);
        $data['banner_link'] = $this->input->post('banner_link', true);
        $data['banner_status'] =  $this->input->post('banner_status', true);
        $data['created_at'] = time();
        $data['updated_at'] = time();
		return $data;
	}

	function fetch_data_from_db($updated_id)
	{
		$query = $this->get_where($updated_id);
		foreach ($query->result() as $row) {
			$data['banner_id'] = $row->banner_id;
            $data['banner_name'] = $row->banner_name;
            $data['banner_img'] = $row->banner_img;
            $data['banner_caption'] = $row->banner_caption;
            $data['banner_link'] = $row->banner_link;
            $data['banner_status'] = $row->banner_status;
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
		$this->load->model('Mdl_banner');
		$query = $this->Mdl_banner->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by)
	{
		if ((!is_numeric($limit)) || (!is_numeric($offset))) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_banner');
		$query = $this->Mdl_banner->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_banner');
		$query = $this->Mdl_banner->get_where($id);
		return $query;
	}

	// function get_data_where($key) {
	//     $this->load->model('Mdl_banner');
	//     $query = $this->Mdl_banner->get_data_where($key);
	//     return $query;
	// }

	function get_where_custom($col, $value)
	{
		$this->load->model('Mdl_banner');
		$query = $this->Mdl_banner->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data)
	{
		$this->load->model('Mdl_banner');
		$this->Mdl_banner->_insert($data);
	}

	function _update($id, $data)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_banner');
		$this->Mdl_banner->_update($id, $data);
	}

	function _delete($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_banner');
		$this->Mdl_banner->_delete($id);
	}

	function count_where($column, $value)
	{
		$this->load->model('Mdl_banner');
		$count = $this->Mdl_banner->count_where($column, $value);
		return $count;
	}

	function get_max()
	{
		$this->load->model('Mdl_banner');
		$max_id = $this->Mdl_banner->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query)
	{
		$this->load->model('Mdl_banner');
		$query = $this->Mdl_banner->_custom_query($mysql_query);
		return $query;
	}

	function count_all()
	{
		$this->load->model('Mdl_banner');
		$count = $this->Mdl_banner->_count_all();
		return $count;
	}
}
