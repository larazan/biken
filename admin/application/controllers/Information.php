<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Information extends BaseController
{
    private $loca = './assets/info/';

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->form_validation->CI=& $this;
        $this->load->helper('text');
        $this->isLoggedIn();
    }

    function _compress($file_name)
    {
        // create thumbnail
        $config['image_library'] = 'gd2';
        $config['source_image'] = $this->loca . $file_name;
        $config['new_image'] = $this->loca . '2080x1000/' . $file_name;
        $config['maintain_ratio'] = TRUE;
        $config['width']         = 2080;
        $config['height']       = 1000;

        // $this->image_lib->initialize($config);
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    function do_update()
    {
        $data['description'] = $this->input->post('tentang_kami');
        $this->db->where('type', 'tentang_kami');
        $this->db->update('tbl_information', $data);

        $data['description'] = $this->input->post('kebijakan_privasi');
        $this->db->where('type', 'kebijakan_privasi');
        $this->db->update('tbl_information', $data);

        $data['description'] = $this->input->post('order_n_refund');
        $this->db->where('type', 'order_n_refund');
        $this->db->update('tbl_information', $data);

        $data['description'] = $this->input->post('syarat_n_ketentuan');
        $this->db->where('type', 'syarat_n_ketentuan');
        $this->db->update('tbl_information', $data);

        $submit = $this->input->post('submit');
        switch ($submit) {
            case 'Submit_About':
                $path = 'manage';
                break;
            case 'Submit_Kebijakan':
                $path = 'kebijakan_privasi';
                break;
            case 'Submit_Order':
                $path = 'cara_order';
                break;
            case 'Submit_Syarat':
                $path = 'syarat_ketentuan';
                break;
        }

        $flash_msg = "The information were successfully added.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
        $this->session->set_flashdata('item', $value);
        redirect('information/'.$path);
    }

    function upload_logo()
    {
        $this->load->library('upload');

        $nmfile = "logo_" . time(); //nama file saya beri nama langsung dan diikuti fungsi time

        $config['upload_path'] = $this->loca; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px    
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);

        if ($_FILES['name_field']['name']) {
            if ($this->upload->do_upload('name_field')) {
                $gbr = $this->upload->data();
                $data = array(
                    'description' => $gbr['file_name'],
                );

                $this->db->where('type', 'logo');
                $this->db->update('settings', $data);

                $nama = $this->db->get_where('settings', array('type' => 'logo'))->row()->description;

                //hapus image dari server

                // lokasi folder image
                $map = $_SERVER['DOCUMENT_ROOT'];
                $path = $this->loca . '/';
                //lokasi gambar secara spesifik
                $image1 = $path . $nama;
                //hapus image
                unlink($image1);

                //pesan yang muncul jika berhasil diupload pada session flashdata
                $flash_msg = "The logo file were successfully added.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
                $this->session->set_flashdata('item', $value);
                redirect('information/manage');
            } else {
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $flash_msg = "The logo file were could not be added.";
                $value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
                $this->session->set_flashdata('item', $value);
                redirect('information/manage');
            }
        }
    }

    public function manage()
    {
        $this->load->library('session');

        $data['flash'] = $this->session->flashdata('item');
        $this->template->views('information/manage', $data);
    }

    function syarat_ketentuan()
    {
        $this->load->library('session');

        $data['flash'] = $this->session->flashdata('item');
        $this->template->views('information/syarat_ketentuan', $data);
    }

    function cara_order()
    {
        $this->load->library('session');

        $data['flash'] = $this->session->flashdata('item');
        $this->template->views('information/cara_order', $data);
    }

    function kebijakan_privasi()
    {
        $this->load->library('session');

        $data['flash'] = $this->session->flashdata('item');
        $this->template->views('information/kebijakan_privasi', $data);
    }

    function get($order_by)
    {
        $this->load->model('Mdl_info');
        $query = $this->Mdl_info->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by)
    {
        if ((!is_numeric($limit)) || (!is_numeric($offset))) {
            die('Non-numeric variable!');
        }

        $this->load->model('Mdl_info');
        $query = $this->Mdl_info->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('Mdl_info');
        $query = $this->Mdl_info->get_where($id);
        return $query;
    }

    // function get_data_where($key) {
    //     $this->load->model('Mdl_info');
    //     $query = $this->Mdl_info->get_data_where($key);
    //     return $query;
    // }

    function get_where_custom($col, $value)
    {
        $this->load->model('Mdl_info');
        $query = $this->Mdl_info->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->load->model('Mdl_info');
        $this->Mdl_info->_insert($data);
    }

    function _update($id, $data)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('Mdl_info');
        $this->Mdl_info->_update($id, $data);
    }

    function _delete($id)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('Mdl_info');
        $this->Mdl_info->_delete($id);
    }

    function count_where($column, $value)
    {
        $this->load->model('Mdl_info');
        $count = $this->Mdl_info->count_where($column, $value);
        return $count;
    }

    function get_max()
    {
        $this->load->model('Mdl_info');
        $max_id = $this->Mdl_info->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query)
    {
        $this->load->model('Mdl_info');
        $query = $this->Mdl_info->_custom_query($mysql_query);
        return $query;
    }

    function count_all()
    {
        $this->load->model('Mdl_info');
        $count = $this->Mdl_info->_count_all();
        return $count;
    }
}
