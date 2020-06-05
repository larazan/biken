<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller
{

    private $loca = './marketplace/artikel/';

	function __construct()
	{
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->CI=& $this;
        $this->load->helper('text');
	}

	public function index()
	{
		$this->template->views('Article/manage');
	}

	public function manage()
	{
		$mysql_query = "SELECT * FROM articles ORDER BY id DESC";
        $data['query'] = $this->_custom_query($mysql_query);
		$data['flash'] = $this->session->flashdata('item');
		$this->template->views('Article/manage', $data);
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
        $this->load->module('site_security');
        $this->load->module('tags');
        $this->load->module('blog_categories');
        $this->load->model('mdl_blog');
        $this->site_security->_make_sure_is_admin();

        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit');

        if ($submit == "Cancel") {
            redirect('Article/manage');
        }

        if ($submit == "Submit") {

            // var_dump($_FILES['featured_image']['name'] == '');
            // die();

            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Judul Artikel', 'trim|required');
            // $this->form_validation->set_rules('body', 'Isi Artikel', 'required');
            // $this->form_validation->set_rules('featured_image', 'Gambar', 'required|callback_upload_image');

            if ($this->form_validation->run() == TRUE) {
                // $data = $this->fetch_data_from_post();

                // ganti titik dengan _
                $filename = $_FILES['featured_image']['name'];
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
                if ($_FILES['featured_image']['name'] != '') {
                    if($_FILES['featured_image']['name'])
                    {
                        if ($this->upload->do_upload('featured_image'))
                        {
                            $data = array(
                                'title' => $this->input->post('title', true),
                                'slug' => url_title($this->input->post('title', true)),
                                'author' => $this->input->post('author', true),
                                'body' => $this->input->post('body', true),
                                'featured_image' => $nmfile,
                                'status' =>  $this->input->post('status', true),
                                'published_at' => $this->input->post('published_at', true),
                                'created_at' => time(),
                                'updated_at' => time()
                            );                            

                            if (is_numeric($update_id)) {
                                $data_old = $this->fetch_data_from_db($update_id);

                                $featured_image = $data_old['featured_image'];

                                // hapus gambar
                                $this->hapus_gambar($featured_image);

                                $this->_update($update_id, $data);

                                $flash_msg = "The article were successfully updated.";
                                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                                $this->session->set_flashdata('item', $value);
                                redirect('Article/create/'.$update_id);

                            } else {
                                $this->_insert($data);
                                $update_id = $this->get_max();

                                $flash_msg = "The article was successfully added.";
                                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                                $this->session->set_flashdata('item', $value);
                                redirect('Article/create/'.$update_id);
                            }
                            

                        } else {
                            $flash_msg = "Upload failed!.";
                            $value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                            $this->session->set_flashdata('item', $value);
                            redirect('Article/create/'.$update_id);
                        }
                    }
                } else {
                    $data = array(
                        'title' => $this->input->post('title', true),
                        'slug' => url_title($this->input->post('title', true)),
                        'author' => $this->input->post('author', true),
                        'body' => $this->input->post('body', true),
                        'status' =>  $this->input->post('status', true),
                        'published_at' => $this->input->post('published_at', true),
                        'created_at' => time(),
                        'updated_at' => time()
                    );

                    if (is_numeric($update_id)) {
                        $this->_update($update_id, $data);

                        $flash_msg = "The article were successfully updated.";
                        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('Article/create/'.$update_id);
                    } else {
                        $this->_insert($data);
                        $update_id = $this->get_max();

                        $flash_msg = "The article was successfully added.";
                        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('Article/create/'.$update_id);
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
            $data['headline'] = "Tambah Artikel";
        } else {
            $data['headline'] = "Update Artikel";
        }

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
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
            
            $flash_msg = "The article were successfully deleted.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            redirect('Article/manage');
        }
    }
    
    function _process_delete($update_id){
        $data = $this->fetch_data_from_db($update_id);
        $big_pic = $data['featured_image'];
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
        $data['featured_image'] = "";
        $this->_update($update_id, $data);
    }

	function fetch_data_from_post()
	{
		$data['title'] = $this->input->post('title', true);
        $data['slug'] = url_title($this->input->post('title', true));
        $data['author'] = $this->input->post('author', true);
        $data['body'] = $this->input->post('body', true);
        $data['status'] =  $this->input->post('status', true);
        $data['published_at'] = $this->input->post('published_at', true);
        $data['created_at'] = time();
        $data['updated_at'] = time();
		return $data;
	}

	function fetch_data_from_db($updated_id)
	{
		$query = $this->get_where($updated_id);
		foreach ($query->result() as $row) {
			$data['id'] = $row->id;
            $data['title'] = $row->title;
            $data['slug'] = $row->slug;
            $data['author'] = $row->author;
            $data['body'] = $row->body;
            $data['featured_image'] = $row->featured_image;
            $data['status'] = $row->status;
            $data['viewed'] = $row->viewed;
            $data['published_at'] = $row->published_at;
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
		$this->load->model('Mdl_article');
		$query = $this->Mdl_article->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by)
	{
		if ((!is_numeric($limit)) || (!is_numeric($offset))) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_article');
		$query = $this->Mdl_article->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_article');
		$query = $this->Mdl_article->get_where($id);
		return $query;
	}

	// function get_data_where($key) {
	//     $this->load->model('Mdl_article');
	//     $query = $this->Mdl_article->get_data_where($key);
	//     return $query;
	// }

	function get_where_custom($col, $value)
	{
		$this->load->model('Mdl_article');
		$query = $this->Mdl_article->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data)
	{
		$this->load->model('Mdl_article');
		$this->Mdl_article->_insert($data);
	}

	function _update($id, $data)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_article');
		$this->Mdl_article->_update($id, $data);
	}

	function _delete($id)
	{
		if (!is_numeric($id)) {
			die('Non-numeric variable!');
		}

		$this->load->model('Mdl_article');
		$this->Mdl_article->_delete($id);
	}

	function count_where($column, $value)
	{
		$this->load->model('Mdl_article');
		$count = $this->Mdl_article->count_where($column, $value);
		return $count;
	}

	function get_max()
	{
		$this->load->model('Mdl_article');
		$max_id = $this->Mdl_article->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query)
	{
		$this->load->model('Mdl_article');
		$query = $this->Mdl_article->_custom_query($mysql_query);
		return $query;
	}

	function count_all()
	{
		$this->load->model('Mdl_article');
		$count = $this->Mdl_article->_count_all();
		return $count;
	}
}
