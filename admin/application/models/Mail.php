<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Mail extends CI_Model
{

    private static $db;

    function __construct()
    {
        parent::__construct();
        self::$db = &get_instance()->db;
    }

    static function configMail() {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'forheron@gmail.com',
            'smtp_pass' => 'labeneamata',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            // 'smtp_crypto' => 'tls'
        );
    }

    // send mail registrasi
    public function sendMailRegistration($user_id = '') {
        // $user_id = 1;
        
        $data['shop_name'] = $this->db->get_where('tbl_settings', array('type' => 'shop_name'))->row()->description;
        $data['address'] = $this->db->get_where('tbl_settings', array('type' => 'address'))->row()->description;
        $data['phone'] = $this->db->get_where('tbl_settings', array('type' => 'phone'))->row()->description;
        $data['email'] = $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description;
        $data['logo'] = $this->db->get_where('tbl_settings', array('type' => 'logo'))->row()->description;

        $this->db->where('customer_id', $user_id);
        $data['query'] = $this->db->get('tbl_customer');
        $data['user_id'] = $user_id;
        // $this->load->view('mail/mailThanksRegistration', $data);

        $from = $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description;
        $email_customer = App::getCustomer($user_id)->customer_email;
        $subject = 'thank for registration ';
        $body = $this->load->view('mail/mailThanksRegistration', $data, true);

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'forheron@gmail.com',
            'smtp_pass' => 'labeneamata',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            // 'smtp_crypto' => 'tls'
        );
        $this->load->library('email', $config);

        $this->email->set_newline("\r\n");

        $this->email->from($from, 'Sistem Toko online');
        $this->email->to($email_customer);
        $this->email->subject($subject);
        $this->email->message($body);
        $this->email->bcc($from);
        $this->email->cc($from);

        if ($this->email->send() == false) {
            show_error($this->email->print_debugger());
        } else {
            return TRUE;
        }
    }

    // send mail reset password
    public function sendMailReset($detail) {
        
        $data['shop_name'] = $this->db->get_where('tbl_settings', array('type' => 'shop_name'))->row()->description;
        $data['address'] = $this->db->get_where('tbl_settings', array('type' => 'address'))->row()->description;
        $data['phone'] = $this->db->get_where('tbl_settings', array('type' => 'phone'))->row()->description;
        $data['email'] = $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description;
        $data['logo'] = $this->db->get_where('tbl_settings', array('type' => 'logo'))->row()->description;

        $data['data'] = $detail;

        $from = $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description;
        $email_customer = $detail['email'];
        $subject = 'Reset Password ';
        $body = $this->load->view('mail/mailReset', $data, true);

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'forheron@gmail.com',
            'smtp_pass' => 'labeneamata',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            // 'smtp_crypto' => 'tls'
        );
        $this->load->library('email', $config);

        $this->email->set_newline("\r\n");

        $this->email->from($from, 'Sistem Toko online');
        $this->email->to($email_customer);
        $this->email->subject($subject);
        $this->email->message($body);
        $this->email->bcc($from);
        $this->email->cc($from);

        $status = $this->email->send();
        
        return $status;

        // if ($this->email->send() == false) {
        //     show_error($this->email->print_debugger());
        // } else {
        //     return TRUE;
        // }
    }

    // send mail checkout
    public function sendMailCheckout($order_id = '', $type = '') {
        // $order_id = 1;

        $orders = $this->db->get_where('tbl_order', array('order_id' => $order_id))->row();
        $shopper_id = $orders->shopper_id;

         // get item
         $items = explode(",", $orders->order_items);
         $this->db->where_in('product_id', $items);
         $products = $this->db->get('tbl_product');
        
        if ($type == 'Admin') {
            $subject = 'Ada Pesanan barang';
            $name = 'Admin';
            $template = 'mailTemplateSeller';
            $to = $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description;
        } elseif ($type == 'Customer') {
            $subject = 'Pesanan anda akan kami proses';
            $name = App::getCustomer($shopper_id)->customer_name;
            $template = 'mailTemplateBuyer';
            $to =  App::getCustomer($shopper_id)->customer_email;
        }

        $data['orders'] = $orders;
        $data['products'] = $products;
        $data['order_id'] = $order_id;
        $data['name'] = $orders->order_name;
        $data['no_order'] = $orders->no_order;

        $this->sendMail($subject, $to, $template, $data);
    }


    public function sendMail($subject, $to, $template, $data) {
        $data['shop_name'] = $this->db->get_where('tbl_settings', array('type' => 'shop_name'))->row()->description;
        $data['address'] = $this->db->get_where('tbl_settings', array('type' => 'address'))->row()->description;
        $data['phone'] = $this->db->get_where('tbl_settings', array('type' => 'phone'))->row()->description;
        $data['email'] = $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description;
        $data['logo'] = $this->db->get_where('tbl_settings', array('type' => 'logo'))->row()->description;

        $from = $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description;
        $body = $this->load->view('mail/'.$template, $data, true);

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'forheron@gmail.com',
            'smtp_pass' => 'labeneamata',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            // 'smtp_crypto' => 'tls'
        );
        $this->load->library('email', $config);

        $this->email->set_newline("\r\n");

        $this->email->from($from, 'Sistem Toko online');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($body);
        $this->email->bcc($from);
        $this->email->cc($from);

        if ($this->email->send() == false) {
            show_error($this->email->print_debugger());
        } else {
            return TRUE;
        }
    }

    // send mail approve
    public function sendMailApprove($user_id = '', $type) {
        if ($type == 'Admin') {
            $name = 'Admin';
            $to = $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description;
            $subject = 'Terima kasih sudah melakukan pembayaran';
        } else if($type == 'User') {
            $name =  App::getCustomer($user_id)->customer_name;
            $to = App::getCustomer($user_id)->customer_email;
            $subject = 'Kustomer Sudah melakukan pembayaran';
        }
        
        $data['shop_name'] = $this->db->get_where('tbl_settings', array('type' => 'shop_name'))->row()->description;
        $data['address'] = $this->db->get_where('tbl_settings', array('type' => 'address'))->row()->description;
        $data['phone'] = $this->db->get_where('tbl_settings', array('type' => 'phone'))->row()->description;
        $data['email'] = $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description;
        $data['logo'] = $this->db->get_where('tbl_settings', array('type' => 'logo'))->row()->description;

        $from = $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description;
        $data['name'] = $name;
        $body = $this->load->view('mail/mailThanksProve', $data, true);

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'forheron@gmail.com',
            'smtp_pass' => 'labeneamata',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            // 'smtp_crypto' => 'tls'
        );
        $this->load->library('email', $config);

        $this->email->set_newline("\r\n");

        $this->email->from($from, 'Sistem Toko online');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($body);
        $this->email->bcc($from);
        $this->email->cc($from);

        if ($this->email->send() == false) {
            show_error($this->email->print_debugger());
        } else {
            return TRUE;
        }
    }

    // send mail shipping

    public function sendMailShipping($user_id = '', $shipping_code = '') {
        // $user_id = 1;
        
        $data['shop_name'] = $this->db->get_where('tbl_settings', array('type' => 'shop_name'))->row()->description;
        $data['address'] = $this->db->get_where('tbl_settings', array('type' => 'address'))->row()->description;
        $data['phone'] = $this->db->get_where('tbl_settings', array('type' => 'phone'))->row()->description;
        $data['email'] = $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description;
        $data['logo'] = $this->db->get_where('tbl_settings', array('type' => 'logo'))->row()->description;

        $this->db->where('customer_id', $user_id);
        $data['query'] = $this->db->get('tbl_customer');
        $data['user_id'] = $user_id;
        $data['shipping_code'] = $shipping_code;

        $from = $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description;
        $email_customer = App::getCustomer($user_id)->customer_email;
        $subject = 'No resi Barang Pesanan';
        $body = $this->load->view('mail/mailShipping', $data, true);

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'forheron@gmail.com',
            'smtp_pass' => 'labeneamata',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            // 'smtp_crypto' => 'tls'
        );
        $this->load->library('email', $config);

        $this->email->set_newline("\r\n");

        $this->email->from($from, 'Sistem Toko online');
        $this->email->to($email_customer);
        $this->email->subject($subject);
        $this->email->message($body);
        $this->email->bcc($from);
        $this->email->cc($from);

        if ($this->email->send() == false) {
            show_error($this->email->print_debugger());
        } else {
            return TRUE;
        }
    }

    // send mail arrival
    public function sendMailArrival($order_id = '') {
        // $order_id = 1;

        $data['shop_name'] = $this->db->get_where('tbl_settings', array('type' => 'shop_name'))->row()->description;
        $data['address'] = $this->db->get_where('tbl_settings', array('type' => 'address'))->row()->description;
        $data['phone'] = $this->db->get_where('tbl_settings', array('type' => 'phone'))->row()->description;
        $data['email'] = $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description;
        $data['logo'] = $this->db->get_where('tbl_settings', array('type' => 'logo'))->row()->description;

        $orders = $this->db->get_where('tbl_order', array('order_id' => $order_id))->row();
        
        // get item
        $items = explode(",", $orders->order_items);
        $this->db->where_in('product_id', $items);
		$products = $this->db->get('tbl_product');

        $data['orders'] = $orders;
		$data['products'] = $products;
        $data['order_id'] = $order_id;

        $from = $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description;
        $email_customer = $from;
        $subject = 'barang sudah diterima ';
        $body = $this->load->view('mail/mailArrival', $data, true);

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'forheron@gmail.com',
            'smtp_pass' => 'labeneamata',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            // 'smtp_crypto' => 'tls'
        );
        $this->load->library('email', $config);

        $this->email->set_newline("\r\n");

        $this->email->from($from, 'Sistem Toko online');
        $this->email->to($email_customer);
        $this->email->subject($subject);
        $this->email->message($body);
        $this->email->bcc($from);
        $this->email->cc($from);

        if ($this->email->send() == false) {
            show_error($this->email->print_debugger());
        } else {
            return TRUE;
        }
    }
}