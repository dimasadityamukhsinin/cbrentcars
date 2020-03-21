<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function login($email,$password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(array( 'email'  =>  $email,
                                'password'  =>  $password
                        ));
        $query = $this->db->get();
        return $query->row();
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

    public function activate($data, $id){
		$this->db->where('user_id', $id);
		return $this->db->update('user', $data);
	}
}
?>