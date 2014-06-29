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
		$bestbet=array();	
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
		   
		   //$beststartdate=date("mdY",strtotime("01-01-1970"));
		   $itemarray=array();
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
			 }
			 
			 
			$bestbet[$vendorname]['count']=count($itemarray);
			$bestbet[$vendorname]['sum']=$sumprice;
			
			
		   }
		   
		   foreach ($bestbet as $key => $row) {
			    $vol[$key]  = $row['count'];
			    $be[$key]=$row['sum'];
			}
		   array_multisort($vol, SORT_DESC,$be,SORT_ASC, $bestbet);
		   
		   echo "<h4>Your Best Bet for (".$beststartdate." – ".$bestenddate.")</h4>";
		   echo "<table border='1'><tr><td>Vendor</td><td>Number of Items</td><td>Total Amount</td></tr>";
		   foreach($bestbet as $k=>$p)
		   {
		   	  echo "<tr><td>".$k."</td>";	
		   	  echo "<td>".$p['count']."</td>";
			  echo "<td>".$p['sum']."</td></tr>";
		   }
		   echo "</table>";
		   //var_dump($bestbet);
		   //$this->sess_expiration = '60';
		   echo "Best Start Date:".$beststartdate."<br />";
		   echo "Best End Date:".$bestenddate."<br />";
		   
		  $this->session->sess_destroy();
		   
		   
	}
   
    
     

	
}			
		