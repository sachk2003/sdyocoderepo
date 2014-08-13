<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include 'assets/vendor/autoload.php';
class Vendor extends CI_Controller {

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
		
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
		
        //$this->is_logged_in();
		if(!$this->session->userdata('is_logged_in'))
			      header('Location:../login/index');     

         }
			function index()
			 {
			 	
				//echo "called";
				
			   if($this->session->userdata('is_logged_in'))
			   { //echo "session check";
			     $session_data = $this->session->userdata('is_logged_in');
			     $data['fname'] = $this->session->userdata('fname');
				 $data['email']=  $this->session->userdata('email');
				 //echo $data['email'];
				 $vendordetails=$this->vendorfunctions->getvendorbyemail($data['email']);
				 //var_dump($vendordetails);
				 if($vendordetails[0]['vendorid']!='')
				 $vendordiscountdetails=$this->vendorfunctions->getvendordiscount($vendordetails[0]['vendorid']);
				 
				 //var_dump($vendordiscountdetails);
				 $data['vendordetails']=$vendordetails;
				 $data['discountdetails']=$vendordiscountdetails;
				 //echo $data['fname'];
			     $this->load->view('vendor/home', $data);
			   }
			   else
			   {
			     //If no session, redirect to login page
			      header('Location:../login/index');
			   }
			 }
			
			 function logout()
			 {
			   $this->session->unset_userdata('is_logged_in');
			    $this->session->unset_userdata('email');
				 $this->session->unset_userdata('fname');
			   session_destroy();
			   header('Location:../login/index');
			 }
	 
	 
	         
	         function view_vendor_account()
	        {
	        	
				$email=$this->session->userdata('email');
				if($email!='')
				$vendordetails=$this->vendorfunctions->getvendorbyemail($email);
				//var_dump($vendordetails);
				
				
				
				$data['vendordetails']=$vendordetails;
				$this->load->view('vendor/viewvendoraccount',$data);
				
				
	        }
	        
			function vendor_account_update()
			{
				
				$email=$this->session->userdata('email');
				if($email!='')
				$vendordetails=$this->vendorfunctions->getvendorbyemail($email);
				//var_dump($vendordetails);
				
				
				$data['message']='';
				$data['vendordetails']=$vendordetails;
				$this->load->view('vendor/updatevendoraccount',$data);
				
				
			}
			
			function update_vendor_account()
			{  // echo "called";
			    $newemail=$this->input->post('email');
				$email=$this->session->userdata('email');
				if($email!='')
				$updated=$this->vendorfunctions->update_vendor($email);
				//echo $updated;
				if($updated)
				{  
					
					$vendordetails=$this->vendorfunctions->getvendorbyemail($newemail);
				//var_dump($vendordetails);
				
				$data['message']='Profile updated';
				$data['vendordetails']=$vendordetails;
				$this->load->view('vendor/updatevendoraccount',$data);
				
				}
               else		
				{
					$newemail=$this->input->post('email');
					
					$vendordetails=$this->vendorfunctions->getvendorbyemail($newemail);
					$data['message']='Already at Latest';
				$data['vendordetails']=$vendordetails;
				$this->load->view('vendor/updatevendoraccount',$data);
					
					
					
				}
				
				
			}
			
			function vendor_account_delete()
			{
				
				$this->load->view('vendor/confirmdeletevendor');
				
				
			}
			
			function vendor_account_deleted()
			{
				$email=$this->session->userdata('email');
				if($email!='')
				$vendordetails=$this->vendorfunctions->getvendorbyemail($email);
				$vendorid=$vendordetails[0]['vendorid'];
				//echo $vendorid;
				$message=$this->vendorfunctions->delete_vendor($email);
				//echo $message;
				if($message!='')
				{
					$data['message']=$message;
					$this->load->view('vendor/deletevendor',$data);
					
					
				}
				else 
				{
					$data['message']='Some thing went wrong Try again';
					$this->load->view('vendor/deletevendor',$data);
					
				}
				
				
			}
			
			function change_password()
			{
				$data['message']='';
			    $this->load->view('vendor/changepassword',$data);
				
							
			}
			
			function change_password_submit()
			{
				$email=$this->input->post('email2');
				$password=$this->input->post('password2');
				$newpassword=$this->input->post('newpassword');
				$message='';
				
				
				$validity=$this->vendorfunctions->checkuser($email,$password);
				//var_dump($validity);
				
				if($validity)
				{
					
					if($this->vendorfunctions->updateuser($email,$newpassword))
					{
						$data['message']='Password Updated';
			            $this->load->view('vendor/changepassword',$data);
						
					}
					else{
						$data['message']='Problem updating password';
			            $this->load->view('vendor/changepassword',$data);
						
					}
					
					
					
				}
				else{
					$data['message']='Username/Password is Wrong';
			    $this->load->view('vendor/changepassword',$data);
					
				}
				
				
			}
			
			function discount_add()
			{
				$email=$this->session->userdata('email');
				if($email!='')
				$vendordetails=$this->vendorfunctions->getvendorbyemail($email);
				$vendorid=$vendordetails[0]['vendorid'];
				$data['message']='';
				$data['vendorid']=$vendorid;
				$this->load->view('vendor/discountadd',$data);
				
				
			}
			
			function discount_add_submit()
                        {       
			
                        $upc = $this->input->post('upc');

			$item = $this->input->post('item');
			$discount = $this->input->post('discount');
			$unit = $this->input->post('unit');
			$startdate = $this->input->post('startdate');
			$enddate = $this->input->post('enddate');
			$vendorid=$this->input->post('vendorid');
			$added=$this->vendorfunctions->discountupcadd($upc,$discount,$unit,$startdate,$enddate,$vendorid,$item);
                       if($added)
		{		$data['message']='Discount added successfully';
				
			}
			else{

				$data['message']='Discount could not be added successfully';
			}
				$data['upc']=$upc;
				$data['itemname']=$item;
				$data['vendorid']=$vendorid;
				$this->load->view('vendor/add_discount',$data);	
				
			}
			
			function check_upc()
			{
				$vendorid=$this->input->post('vendorid');
				$upc=$this->input->post('upc');
				$num = strlen($upc);
				//echo $num;
				if($num==12){
				$upc = "0".$upc;
				}
				$data['vendorid']=$vendorid;
				
				if($num>13)
				 {$message="UPC code can not be greater than 13 digits";
				  $data['message']=$message;
				  
				  $this->load->view('vendor/discountadd',$data);
				 }
				else{
				$upcdetails=$this->vendorfunctions->checkupc($upc);
				
				if($upcdetails)
				{
					$codeid = $upcdetails[0]['GTIN_CD'];
                    $itemname = $upcdetails[0]['GTIN_NM'];
					$data['message']='';
					$data['upc']=$codeid;
					$data['itemname']=$itemname;
					$this->load->view('vendor/add_discount',$data);				
									
					
				}
				
				}
				
			}
			
			
			
			function discount_delete()
			{
				$email=$this->session->userdata('email');
				if($email!='')
				$vendordetails=$this->vendorfunctions->getvendorbyemail($email);
				$vendorid=$vendordetails[0]['vendorid'];
				
				$discounts=$this->vendorfunctions->getvendordiscounts($vendorid);
				if(!$discounts)
				$num=0;
				else
				$num=sizeof($discounts);
				
				
				$data['discounts']=$discounts;
				$data['vendorid']=$vendorid;
				$data['num']=$num;
				$data['message']='';
				$this->load->view('vendor/discountdelete',$data);
				
				
			}
			
			
			function discount_delete_confirm()
			{
				$values=array();
				$upcarray='';
				if(array_key_exists('check_list', $_POST) && !empty($_POST['check_list']))
				{
					$checkvalues=$this->input->post('check_list');
					foreach($checkvalues as $check) {
				             $values[]=substr($check,1);
						
						
						
				    }
				}
				
				$data['values']=$values;
				$this->load->view('vendor/discountdeleteconfirm',$data);
				
				
			}
			
			function discount_deleted()
			{
				$email=$this->session->userdata('email');
				if($email!='')
				$vendordetails=$this->vendorfunctions->getvendorbyemail($email);
				$vendorid=$vendordetails[0]['vendorid'];
				
				
				$upcvalues=$this->input->get('values');
				$upcval=explode(',',$upcvalues);
				//var_dump($upcval);
				
				for($i=0;$i<sizeof($upcval);$i++)
                {
				  $validity=$this->vendorfunctions->deleteupc($vendorid,$upcval[$i]);
				  
				}
				
				
				$discounts=$this->vendorfunctions->getvendordiscounts($vendorid);
				if(!$discounts)
				$num=0;
				else
				$num=sizeof($discounts);
				
				$data['discounts']=$discounts;
				$data['vendorid']=$vendorid;
				$data['num']=$num;
				if($validity)
				{
				
				$data['message']='Discounts deleted';
										
				}
				else{
					$data['message']='Some Discounts could not be deleted';
				
					
				}
				$this->load->view('vendor/discountdelete',$data);
			}
			
			function discount_update()
			{
				
				$email=$this->session->userdata('email');
				if($email!='')
				$vendordetails=$this->vendorfunctions->getvendorbyemail($email);
				$vendorid=$vendordetails[0]['vendorid'];
				$discounts=$this->vendorfunctions->getvendordiscounts($vendorid);
				if($discounts)
				{   $data['message']='';
					$data['discounts']=$discounts;
					$data['vendorid']=$vendorid;
					$this->load->view('vendor/discountupdate',$data);
					
				}
				else{
					$data['message']='No Discounts Present';
					$data['discounts']=$discounts;
					$data['vendorid']=$vendorid;
					$this->load->view('vendor/discountupdate',$data);
					
					
				}
				
				
				
			}
			
			function discount_update_submit()
			{
				$vendorid=$this->input->post('vendorid');
				$count=$this->input->post('count1');
				if($count)
                 {
					for($i=0;$i<$count;$i++)
					{
						$item=$this->input->post('item'.$i);
						$upc=$this->input->post('upc'.$i);
						$discount=$this->input->post('discount'.$i);
						$unit=$this->input->post('unit'.$i);
						$startdate=$this->input->post('startdate'.$i);
						$enddate=$this->input->post('enddate'.$i);
				        $timestamp=time();
					  
					    $discountdetails=$this->vendorfunctions->getdiscountforitem($vendorid,$item);
						$discountid=$discountdetails[0]['discountid'];
					  
					  if($discountid){
					  	$validity=$this->vendorfunctions->updatediscountforitem($discountid,$discount,$unit,$startdate,$enddate,$timestamp);
					  
					  }
					  
						
					}
                  if($validity)
				  {
				  	
					$email=$this->session->userdata('email');
				if($email!='')
				$vendordetails=$this->vendorfunctions->getvendorbyemail($email);
				$vendorid=$vendordetails[0]['vendorid'];
				$discounts=$this->vendorfunctions->getvendordiscounts($vendorid);
				if($discounts)
				{   $data['message']='Values Updated';
					
					
				}
				else{
					$data['message']='No Discounts Present';
									
				}
				$data['discounts']=$discounts;
					$data['vendorid']=$vendorid;
					$this->load->view('vendor/discountupdate',$data);	
					
					
		      }
					
			}
			}
			
	 
}	 
