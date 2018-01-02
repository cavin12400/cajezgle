<?php
class User_controller extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['user_logged'])){
			$this->session->set_flashdata("errorlog","Please login first.");
			redirect('my_controller/start');
		}

	}
	public function profile($username)
	{
		$this->load->model('my_model');
		$data['ProfileInfo'] = $this->my_model->getUserInfo($username);
		$this->load->view('profile', $data);
	}
	

	public function editProfile($username)
	{
		$this->load->model('my_model');
		if(isset($_POST['save'])){
			if($this->my_model->editUserInfo($username)){
				$this->session->set_flashdata("success-change","Your account has been Updated.");
				redirect('User_controller/editProfile/'. $username,'refresh');
			}
			else{
				$this->session->set_flashdata("success-fail","An error occurred. Please try again.");
				redirect('User_controller/editProfile/'. $username,'refresh');
			}
		}
		
		$data['UserInfo'] = $this->my_model->getUserInfo($username);	
		$this->load->view('edit-profile',$data);

	}
	//public function 
	public function editPassword($username)
	{
		$this->load->model('my_model');
		if(isset($_POST['save-pass'])){
			$this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[32]');
			$this->form_validation->set_rules('newpass','Password','required|min_length[8]|max_length[32]');
			$this->form_validation->set_rules('confpass','Confirm Password','required|matches[newpass]');
			if ($this->form_validation->run()==TRUE) {
				$current_pass = $this->input->post('password');
				$new_pass = $this->input->post('newpass');
				$conf_pass = $this->input->post('confpass');
				$this->load->model('my_model');
				$passwd = $this->my_model->getCurrentPass($username);
				if($passwd->password == base64_encode($current_pass)){
					if($this->my_model->updatePassword($new_pass, $username)){
						$this->session->set_flashdata("succeed-pass","Password changed.");
						redirect('User_controller/editPassword/'. $username,'refresh');
					}
					else{
						$this->session->set_flashdata("fail-pass","Failed to change password.");
						redirect('User_controller/editPassword/'. $username,'refresh');
					}
				}
				else{
					$this->session->set_flashdata("fail-pass","Current Password don't match.");
					redirect('User_controller/editPassword/'. $username,'refresh');
				}
			}
			else{
				$this->session->set_flashdata("fail-pass","An error occurred. Please try again.");
				redirect('User_controller/editPassword/'. $username,'refresh');
			}
		}
		$data['UserInfo'] = $this->my_model->getUserInfo($username);
		$this->load->view('edit-password',$data);

	}
}