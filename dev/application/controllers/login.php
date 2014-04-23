<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include 'assets/vendor/autoload.php';
class Login extends CI_Controller {

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
		$this->load->helper(array('form'));
		$this->load->model('vendorfunctions');
          
		           

    }
	 
	
	 
	 
	public function index()
	{
               
        $this->load->view('vendor/login'); 
	}
	
	
	
	public function logincheck()
	{
		//echo "login check function called";
			   
		//$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$this->form_validation->set_rules('email', 'Username', 'trim|xss_clean');
         
        $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean');
		
		$this->load->model('vendorfunctions');
		
		if($this->form_validation->run() != FALSE)
		{
			
		$validity = $this->vendorfunctions->validate($email,$password);
		//var_dump($validity);
		
		if($validity[1])
		{  //echo "entered";
		 
			$data=array(
                'email'=>$email,
                'fname'=>$validity[0],
                'is_logged_in'=> true
            );
			
			$this->session->set_userdata($data);
			//var_dump($data);
			
            header('Location:../vendor/index');
			
		
		}
		else{
			$this->form_validation->set_message('required', 'Invalid username or password');
			$message="Invalid username or password";
			$data['message']=$message;
			$this->load->view('vendor/login',$data);
			
		}
		}
		else{
			$data['message']='';
			$this->load->view('vendor/login',$data);
			
		}
      
	  }
	
	
	  public function create_login()
	  {
	  	$data['message']='';
		$this->load->view('createlogin',$data);
		
		
	  }
	 
	 public function vendor_create_login()
	 {
		 	
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$lname = $this->input->post('lname');
		$company = $this->input->post('company');
		$address = $this->input->post('address');
		$city = $this->input->post('city');
		$state = $this->input->post('state');
		$zip = $this->input->post('zip');
		$country = $this->input->post('country');
		$phone = $this->input->post('phone');
		$mphone = $this->input->post('mphone');
		$email = $this->input->post('email2');
		$category = $this->input->post('category');
		$companyurl = $this->input->post('companyurl');
		$subcatname1 = $this->input->post('subcatname1');
		$subcatname2 = $this->input->post('subcatname2');
		$subcatname3 = $this->input->post('subcatname3');
		$subcatname4 = $this->input->post('subcatname4');
		$subcatname5 = $this->input->post('subcatname5');
		$subcatname6 = $this->input->post('subcatname6');
		$subcatname7 = $this->input->post('subcatname7');
		$subcatname8 = $this->input->post('subcatname8');
		$subcatname9 = $this->input->post('subcatname9');
		$subcatname10 = $this->input->post('subcatname10');
		$password = "temp".$fname;
		
		$timestamp = time();
		$userexists=$this->vendorfunctions->checkuserexist($email);
		if($userexists)
		{
			$data['message']="User With this email already exists";
			$this->load->view('createlogin',$data);
		}
		else{
			
			
			$created=$this->vendorfunctions->createvendor($fname,$mname,$lname,$company,$companyurl,$category,$country,$zip,$address,$city,$state,$phone,$mphone,$email,$password,$timestamp);
			if($created)
			{
				$message="User created.";
				$vendordetails=$this->vendorfunctions->getvendorbyemail($email);
				if($vendordetails)
				{
				$vendorid=$vendordetails[0]['vendorid'];
				$password=$vendordetails[0]['password'];
			    $fname=$vendordetails[0]['fname'];
				if($vendorid)
				$createdsubcatentry=$this->vendorfunctions->addsubcatentry($vendorid,$subcatname1,$subcatname2,$subcatname3,$subcatname4,$subcatname5,$subcatname6,$subcatname7,$subcatname8,$subcatname9,$subcatname10,$timestamp);
				$emailsent=$this->sendemail($email,$password,$fname);
				if($emailsent)
				$message=$message." Check your email for Password";
				$data['message']=$message;
				$this->load->view('createlogin',$data);
				}
				
			}
			else{
				$data['message']="Could not create user";
				$this->load->view('createlogin',$data);
				
			}
			
			
			
			
		}
		
		
	 }
	 
	 
	 function sendemail($email,$password,$fname)
	 {
	 	
		$headers = "From: info@superdealyo.com". "\r\n" .
		"Reply-To: info@superdealyo.com ". "\r\n" .
		"X-Mailer: PHP/" . phpversion();
		
		mail($email,"Registration Confirmation",
		"Hello $fname\nThank you for taking time to create login with SuperDealyo.com\n
		Below is your login information.\n
		Temporary Password:$password\n
		You can access login page at http://superdealyo.com/vendor/vendor.html\n
		After logging in please change the temporary password.\n
		Thank you for your interest in SuperDealyo.com.\n
		\n
		Sincerely;\n
		\n
		SuperDealyo Team\n
		Bringing your world to your fingertips�.",$headers); 
		/// email to me infoming new subscriber has registered
		mail("sach@linuxbox.simutel","New Registration",
		"new vendor:$email has registered.");
		
	 }
	 
	 function forgot_pwd()
	 {
	 	
		$data['message']='';
		$this->load->view('forgotpassword',$data);
		
	 }
	 
	 function vendor_forgot_pwd()
	 {
	 	$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$lname = $this->input->post('lname');
		$company = $this->input->post('company');
		$address = $this->input->post('address');
		$city = $this->input->post('city');
		$state = $this->input->post('state');
		$zip = $this->input->post('zip');
		$country = $this->input->post('country');
		$phone = $this->input->post('phone');
		$mphone = $this->input->post('mphone');
		$email = $this->input->post('email2');
		$exists=$this->vendorfunctions->forgotretrieve($email,$lname);
		if($exists)
		{
			//echo "entered";
		  $password = "temp123";
		  $updated=$this->vendorfunctions->updateuser($email,$password);
		  echo $updated;
          if($updated)
		  {
		  	$data['message']="Your password has been set to temp123 please login and change it.";
		  }	
       else{
       	     $data['message']='Password Update Failed or Password is already default one';
       }
			
		}
       else
		{
			$data['message']='User with this email id does not exist';	
			
		}
		
		$this->load->view('forgotpassword',$data);
		
		
	 }
	 
	 
} 
	 
