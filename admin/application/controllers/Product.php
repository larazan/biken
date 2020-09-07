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

	function update_viewer($update_id)
	{
		// get current viewer value
		$data = $this->fetch_data_from_db($update_id);
		$curr_view = $data['product_view'];
		//update database
		$update_data['product_view'] = $curr_view + 1;
		$this->_update($update_id, $update_data);
	}

	function hapus_gambar($imgs)
	{
		// unserialize
		$images = unserialize($imgs);
		foreach ($images as $image) {
			// lokasi folder image
			$path_real = $this->loca;
			//lokasi gambar secara spesifik
			$image = $path_real . $image;
			//hapus image
			if (file_exists($image)) {
				unlink($image);
			}
		}
	}

	function getSizes()
	{
		$this->db->where('size_status', 1);
		$this->db->order_by('size_id');
		$query = $this->db->get('tbl_size');
		return $query;
	}

	function getColors()
	{
		$this->db->where('color_status', 1);
		$this->db->order_by('color_id');
		$query = $this->db->get('tbl_color');
		return $query;
	}

	function getSpec()
	{
		$data['update_id'] = '';
		$this->template->views('spec', $data);
	}

	function spec()
	{
		$update_id = $this->uri->segment(3);
		$submit = $this->input->post('submit');

		if ($submit == "Cancel") {
			redirect('product/getSpec');
		}

		if ($submit == "Submit") {
			// get product specification
			$arr_spec = [];
			$type = $this->input->post('type');
			$val = $this->input->post('val');

			// var_dump($type);
			// var_dump($val);

			// die();

			$number = count($this->input->post('type'));
			for ($i = 0; $i < $number; $i++) {
				array_push($arr_spec, array('name' => $type[$i], 'value' => $val[$i]));
			}

			var_dump($arr_spec);
			echo "<br>";
			var_dump(serialize($arr_spec));
		}
	}

	function serializeSpec($type, $val)
	{
		$arr_spec = [];
		$number = count($type);
		for ($i = 0; $i < $number; $i++) {
			array_push($arr_spec, array('name' => $type[$i], 'value' => $val[$i]));
		}

		// serialize array
		$dataArr = serialize($arr_spec);
		return $dataArr;
	}

	function serializeData($data)
	{
		$arr = [];
		if ($data != '') {
			for ($i = 0; $i < sizeof($data); $i++) {
				$pageId = $data[$i];
				array_push($arr, $pageId);
			}
		}

		// serialize array
		$dataArr = serialize($arr);
		return $dataArr;
	}

	function create2()
	{
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
				$new_filename = str_replace(".", "_", substr($filename, 0, strrpos($filename, "."))) . "." . end(explode('.', $filename));
				$nama_baru = str_replace(' ', '_', $new_filename);

				$nmfile = date("ymdHis") . '_' . $nama_baru;
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
					if ($_FILES['product_image']['name']) {
						if ($this->upload->do_upload('product_image')) {
							// // get product specification
							// $arr_spec = [];
							// $number = count($this->input->post('type'));
							// for ($i = 0; $i < $number; $i++) {
							// 	array_push($arr_spec, array('name' => $this->input->post('type'), 'value' => $this->input->post('val')));
							// }

							if (empty($base = $this->input->post('base')))
								die("missing string base64");
							$arr = [];
							foreach ($base as $index => $base64) {

								if (!empty($base64)) {
									// die("Upload error on index : {$index}");
									$res = $this->base64ToJpeg($base64);
									array_push($arr, $res);
								}
							}

							$data = array(
								'product_title' => $this->input->post('product_title', true),
								'sku' => $this->input->post('sku', true),
								'product_url' => strtolower(url_title($this->input->post('product_title', true))),
								'product_description' => $this->input->post('product_description', true),
								'product_specification' => $this->serializeSpec($this->input->post('type'), $this->input->post('val')),
								'product_size' => $this->serializeData($this->input->post('size', true)),
								'product_color' => $this->serializeData($this->input->post('color', true)),
								'product_price' => $this->input->post('product_price', true),
								'product_weight' => $this->input->post('product_weight', true),
								'product_quantity' => $this->input->post('product_quantity', true),
								'product_category' => $this->input->post('product_category', true),
								'product_brand' => $this->input->post('product_brand', true),
								'product_view' => $this->input->post('product_view', true),
								'product_image' => $nmfile,
								'filename' => serialize($arr),
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
								$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
								$this->session->set_flashdata('item', $value);
								redirect('product/create/' . $update_id);
							} else {
								$this->_insert($data);
								$update_id = $this->get_max();

								$flash_msg = "The product was successfully added.";
								$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
								$this->session->set_flashdata('item', $value);
								// redirect('product/create/' . $update_id);
								redirect('product/manage');
							}
						} else {
							$flash_msg = "Upload failed!.";
							$value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
							$this->session->set_flashdata('item', $value);
							redirect('product/create/' . $update_id);
						}
					}
				} else {

					$data = array(
						'product_title' => $this->input->post('product_title', true),
						'sku' => $this->input->post('sku', true),
						'product_url' => strtolower(url_title($this->input->post('product_title', true))),
						'product_description' => $this->input->post('product_description', true),
						'product_specification' => $this->serializeSpec($this->input->post('type'), $this->input->post('val')),
						'product_size' => $this->serializeData($this->input->post('size', true)),
						'product_color' => $this->serializeData($this->input->post('color', true)),
						'product_price' => $this->input->post('product_price', true),
						'product_weight' => $this->input->post('product_weight', true),
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
						$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
						$this->session->set_flashdata('item', $value);
						redirect('product/create/' . $update_id);
					} else {
						$this->_insert($data);
						$update_id = $this->get_max();

						$flash_msg = "The product was successfully added.";
						$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
						$this->session->set_flashdata('item', $value);
						// redirect('product/create/' . $update_id);
						redirect('product/manage');
					}
				}
			}
		}

		if ((is_numeric($update_id)) && ($submit != "Submit")) {
			$data = $this->fetch_data_from_db($update_id);
			$size = $data['product_size'];
			$data['sizeList'] = unserialize($size);
			$color = $data['product_color'];
			$data['filename'] = json_encode($this->jpegToBase64($update_id));
			$data['colorList'] = unserialize($color);
		} else {
			$data = $this->fetch_data_from_post();
			$data['sizeList'] = [];
			$data['colorList'] = [];
			$data['filename'] = [];
		}

		if (!is_numeric($update_id)) {
			$data['headline'] = "Tambah Product";
		} else {
			$data['headline'] = "Update Product";
		}

		$mysql_query = "SELECT tbl_subsubcategory.*, tbl_subcategory.*, tbl_category.*, tbl_subcategory.created_at AS sub_date, tbl_subsubcategory.created_at AS subsub_date  FROM tbl_subsubcategory LEFT JOIN tbl_subcategory ON tbl_subsubcategory.subcat_id = tbl_subcategory.sub_id LEFT JOIN tbl_category ON tbl_subcategory.cat_id = tbl_category.id ORDER BY subsub_id DESC";
		$categories = $this->_custom_query($mysql_query);
		$data['categories'] = $categories; //$this->_custom_query("SELECT * FROM tbl_category ORDER BY id DESC");
		$data['brands'] = $this->_custom_query("SELECT * FROM tbl_brand ORDER BY brand_id DESC");

		
		$data['sizes'] = $this->getSizes();
		$data['colors'] = $this->getColors();

		$data['update_id'] = $update_id;
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('product/create', $data);
	}

	function create()
	{
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
			
				if (!empty($base = $this->input->post('base'))) {
							
						$arr = [];
						foreach ($base as $index => $base64) {
							if (!empty($base64)) {
								// die("Upload error on index : {$index}");
								$res = $this->base64ToJpeg($base64);
								array_push($arr, $res);
							}
						}

						

					// validasi base64
					// if (base64_encode(base64_decode($base64, true)) === $base64) {
					if ($this->validBase64($this->input->post('base', true))) {	
						
						$data = array(
							'product_title' => $this->input->post('product_title', true),
							'sku' => $this->input->post('sku', true),
							'product_url' => strtolower(url_title($this->input->post('product_title', true))),
							'product_description' => $this->input->post('product_description', true),
							'product_specification' => $this->serializeSpec($this->input->post('type'), $this->input->post('val')),
							'product_size' => $this->serializeData($this->input->post('size', true)),
							'product_color' => $this->serializeData($this->input->post('color', true)),
							'product_price' => $this->input->post('product_price', true),
							'product_weight' => $this->input->post('product_weight', true),
							'product_quantity' => $this->input->post('product_quantity', true),
							'product_category' => $this->input->post('product_category', true),
							'product_brand' => $this->input->post('product_brand', true),
							'product_view' => $this->input->post('product_view', true),
							'filename' => serialize($arr),
							'product_status' =>  $this->input->post('product_status', true),
							'created_at' => time(),
							'updated_at' => time()
						);

						if (is_numeric($update_id)) {
							$data_old = $this->fetch_data_from_db($update_id);

							$featured_image = $data_old['filename'];

							// hapus gambar
							$this->hapus_gambar($featured_image);

							$this->_update($update_id, $data);

							$flash_msg = "The product were successfully updated.";
							$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
							$this->session->set_flashdata('item', $value);
							redirect('product/create/' . $update_id);
						} else {
							$this->_insert($data);
							$update_id = $this->get_max();

							$flash_msg = "The product was successfully added.";
							$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
							$this->session->set_flashdata('item', $value);
							// redirect('product/create/' . $update_id);
							redirect('product/manage');
						}

					} else {
						$flash_msg = "Upload failed!.";
						$value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
						$this->session->set_flashdata('item', $value);
						redirect('product/create/' . $update_id);
					}
					
				} else {

					$data = array(
						'product_title' => $this->input->post('product_title', true),
						'sku' => $this->input->post('sku', true),
						'product_url' => strtolower(url_title($this->input->post('product_title', true))),
						'product_description' => $this->input->post('product_description', true),
						'product_specification' => $this->serializeSpec($this->input->post('type'), $this->input->post('val')),
						'product_size' => $this->serializeData($this->input->post('size', true)),
						'product_color' => $this->serializeData($this->input->post('color', true)),
						'product_price' => $this->input->post('product_price', true),
						'product_weight' => $this->input->post('product_weight', true),
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
						$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
						$this->session->set_flashdata('item', $value);
						redirect('product/create/' . $update_id);
					} else {
						$this->_insert($data);
						$update_id = $this->get_max();

						$flash_msg = "The product was successfully added.";
						$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
						$this->session->set_flashdata('item', $value);
						// redirect('product/create/' . $update_id);
						redirect('product/manage');
					}
				}
			}
		}

		if ((is_numeric($update_id)) && ($submit != "Submit")) {
			$data = $this->fetch_data_from_db($update_id);
			$size = $data['product_size'];
			$data['sizeList'] = unserialize($size);
			$color = $data['product_color'];
			$data['filename'] = json_encode($this->jpegToBase64($update_id));
			$data['colorList'] = unserialize($color);
		} else {
			$data = $this->fetch_data_from_post();
			$data['sizeList'] = [];
			$data['colorList'] = [];
			$data['filename'] = [];
		}

		if (!is_numeric($update_id)) {
			$data['headline'] = "Tambah Product";
		} else {
			$data['headline'] = "Update Product";
		}

		$mysql_query = "SELECT tbl_subsubcategory.*, tbl_subcategory.*, tbl_category.*, tbl_subcategory.created_at AS sub_date, tbl_subsubcategory.created_at AS subsub_date  FROM tbl_subsubcategory LEFT JOIN tbl_subcategory ON tbl_subsubcategory.subcat_id = tbl_subcategory.sub_id LEFT JOIN tbl_category ON tbl_subcategory.cat_id = tbl_category.id ORDER BY subsub_id DESC";
		$categories = $this->_custom_query($mysql_query);
		$data['categories'] = $categories; //$this->_custom_query("SELECT * FROM tbl_category ORDER BY id DESC");
		$data['brands'] = $this->_custom_query("SELECT * FROM tbl_brand ORDER BY brand_id DESC");

		
		$data['sizes'] = $this->getSizes();
		$data['colors'] = $this->getColors();

		$data['update_id'] = $update_id;
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('product/create', $data);
	}

	function validBase64($base64_string) {
		// dimurnikan dari data:image/png dan base64

		$s = explode(';', $base64_string);

		return (bool) preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $s[1]);
		return (bool) preg_match("/data:image\/([a-zA-Z]*);base64.*/", $s[0]);

		// Check if there are valid base64 characters
		// if (!preg_match("/data:([a-zA-Z0-9]+\/[a-zA-Z0-9-.+]+).base64,.*/", $s)) return false;

		// // Decode the string in strict mode and check the results
		// $decoded = base64_decode($s, true);
		// if(false === $decoded) return false;
	
		// // Encode the string again
		// if(base64_encode($decoded) != $s) return false;
	
		// return true;

	}

	function tes() {
		// $data = "data:image/png;base64";
		$data = 'S5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTM4IDc5LjE1OTgyNCwgMjAxNi8wOS8xNC0wMTowOTowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NzMxMjU1RUZGNTQzMTFFNzlCRDNEMUI3QjM0NzNGMUYiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NzMxMjU1RUVGNTQzMTFFNzlCRDNEMUI3QjM0NzNGMUYiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTcgKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6M0Y1OTA0MDZFRTJFMTFFNzkyRDNFMDBCMTg5Q0U3OEIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6M0Y1OTA0MDdFRTJFMTFFNzkyRDNFMDBCMTg5Q0U3OEIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7rcbG6AARfPUlEQVR42uy9ebBlyVkf+GXmOefe+6rqVb3q6urqfZN6UTcSWjBCSAKELIylIRAEYgYGWXjYYhiIgWAgwBCMZ0yM8YRjzIyN7T88JobBEgQgtBimAQmQJXXTrb33Xd1dXfv2tnvv2TLn2/Lc88oTYf4wMUHX92uV3nt3OSdPnjyZv/x9m0spgcFgMBgMBoPhPx+8dYHBYDAYDAaDESyDwWAwGAwGI1gGg8FgMBgMRrAMBoPBYDAYDEawDAaDwWAwGIxgGQwGg8FgMBjBMhgMBoPBYDAYwTIYDAaDwWAwgmUwGAwGg8FgBMtgMBgMBoPBYATLYDAYDAaDwQiWwWAwGAwGgxEsg8FgMBgMBiNYBoPBYDAYDAYjWAaDwWAwGAxGsAwGg8FgMBiMYBkMBoPBYDAYjGAZDAaDwWAwGMEyGAwGg8FgMIJlMBgMBoPBYDCCZTAYDAaDwWAEy2AwGAwGg8EIlsFgMBgMBoPBCJbBYDAYDAaDESyDwWAwGAwGI1gGg8FgMBgMRrAMBoPBYDAYDEawDAaDwWAwGIxgGQwGg8FgMBjBMhgMBoPBYDAYwTIYDAaDwWAwgmUwGAwGg8FgBMtgMBgMBoPBYATLYDAYDAaDwQiWwWAwGAwGgxEsg8FgMBgMBoMRLIPBYDAYDAYjWAaDwWAwGAxGsAwGg8FgMBiMYBkMBoPBYDAYjGAZDAaDwWAwGMEyGAwGg8FgMIJlMBgMBoPBYDCCZTAYDAaDwWAEy2AwGAwGg8EIlsFgMBgMBoPBCJbBYDAYDAaDESyDwWAwGAwGI1gGg8FgMBgMBiNYBoPBYDAYDEawDAaDwWAwGIxgGQwGg8FgMBjBMhgMBoPBYDAYwTIYDAaDwWAwgmUwGAwGg8FgBMtgMBgMBoPBYATLYDAYDAaDwQiWwWAwGAwGgxEsg8FgMBgMBoMRLIPBYDAYDAYjWAaDwWAwGAxGsAwGg8FgMBiMYBkMBoPBYDAYjGAZDAaDwWAwGMEyGAwGg8FgMIJlMBgMBoPBYDCCZTAYDAaDwWAEy2AwGAwGg8EIlsFgMBgMBoPBCJbBYDAYDAaDESyDwWAwGAwGI1gGg8FgMBgMBiNYBoPBYDAYDEawDAaDwWAwGIxgGQwGg8FgMBjBMhgMBoPBYDAYwTIYDAaDwWAwgmUwGAwGg8FgBMtgMBgMBoPBYATLYDAYDAaDwQiWwWAwGAwGgxEsg8FgMBgMBoMRLIPBYDAYDAYjWAaDwWAwGAxGsAwGg8FgMBgM';

		if (preg_match("/data:image\/([a-zA-Z]*);base64.*/", $data)) {
			echo 'cocok';
		} else {
			echo 'tidak cocok';
		}
	}

	function base64ToJpeg($base64_string)
	{
		$data = explode(';', $base64_string);
		$dataa = explode(',', $base64_string);
		$part = explode("/", $data[0]);
		if (!empty($part)) {
			$file = md5(uniqid(rand(), true)) . ".{$part[1]}";

			$ifp = fopen(APPPATH . "../assets/product/{$file}", 'wb');
			fwrite($ifp, base64_decode($dataa[1]));
			fclose($ifp);
		}
		return $file;
		// var_dump($file);
	}

	function jpegToBase64($id)
	{
		$data = $this->db->get_where('tbl_product', array('product_id' => $id))->row()->filename;
		$uns = unserialize($data);
		// var_dump($data);
		// var_dump(unserialize($data));
		// die();

		$res = [];
		foreach ($uns as $path) {
			$type = pathinfo($path, PATHINFO_EXTENSION);
			$data = file_get_contents(APPPATH . "../assets/product/" . $path);
			$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
			// array_push($res, $base64);
			array_push($res, array($base64));
		}

		// foreach ($res as $base) {
		//     echo "<div>";
		//     echo "<img src='". $base ."' alt='' />";
		//     echo "</div>";
		// }

		//  var_dump($res);

		return $res;
	}

	function cek()
	{
		$obj = 'a:4:{i:0;a:2:{s:4:"name";s:9:"Prosessor";s:5:"value";s:18:"Intel Core i7-8650";}i:1;a:2:{s:4:"name";s:18:"Penyimpanan(Utama)";s:5:"value";s:9:"SSD 256Gb";}i:2;a:2:{s:4:"name";s:21:"Penyimpanan(Sekunder)";s:5:"value";s:9:"HDD 500Gb";}i:3;a:2:{s:4:"name";s:3:"RAM";s:5:"value";s:9:"DDR-4 8Gb";}}';
		$obj_res = unserialize($obj);

		echo '<pre>';
		echo var_dump($obj_res);
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



			$flash_msg = "The product were successfully deleted.";
			$value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
			$this->session->set_flashdata('item', $value);

			redirect('product/manage');
		}
	}

	function _process_delete($update_id)
	{
		$data = $this->fetch_data_from_db($update_id);
		$imgs = $data['filename'];
		$path_real = $this->loca;
		// unserialize
		$images = unserialize($imgs);
		foreach ($images as $image) {
			// lokasi folder image
			$path_real = $this->loca;
			//lokasi gambar secara spesifik
			$image = $path_real . $image;
			//hapus image
			if (file_exists($image)) {
				unlink($image);
			}
		}

		unset($data);
		$data['filename'] = "";
		$this->_update($update_id, $data);
	}

	function fetch_data_from_post()
	{
		$data['product_title'] = $this->input->post('product_title', true);
		$data['sku'] = $this->input->post('sku', true);
		$data['product_description'] = $this->input->post('product_description', true);
		$data['product_image'] = $this->input->post('product_image', true);
		$data['product_price'] = $this->input->post('product_price', true);
		$data['product_discount'] = $this->input->post('product_discount', true);
		$data['product_weight'] = $this->input->post('product_weight', true);
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
			$data['product_discount'] = $row->product_discount;
			$data['product_weight'] = $row->product_weight;
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
