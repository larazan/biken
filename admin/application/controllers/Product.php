<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Product extends BaseController
{

	private $loca = './assets/product/';

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
		$this->template->views('product/manage');
	}

	public function manage()
	{
		$mysql_query = "SELECT * FROM tbl_product ORDER BY product_id DESC";
        $data['query'] = $this->_custom_query($mysql_query);
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('product/manage', $data);
	}

	function update_viewer($update_id) {
		// get current viewer value
		$data = $this->fetch_data_from_db($update_id);
		$curr_view = $data['product_view'];
		//update database
		$update_data['product_view'] = $curr_view + 1;
		$this->_update($update_id, $update_data);
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
            redirect('product/manage');
        }

        if ($submit == "Submit") {

            // var_dump($_FILES['featured_image']['name'] == '');
            // die();

            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('product_title', 'Nama Product', 'trim|required');
            $this->form_validation->set_rules('sku', 'SKU', 'trim|required');
            $this->form_validation->set_rules('product_price', 'Price', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                // $data = $this->fetch_data_from_post();

                // ganti titik dengan _
                $filename = $_FILES['product_image']['name'];
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
                if ($_FILES['product_image']['name'] != '') {
                    if($_FILES['product_image']['name'])
                    {
                        if ($this->upload->do_upload('product_image'))
                        {
                            $data = array(
								'product_title' => $this->input->post('product_title', true),
								'sku' => $this->input->post('sku', true),
                                'product_url' => url_title($this->input->post('product_title', true)),
                                'product_description' => $this->input->post('product_description', true),
								'product_price' => $this->input->post('product_price', true),
								'product_quantity' => $this->input->post('product_quantity', true),
								'product_category' => $this->input->post('product_category', true),
								'product_brand' => $this->input->post('product_brand', true),
								'product_view' => $this->input->post('product_view', true),
                                'product_image' => $nmfile,
                                'product_status' =>  $this->input->post('product_status', true),
                                'created_at' => time(),
                                'updated_at' => time()
                            );                            

                            if (is_numeric($update_id)) {
                                $data_old = $this->fetch_data_from_db($update_id);

                                $featured_image = $data_old['product_image'];

                                // hapus gambar
                                $this->hapus_gambar($featured_image);

                                $this->_update($update_id, $data);

                                $flash_msg = "The product were successfully updated.";
                                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                                $this->session->set_flashdata('item', $value);
                                redirect('product/create/'.$update_id);

                            } else {
                                $this->_insert($data);
                                $update_id = $this->get_max();

                                $flash_msg = "The product was successfully added.";
                                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                                $this->session->set_flashdata('item', $value);
                                redirect('product/create/'.$update_id);
                            }
                            

                        } else {
                            $flash_msg = "Upload failed!.";
                            $value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                            $this->session->set_flashdata('item', $value);
                            redirect('product/create/'.$update_id);
                        }
                    }
                } else {
                    $data = array(
                        'product_title' => $this->input->post('product_title', true),
						'sku' => $this->input->post('sku', true),
						'product_url' => url_title($this->input->post('product_title', true)),
						'product_description' => $this->input->post('product_description', true),
						'product_price' => $this->input->post('product_price', true),
						'product_quantity' => $this->input->post('product_quantity', true),
						'product_category' => $this->input->post('product_category', true),
						'product_brand' => $this->input->post('product_brand', true),
						'product_view' => $this->input->post('product_view', true),
						'product_status' =>  $this->input->post('product_status', true),
						'created_at' => time(),
						'updated_at' => time()
                    );

                    if (is_numeric($update_id)) {
                        $this->_update($update_id, $data);

                        $flash_msg = "The product were successfully updated.";
                        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('product/create/'.$update_id);
                    } else {
                        $this->_insert($data);
                        $update_id = $this->get_max();

                        $flash_msg = "The product was successfully added.";
                        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('product/create/'.$update_id);
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
            $data['headline'] = "Tambah Product";
        } else {
            $data['headline'] = "Update Product";
		}
		
		$data['categories'] = $this->_custom_query("SELECT * FROM tbl_category ORDER BY id DESC");
		$data['brands'] = $this->_custom_query("SELECT * FROM tbl_brand ORDER BY brand_id DESC");

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $this->template->views('product/create', $data);
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

            //DELETE TAG POST
            $this->db->delete('post_tag', array('post_id' => $update_id));
            
            $flash_msg = "The product were successfully deleted.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            redirect('product/manage');
        }
    }
    
    function _process_delete($update_id){
        $data = $this->fetch_data_from_db($update_id);
        $big_pic = $data['product_image'];
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
        $data['product_image'] = "";
        $this->_update($update_id, $data);
    }

	function fetch_data_from_post()
	{
		$data['product_title'] = $this->input->post('product_title', true);
		$data['sku'] = $this->input->post('sku', true);
		$data['product_description'] = $this->input->post('product_description', true);
		$data['product_image'] = $this->input->post('product_image', true);
		$data['product_price'] = $this->input->post('product_price', true);
		$data['product_quantity'] = $this->input->post('product_quantity', true);
		$data['product_category'] = $this->input->post('product_category', true);
		$data['product_brand'] = $this->input->post('product_brand', true);
		$data['product_view'] = $this->input->post('product_view', true);
		$data['product_url'] = url_title($this->input->post('product_title', true));
		$data['product_status'] = $this->input->post('product_status', true);
		return $data;
	}

	function fetch_data_from_db($updated_id)
	{
		$query = $this->get_where($updated_id);
		foreach ($query->result() as $row) {
			$data['product_id'] = $row->product_id;
			$data['product_title'] = $row->product_title;
			$data['sku'] = $row->sku;
			$data['product_description'] = $row->product_description;
			$data['product_image'] = $row->product_image;
			$data['product_price'] = $row->product_price;
			$data['product_quantity'] = $row->product_quantity;
			$data['product_category'] = $row->product_category;
			$data['product_brand'] = $row->product_brand;
			$data['product_view'] = $row->product_view;
			$data['product_url'] = $row->product_url;
			$data['product_status'] = $row->product_status;
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
		$this->load->model('Mdl_product');
		$query = $this->Mdl_product->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by)
	{
		if ((!is_numeric($limit)) || (!is_numeric($offset))) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_product');
		$query = $this->Mdl_product->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_product');
		$query = $this->Mdl_product->get_where($id);
		return $query;
	}

	// function get_data_where($key) {
	//     $this->load->model('Mdl_product');
	//     $query = $this->Mdl_product->get_data_where($key);
	//     return $query;
	// }

	function get_where_custom($col, $value)
	{
		$this->load->model('Mdl_product');
		$query = $this->Mdl_product->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data)
	{
		$this->load->model('Mdl_product');
		$this->Mdl_product->_insert($data);
	}

	function _update($id, $data)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_product');
		$this->Mdl_product->_update($id, $data);
	}

	function _delete($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_product');
		$this->Mdl_product->_delete($id);
	}

	function count_where($column, $value)
	{
		$this->load->model('Mdl_product');
		$count = $this->Mdl_product->count_where($column, $value);
		return $count;
	}

	function get_max()
	{
		$this->load->model('Mdl_product');
		$max_id = $this->Mdl_product->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query)
	{
		$this->load->model('Mdl_product');
		$query = $this->Mdl_product->_custom_query($mysql_query);
		return $query;
	}

	function count_all()
	{
		$this->load->model('Mdl_product');
		$count = $this->Mdl_product->_count_all();
		return $count;
	}
}