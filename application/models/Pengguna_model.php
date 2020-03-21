<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('level = "pengguna"');
        $query = $this->db->get();
        return $query->result();
    }

    public function hitung()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('level = "pengguna"');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function edit($data)
    {
        $this->db->where('user_id',$data['user_id']);
        $this->db->update('user',$data);
    }

    // Delete
    public function delete($data)
    {
        $this->db->where('user_id', $data['user_id']);
        $this->db->delete('user', $data);
    }

    public function activate($data, $id){
		$this->db->where('user_id', $id);
		return $this->db->update('user', $data);
	}
}
?>