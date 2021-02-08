<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->helper('url','captcha');
	    $this->load->library(['form_validation', 'session', 'upload']);
        $this->load->database();
	    $this->load->model('Login_model');
	}

	public function index()
	{
		$this->load->view('login_view');
	}

	public function add_login() {

		$this->form_validation->set_rules('input_email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('input_password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
			   $this->load->view('dashboard');
			}else{
			   $this->load->view('login_view');
			}
		} else {
			$login = $this->input->post('input_email');
	        $password = $this->input->post('input_password');

	        $result = $this->Login_model->login_check($login, $password);

			if ($result == TRUE) {
				$username = $this->input->post('input_email');
				$result = $this->Login_model->read_user_information($username);
				if ($result != false) {
					$session_data = array(
						'name' => $result[0]->name,
						'email' => $result[0]->email,
						'mobile' => $result[0]->mobile,
						'id' => $result[0]->id,
						'image' => $result[0]->image,
					);

					$data = array(
						'name' => $result[0]->name,
						'email' => $result[0]->email,
						'mobile' => $result[0]->mobile,
						'id' => $result[0]->id,
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					$this->load->view('dashboard', $data);
				}
			} else {
				$data = array(
				    'error_message' => 'Invalid Username or Password'
				);
				$this->load->view('login_form', $data);
			}
		}
	}

	public function add_register(){
		$this->form_validation->set_rules('input_username', 'User Name', 'trim|required');
		$this->form_validation->set_rules('input_email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('input_mobile', 'Mobile', 'trim|required');
		$this->form_validation->set_rules('input_password', 'Password', 'trim|required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[input_password]');

		$this->form_validation->set_error_delimiters('<div class="error-msg">', '</div>');

		if($this->form_validation->run() == FALSE){
            $this->load->view('register_view');
		}else{
			$input_username 	= $this->security->xss_clean($this->input->post('input_username'));
			$input_email 	= $this->security->xss_clean($this->input->post('input_email'));
			$input_mobile 		= $this->security->xss_clean($this->input->post('input_mobile'));
			$input_password 	= $this->security->xss_clean($this->input->post('input_password'));
			$hashPassword = md5($input_password);

			$insert_data = array(
			    'name' => $input_username,
			    'email' => $input_email,
			    'mobile' => $input_mobile,
			    'password' => $hashPassword,
			    'image' => '',
			    'created_on' => date('Y-m-d H:i:s'),
			    'status' => '1'
			);

			$checkDuplicate = $this->Login_model->checkDuplicate($input_email);

			if($checkDuplicate == 0){
                $insertUser = $this->Login_model->insertUser($insert_data);
			
				if($insertUser)
				{
					$data['status'] = 'true';
					$data['message_display'] = 'New User Register Successfully.';
					$this->load->view('register_view',$data);
				}
				else
				{   
					$data['status'] = 'false';
					$data['error_message'] = 'Unable to save user. Please try again';
					$this->load->view('register_view',$data);
				}
			}else{
				$data['status'] = 'false';
                $data['message_display'] = 'User email alreary exists';
				$this->load->view('register_view',$data);
			}
		}	
		
	}


	public function update_user(){
		$id = $this->input->post('emp_id');

		$result = $this->Login_model->get_all_details($id);

		$session_update = array(
            'name' => $this->input->post('user_name'),
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'id' => $id,
            'image' => $result[0]->image
        );

        $this->session->set_userdata('logged_in', $session_update);

		$data_update = array(
            'name' => $this->input->post('user_name'),
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'status' => '1',
            'updated_on' => date('Y-m-d H:i:s'),
        );        
        
		$result = $this->Login_model->update_records($data_update, $id);

		if($result == 'true'){
			$data['status'] = 'true';
			$data['message_display'] = 'Data Updated Successfully';
		    $this->load->view('dashboard', $data);
		}else{
			$data['status'] = 'false';
			$data['message_display'] = 'Data not Updated';
		    $this->load->view('dashboard', $data);
		}
	}

	public function update_password(){
		$id = $this->input->post('emp_id');

		$old_pass=$this->input->post('old_pass');
		$new_pass=$this->input->post('new_pass');
		$confirm_pass=$this->input->post('confirm_pass');

		$old_pass_check = $this->Login_model->get_all_details($id);

		$check = $old_pass_check[0]->password;

		if((!strcmp(md5($old_pass), $check)) && (!strcmp($new_pass, $confirm_pass))){
            $result = $this->Login_model->update_change_pass($id, $new_pass);
            if($result == 'true'){
				$data['status'] = 'true';
				$data['message_display'] = 'New Password Updated Successfully';
			    $this->load->view('dashboard', $data);
			}else{
				$data['status'] = 'false';
				$data['message_display'] = 'Password not update Successfully';
			    $this->load->view('dashboard', $data);
			}
		}else{
			$data['status'] = 'false';
			$data['message_display'] = 'Password not match properly, Please check';
		    $this->load->view('dashboard', $data);
		}
	}

	public function update_avatar(){
		$id = $this->input->post('emp_id');
		if(!empty($_FILES['profile_pic']['name'])){
            $config['upload_path'] = 'application/assets/uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['profile_pic']['name'];
            
            //Load upload library and initialize here configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            
            if($this->upload->do_upload('profile_pic')){
                $uploadData = $this->upload->data();
                $profile_img = $uploadData['file_name'];        
            }else{
                $profile_img = '';
            }
        }else{
            $profile_img = '';
        }

        $result = $this->Login_model->update_profile_pic($id,$profile_img);

        if($result == 'true'){
        	$result = $this->Login_model->get_all_details($id);
            $session_data = array(
				'name' => $result[0]->name,
				'email' => $result[0]->email,
				'mobile' => $result[0]->mobile,
				'id' => $result[0]->id,
				'image' => $result[0]->image,
			);
				// Add user data in session
			$this->session->set_userdata('logged_in', $session_data);

			$data['status'] = 'true';
			$data['message_display'] = 'Profile Picture Updated Successfully';
		    $this->load->view('dashboard', $data);
		}else{
			$data['status'] = 'false';
			$data['message_display'] = 'Invalid file format';
		    $this->load->view('dashboard', $data);
		}

	}

	public function logout(){
		$sess_array = array(
		   'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);

		$data['message_display'] = 'Successfully Logout';
		$this->load->view('login_view', $data);
	}

}