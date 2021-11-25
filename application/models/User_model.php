<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function login($data)
    { 
       	return $this->db
			->where($data)
			->get('user')
			->num_rows();

    }

    public function get_user($data)
    {  
		return $this->db
			->where($data)
			->get('user')
			->result_array()[0];
    }

	function get_all_user()
	{
		return $this->db 
			->get('user')
			->result_array();
	}
  

    public function insert($data)
    { 
        $insert = $this->db->insert('user', $data); 
        if(!$insert && $this->db->error()['code'] == 1062){
            return 0;
        }else{
            return $insert;
        }
    }  
    
    public function update($data)
    { 
        return $this->db->where('user_id', $data['user_id'])
            ->update('user', $data); 
    } 
    
    public function delete($id)
    {
        
        $this->db->where('user_id', $id); 
        if(!$this->db->delete('user')): 
            return false;
        else:
            return true;
        endif; 
    }
 
}
