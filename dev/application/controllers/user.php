<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include 'assets/vendor/autoload.php';
class User extends CI_Controller {

	/**
	 * Bylist Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * 
	 */
	 function __construct(){

        parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('userfunctions');
         
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
		
        //$this->is_logged_in();
		if(!$this->session->userdata('is_logged_in'))
	     header('Location:/userlogin/index');       
		           

    }
	 
	
	 
	 
	public function index()
	{
		
		
        $data['message']='';       
        $this->load->view('user/welcome',$data); 
	}
	function logout()
	{
        $this->session->unset_userdata('is_logged_in');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('fname');
		session_destroy();
		header('Location:/userlogin/index');
	 }
			 
			 
	public function update_profile()
	{
		if($this->session->userdata('is_logged_in')=='true')
	  	 {
	  	 	$email=$this->session->userdata('email');
		    $userdetails=$this->userfunctions->getuserbyemail($email);	
		    
		    if($userdetails)
				{
				
				$data['details']=$userdetails;
				$data['message']='';
				$this->load->view('user/updateuser',$data);
				}
			else{
				session_destroy();
		        header('Location:/userlogin/index');
				
				
			}
		   
		
		 }
	}


    public function user_update()
	{
		$email=$this->session->userdata('email');
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$lname = $this->input->post('lname');
		
		$address = $this->input->post('address');
		$zip = $this->input->post('zip');
		if($zip=='No Such Zip Code in USA')
		 {
		 	$data['main_content']='bylist';
			$data['message']="Wrong Zip Code, Try Again";
            $this->load->view('bylist',$data); 
		 }	
		 else{
		 	
		 $zip=trim($zip);
		 $zipcode=explode('-',$zip);
		 $zip=$zipcode[0];
         $secondpart=explode(',', $zipcode[1]);
		 $city=$secondpart[0];
		 $state=$secondpart[1];
		 
		$country = $this->input->post('country');
		$phone = $this->input->post('phone');
		$mphone = $this->input->post('mphone');
		$email = $this->input->post('email2');
		
		$alertitem1 = $this->input->post('alertitem1');
		$alertitem2 = $this->input->post('alertitem2');
		$alertitem3 = $this->input->post('alertitem3');
		$alertitem4 = $this->input->post('alertitem4');
		$alertitem5 = $this->input->post('alertitem5');
		
		
		
		$password = "temp".$fname;
		
		$timestamp = time();
		
		$updated=$this->userfunctions->updateuserinfo($fname,$mname,$lname,$country,$zip,$address,$city,$state,$phone,$mphone,$email,$password,$timestamp,$alertitem1,$alertitem2,$alertitem3,$alertitem4,$alertitem5);
			if($updated)
			{   
				$message="User updated";
				$userdetails=$this->userfunctions->getuserbyemail($email);
				if($userdetails)
				{
				$data['details']=$userdetails;
				$data['message']=$message;
				$this->load->view('user/updateuser',$data);
				}
				
			}
			else{
				$userdetails=$this->userfunctions->getuserbyemail($email);
				$data['details']=$userdetails;
				$data['message']="Could not update user";
				$this->load->view('user/updateuser',$data);
				
			}
		
		
		
		
		
		 }/* End of Zip Code else*/
		
	}
   
   
   
   	function change_password()
    {
				$data['message']='';
			    $this->load->view('user/changepassword',$data);
				
							
	}
	
    function change_password_submit()
			{
				$email=$this->input->post('email2');
				$password=$this->input->post('password2');
				$newpassword=$this->input->post('newpassword');
				$message='';
				
				
				$validity=$this->userfunctions->validate($email,$password);
				//var_dump($validity);
				
				if($validity)
				{
					
					if($this->userfunctions->updateuser($email,$newpassword))
					{
						$data['message']='Password Updated';
			            $this->load->view('user/changepassword',$data);
						
					}
					else{
						$data['message']='Problem updating password';
			            $this->load->view('user/changepassword',$data);
						
					}
					
					
					
				}
				else{
					$data['message']='Username/Password is Wrong';
			        $this->load->view('user/changepassword',$data);
					
				}
				
				
			}


    public function profile_delete()
	{
		if($this->session->userdata('is_logged_in')=='true')
	  	 {
	  	 	$email=$this->session->userdata('email');
			$fname=$this->session->userdata('fname');
		    $userdetails=$this->userfunctions->getuserbyemail($email);	
		    
		    if($userdetails)
				{
				$data['fname']=$fname;
				$data['email']=$email;
				$data['details']=$userdetails;
				$data['message']='';
				$this->load->view('user/deleteuser',$data);
				}
			else{
				
				session_destroy();
		        header('Location:/userlogin/index');
				
				
			}
		   
		
		 }
	}

   public function delete_profile()
   {
   	 $email=$this->session->userdata('email');
	 $deleted=$this->userfunctions->deleteuserinfo($email);
	 if(!$deleted)
	 {
	 	$data['message']='Profile Could not be deleted.Try again Later';
	    $this->load->view('user/deleteuser',$data);
	 }
	 else{
	 	$data['message']='Your profile Deleted. You will be redirected soon ....';
		$data['url']='/userlogin/index'; 
		$this->load->view('user/redirect',$data);
	 }
	
   }
   
      

	
}
