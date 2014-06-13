<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminlogin extends CI_Controller {

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
		$this->load->model('adminfunctions');
          
		           

    }
	 
	
	 
	 
	public function index()
	{
        $data['message']='';       
        $this->load->view('admin/login',$data); 
	}
	
	
	
	public function logincheck()
	{
		
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		
			
		$validity = $this->adminfunctions->validate($email,$password);
		//var_dump($validity);
		
		if($validity[1])
		{  
		 
			$data=array(
                'email'=>$email,
                'fname'=>$validity[0],
                'is_logged_in'=> true
            );
			
			$this->session->set_userdata($data);
			//var_dump($data);
			header('Location:../emaintain/index');
            
			
		
		}
		else{
			
			$message="Invalid username or password";
			$data['message']=$message;
			$this->load->view('admin/login',$data);
			
		}
		
		     
	  }
}