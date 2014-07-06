<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include 'assets/vendor/autoload.php';
class Bestbet extends CI_Controller {

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
        $this->load->model('vendorfunctions');             

    }
	 
	public function index()
	{
		$bestbet=array();	
		$items=array();$details=array();$lessdetails=array();
		$vendors=array();$itemnames=array();$startdates=array();$enddates=array();
		
        $sess_data=$this->session->all_userdata();
		//var_dump($sess_data);
		if($this->session->userdata(0))
		{
           for($i=0;$i<5;$i++)
		   {
		   	if($this->session->userdata($i)) 
		      $items[]=$this->session->userdata($i);
		   }
		   
		   foreach($items as $item)
		   {
		   	 foreach($item as $deal)
			 {  
			 	//var_dump($deal);
				$lessdetails=array();
				//array_push($lessdetails,$deal[0],$deal[3],$deal[5],$deal[6],$deal[9]);
				array_push($lessdetails,$deal[0],$deal[2],$deal[3],$deal[4],$deal[5]);
				$details[$deal[1]][]=$lessdetails;
					
			 	
				
			 }
			
		   }
		   
		   date_default_timezone_set('America/New_York');
		   //var_dump($details);
		   
		   //$beststartdate=date("mdY",strtotime("01-01-1970"));
		   $itemarray=array();$vendorid='';
		   //$bestenddate=date("mdY",strtotime("01-01-2020"));
		   $sumprice=0;
		   $count=0;
		   foreach($details as $key=>$value)
		   { $itemarray=array();
		   	 $sumprice=0;
		   	 $vendorname=$key;
			   
			 foreach($value as $val)
			 {
			 	$d=trim($val[2]);
				$d=date("m/d/Y",strtotime($d));
				$s=trim($val[3]);
				$s=date("m/d/Y",strtotime($s));
			 	if($count==0)
				{
					$bestenddate=$s;
					$beststartdate=$d;
				}
				else{
				  if($d>$beststartdate)
				     $beststartdate=$d;
				
				  if($bestenddate>$s)
				     $bestenddate=$s;
				     
				}
				
			    $sumprice+=$val[1];	
				if(!in_array($val[0],$itemarray))  array_push($itemarray,$val[0]);
				
				
				$count++;
				$vendorid=$val[4];
			 }
			$vendordetails=$this->vendorfunctions->getvendorbyid($vendorid); 
			if($vendordetails)
			{
			$address=$vendordetails[0]['address']."+".$vendordetails[0]['city']."+".$vendordetails[0]['state']."+".$vendordetails[0]['country'];
			
			}
			else {
				$address='';
			}
			$bestbet[$vendorname]['id']= $vendorid;
			$bestbet[$vendorname]['count']=count($itemarray);
			$bestbet[$vendorname]['sum']=$sumprice;
			$bestbet[$vendorname]['address']=$address;
			
		   }
		   
		   foreach ($bestbet as $key => $row) {
			    $vol[$key]  = $row['count'];
			    $be[$key]=$row['sum'];
			}
		   array_multisort($vol, SORT_DESC,$be,SORT_ASC, $bestbet);
		   $data['sess_id']=$sess_data['session_id'];
		   $data['beststartdate']=$beststartdate;
		   $data['bestenddate']=$bestenddate;
		   $data['bestbet']=$bestbet;
		   $this->load->view('bestbet',$data);
		 }
       else{
       	$data['bestbet']=$bestbet;
		   $this->load->view('bestbet',$data);
		
       }
		   
	}
   
    function getitems()
	{
		$vendor=$this->input->get('v');
		$d=array();	
		$sessiondata=$this->session->all_userdata();
		//var_dump($discounts);
		if($this->session->userdata(0))
		{  $j=0;
           for($i=0;$i<5;$i++)
		   {
		   	if($this->session->userdata($i)) 
			 {
		        foreach($this->session->userdata($i) as $offering)
				{
					if($offering[1] == $vendor)
					{
					  	
					  $d[$j]['name']=$offering[0];
					  $d[$j]['offer']=$offering[3];	
					  $j++;
					}
					
				}
			  
			 } 
		   }
		
		}
		$json=array('items'=>$d);
	
		echo json_encode($json);
		
	}
     

	
}			
		