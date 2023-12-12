<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Base_model', 'base');
        $this->load->model('Produk_model', 'produk');
    }

    public function index()
    {
        $data = [
            'title'       => 'Produk',
            'produk'    => $this->produk->get_produk('kategori')->result_array()  
          ];

        $this->template->load('template', 'produk/data', $data);
    }

    public function proses_update()
    {
        echo 'Halo';
    }
}
