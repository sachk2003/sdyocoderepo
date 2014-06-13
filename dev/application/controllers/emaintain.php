<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Emaintain extends CI_Controller {

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
	 
	var $fields;            /** columns names retrieved after parsing */ 
    var $separator = ',';    /** separator used to explode each line */
    var $enclosure = ' ';    /** enclosure used to decorate each field */

    var $max_row_size = 4096;    /** maximum row size to be used for decoding */
	 
	 
	 function __construct(){

        parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('adminfunctions');
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
		
        //$this->is_logged_in();
		if(!$this->session->userdata('is_logged_in'))
		
			      header('Location:../adminlogin/index');    
		           

    }
	 
	
	 
	 
	public function index()
	{
        $data['message']='';       
        $this->load->view('admin/home',$data); 
	}
	
	public function bulkdiscounts()
    {
    	$vendors=$this->adminfunctions->getvendors();
		$data['vendors']=$vendors;
		$data['message']='';       
        $this->load->view('admin/bulkdiscounts',$data);
		
    }
    	
	public function uploadfile()
	{
	    $totalcount=0;$insertedcount=0;
		$errorarray=array();
		$upload_dir = "/var/www/html/dev/upload";
		
		$allowed = array(
    'text/csv',
    'text/plain',
    'application/csv',
    'text/comma-separated-values',
    'application/excel',
    'application/vnd.ms-excel',
    'application/vnd.msexcel',
    'text/anytext',
    'application/octet-stream',
    'application/txt',
    'application/download',
      );
		
		
		$url= base_url()."upload/";   
		
		//$vendorid=$this->input->post('vendor');
		
		
		$filetype = $_FILES['uploadedfile']['type'];
		echo $filetype;
		if(in_array($filetype, $allowed)) 
		{    
			 		 
		$file_name = $_FILES['uploadedfile']['name'];  
		$upload_url = '/';  
	    $temp_name = $_FILES['uploadedfile']['tmp_name'];  
	    $url=$url.$file_name;
		
	    $file_path = $upload_dir.$upload_url.$file_name;  
	    if(move_uploaded_file($temp_name, $file_path))  
	      {    	   
		      $rows=$this->parse_file($file_path);	
			  if($rows)
			  {  //var_dump($rows);
			  	 $firsttime=0;
			  	foreach($rows as $row)
				{
					if($firsttime==0)
					  $vendorid=$row;
					else{
					$error=false;$totalcount++;
					//var_dump($row);
					$today=date('m/d/y');//echo $today;
					$errormessage='';
					//echo $row['startdate'];
					//echo strtotime($row['startdate']);
					
					
					$validenddate = (strtotime($row['enddate']) >= strtotime($row['startdate']))? true : false;
					$validstartdate = (strtotime($row['startdate']) >= strtotime($today))? true : false;
					$validdiscount = $row['discount'] > 0 ? true : false;
					
					//echo $validdiscount;echo $validenddate;echo $validstartdate;
					if($validstartdate && $validenddate && $validdiscount)
					{
						
						$validupc = $this->getrightupc($row['upc']);
						
						//var_dump($validupc);
						if($validupc[0])
						{
						$upccode=$validupc[2];
						
						$discount = $row['discount'];
						$startdate = $row['startdate'];
						$enddate = $row['enddate'];
						$unit = $row['unit'];
						
						
						$validitem = $this->checkvaliditem($upccode);
						
				        if($validitem[0])
						{
							$gtinnm=$validitem[2];
						   	$inserted=$this->adminfunctions->discountupcadd($upccode,$discount,$unit,$startdate,$enddate,$vendorid,$gtinnm);
				            
				            if(!$inserted)
							{
							   $error=true;
							   $errormessage.="Error while inserting into DB";
								
								
							}
							else{
								$insertedcount++;
							}      			
							
							
						}		
						else{
							$error=true;
							$errormessage.=$validitem[1];
							
					     	}
						
						}
						else{
							$error=true;
							$errormessage.=$validupc[1];
							
							
						}
						
					}
					else{
					   $error=true;	
					   $errormessage.="Not a valid start date or end date or discount";	
					}
					
					
				if($error){
					$keyvalue=array($row['id'],$errormessage);
					array_push($errorarray,$keyvalue);	
				   //$errorarray[][0]=$row['id'];
				   //$errorarray[][1]=$errormessage;	
				}	
				}
					$firsttime++;
				}

                
				
			  }
              
			 //echo $totalcount;echo $insertedcount;
			  
		     //var_dump($errorarray);
			 
		     $this->senduseremail($vendorid,$errorarray,$totalcount,$insertedcount);
		     
			$data['message']='This file is uploaded and being processed';       
            $this->load->view('admin/bulkdiscounts',$data);
			  
		      	     
	      }  
       else{
       	    
			$data['message']='This file could not be uploaded';       
            $this->load->view('admin/bulkdiscounts',$data);
       }
	   
		} /*ALlowed*/
		else{
			/*$vendors=$this->adminfunctions->getvendors();
		    $data['vendors']=$vendors;*/
			$data['message']='This file type is not allowed';       
            $this->load->view('admin/bulkdiscounts',$data);
			
			
		}
	  
	}
	
	
	function getrightupc($upc)
	{
		$validupc= true;
		$validity=array();
		$upcid = '';
		if(strlen($upc)==13) {$upcid=$upc;$validupc=true;}
		if(strlen($upc)>13) $validupc=false;
		if(strlen($upc)<12) $validupc = false;
	 	switch(strlen($upc))
		{
			case "12" : $upcid = "0".$upc;break; 
			
			default : break;	
		}
		
		if($validupc)
		{
		  	$validity[0]=true;
			$validity[1]="";
			$validity[2]=$upcid;
			
		}
		else{
			
			$validity[0]=false;
			$validity[1]="Not a valid UPC Code";
			$validity[2]='';
			
		}
		
		return $validity;
	}
	
	
	function checkvaliditem($upc)
	{
		$validity=array();
			$gtindetails=$this->adminfunctions->itemvalidity($upc);
			//var_dump($gtindetails);
			if($gtindetails[0])
			  {
			  	$validity[0]=true;
			    $validity[1]="";
				$validity[2]=$gtindetails[1]['GTIN_NM'];
				
			  }
			else{
				$validity[0]=false;
			    $validity[1]="UPC Code does not exist in our database";
				$validity[2]="";
				
			}
			
		
		
		return $validity;
		
		
	}
	
	
	
	function parse_file($p_Filepath, $p_NamedFields = true) {
		
    	
        $content = false;
        $file = fopen($p_Filepath, 'r');
		$mainheader=fgetcsv($file, $this->max_row_size, $this->separator, $this->enclosure);
		$mainheader=fgetcsv($file, $this->max_row_size, $this->separator, $this->enclosure);
		$vendorid=$mainheader[5];
		
		$skipline= fgetcsv($file, $this->max_row_size, $this->separator, $this->enclosure);
		
        if($p_NamedFields) {
            $this->fields = fgetcsv($file, $this->max_row_size, $this->separator, $this->enclosure);
        }
		
        while( ($row = fgetcsv($file, $this->max_row_size, $this->separator, $this->enclosure)) != false ) {            
            if( $row[0] != null ) { // skip empty lines
                if( !$content ) {
                    $content = array();
					$content['vendorid']=$vendorid;
                }
                if( $p_NamedFields ) {
                    $items = array();

                    //Fill the array with values of defined fields
                    foreach( $this->fields as $id => $field ) {
                        if( isset($row[$id]) ) {
                            $items[$field] = $row[$id];    
                        }
                    }
                    $content[] = $items;
                } else {
                    $content[] = $row;
                }
            }
        }
        fclose($file);
        return $content;
      }
   
   
	public function senduseremail($vendorid,$errorarray,$totalrows,$insertedcount) 
	 {
	 	$headers = "From: support@superdealyo.com". "\r\n" .
		"Reply-To: support@superdealyo.com ". "\r\n" .
		'MIME-Version: 1.0' . "\r\n" .
        'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
		"X-Mailer: PHP/" . phpversion();
		
		$vendor=$this->adminfunctions->getvendordetails($vendorid);
		//var_dump($vendor);
		if($vendor)
		{
			$fname=$vendor[0]['fname'];	
			$email=$vendor[0]['email'];
			
		}
		
		
		$subject="Discount Upload Status";
	 	$message="";
		$message=$message."<br />Hi ".$fname."<br />";
		$message=$message."Thank you for using Superdealyo. <br />Here is the status of discount upload to our database. <br /><br />";	
	 	
		if(!empty($errorarray))
		{
			$message.="Status :".$insertedcount."out of ".$totalrows."discounts uploaded.<br />Here are the errors while uploading the file. <br /><br /><table border='1'><tr><th>Line No. in File</th><th>Message</th></tr>";
			foreach($errorarray as $error)
			{
		       $message.="<tr><td>".$error[0]."</td><td>".$error[1]."</td></tr>";		
				
				
			}
			$message.="</table>";
		  $message.="<br />Please Correct them and resend. <br /><br />";	
		}
		else{
			$message.="<span style='color:green;'>All the discounts uploaded. No Errors were found</span><br />";
			
		}
		
	 	
	 	$message.="<br />Thank you for using SuperDealyo.<br />";
	 	$message.="SuperDealyo Support Team<br />";
	 	//echo $message;
		if(mail($email,$subject,$message,$headers))
		return true;
		else 
	    return false;
	    
	 	/*echo "\n --------------------- \n";
	 	echo "Email id:".$email;
		echo "Item Count: ".count($items)."\n";
		echo "\n---------------------\n";*/
		
		
		
	 }
	
	
	
	
	
	
	function logout()
     {
		$this->session->unset_userdata('is_logged_in');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('fname');
		session_destroy();
		header('Location:/adminlogin/index');
	 }
	
	
}