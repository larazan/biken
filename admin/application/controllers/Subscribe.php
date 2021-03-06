<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Subscribe extends BaseController 
{

    // var $mailFrom = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
    // var $mailPass = $this->db->get_where('settings' , array('type'=>'password'))->row()->description;

function __construct() {
    parent::__construct();
    $this->load->helper(array('text'));
    $this->load->library('form_validation');
    $this->isLoggedIn();
    $this->mailFrom = $this->db->get_where('tbl_settings' , array('type'=>'email'))->row()->description;
    $this->mailPass = $this->db->get_where('tbl_settings' , array('type'=>'password'))->row()->description;
}


function replyAll() {
    $this->load->library('session');

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit');

    if ($submit == "Cancel") {
        redirect('subscribe/manage');
    }

    if ($submit == "Submit") {

        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subjek', 'Subjek', 'trim|required');
        $this->form_validation->set_rules('pesan', 'Pesan', 'trim|required|min_length[5]');

        if ($this->form_validation->run() == TRUE) {

            $data = $this->loghistory->fetch_data_from_post();

            $this->sendMail($data);

            if (is_numeric($update_id)) {
                $this->loghistory->_insert($data);
                $flash_msg = "Email reply were successfully send.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('subscribe/view/'.$update_id);
            }
        }        
    }    
}

function reply() {
    $this->load->library('session');

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit');

    if ($submit == "Cancel") {
        redirect('subscribe/manage');
    }

    if ($submit == "Submit") {

        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('subjek', 'Subjek', 'trim|required');
        $this->form_validation->set_rules('pesan', 'Pesan', 'trim|required|min_length[5]');

        if ($this->form_validation->run() == TRUE) {

            $data = $this->loghistory->fetch_data_from_post();

            $this->sendMail($data);

            if (is_numeric($update_id)) {
                $this->loghistory->_insert($data);
                $flash_msg = "Email reply were successfully send.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('subscribe/view/'.$update_id);
            }
        }        
    }    
}

function test() {
    // get email address
    $email = [];
    $query = $this->get_where_custom('status', 1);
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $email[] = $row->email;
        }
    }

    if ($email != '') {
        $wrap = array_map(
            function ($el) {
                return "<span class=\"vr\">{$el}</span>";
            },
            $email
        );

        echo implode(' ', $wrap);
    }

    echo 'email kosong';
    
}

function sendMail($data) {
    // $config = Array(
    //     'protocol' => 'smtp',
    //     'smtp_host' => 'ssl://smtp.googlemail.com',
    //     'smtp_port' => 465,
    //     'smtp_user' => $this->mailFrom,
    //     'smtp_pass' => $this->mailPass,
    //     'mailtype'  => 'html', 
    //     'charset'   => 'utf-8'
    // );

    // get email address
    $query = $this->get_where_custom('status', 1);
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $email[] = $row->email;
        }
    }

    $user = 'Admin'; //$this->session->userdata('nama_karyawan');
    $mailTo = implode(', ', $email);
    $message = $data['pesan'];
    $subjek = $data['subjek'];

    // $this->load->library('email');
    // $this->email->initialize($config);
    // $this->email->set_newline("\r\n");

    // $this->email->set_header('MIME-Version', '1.0; charset= utf-8');
    // $this->email->set_header('Content-type', 'text/html');
    // $this->email->from($this->mailFrom, 'Balasan');
    // $this->email->to($mailTo);
    // $this->email->subject($subjek);
    
    // $this->email->message($message);   

    $this->load->library('email');
    $this->email->from('cs@wiklan.com', 'Sistem Wiklan');
    $this->email->to($mailTo);
    $this->email->subject($subjek);
    $this->email->message($message);
    $this->email->bcc('cs@wiklan.com');
    $this->email->cc('cs@wiklan.com');

    //$this->email->message(strip_tags($message));
    if($this->email->send() == false){
        show_error($this->email->print_debugger());
    } else {
        return TRUE;
    }
}

function blast() {
    $this->load->library('session');
  
    $data['headline'] = 'Detail Pesan';
    $data['query'] = $this->get_where_custom('status', 1);
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "reply_all";
    $this->template->views('subscribe/reply_all', $data);  
}

function view() {
    $this->load->library('session');
  
    $update_id = $this->uri->segment(3);
    // $this->_set_to_opened($update_id);
    $data['update_id'] = $update_id;
    $data['headline'] = 'Detail Pesan';
    $data['query'] = $this->get_where($update_id);
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "reply";
    $this->template->views('subscribe/manage', $data);  
}

function _set_to_opened($update_id) {
    $data['opened'] = 1;
    $this->_update($update_id, $data);
}

function create() {
    $this->load->library('session');

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit');

    if ($submit == "Cancel") {
        redirect('subscribe/manage');
    }

    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();

            if (is_numeric($update_id)) {
                $data['updated_at'] = time();
                $this->_update($update_id, $data);
                $flash_msg = "The subscriber were successfully updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('subscribe/create/'.$update_id);
            } else {
                $this->_insert($data);
                $update_id = $this->get_max();

                $flash_msg = "The subscriber was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('subscribe/create/'.$update_id);
            }
        }
    }

    if ((is_numeric($update_id)) && ($submit!="Submit")) {
        $data = $this->fetch_data_from_db($update_id);
    } else {
        $data = $this->fetch_data_from_post();
    }

    if (!is_numeric($update_id)) {
        $data['headline'] = "Tambah Subscribe";
    } else {
        $data['headline'] = "Update Subscribe";
    }

    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $this->template->views('subscribe/create', $data);
}

function manage() {

    $data['query'] = $this->get('id');

    $data['flash'] = $this->session->flashdata('item');
    $this->template->views('subscribe/manage', $data);

    // echo "manage daftar";
}

function fetch_data_from_post() {
    $data['email'] = $this->input->post('email', true);
    $data['created_at'] = time();
    $data['status'] = $this->input->post('status', true);
    
    return $data;
}

function fetch_data_from_db($updated_id) {
    $query = $this->get_where($updated_id);
    foreach ($query->result() as $row) {
        $data['id'] = $row->id;
        $data['email'] = $row->email;
        $data['status'] = $row->status;
        $data['updated_at'] = $row->updated_at;
    }

    if (!isset($data)) {
        $data = "";
    }

    return $data;
}

function entry_subscribe() {
    $submit = $this->input->post('submit');

    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $email = $this->input->post("email");
        $is_unique = "";
        $check_email = $this->db->query("SELECT * FROM subscribe WHERE email = '$email'")->num_rows();
        if($check_email > 0){
            $is_unique = "|is_unique[subscribe.email]";
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email'.$is_unique,
            array(
                'required'=>'Gagal! Email Harus Di Isi.',
                'valid_email'=>'Gagal! Email Salah.',
                'is_unique'=>'Gagal! Email Sudah Terdaftar.',
            )
        );

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();
            $res = $this->_insert($data);
            if ($res) {                
                $json = array();
                $json["status"] = 'OK';
         
                header('Content-type: application/json');
                echo json_encode($json);
            } else {
                $json = array();
                $json["status"] = 'Not';
                $message = new stdClass();
                $message->email = 'Gagal! Coba Beberapa Menit Lagi.';
                $json["message"] = $message;
         
                header('Content-type: application/json');
                echo json_encode($json);
            }   
        }else{
            $json = array();
            $json["status"] = 'Not';
            $json["message"] = $this->form_validation->error_array();
         
            header('Content-type: application/json');
            echo json_encode($json);
        }
    }
}


function delete($update_id)
{
  
    $this->load->library('session');
   
    $submit = $this->input->post('submit', TRUE);
    if ($submit == "Cancel") {
        redirect('subscribe/create/'.$update_id);
    } elseif ($submit == "Delete") {
        // delete the item record from db
        $this->_delete($update_id);
        // $this->_process_delete($update_id);

        $flash_msg = "The email subscriber were successfully deleted.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('subscribe/manage');
    }
}


function get($order_by)
{
    $this->load->model('mdl_subscribe');
    $query = $this->mdl_subscribe->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_subscribe');
    $query = $this->mdl_subscribe->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_subscribe');
    $query = $this->mdl_subscribe->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_subscribe');
    $query = $this->mdl_subscribe->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_subscribe');
    $this->mdl_subscribe->_insert($data);
    return TRUE;
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_subscribe');
    $this->mdl_subscribe->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_subscribe');
    $this->mdl_subscribe->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_subscribe');
    $count = $this->mdl_subscribe->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_subscribe');
    $max_id = $this->mdl_subscribe->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_subscribe');
    $query = $this->mdl_subscribe->_custom_query($mysql_query);
    return $query;
}

}