<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('booking_model');
        // Proteksi Halaman
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $booking = $this->booking_model->listing();
        $data = array(  'title'     =>  'Daftar Booking',
                        'booking'      =>  $booking,
                        'isi'       =>  'admin/booking/list'
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
                $this->transaksi_model->delete($data);
                $this->session->set_flashdata('sukses', 'Data telah dihapus');
                redirect(base_url('admin/booking'), 'refresh');
            }
    }
}
?>