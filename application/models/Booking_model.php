<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        $this->db->select('*');
        $this->db->from('hasil_transaksi');
        $this->db->where('status = "booking"');
        $query = $this->db->get();
        return $query->result();
    }

    public function hitung()
    {
        $this->db->select('*');
        $this->db->from('hasil_transaksi');
        $this->db->where('status = "booking"');
        $query = $this->db->get();
        return $query->num_rows();
    }

    // Delete
    public function delete($data)
    {
        $this->db->where('transaksi_id', $data['transaksi_id']);
        $this->db->delete('transaksi', $data);
    }
}