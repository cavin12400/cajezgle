<?php 


class My_controller extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('my_model');
	}
	public function start()
	{
		
		if(isset($_POST['addme'])){
			$this->form_validation->set_rules('username','Username','required|alpha_numeric|min_length[5]|is_unique[users.username]', array('is_unique' => 'The %s entered already exists.','alpha_numeric' => 'The %s is incorrect.'));
			$this->form_validation->set_rules('email','Email','required|is_unique[users.email]', array('is_unique' => 'The %s entered already exists.'));
			$this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[32]');
			$this->form_validation->set_rules('password_confirm','Confirm Password','required|matches[password]');
			if ($this->form_validation->run()==TRUE){
				$data = array(
							'firstname' => $_POST['firstname'],
							'lastname' => $_POST['lastname'],
							'email' => $_POST['email'],
							'type' => $_POST['type'],
							'username' => $_POST['username'],
							'status' => $_POST['status'],
							'password' => base64_encode($_POST['password']),
						);
				$this->my_model->insert_user($data);
				$this->session->set_flashdata("success","Your account has been created. You can login now.");
				redirect('#');
			}
		}
		else if(isset($_POST['login'])){
			
			$query = $this->my_model->getLoginAccount();

			if($query->row()==TRUE && $query->row()->type=="Client" && $query->row()->status=="active"){
				$this->session->set_flashdata('success' , "You are logged in.");
				$_SESSION['user_logged'] = TRUE;
				$_SESSION['username'] = $query->row()->username;
				$_SESSION['email'] = $query->row()->email;
				$_SESSION['firstname'] = $query->row()->firstname;
				$_SESSION['lastname'] = $query->row()->lastname;
				$_SESSION['type'] = $query->row()->type;
				$_SESSION['status'] = $query->row()->status;

				redirect('user_controller/profile/' .$_SESSION['username'],'refresh');
			}
			else if ($query->row()==TRUE && $query->row()->type=="Admin" && $query->row()->status=="active") {
				$_SESSION['admin_logged'] = TRUE;
				$_SESSION['username'] = $query->row()->username;
				$_SESSION['email'] = $query->row()->email;
				$_SESSION['firstname'] = $query->row()->firstname;
				$_SESSION['lastname'] = $query->row()->lastname;
				$_SESSION['type'] = $query->row()->type;
				$_SESSION['status'] = $query->row()->status;

				redirect('admin_controller/admin/','refresh');
			}
			else if($query->row()->status=="deactivated"){
				$this->session->set_flashdata("errorlog","Account is deactivated contact Admin.");
				redirect('my_controller/start');
			}
			else{
				$this->session->set_flashdata("errorlog","Account does not exist.");
				redirect('my_controller/start');
			}
		}


			

		
		$this->load->view('home');
		}
		public function logout(){
			session_destroy();
			redirect('my_controller/start','refresh');
		}

}
