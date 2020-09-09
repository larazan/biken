<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layout extends CI_Controller
{
	public function __construct()
	{
        parent::__construct();
    }

    public function home() {
		$this->load->view('halaman/home');
    }

    public function detail() {
		$this->load->view('halaman/detail');
    }

    public function kategori() {
		$this->load->view('halaman/kategori');
    }

    public function blog() {
		$this->load->view('halaman/blog');
    }

    public function blog_detail() {
		$this->load->view('halaman/blog_detail');
    }

    public function cart() {
		$this->load->view('halaman/cart');
    }

    public function checkout() {
		$this->load->view('halaman/checkout');
    }

    public function contact() {
		$this->load->view('halaman/contact');
    }

    public function register() {
		$this->load->view('halaman/register');
    }

  
}