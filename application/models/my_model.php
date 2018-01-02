<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class My_model extends CI_Model{

   public function insert_user($data = array()){
		$this->db->insert('users',$data);
	
    }

    public function getLoginAccount(){
        $username = $_POST['username'];
        $password = base64_encode($_POST['password']);
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where(array('username'=>$username,'password'=>$password));
        $query = $this->db->get();
        return $query;        
    }    

    public function getAccountInfo(){
        $this->db->select("*");
        $this->db->from("users");
        $query = $this->db->get();
        return $query->result();
    }

    public function getUserInfo($username){
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where("username",$username);
        $query = $this->db->get();
        return $query->row();
    }
    public function deleteAdmin($username){
        $this->db->delete('users', array('username' => $username)); 
        return true;
    }
    public function deactive($username){
        $data = array('status' =>"deactivated" ); 
        $this->db->where('username',$username);
        $this->db->update('users',$data);
        return $username;
    }
    public function active($username){
        $data = array('status' =>"active" ); 
        $this->db->where('username',$username);
        $this->db->update('users',$data);
        return $username;
    }



    public function editUserInfo($username){
        $data = array(
                            'firstname' => $_POST['firstname'],
                            'lastname' => $_POST['lastname'],
                            'email' => $_POST['email'],
                            'bio' => $_POST['bio'],
                        );
        
        
        $this->db->where('username',$username);
        $this->db->update('users',$data);
        return $username;
    }
    public function editUserAdmin($username){
        $data = array(
                            'username' => $_POST['username'],
                            'firstname' => $_POST['firstname'],
                            'lastname' => $_POST['lastname'],
                            'email' => $_POST['email'],
                            'password' => base64_encode($_POST['password']),
                            'type' => $_POST['type'],
                        );
        
        
        $this->db->where('username',$username);
        $this->db->update('users',$data);
        $newuser = $username;
        return $username;
    }
    public function adminEdit($username){
        $data = array(
                            'firstname' => $_POST['firstname'],
                            'lastname' => $_POST['lastname'],
                            'email' => $_POST['email'],
                            'password' => $_POST['password'],
                            'type' => $_POST['type'],
                        );
        
        
        $this->db->where('username',$username);
        $this->db->update('users',$data);
        return $username;
    }
    public function getCurrentPass($username){
        $query = $this->db->where(['username' => $username])
                            ->get('users');
        if($query->num_rows()>0){
            return $query->row();
        }
    }
    public function updatePassword($new_pass, $username){
        $data = array('password' => base64_encode($new_pass) ,
                     );
        return $this->db->where('username',$username)
        ->update('users',$data);
    }
	
}