<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengguna_model');
        // Proteksi Halaman
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $pengguna = $this->pengguna_model->listing();
        $data = array(  'title'     =>  'Akun Pengguna',
                        'pengguna'  =>  $pengguna,
                        'isi'       =>  'admin/pengguna/list'
                    );
        $this->load->view('admin/layout/wrapper',$data,false);
    }

    public function detail($id = null)
    {
        if (!isset($id)) show_404();
        $pengguna = $this->pengguna_model->detail($id);
        $data = array(  'title'     =>  'Data '.$pengguna->nama,
                        'pengguna'  =>  $pengguna,
                        'isi'       =>  'admin/pengguna/detail'
                    );
        $this->load->view('admin/layout/wrapper',$data,false);
    }

    // Delete
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

            $data = array('user_id' => $id);
            if (!$data) {
                show_404();
            }else{

                $pengguna = $this->pengguna_model->detail($id);

                if($pengguna->foto != "") {
                    unlink('assets/upload/image/'.$pengguna->foto);
                }
                $this->pengguna_model->delete($data);
                $this->session->set_flashdata('sukses', 'Data telah dihapus');
                redirect(base_url('admin/pengguna'), 'refresh');
            }
    }
}
?>