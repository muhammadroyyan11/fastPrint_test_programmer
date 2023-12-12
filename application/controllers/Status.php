<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status extends CI_Controller
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
            'title'       => 'Status',
            'status'    => $this->db->get('status')->result_array()  
          ];
        $this->template->load('template', 'status/data', $data);
    }
}
