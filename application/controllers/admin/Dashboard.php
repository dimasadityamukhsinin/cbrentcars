<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengguna_model');
        $this->load->model('log_model');
        $this->load->model('booking_model');
        $this->load->model('sedangdipakai_model');
        $this->load->model('selesai_model');
        $this->load->model('mobil_model');
        // Proteksi Halaman
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $log = $this->log_model->listing();
        $pengguna = $this->pengguna_model->hitung();
        $booking = $this->booking_model->hitung();
        $sedang_dipakai = $this->sedangdipakai_model->hitung();
        $selesai = $this->selesai_model->hitung();
        $mobil = $this->mobil_model->hitung();
        $data = array(  'title'     =>  'Dashboard',
                        'pengguna'  =>  $pengguna,
                        'log'       =>  $log,
                        'booking'       =>  $booking,
                        'sedang_dipakai'       =>  $sedang_dipakai,
                        'selesai'       =>  $selesai,
                        'mobil'       =>  $mobil,
                        'isi'       =>  'admin/dashboard/list'
                    );
        $this->load->view('admin/layout/wrapper',$data,false);
    }
}
?>