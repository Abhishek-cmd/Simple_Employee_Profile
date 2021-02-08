<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->table = "user";
	}

	public function checkDuplicate($email)
	{
		$this->db->select('email');
		$this->db->from('user');
		$this->db->like('email', $email);
		return $this->db->count_all_results();
	}

	public function get_all_details($id){
        $this->db->select('*');
		$this->db->from('user');
		$this->db->where('id', $id);
		$query = $this->db->get();
        return $query->result();
	}

	public function checkLogin($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('user');
        return $query->num_rows();
    }

	function login_check($login, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email', $login);
        $this->db->where('password', md5($password));
		$this->db->limit(1);
		$query = $this->db->get();

		if($query->num_rows() == 1){
		   return true;
		}else{
		   return false;
		}
	}

	public function insertUser($data)
	{
		if($this->db->insert('user', $data))
		{
			return  $this->db->insert_id();
		}
		else
		{
			return false;
		}
	} 

	public function read_user_information($username) {
	    $condition = "email =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
		   return $query->result();
		} else {
		   return false;
		}
	}

	public function update_records($data, $id)
    {
        $where = array('id' => $id);
        $result = $this->db->update('user', $data, $where);
        return $result; 
    }

    public function update_change_pass($id, $new_pass)
    {
    	$this->db->where(array('id' => $id));
        $this->db->set('password', md5($new_pass));
        $result = $this->db->update('user');
        return $result; 
    }

    public function update_profile_pic($id, $profile_img)
    {
    	$this->db->where(array('id' => $id));
        $this->db->set('image', $profile_img);
        $result = $this->db->update('user');
        return $result; 
    }

    

}