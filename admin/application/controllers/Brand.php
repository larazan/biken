<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Brand extends BaseController
{

	private $loca = './assets/brand/';

	function __construct()
	{
		parent::__construct();
		$this->isLoggedIn();
	}

	public function index()
	{
		$this->template->views('Brand/manage');
	}

	public function manage()
	{
		$mysql_query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $data['query'] = $this->_custom_query($mysql_query);
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('Brand/manage', $data);
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

	public function create()
	{
		$this->load->library('session');

		$update_id = $this->uri->segment(3);
		$submit = $this->input->post('submit');

		if ($submit == "Cancel") {
			redirect('Brand/manage');
		}

		if ($submit == "Submit") {
			// process the form
			$this->load->library('form_validation');
			$this->form_validation->set_rules('brand_name', 'Brand name', 'trim|required');
			
			if ($this->form_validation->run() == TRUE) {

				// ganti titik dengan _
                $filename = $_FILES['brand_img']['name'];
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

				// jika ada file yg di upload
                if ($_FILES['brand_img']['name'] != '') {
                    if($_FILES['brand_img']['name'])
                    {
                        if ($this->upload->do_upload('brand_img'))
                        {
                            $data = array(
                                'brand_name' => $this->input->post('brand_name', true),
								'brand_img' => $nmfile,
								'brand_url' => $this->input->post('brand_url', true),
								'brand_description' => $this->input->post('brand_description', true),
                                'status' =>  $this->input->post('status', true),
                                'created_at' => time(),
                                'updated_at' => time()
                            );                            

                            if (is_numeric($update_id)) {
                                $data_old = $this->fetch_data_from_db($update_id);

                                $brand_img = $data_old['brand_img'];

                                // hapus gambar
                                $this->hapus_gambar($brand_img);
								$data['updated_at'] = time();
                                $this->_update($update_id, $data);

                                $flash_msg = "The brand were successfully updated.";
                                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                                $this->session->set_flashdata('item', $value);
								// redirect('brand/create/'.$update_id);
								redirect('brand/manage');

                            } else {
                                $this->_insert($data);
                                $update_id = $this->get_max();

                                $flash_msg = "The brand was successfully added.";
                                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                                $this->session->set_flashdata('item', $value);
								// redirect('brand/create/'.$update_id);
								redirect('brand/manage');
                            }
                            

                        } else {
                            $flash_msg = "Upload failed!.";
                            $value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                            $this->session->set_flashdata('item', $value);
                            redirect('brand/create/'.$update_id);
                        }
                    }
                } else {
                    $data = array(
                        'brand_name' => $this->input->post('brand_name', true),
						// 'brand_img' => $nmfile,
						'brand_url' => $this->input->post('brand_url', true),
						'brand_description' => $this->input->post('brand_description', true),
						'status' =>  $this->input->post('status', true),
						'created_at' => time(),
						'updated_at' => time()
                    );   

                    if (is_numeric($update_id)) {
						$data['updated_at'] = time();
                        $this->_update($update_id, $data);
                        $flash_msg = "The brand were successfully updated.";
                        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
						// redirect('brand/create/'.$update_id);
						redirect('brand/manage');
                    } else {
                        $this->_insert($data);
                        $update_id = $this->get_max();

                        $flash_msg = "The brand was successfully added.";
                        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
						// redirect('brand/create/'.$update_id);
						redirect('brand/manage');
                    }

                }

			
			}
		}

		if ((is_numeric($update_id)) && ($submit != "Submit")) {
			$data = $this->fetch_data_from_db($update_id);
		} else {
			$data = $this->fetch_data_from_post();
			$data['brand_img'] = '';
		}

		if (!is_numeric($update_id)) {
			$data['headline'] = "Tambah Brand";
		} else {
			$data['headline'] = "Edit Brand";
		}


		$data['update_id'] = $update_id;
		$data['flash'] = $this->session->flashdata('item');

		$this->template->views('Brand/create', $data);
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

			$flash_msg = "The brand were successfully deleted.";
			$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
			$this->session->set_flashdata('item', $value);

			redirect('Brand/manage');
		}
	}

	function _process_delete($update_id){
        $data = $this->fetch_data_from_db($update_id);
        $big_pic = $data['brand_img'];
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
        $data['brand_img'] = "";
        $this->_update($update_id, $data);
    }

	function fetch_data_from_post()
	{
		$data['brand_name'] = $this->input->post('brand_name', true);
		$data['status'] = $this->input->post('status', true);
		$data['created_at'] = time();
		$data['updated_at'] = time();
		return $data;
	}

	function fetch_data_from_db($updated_id)
	{
		$query = $this->get_where($updated_id);
		foreach ($query->result() as $row) {
			$data['brand_id'] = $row->brand_id;
			$data['brand_name'] = $row->brand_name;
			$data['brand_img'] = $row->brand_img;
			$data['status'] = $row->status;
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
		$this->load->model('Mdl_brand');
		$query = $this->Mdl_brand->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by)
	{
		if ((!is_numeric($limit)) || (!is_numeric($offset))) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_brand');
		$query = $this->Mdl_brand->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_brand');
		$query = $this->Mdl_brand->get_where($id);
		return $query;
	}

	// function get_data_where($key) {
	//     $this->load->model('Mdl_brand');
	//     $query = $this->Mdl_brand->get_data_where($key);
	//     return $query;
	// }

	function get_where_custom($col, $value)
	{
		$this->load->model('Mdl_brand');
		$query = $this->Mdl_brand->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data)
	{
		$this->load->model('Mdl_brand');
		$this->Mdl_brand->_insert($data);
	}

	function _update($id, $data)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_brand');
		$this->Mdl_brand->_update($id, $data);
	}

	function _delete($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_brand');
		$this->Mdl_brand->_delete($id);
	}

	function count_where($column, $value)
	{
		$this->load->model('Mdl_brand');
		$count = $this->Mdl_brand->count_where($column, $value);
		return $count;
	}

	function get_max()
	{
		$this->load->model('Mdl_brand');
		$max_id = $this->Mdl_brand->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query)
	{
		$this->load->model('Mdl_brand');
		$query = $this->Mdl_brand->_custom_query($mysql_query);
		return $query;
	}

	function count_all()
	{
		$this->load->model('Mdl_brand');
		$count = $this->Mdl_brand->_count_all();
		return $count;
	}
}
