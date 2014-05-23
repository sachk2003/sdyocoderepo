<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include 'assets/vendor/autoload.php';
class Userlogin extends CI_Controller {

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
		$this->load->model('discounts');
          
		           

    }
	 
	
	 
	 
	public function index()
	{
        $data['message']='';       
        $this->load->view('user/login',$data); 
	}
	
	
	
	public function logincheck()
	{
		//echo "login check function called";
			   
		//$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper(array('form','url'));
		
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$this->form_validation->set_rules('email', 'Username', 'trim|xss_clean');
         
        $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean');
		
		$this->load->model('userfunctions');
		
		if($this->form_validation->run() != FALSE)
		{
			
		$validity = $this->userfunctions->validate($email,$password);
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
			//redirect('userlogin','refresh');
            header('Location:/super/user/index');
			
		
		}
		else{
			//echo "called";
		       
			$this->form_validation->set_message('required', 'Invalid username or password');
			$message="Invalid username or password";
			$data['message']=$message;
			$this->load->view('user/login',$data);
			
		}
		}
		else{
			//echo "called";
			//echo form_error('email');
			//echo form_error('password'); 
			 //echo validation_errors();
			//$this->form_validation->set_message('email', 'Invalid username or password');
			//$this->form_validation->set_message('password', 'Invalid username or password');
			$data['message']='';
			$this->load->view('user/login',$data);
			
		}
      
	  }
	
	
	  public function create_login()
	  {
	  	$data['message']='';
		$this->load->view('user/createuser',$data);
		
		
	  }
	 
	 public function user_create_login()
	 {
		 	
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$lname = $this->input->post('lname');
		
		$address = $this->input->post('address');
		//$city = $this->input->post('city');
		//$state = $this->input->post('state');
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
		$userexists=$this->userfunctions->checkuserexist($email);
		if($userexists)
		{
			$data['message']="User With this email already exists";
			$this->load->view('user/createuser',$data);
		}
		else{
			
			
			$created=$this->userfunctions->createuser($fname,$mname,$lname,$country,$zip,$address,$city,$state,$phone,$mphone,$email,$password,$timestamp,$alertitem1,$alertitem2,$alertitem3,$alertitem4,$alertitem5);
			if($created)
			{
				$message="User created.";
				$userdetails=$this->userfunctions->getuserbyemail($email);
				if($userdetails)
				{
				$userid=$userdetails[0]['userid'];
				$password=$userdetails[0]['password'];
			    $fname=$userdetails[0]['fname'];
				if($userid)
				
				$emailsent=$this->sendemail($email,$password,$fname);
				if($emailsent)
				$message=$message." Check your email for Password";
				$data['message']=$message;
				$this->load->view('user/createuser',$data);
				}
				
			}
			else{
				$data['message']="Could not create user";
				$this->load->view('user/createuser',$data);
				
			}
			
			
			
			
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
		$this->load->view('user/forgotpassword',$data);
		
	 }
	 
	 
	 
	 function user_forgot_pwd()
	 {
	 	/*$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');*/
		$lname = $this->input->post('lname');
		/*
		$company = $this->input->post('company');
		$address = $this->input->post('address');
		$city = $this->input->post('city');
		$state = $this->input->post('state');*/
		$zip = $this->input->post('zip');
		/*$country = $this->input->post('country');
		$phone = $this->input->post('phone');
		$mphone = $this->input->post('mphone');*/
		$email = $this->input->post('email2');
		$exists=$this->userfunctions->forgotretrieve($email,$lname,$zip);
		if($exists)
		{
			//echo "entered";
		  $password = "temp123";
		  $updated=$this->userfunctions->updateuser($email,$password);
		  //echo $updated;
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
		
		$this->load->view('user/forgotpassword',$data);
		
		
	 }
	 
	 
  public function cronupdateusers()
   {
   	$usersdetails=$this->userfunctions->getallusers();
	if($usersdetails)
	{   
		foreach($usersdetails as $userdetail)
		{
			$email=$userdetail['email'];
		    $fname=$userdetail['fname'];
			$items=array();
			$discountarray=array();$productarray=array();
			
			if($userdetail['alertitem1']!='' || $userdetail['alertitem2']!='' || $userdetail['alertitem3']!='' || $userdetail['alertitem4']!='' || $userdetail['alertitem5']!='')
			{
				if($userdetail['alertitem1']!='') array_push($items,$userdetail['alertitem1']);
				if($userdetail['alertitem2']!='') array_push($items,$userdetail['alertitem2']);
				if($userdetail['alertitem3']!='') array_push($items,$userdetail['alertitem3']);
				if($userdetail['alertitem4']!='') array_push($items,$userdetail['alertitem4']);
				if($userdetail['alertitem5']!='') array_push($items,$userdetail['alertitem5']);
			    //var_dump($items);	
				 
				$zipcode=$userdetail['zip'];
				$city=$userdetail['city'];
				if($zipcode!='' || $city!= '')
				{
					$vendors=$this->discounts->availablevendors($zipcode,$city);
					foreach($vendors as $vendor)
					{
						$vendorid=$vendor['vendorid'];
						$company=$vendor['company'];
						
						if($vendorid!='')
						{
							  foreach($items as $item)
							    { //echo " <br />For Item: ".$item." vendorid: ".$vendorid."\n";
							      
								  $itemdetails=$this->getproductdetails($item);
								  
								  
								  $discounts= $this->discounts->getdiscountbyitem($vendorid,$item);
								   if(!empty($discounts))
								    {
								    	//var_dump($discounts);
								    	$i=0;
										foreach($discounts as $discount)
										{
										$discountarray[$item][$i]['item']=$discount['item'];
										$discountarray[$item][$i]['vendorid']=$vendorid;
										$discountarray[$item][$i]['company']=$company;
										$discountarray[$item][$i]['startdate']=$discount['startdate'];
							            $discountarray[$item][$i]['enddate']=$discount['enddate'];
										$discountarray[$item][$i]['discount']=$discount['discount'];
										$discountarray[$item][$i]['unit']=$discount['unit'];
										$i++;
										}	        
									}
									$productarray[$item]=$itemdetails;
									
								}
								//echo "\n";
						}
					  	
					}
					
					
				}
				
				
			}
			else {
				skip;
			}
			
			//var_dump($discountarray);
			//var_dump($productarray);
			$this->senduseremail($fname,$email,$items,$discountarray,$productarray);
			exit;
		}
		
		
	}
	
   }
	 
	 public function getproductdetails($item)
	 {
	 	$itemdetails=array();
		$upcdetails= $this->discounts->getgtindetails($item);
								  //var_dump($gtindetails);
								  $pnm=$upcdetails[0]['GTIN_NM'];$itemdetails['pnm']=$pnm;
								  $upc=$upcdetails[0]['GTIN_CD'];$itemdetails['upc']=$upc;
								  $bsin=$upcdetails[0]['BSIN'];$itemdetails['bsin']=$bsin;
								  $mg=	$upcdetails[0]['M_G']; $itemdetails['mg']=$mg;
								  $moz= $upcdetails[0]['M_OZ'];	$itemdetails['moz']=$moz;
								  $mml= $upcdetails[0]['M_ML'];$itemdetails['mml']=$mml;
								  $mfloz= $upcdetails[0]['M_FLOZ'];$itemdetails['mfloz']=$mfloz;
								  $mabv=$upcdetails[0]['M_ABV'];$itemdetails['mabv']=$mabv;
								  $mabw=$upcdetails[0]['M_ABW'];$itemdetails['mabw']=$mabw;
								  
								  $upcid=$upc;
								  $upccode=substr($upcid,0,3);
				                  $this->load->helper('file');
				                  $path="../images/gtin/gtin-".$upccode."/$upcid.jpg";
				                  $exists = read_file($path);
									if($exists)
									$imgpath="http://superdealyo.com/images/gtin/gtin-".$upccode."/$upcid.jpg";
									else
									$imgpath="http://dev.superdealyo.com/assets/img/notavailable.gif";
								  
								  $itemdetails['url']=$imgpath;
								  
								  $branddetails=$this->discounts->getbranddetails($bsin);
								  $brandnm=$branddetails[0]['BRAND_NM'];$itemdetails['brandnm']=$brandnm;
								  $brandtypecd=$branddetails[0]['BRAND_TYPE_CD'];$itemdetails['brandtypecd']=$brandtypecd;
								  $brandlink=$branddetails[0]['BRAND_LINK'];$itemdetails['brandlink']=$brandlink;
								  
								  $brandtypenm=$this->discounts->getbrandtypenm($brandtypecd);
								  $brandtypename=$brandtypenm[0]['BRAND_TYPE_NM'];$itemdetails['brandtypename']=$brandtypename;
					return $itemdetails;
	 }
	 
	 
	public function senduseremail($fname,$email,$items,$discountarray,$productarray) 
	 {
	 	$headers = "From: info@superdealyo.com". "\r\n" .
		"Reply-To: info@superdealyo.com ". "\r\n" .
		'MIME-Version: 1.0' . "\r\n" .
        'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
		"X-Mailer: PHP/" . phpversion();
		
		
		
	 	$count=count($items);
		$subject="Latest Discounts from Superdealyo.com";
	 	$message="";
		$message=$message."<br />Hi ".$fname."<br />";
		$message=$message."Thank you for using SuperDealyo and for creating a profile . <br />Here are the DEALS NEAR YOU for the shopping list that you created in your profile and requested an alert for. <br /><br />";	
	 	
	 	//var_dump($items);
	 	foreach($items as $item)
		{   $message.="<table><tr><td>";
			if($discountarray[$item])
			{   
			    $table="<table style='background-color:#c1c1c1;width:50%;'><tr><th colspan='4'>".$item."</th></tr><tr><th>Vendor</th><th>Start Date</th><th>End Date</th><th>Discount</th></tr>"; 
				foreach($discountarray[$item] as $discountinfo)
				      {
				      	
						$table.="<tr><th><a href='../bylist/vendorinfo?vendorid=".$discountinfo['vendorid']."'>".$discountinfo['company']."</a></th><th>".$discountinfo['startdate']."</th><th>".$discountinfo['enddate']."</th><th>".$discountinfo['unit'].$discountinfo['discount']."</th></tr>";
				      } 
			}
			$table.="</table></td><td>";
			//$message.=$table."<br />";
			$message.=$table;
			
			if($productarray[$item])
			{      $pdetail='';
					$ptable="<table style='background-color:#c1c1c1;width:100%;'><tr><th colspan='2'>Item Details</th></tr><tr><td>";
				    $pinfo=$productarray[$item];
				    if($pinfo['upc']!='') $pdetail="Product Code : ".$pinfo['upc']."<br />";
				    if($pinfo['mg']!=0) $pdetail.="Weight : ".$pinfo['mg']." grams<br />";
				    if($pinfo['moz']!=0) $pdetail.="Volume : ".$pinfo['moz']." oz<br />";
				    if($pinfo['mml']!=0) $pdetail.="Volume : ".$pinfo['mml']." ml<br />";
				    if($pinfo['mfloz']!=0) $pdetail.="Volume : ".$pinfo['mfloz']." fluid oz<br />";
				    if($pinfo['bsin']!='') $pdetail.="Brand Code : ".$pinfo['bsin']."<br />";
					if($pinfo['brandtypename']!='') $pdetail.="Brand Type : ".$pinfo['brandtypename']."<br />";
					$ptable.="<img src='".$pinfo['url']."' /></td><td>".$pdetail."</td></tr></table></td></tr></table>";
				    
			}
			
			$message.=$ptable."<br /><hr width='50%' align='left'><br />";
		
		}
		
		
		
		
	 	$message.="If you would like to stop the alerts, please remove the items from your profile by logging on to your account using your email and password. <br />Note:Please do not respond to this email as it is machine generated.<br />";
	 	$message.="Thank you for using SuperDealyo.<br />";
	 	$message.="<br />SuperDealyo User Support Team<br />";
	 	echo $message;
		/*if(mail($email,$subject,$message,$headers))
		return true;
		else 
	    return false;
	    */
	 	/*echo "\n --------------------- \n";
	 	echo "Email id:".$email;
		echo "Item Count: ".count($items)."\n";
		echo "\n---------------------\n";*/
		
		
		
	 }
	 
} 
	 