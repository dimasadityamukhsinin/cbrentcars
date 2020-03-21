<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('log');
        $this->db->order_by('waktu', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function log_sukses($email)
    {
        $waktu = date("Y-m-d H:i:s");
        $keterangan = "sukses";
        $data = array(  'waktu'   =>  $waktu,
        'email' =>  $email,
        'keterangan' => $keterangan); 
        $this->db->insert('log', $data);
    }

    public function log_gagal($email)
    {
        $waktu = date("Y-m-d H:i:s");
        $keterangan = "gagal";
        $data = array(  'waktu'   =>  $waktu,
        'email' =>  $email,
        'keterangan' => $keterangan); 
        $this->db->insert('log', $data);
    }
}
?>