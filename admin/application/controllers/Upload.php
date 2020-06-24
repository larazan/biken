<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Upload extends BaseController
{

	function __construct()
	{
		parent::__construct();
		// $this->isLoggedIn();
	}

	public function index()
	{
		$this->load->view('upload');
    }
    
    function process() {
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
            'filename' => serialize($arr),
            'created_at' => time()
        );
        $this->db->insert('upload', $data);

        print "Uploaded with success !";
    }

    function base64ToJpeg($base64_string) {
        $data = explode(';', $base64_string);
        $dataa = explode(',', $base64_string);
        $part = explode("/", $data[0]);
        if (!empty($part)) {
            $file = md5(uniqid(rand(), true)) . ".{$part[1]}";
            
            $ifp = fopen(APPPATH."../assets/uploads/{$file}", 'wb');
            fwrite($ifp, base64_decode($dataa[1]));
            fclose($ifp);
        }
        return $file;
        var_dump($file);
    }

    function tes() {
        $res = md5(uniqid(rand()));
        echo $res;
    }

    function jpegToBase64() {
        $id = 14;
        $data = $this->db->get_where('upload' , array('id' => $id))->row()->filename;
        $uns = unserialize($data);
        // var_dump($data);
        // var_dump(unserialize($data));
        // die();

        $res = [];
        foreach ($uns as $path) {
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents(APPPATH."../assets/uploads/".$path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            array_push($res, $base64);
        }

        var_dump($res);
        
    }

}