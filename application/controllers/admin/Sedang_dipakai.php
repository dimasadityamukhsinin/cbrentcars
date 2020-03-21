<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sedang_dipakai extends CI_Controller {

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sedangdipakai_model');
        // Proteksi Halaman
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $sedang_dipakai = $this->sedangdipakai_model->listing();
        $data = array(  'title'     =>  'Daftar Sedang Dipakai',
                        'sedang_dipakai'      =>  $sedang_dipakai,
                        'isi'       =>  'admin/sedang_dipakai/list'
                    );
        $this->load->view('admin/layout/wrapper',$data,false);
    }

    // Delete
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

            $data = array('transaksi_id' => $id);
            if (!$data) {
                show_404();
            }else{
                $this->sedangdipakai_model->delete($data);
                $this->session->set_flashdata('sukses', 'Data telah dihapus');
                redirect(base_url('admin/sedang_dipakai'), 'refresh');
            }
    }
}
?>