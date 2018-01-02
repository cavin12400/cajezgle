<?php
class Admin_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['admin_logged'])){
			$this->session->set_flashdata("errorlog","Please login first.");
			redirect('my_controller/start');
		}

	}

	public function admin(){
		$this->load->model('my_model');
		$data['information'] = $this->my_model->getAccountInfo();
		$this->load->view('admin',$data);
	}
	public function edit($username){
		$this->load->model('my_model');
		if(isset($_POST['adminsave'])){
			if($this->my_model->editUserAdmin($username)){
				$this->session->set_flashdata("success-change","An account has been Updated.");
				redirect('admin_controller/admin/','refresh');
			}
			else{
				$this->session->set_flashdata("fail-change","An error occurred. Please try again.");
				redirect('admin_controller/edit/'. $username,'refresh');
			}
		}
		$data['info'] = $this->my_model->getUserInfo($username);
		$this->load->view('editadmin',$data);
	}
	public function delete($username){
		$this->load->model('my_model');
		$data['deleteinfo'] = $this->my_model->getUserInfo($username);
		$username = $data['deleteinfo']->username;
		if(isset($_POST['delete'])){
			if($this->my_model->deleteAdmin($username)){
				$this->session->set_flashdata("success-change","An account has been Deleted.");
				redirect('admin_controller/admin/','refresh');
			}
			else{
				$this->session->set_flashdata("fail-change","An error occurred. Please try again.");
				redirect('admin_controller/edit/'. $username,'refresh');
			}
		}
		$this->load->view('deleteadmin',$data);
	}
	public function deactivate($username){
		$this->load->model('my_model');
		if($this->my_model->deactive($username)){
				$this->session->set_flashdata("success-change","An account has been Updated.");
				redirect('admin_controller/admin/','refresh');
			}
		else{
				$this->session->set_flashdata("fail-change","An error occurred. Please try again.");
				redirect('admin_controller/edit/'. $username,'refresh');
			}
	}
	public function activate($username){
		$this->load->model('my_model');
		if($this->my_model->active($username)){
				$this->session->set_flashdata("success-change","An account has been Updated.");
				redirect('admin_controller/admin/','refresh');
			}
		else{
				$this->session->set_flashdata("fail-change","An error occurred. Please try again.");
				redirect('admin_controller/edit/'. $username,'refresh');
			}
	}
	
}