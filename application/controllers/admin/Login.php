<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('log_model');
    }
    
    public function index()
    {
        //Validasi 
        $this->form_validation->set_rules('email','Email','required',
                                         array('required' => '%s harus diisi'));
        
        $this->form_validation->set_rules('password','Password','required',
                                         array('required' => '%s harus diisi'));
        
        if($this->form_validation->run())
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $md5password = md5($password);
            //Proses ke simple login
            $this->simple_login->login($email,$md5password);
        }
        //Akhir Validasi
        
        $data = array(  'title' => 'Login',
                     );
        $this->load->view('admin/login',$data,FALSE);
    }
    
    //Fungsi logout
    public function logout()
    {
        // Ambil fungsi logout dari simple login
        $this->simple_login->logout();
    }
}