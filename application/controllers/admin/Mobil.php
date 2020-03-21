<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller {

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mobil_model');
        // Proteksi Halaman
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $mobil = $this->mobil_model->listing();
        $data = array(  'title'     =>  'Daftar Mobil',
                        'mobil'      =>  $mobil,
                        'isi'       =>  'admin/mobil/list'
                    );
        $this->load->view('admin/layout/wrapper',$data,false);
    }

    public function detail($id = null)
    {
        if (!isset($id)) show_404();
        $mobil = $this->mobil_model->detail($id);
        $data = array(  'title'     =>  $mobil->nama,
                        'mobil'  =>  $mobil,
                        'isi'       =>  'admin/mobil/detail'
                    );
        $this->load->view('admin/layout/wrapper',$data,false);
    }

    public function tambah()
    {
        $valid = $this->form_validation;

        $valid->set_rules('nama', 'Nama', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('warna', 'Warna', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('harga', 'Harga', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('status', 'Status', 'required',
                    array('required'    =>  "%s Harus diisi"));

        if($valid->run()){
            $config['upload_path']          = './assets/upload/image/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']         = '2400';//Dalam KB
            $config['max_width']        = '2024';
            $config['max_height']       = '2024';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('foto')){      
                $data = array(  'title' =>  'Tambah Mobil',
                                'error' =>  $this->upload->display_errors(),
                                'isi'      => 'admin/mobil/tambah'
                            );          
                $this->load->view('admin/layout/wrapper',$data,false);
        }else{
            $upload_gambar = array('upload_data' => $this->upload->data());
            $i = $this->input;

            $data = array(  //Disimpan nama file gambar
                            'foto'      =>  $upload_gambar['upload_data']['file_name'],
                            'nama'      =>  $i->post('nama'),
                            'warna'     =>  $i->post('warna'),
                            'harga'     =>  $i->post('harga'),
                            'status'    =>  $i->post('status'),
                        );
            $this->mobil_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/mobil'));
        }}
        $data = array(  'title' =>  'Tambah Mobil',
                        'isi'   =>  'admin/mobil/tambah'
                    );          
        $this->load->view('admin/layout/wrapper',$data,false);
    }

    //Edit
    public function edit($id = null)
    {
        if (!isset($id)) show_404();

            $mobil = $this->mobil_model->detail($id);

            //validasi input
            $valid      = $this->form_validation;

            $valid->set_rules('nama', 'Nama', 'required',
                        array('required'    =>  "%s Harus diisi"));
    
            $valid->set_rules('warna', 'Warna', 'required',
                        array('required'    =>  "%s Harus diisi"));
    
            $valid->set_rules('harga', 'Harga', 'required',
                        array('required'    =>  "%s Harus diisi"));
    
            $valid->set_rules('status', 'Status', 'required',
                        array('required'    =>  "%s Harus diisi"));
            
            if($valid->run()){
                //Cek jika gambar diganti
                if(!empty($_FILES['foto']['name'])){
                    
                $config['upload_path']      = './assets/upload/image/';
                $config['allowed_types']    = '*';
                $config['max_size']         = '2400';//Dalam KB
                $config['max_width']        = '2024';
                $config['max_height']       = '2024';
                
                $this->load->library('upload',$config);
                
                if(!$this->upload->do_upload('foto')){
                //Akhir Validasi
            
                $data = array(  'title'     =>  'Edit Mobil',
                                'mobil'   =>  $mobil,
                                'error'       => $this->upload->display_errors(),
                                'isi'       =>  'admin/mobil/edit'
                            );
                $this->load->view('admin/layout/wrapper', $data, false);
                if (!$mobil) show_404();
            //masuk database
            }else{
                $upload_gambar = array('upload_data' => $this->upload->data());
                    
                //Buat thumbnail gambar
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
                //lokasi folder thumbnail
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['width']            = 250;//Dalam Pixel
                $config['height']           = 250;//Dalam Pixel
                $config['thumb_marker']     = '';

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();
                //Akhir buat thumbnail

                if($mobil->foto)
                {
                    unlink('assets/upload/image/'.$mobil->foto);
                }
                
                $i = $this->input;
                
                $data = array(  //Disimpan nama file gambar
                                'foto'          =>  $upload_gambar['upload_data']['file_name'],
                                'mobil_id'  =>  $id,
                                'nama'      =>  $i->post('nama'),
                                'warna'     =>  $i->post('warna'),
                                'harga'     =>  $i->post('harga'),
                                'status'    =>  $i->post('status'),
                            );
                $this->mobil_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data telah diedit');
                redirect(base_url('admin/mobil'), 'refresh');
                
            }}else{
                //Edit produk tanpa ganti gambar
                $i = $this->input;
                
                $data = array(  //Disimpan nama file gambar(gambar tidak diganti)
                                // 'foto'          =>  $upload_gambar['upload_data']['file_name'],
                                'mobil_id'  =>  $id,
                                'nama'      =>  $i->post('nama'),
                                'warna'     =>  $i->post('warna'),
                                'harga'     =>  $i->post('harga'),
                                'status'    =>  $i->post('status'),
                            );
                $this->mobil_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data telah diedit');
                redirect(base_url('admin/mobil'), 'refresh');
            }}
            //akhir masuk database
            $data = array(  'title'     =>  'Edit Mobil',
                            'mobil'      =>  $mobil,
                            'isi'       =>  'admin/mobil/edit'
                        );
            $this->load->view('admin/layout/wrapper', $data, false);
    }

    // Delete
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

            $data = array('mobil_id' => $id);
            if (!$data) {
                show_404();
            }else{

                $mobil = $this->mobil_model->detail($id);

                if($mobil->foto != "") {
                    unlink('assets/upload/image/'.$mobil->foto);
                }
                $this->mobil_model->delete($data);
                $this->session->set_flashdata('sukses', 'Data telah dihapus');
                redirect(base_url('admin/mobil'), 'refresh');
            }
    }
}
?>