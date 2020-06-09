<?php
class Site_security extends CI_Controller 
{

    function __construct() {
        parent::__construct();
       
    }

    public function xss_clean($data)
    {  
        return $this->security->xss_clean($data);
    }
 
    
    public function CSRFVerify()
    { 
        error_reporting(0);
        $headers = apache_request_headers();
        
        $csrf_token = $headers['Authkey'];
        
        if($this->security->get_csrf_hash() === $csrf_token){
            return;
        }else{
            echo json_encode([ 'code' => 400, 'error' => 'Bad request ,Unknown User!' ]);
            die;
        }
    }

    // public function Encrypt($string) {
    //     $cryptKey  = ":jC!a-rfc9GFEg^7(*6NDGhrH?V!+gzYb|tS+-&}M!onG9=#],p3= kMu|5+tFmy";
    //     $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $string, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    //     return( $qEncoded );
    // }

    // public function Decrypt($string){
    //     $cryptKey  = ":jC!a-rfc9GFEg^7(*6NDGhrH?V!+gzYb|tS+-&}M!onG9=#],p3= kMu|5+tFmy";
    //     $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $string ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    //     return( $qDecoded );
    // }
    
    public function Encryptor($action, $string) {
        $output = false;
    
        $encrypt_method = "AES-256-CBC";
        //pls set your unique hashing key
        $secret_key = 'hitenVkuld%:bTXz,3r>6|FW#!7eSs>vM~n+48~{Mh$#A4p).)#wV3^_y-B.6WCar=b4.';
        $secret_iv = '3w8XD|r@n:nxp|oml]nw$-KEc|rT$H).(~ &`gnV!vD0vs|?r]#Zdr-qRlOV@&#6';
        // hash
        $key = hash('sha256', $secret_key);
    
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
    
        //do the encyption given text/string/number
        if( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        else if( $action == 'decrypt' ){
            //decrypt the given text/string/number
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
    
        return $output;
    }

    public function RandomPassword( $pw_length = 8, $use_caps = true, $use_numeric = true, $use_specials = true ) {
        /*$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;*/
        $caps = array();
        $numbers = array();
        $num_specials = 0;
        $reg_length = $pw_length;
        $pws = array();
        for ($ch = 97; $ch <= 122; $ch++) $chars[] = $ch; // create a-z
        if ($use_caps) for ($ca = 65; $ca <= 90; $ca++) $caps[] = $ca; // create A-Z
        if ($use_numeric) for ($nu = 48; $nu <= 57; $nu++) $numbers[] = $nu; // create 0-9
        $all = array_merge($chars, $caps, $numbers);
        if ($use_specials) {
            $reg_length =  ceil($pw_length*0.75);
            $num_specials = $pw_length - $reg_length;
            if ($num_specials > 5) $num_specials = 5;
            for ($si = 33; $si <= 47; $si++) $signs[] = $si;
            $rs_keys = array_rand($signs, $num_specials);   
            foreach ($rs_keys as $rs) {
                $pws[] = chr($signs[$rs]);
            }
        } 
        $rand_keys = array_rand($all, $reg_length);
        foreach ($rand_keys as $rand) {
            $pw[] = chr($all[$rand]);
        }   
        $compl = array_merge($pw, $pws);    
        shuffle($compl);
        return implode('', $compl);
    }
    
    function HashPassword($password)
    {  
        $options = array("cost"=>12,'salt'=>'G#&eW*<K}_iIlx5>^RrY5{nAiR;8+JiFhSzoJZMB^W:vU2}`@8xb6%pU-5p_:MYp');
        $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
        return $hashPassword;
    }

    function VerifyPassword($password,$hash){
        return password_verify($password,$hash);
    }


    function test() {
        $name = "David";
        $hashed_name = $this->_hash_string($name);
        echo $hashed_name;

        echo "<hr>";
        $submitted_name = $name; //"Andy";
        $result = $this->_verify_hash($submitted_name, $hashed_name);

        if ($result == TRUE) {
            echo "well done";
        } else {
            echo "fail";
        }
    }

    function _check_admin_login_details($username, $pword) {
        $this->db->where('name', $username);
        $result = $this->db->get('tbl_users');

        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                $pass = $row->password;
                $mail = $row->email;
                $user = $row->name;
                $user_id = $row->userId;

                if (($this->_verify_hash($pword, $pass)) && ($username == $user)) {
                    return TRUE;
                } else {
                    return FALSE;
                }

                // set session user data
                $this->session->set_userdata('username', $user);
                $this->session->set_userdata('id_admin', $user_id);
            }
        }
    }

    // function _check_user_login_details($username, $pword) {

    //     $this->load->module('manage_daftar');
    //     $this->load->helper('email');
    //     $user_terdaftar = false;

    //     $cekusername = $this->manage_daftar->get_where_custom('username', $username);
    //     $cekemail = $this->manage_daftar->get_where_custom('email', $username);

    //     if($cekusername->num_rows() > 0 || $cekemail->num_rows() > 0){
    //         $user_terdaftar = true;
    //         if(valid_email($username)){
    //             $result = $cekemail;
    //         }else{
    //             $result = $cekusername;
    //         }
    //     }

    //     if ($user_terdaftar) {
    //         foreach ($result->result() as $row) {
    //             $pass = $row->pword;
    //             $mail = $row->email;
    //             $user = $row->username;

    //             if (($this->_verify_hash($pword, $pass)) && ($username == $user || $username == $mail)) {
    //                 return TRUE;
    //             } else {
    //                 return FALSE;
    //             }
    //         }
    //     }else{
    //         return FALSE;
    //     }
    // }

    // function _make_sure_logged_in() {
    //     $user_id = $this->_get_user_id();
    //     if (!is_numeric($user_id)) {
    //         redirect('login');
    //     }    
    // }

    // function _get_user_id() {
    //     $user_id = $this->session->userdata('user_id');
    //     if (!is_numeric($user_id)) {
    //         $this->load->module('site_cookies');
    //         $user_id = $this->site_cookies->_attempt_get_user_id();
    //     }
    //     return $user_id;
    // }

    // function _get_user_mail() {
    //     $user_id = $this->session->userdata('user_id');
    //     if (is_numeric($user_id)) {
    //         $this->load->module('manage_akun');
    //         $data = $this->manage_akun->fetch_data_from_db($user_id);
    //         $user_email = $data['email'];
    //     }
    //     return $user_email;
    // }

    function generate_random_string($length) {
        $characters = '23456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    function generate_random_number($length) {
        $characters = '123456789';
        $randomNumber = '';
        for ($i = 0; $i < $length; $i++) {
            $randomNumber .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomNumber;
    }

    function _hash_string($str) {
        $hashed_string = password_hash($str, PASSWORD_BCRYPT, array(
            'cost' => 10
            ));
        return $hashed_string;
    }

    function _verify_hash($plain_text_str, $hashed_string) {
        $result = password_verify($plain_text_str, $hashed_string);
        return $result; //TRUE or FALSE 
    }

    function _encrypt_string($str) {
        $this->load->library('encryption');
        $encrypted_string = $this->encryption->encrypt($str);
        return $encrypted_string;
    }

    function _decrypt_string($str) {
        $this->load->library('encryption');
        $decrypted_string = $this->encryption->decrypt($str);
        return $decrypted_string;
    }

    function get_target_base_url() {
        $first_bit = $this->uri->segment(1);
        $second_bit = $this->uri->segment(2);
        $target_base_url = $first_bit."/".$second_bit;
        return $target_base_url;
    }

 


    function _make_sure_is_admin() {
        // $is_admin = TRUE; 
        $is_admin = $this->session->userdata('is_admin');

        if ($is_admin == 1) {
            return TRUE;
        } else {
            redirect('site_security/not_allowed');
        }

        // if ($is_admin != TRUE) {
        //     redirect('site_security/not_allowed');
        // }
    }    

    function not_user_allowed() {
        redirect('youraccount/login');
    }

    function not_allowed() {
        redirect('dvilsf');
        // echo "Your are not allowed to be here";
    }

}