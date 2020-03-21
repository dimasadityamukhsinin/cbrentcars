<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('info_model');
        // Proteksi Halaman
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $info = $this->info_model->listing();
        $data = array(  'title'     =>  'Daftar Info',
                        'info'      =>  $info,
                        'isi'       =>  'admin/info/list'
                    );
        $this->load->view('admin/layout/wrapper',$data,false);
    }

    public function detail($id = null)
    {
        if (!isset($id)) show_404();
        $info = $this->info_model->detail($id);
        $data = array(  'title'     =>  $info->judul,
                        'info'  =>  $info,
                        'isi'       =>  'admin/info/detail'
                    );
        $this->load->view('admin/layout/wrapper',$data,false);
    }

    public function tambah()
    {
        $valid = $this->form_validation;

        $valid->set_rules('judul', 'Judul', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('deskripsi', 'Deskripsi', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('isi', 'Isi', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('tanggal', 'Tanggal', 'required',
                    array('required'    =>  "%s Harus diisi"));

        if($valid->run()){
            $config['upload_path']          = './assets/upload/image/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']         = '2400';//Dalam KB
            $config['max_width']        = '2024';
            $config['max_height']       = '2024';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('foto')){      
                $data = array(  'title' =>  'Tambah Info',
                                'error' =>  $this->upload->display_errors(),
                                'isi'      => 'admin/info/tambah'
                            );          
                $this->load->view('admin/layout/wrapper',$data,false);
        }else{
            $upload_gambar = array('upload_data' => $this->upload->data());
            $i = $this->input;

            $data = array(  //Disimpan nama file gambar
                            'foto'      =>  $upload_gambar['upload_data']['file_name'],
                            'judul'     =>  $i->post('judul'),
                            'deskripsi' =>  $i->post('deskripsi'),
                            'isi'       =>  $i->post('isi'),
                            'tanggal'   =>  $i->post('tanggal'),
                        );
            $this->info_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/info'));
        }}
        $data = array(  'title' =>  'Tambah Info',
                        'isi'   =>  'admin/info/tambah'
                    );          
        $this->load->view('admin/layout/wrapper',$data,false);
    }

    //Edit
    public function edit($id = null)
    {
        if (!isset($id)) show_404();

            $info = $this->info_model->detail($id);

            //validasi input
            $valid      = $this->form_validation;
                
            $valid->set_rules('judul', 'Judul', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('deskripsi', 'Deskripsi', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('isi', 'Isi', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('tanggal', 'Tanggal', 'required',
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
            
                $data = array(  'title'     =>  'Edit Info',
                                'info'   =>  $info,
                                'error'       => $this->upload->display_errors(),
                                'isi'       =>  'admin/info/edit'
                            );
                $this->load->view('admin/layout/wrapper', $data, false);
                if (!$info) show_404();
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

                if($info->foto)
                {
                    unlink('assets/upload/image/'.$info->foto);
                }
                
                $i = $this->input;
                
                $data = array(  //Disimpan nama file gambar
                                'foto'          =>  $upload_gambar['upload_data']['file_name'],
                                'info_id'  =>  $id,
                                'judul' =>  $i->post('judul'),
                                'deskripsi'       =>  $i->post('deskripsi'),
                                'isi'           =>  $i->post('isi'),
                                'tanggal'           =>  $i->post('tanggal'),
                            );
                $this->info_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data telah diedit');
                redirect(base_url('admin/info'), 'refresh');
                
            }}else{
                //Edit produk tanpa ganti gambar
                $i = $this->input;
                
                $data = array(  //Disimpan nama file gambar(gambar tidak diganti)
                                // 'foto'          =>  $upload_gambar['upload_data']['file_name'],
                                'info_id'  =>  $id,
                                'judul' =>  $i->post('judul'),
                                'deskripsi'       =>  $i->post('deskripsi'),
                                'isi'           =>  $i->post('isi'),
                                'tanggal'           =>  $i->post('tanggal'),
                            );
                $this->info_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data telah diedit');
                redirect(base_url('admin/info'), 'refresh');
            }}
            //akhir masuk database
            $data = array(  'title'     =>  'Edit Info',
                            'info'      =>  $info,
                            'isi'       =>  'admin/info/edit'
                        );
            $this->load->view('admin/layout/wrapper', $data, false);
    }

    // Delete
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

            $data = array('info_id' => $id);
            if (!$data) {
                show_404();
            }else{

                $info = $this->info_model->detail($id);

                if($info->foto != "") {
                    unlink('assets/upload/image/'.$info->foto);
                }
                $this->info_model->delete($data);
                $this->session->set_flashdata('sukses', 'Data telah dihapus');
                redirect(base_url('admin/info'), 'refresh');
            }
    }
}
?>