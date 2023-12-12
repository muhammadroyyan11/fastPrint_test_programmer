<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{

    public function get_produk()
    {
        $this->db->select('a.id_produk, a.nama_produk, a.harga, b.nama_kategori, c.nama_status');
        $this->db->from('produk a');
        $this->db->join('kategori b', 'b.id_kategori=a.kategori_id');
        $this->db->join('status c', 'c.id_status=a.status_id');
        $this->db->where('c.nama_status', 'bisa dijual');
        return $this->db->get();
    }

}
