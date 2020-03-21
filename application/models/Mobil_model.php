<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil_model extends CI_Model {

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        $this->db->select('*');
        $this->db->from('mobil');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('mobil');
        $this->db->where('mobil_id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function hitung()
    {
        $this->db->select('*');
        $this->db->from('mobil');
        $query = $this->db->get();
        return $query->num_rows();
    }

    // Tambah
    public function tambah($data)
    {
        $this->db->insert('mobil', $data);
    }

    public function edit($data)
    {
        $this->db->where('mobil_id',$data['mobil_id']);
        $this->db->update('mobil',$data);
    }

    // Delete
    public function delete($data)
    {
        $this->db->where('mobil_id', $data['mobil_id']);
        $this->db->delete('mobil', $data);
    }
}