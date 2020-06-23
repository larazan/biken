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

        foreach ($base as $index => $base64) {
            if (!empty($base64) && !file_exists($finalFile = sprintf('%1$s/uploads/%2$s', realpath(__DIR__), $this->base64ToJpeg($base64))))
                die("Upload error {$finalFile} on index : {$index}");
        }
        print "Uploaded with success !";
    }

    function base64ToJpeg($base64_string) {
        $data = explode(';', $base64_string);
        $dataa = explode(',', $base64_string);
        $part = explode("/", $data[0]);
        if (empty($part))
            return false;
        $file = md5(uniqid(rand(), true)) . ".{$part[1]}";
        // if (!is_dir(realpath(__DIR__) . "./assets/uploads/"))
        //     mkdir(realpath(__DIR__) . "./assets/uploads/");
        $loc = realpath(APPPATH. '../assets/uploads/');
    
        $ifp = fopen(realpath(__DIR__) . "../assets/uploads/{$file}", 'wb');
        // $ifp = fopen(base_url(). "assets/uploads/{$file}", 'wb');
        fwrite($ifp, base64_decode($data[1]));
        fclose($ifp);

        // alternative
        // $this->load->helper('file');
        // $new_file_path = realpath(APPPATH. '../assets/uploads/$file'); // modify this line to point to the actual location of the file
        // write_file($new_file_path, base64_decode($data[1]));

        return $file;
    }

}