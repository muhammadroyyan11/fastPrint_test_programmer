<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Base_model', 'base');
    }

    public function index()
    {
        $data = [
            'title'       => 'Kategori',
            'kategori'    => $this->db->get('kategori')->result_array()  
          ];
        $this->template->load('template', 'kategori/data', $data);
    }
}
