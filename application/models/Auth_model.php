<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->row();
    }

    public function get_username()
    {
        $this->db->select('username');
        $this->db->from('user');
        return $this->db->get()->row();
    }

    public function cek_username($username)
    {
        $query = $this->db->get_where('user', ['username' => $username]);
        return $query->num_rows();
    }

    public function get_password($username)
    {
        $data = $this->db->get_where('user', ['username' => $username])->row_array();
        return $data['password'];
    }

    public function userdata($username)
    {
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }
}
