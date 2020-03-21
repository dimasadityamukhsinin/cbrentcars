<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info_model extends CI_Model {

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        $this->db->select('*');
        $this->db->from('info');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('info');
        $this->db->where('info_id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    // Tambah
    public function tambah($data)
    {
        $this->db->insert('info', $data);
    }

    public function edit($data)
    {
        $this->db->where('info_id',$data['info_id']);
        $this->db->update('info',$data);
    }

    // Delete
    public function delete($data)
    {
        $this->db->where('info_id', $data['info_id']);
        $this->db->delete('info', $data);
    }
}