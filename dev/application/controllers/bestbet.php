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
        $this->load->model('discounts');             

    }
	 
	public function index()
	{
		$items=array();$details=array();$lessdetails=array();
		$vendors=array();$itemnames=array();$startdates=array();$enddates=array();
         //var_dump($this->session->all_userdata());
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
				array_push($lessdetails,$deal[0],$deal[3],$deal[5],$deal[6]);
				$details[$deal[1]][]=$lessdetails;
					
			 	
				
			 }
			
		   }
		   
		   date_default_timezone_set('GMT');
		   //var_dump($details);
		   
		   $beststartdate=date("mdY",strtotime("01-01-1970"));
		   $itemarray=array();
		   $bestenddate=date("mdY",strtotime("01-01-2020"));
		   $sumprice=0;
		   foreach($details as $key=>$value)
		   { $itemarray=array();
		   	 $sumprice=0;
		   	 $vendorname=$key;
			 
			 foreach($value as $val)
			 {
			    $sumprice+=$val[1];	
				if(!in_array($val[0],$itemarray))  array_push($itemarray,$val[0]);
				$d=trim($val[2]);
				$d=date("mdY",strtotime($d));
				if($d>$beststartdate)
				   $beststartdate=$d;
				
				$s=trim($val[3]);
				$s=date("mdY",strtotime($s));
				
				if($s>$bestenddate)
				   { $bestenddate=$s;
				     
				   }
				
			 }
			 
			echo $vendorname." ";
			echo count($itemarray)." "; 
			echo "$".$sumprice." ";
			echo "<br />";
		   }
		   
		   echo "Best Start Date:".$beststartdate."<br />";
		   echo "Best End Date:".$bestenddate."<br />";
		   
	}
	
}			
		