<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        date_default_timezone_set('Asia/Jakarta');
        // // $this->load->model('Auth_model', 'auth');
        // $this->load->model('Admin_model', 'admin');
        $this->load->model('Base_model', 'base');
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $username = userdata('username');
        $password = userdata('password');

        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, 'https://recruitment.fastprint.co.id/tes/api_tes_programmer');
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_POST, 1);
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(
            'username' => $username,
            'password' => $password
        ));

        
        $buffer = curl_exec($curl_handle);
        curl_close($curl_handle);

        $result = json_decode($buffer);

        if (isset($result->error) && $result->error == '0') {

            //Kategori
            foreach ($result->data as $key => $data) {
                $params = [
                    'nama_kategori' => $data->kategori
                ];


                if (!$this->base->is_duplicate('kategori', 'nama_kategori', $data->kategori)) {
                    // Data doesn't exist, insert it
                    $this->base->add('kategori', $params);
                }
            };

            //Status
            foreach ($result->data as $key => $data) {
                $params = [
                    'nama_status' => $data->status
                ];

                if (!$this->base->is_duplicate('status', 'nama_status', $data->status)) {
                    // Data doesn't exist, insert it
                    $this->base->add('status', $params);
                }
            };

            //Produk
            foreach ($result->data as $key => $data) {
                $params = [
                    'nama_produk' => $data->nama_produk,
                    'harga'       => $data->harga,
                    'kategori_id' => $this->base->get_id('kategori', ['nama_kategori' => $data->kategori])->row()->id_kategori,
                    'status_id' => $this->base->get_id('status', ['nama_status' => $data->status])->row()->id_status
                ];

                if (!$this->base->is_duplicate('produk', 'nama_produk', $data->nama_produk)) {
                    // Data doesn't exist, insert it
                    $this->base->add('produk', $params);
                }
            };
        } else {
            echo 'Something has gone wrong';
        }

        $this->template->load('template', 'dashboard/dashboard', $data);
    }

    // function get_data_api()
    // {
    //     $username = userdata('username');
    //     $password = userdata('password');

    //     // Set up and execute the curl process
    //     $curl_handle = curl_init();
    //     curl_setopt($curl_handle, CURLOPT_URL, 'https://recruitment.fastprint.co.id/tes/api_tes_programmer');
    //     curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($curl_handle, CURLOPT_POST, 1);
    //     curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(
    //         'username' => 'tesprogrammer121223C11',
    //         'password' => $password
    //     ));

    //     // Optional, delete this line if your API is open
    //     // curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);

    //     $buffer = curl_exec($curl_handle);
    //     curl_close($curl_handle);

    //     $result = json_decode($buffer);

    //     if (isset($result->error) && $result->error == '0') {

    //         foreach ($result->data as $key => $data) {
    //             $params = [
    //                 'nama_kategori' => $data->kategori
    //             ];

    //             $this->base->add('kategori', $params);

    //             if (!$this->base->is_duplicate('kategori', 'nama_kategori', $params)) {
    //                 // Data doesn't exist, insert it
    //                 $this->base->add('kategori', $params);
    //                 echo 'Data inserted successfully.';
    //             } else {
    //                 echo 'Data already exists.';
    //             }
    //         };
    //     } else {
    //         echo 'Something has gone wrong';
    //     }
    //     // $url = 'https://recruitment.fastprint.co.id/tes/api_tes_programmer';

    //     // /* Init cURL resource */
    //     // $ch = curl_init($url);

    //     // /* Array Parameter Data */
    //     // $data = ['username'=>'tesprogrammer111223C21', 'password'=>'f016e5eef673d97be29dc9941381bbdb'];

    //     // /* pass encoded JSON string to the POST fields */
    //     // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    //     // /* set the content type json */
    //     // // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

    //     // /* set return type json */
    //     // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //     // /* execute request */
    //     // $result = curl_exec($ch);

    //     // /* close cURL resource */
    //     // curl_close($ch);

    //     // var_dump($result);
    // }
}
