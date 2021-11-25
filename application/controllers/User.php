<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller { 


	public function __construct()
    {
        parent:: __construct();

        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

	public function index()
	{
		$data['page_title'] = "User";
		$data['user'] = $this->user_model->get_all_user();
		$this->load->view('admin/user', $data);
	} 
	public function add()
	{
		$data['page_title'] = "Add User"; 
		$this->load->view('admin/add_user', $data);
	} 

	
	public function insert()
	{
		$data = array(
			"name" => trim($_POST['name']),
			"username" => trim($_POST['username']),
			"password" => md5($_POST['password']),
			"role_type" => $_POST['role_type'],
		);
		$insert = $this->user_model->insert($data);

		if($insert){
			$data = array(
				'response' => true,
				'message' => "New Record Successfully Added!"
			);

		}else{

			$data = array(
				'response' => false,
				'message' => "Unable to add new record!"
			); 
		}

		echo json_encode($data);
	} 

	public function edit($user_id)
	{
		$user_info = array(
			'user_id' => $user_id
		);

		$data['page_title'] = "Edit User"; 
		$data['user'] = $this->user_model->get_user($user_info); 
		$this->load->view('admin/edit_user', $data); 
	}

	public function update($user_id)
	{
		$data = array(
			"user_id" => $user_id,
			"name" => trim($_POST['name']),
			"username" => trim($_POST['username']), 
			"role_type" => $_POST['role_type'],
		);
		$update = $this->user_model->update($data);

		if($update){
			$data = array(
				'response' => true,
				'message' => "Record Successfully Updated!"
			);

		}else{

			$data = array(
				'response' => false,
				'message' => "Unable to update  record!"
			); 
		}

		echo json_encode($data);
	}

	public function delete($user_id)
	{
		$delete = $this->user_model->delete($user_id);
		if($delete){

			$data = array(
				'response' => true,
				'message' => "Record Successfully Deleted!"
			);
		}else{

			$data = array(
				'response' => false,
				'message' => "Unable to delete  record!"
			); 
		}

		echo json_encode($data);
	}


}
