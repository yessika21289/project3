<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

        public function login()
        {
        	$username = $this->input->post('username');
        	$password = sha1(md5($this->input->post('password')));

        	$this->db->where('username', $username);
        	$this->db->where('password', $password);
        	$this->db->from('users');

        	return $this->db->count_all_results();
        }

        public function check_username($username)
        {
        	$this->db->where('username', $username);
        	$this->db->from('users');

        	return $this->db->count_all_results();
        }

        public function get_user($id = NULL)
        {
        	if(is_null($id))
        		$query = $this->db->get('users');
        	else
        		$query = $this->db->get_where('users', array('uid'=>$id));
        	$row = $query->result();
        	return $row;
        }

        public function add_user()
        {
        	$this->username = $this->input->post('username');
	        $this->password = sha1(md5($this->input->post('pwd')));
        	$this->fullname = $this->input->post('nama');
	        $this->area = $this->input->post('area');
	        $this->created_at = strtotime('now');
	        $this->updated_at = strtotime('now');

	        if($this->db->insert('users',$this))
	        {
	        	$this->session->set_flashdata('action_user','<div class="notif-box bg-success text-success">User berhasil ditambahkan.</div>');
	        }
	        else
	        {
				$this->session->set_flashdata('action_user','<div class="notif-box bg-danger text-danger">User gagal ditambahkan. Silakan ulangi lagi.</div>');
	        }
        }

        public function edit_user()
        {
           	if(!empty($this->input->post('pwd')))
	        	$this->password = sha1(md5($this->input->post('pwd')));
        	$this->fullname = $this->input->post('nama');
	        $this->area = $this->input->post('area');
	        $this->created_at = strtotime('now');
	        $this->updated_at = strtotime('now');

	        $this->db->where('uid',$this->input->post('user_id'));

	        if($this->db->update('users',$this))
	        {
	        	$this->session->set_flashdata('action_user','<div class="notif-box bg-success text-success">User berhasil diedit.</div>');
	        }
	        else
	        {
				$this->session->set_flashdata('action_user','<div class="notif-box bg-danger text-danger">User gagal diedit. Silakan ulangi kembali.</div>');
	        }
        }

        public function delete_user($id)
        {
        	$this->db->where('uid', $id);
        	if($this->db->delete('users'))
        		$this->session->set_flashdata('action_user','<div class="notif-box bg-success text-success">User berhasil dihapus.</div>');
        	else
        		$this->session->set_flashdata('action_user','<div class="notif-box bg-danger text-danger">User gagal dihapus. Silakan ulangi kembali.</div>');
        }

        public function area()
        {
        	$this->db->distinct();
        	$this->db->select('area');
        	$query = $this->db->get('users');
        	$row = $query->result();
        	return $row;
        }

        public function get_user_access()
        {
            $query = $this->db->get('user_access');
            return $query->result();
        }

        public function update_permission()
        {
            $this->db->set($this->input->post('role'), $this->input->post('value'));
            $this->db->where('id', $this->input->post('id'));
            $query = $this->db->update('user_access');
            return $query;
        }
}