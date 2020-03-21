<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send_email extends CI_Controller {

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    /**
     * Kirim email dengan SMTP Gmail.
     *
     */
    public function verifikasi($id)
    {
        // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'cbrentcars@gmail.com',  // Email gmail
            'smtp_pass'   => '14281818',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@cbrentcars.com', 'CBRentCars');

        //generate simple random code
        $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($set), 0, 12);

        $data = array(  'code'  =>  $code,
                        'aktivasi'    =>  false,
                        'user_id'   =>  $id
                    );
        $this->user_model->edit($data);

        // Email penerima
        $this->email->to('dimasadityamukhsinin@gmail.com'); // Ganti dengan email tujuan

        // Subject email
        $this->email->subject('Kirim Email dengan SMTP Gmail CodeIgniter | cbrentcars.com');

        // Isi email
        $this->email->message("Ini adalah contoh email yang dikirim menggunakan SMTP Gmail pada CodeIgniter.<br><br> Klik <strong><a href='".base_url()."send_email/activate/".$id."/".$code."' target='_blank' rel='noopener'>disini</a></strong> untuk melihat tutorialnya.");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
    }

    public function activate($id, $code){
		//fetch user details
		$user = $this->user_model->detail($id);
 
		//if code matches
		if($user->code == $code){
			//update user active status
			$data['aktivasi'] = true;
			$query = $this->user_model->activate($data, $id);
 
			if($query){
                echo 'User activated successfully';
			}
			else{
                echo 'Something went wrong in activating account';
			}
		}
		else{
            echo 'Cannot activate account. Code didnt match';
		}
	}
}