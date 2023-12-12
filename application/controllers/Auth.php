<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth');
        $this->load->model('Base_model', 'base');
    }

    private function _has_login()
    {
        if ($this->session->has_userdata('login_session')) {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $this->_has_login();

        $date_db = $this->auth->get_data();
        $username_db = $this->auth->get_username();

        $currentHour = date('H');

        $newHour = $currentHour + 1;

        $newHour = ($newHour >= 24) ? 0 : $newHour;


        if ($date_db->updated_at < date('Y-m-d H:i:s')) {
            $params = [
                'username' => 'tesprogrammer' . date('d') . date('m') . date('y') . 'C' . $newHour,
                'password' => md5('bisacoding-' . date('d') . '-' . date('m') . '-' . date('y') . ''),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $this->base->edit('user', $params);
        }

        

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Aplikasi';
            $this->template->load('tempauth', 'auth/auth', $data);
        } else {
            $input = $this->input->post(null, true);

            $cek_username = $this->auth->cek_username($input['username']);
            if ($cek_username > 0) {
                $password = $this->auth->get_password($input['username']);
                $inputPassword = md5($input['password']);
                if ($password == $inputPassword) {
                    $user_db = $this->auth->userdata($input['username']);
                    if ($user_db['is_active'] != 1) {
                        set_pesan('akun anda belum aktif/dinonaktifkan. Silahkan hubungi admin.', false);
                        redirect('auth');
                    } else {
                        $userdata = [
                            'user'  => $user_db['id_user'],
                            'role'  => $user_db['role'],
                            'username' => $user_db['username'],
                            'password' => $user_db['password'],
                            'timestamp' => time()
                        ];
                        $this->session->set_userdata('login_session', $userdata);
                        redirect('dashboard');
                    }
                } else {
                    set_pesan('password salah', false);
                    redirect('auth');
                }
            } else {
                set_pesan('username belum terdaftar', false);
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('login_session');

        set_pesan('anda telah berhasil logout');
        redirect('auth');
    }

    // public function register()
    // {
    //     $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]|alpha_numeric');
    //     $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|trim');
    //     $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]|trim');
    //     $this->form_validation->set_rules('nama_lengkap', 'Nama', 'required|trim');
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
    //     $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim');

    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = 'Buat Akun';
    //         $this->template->load('tempauth', 'auth/register', $data);
    //     } else {
    //         unset($input['password2']);
    //         $input['password']      = password_hash($input['password'], PASSWORD_DEFAULT);
    //         $input['role']          = 'gudang';
    //         $input['foto']          = 'user.png';
    //         $input = $this->input->post(null, true);
    //         $input['is_active']     = 0;
    //         $input['created_at']    = time();

    //         $query = $this->base->insert('user', $input);
    //         if ($query) {
    //             set_pesan('daftar berhasil. Selanjutnya silahkan hubungi admin untuk mengaktifkan akun anda.');
    //             redirect('auth');
    //         } else {
    //             set_pesan('gagal menyimpan ke database', false);
    //             redirect('register');
    //         }
    //     }
    // }
}
