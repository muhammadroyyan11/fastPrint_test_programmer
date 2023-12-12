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
            'produk'    => $this->produk->get_produk()->result_array(),
            'kategori'    => $this->db->get('kategori')->result_array(),
            'status'    => $this->db->get('status')->result_array()
        ];

        $this->template->load('template', 'produk/data', $data);
    }

    public function proses_update($id)
    {
        $post = $this->input->post(null, true);

        $params = [
            'nama_produk'   => $post['nama_produk'],
            'harga'         => $post['harga'],
            'kategori_id'   => $post['kategori'],
            'status_id'     => $post['status']
        ];

        $this->base->edit('produk', $params, ['id_produk' => $id]);


        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil di simpan');
        }

        redirect('produk');
    }

    public function delete($id)
    {
        $this->base->del('produk', ['id_produk' => $id]);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil di simpan');
        }

        redirect('produk');
    }
}
