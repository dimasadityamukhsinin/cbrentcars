<?php
if($this->session->userdata('level') == ""){
    $this->CI->session->set_flashdata('warning','Anda belum login');
    redirect(base_url('admin/login'),'refresh');
}
//Gabungkan semua bagian layout menjadi satu
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');
?>