<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Selesai extends CI_Controller {

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('selesai_model');
        // Proteksi Halaman
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $selesai = $this->selesai_model->listing();
        $data = array(  'title'     =>  'Daftar Selesai',
                        'selesai'      =>  $selesai,
                        'isi'       =>  'admin/selesai/list'
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
                $this->selesai_model->delete($data);
                $this->session->set_flashdata('sukses', 'Data telah dihapus');
                redirect(base_url('admin/selesai'), 'refresh');
            }
    }
}
?>