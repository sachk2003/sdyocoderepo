<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include 'assets/vendor/autoload.php';
class Bylist extends CI_Controller {

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
		
       $data['main_content']='bylist';
        $this->load->view('bylist'); 
	}
	
	/* Function to get Autocomplete */
	public function autocomplete()
	{
		$config = array(
           'endpoint' => array(
              'sdyo' => array(
                   'host' => 'dev.superdealyo.com', 'port' => '8983', 'path' => '/solr/'
           )
         )
        );
	   
	    // create a client instance
        $client = new Solarium\Client($config);
		   
		$term=$this->input->get('term');
		// get a terms query instance and set some options
        $query = $client->createTerms();
		$query->setFields('sname');
		//$query->setPrefix($searchterm); 
		$query->setRegex($term.'.*');
		$query->setRegexflags('case_insensitive');
		
		//$query->setLowerbound($searchterm);
		 
		// this executes the query and returns the result
		$resultset = $client->terms($query);
		  $json=array();
		// display terms
		foreach ($resultset as $field => $terms) {
		    //echo '<h3>' . $field . '</h3>';
		    foreach ($terms as $term => $count) {
		       $json[]=array(
		                    'value'=>  $term,
		                    'label'=> $term
		                        );	
		       
		       
		    }
		    //echo '<hr/>';
		}
		echo json_encode($json); 
				
      }
	
	 /* Function to getzip using Google Maps API */
	 public function getzip()
	 {
	 	
		$term=$this->input->get('term');
		$url="https://maps.googleapis.com/maps/api/geocode/xml?address=$term&sensor=false&region=us&components=country:us|postal_code:$term&key=AIzaSyBQoZVNNm3VAP9g7pIWeqnfxD6tU3zY5yo";
		$ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $headers=array('Content-type: application/xml');
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch, CURLOPT_URL,$url);


        $result=curl_exec($ch);
	
	    $xml = simplexml_load_string($result);
			if($xml->status == 'OK')
			{
				//echo "Called successfully";
				$tracks = $xml->result; 
				$temp; $city; $state; 
				foreach($tracks as $key) 
				{
					    foreach($key->address_component as $val)
				
				          {
				          	 if(($val->type == 'locality') || ($val->type=='neighborhood'))
		                     		{
		                     		
		                     			$city=$val->short_name;
		                     		}
		                     else if($val->type == 'administrative_area_level_1')
								{
									$state=$val->short_name;
								}
		                     
						  }
				}
				
				 $json=array();
				 $json[]=array(
		                    'value'=> $term.'-'.$city.','.$state,
		                    'label'=>$term.'-'.$city.','.$state
		                        );
				 
				  echo json_encode($json);
				
			}
			else if($xml->status == 'ZERO_RESULTS')
			  {
				  $json=array();
				 $json[]=array(
		                    'value'=> 'No Such Zip Code in USA',
		                    'label'=>'No Such Zip Code in USA'
		                        );
				 
				  echo json_encode($json);
				
		   	  }
			else{
				
				
				$json=array();
				 $json[]=array(
		                    'value'=> 'error',
		                    'label'=>'error'
		                        );
				 
				  echo json_encode($json);
			    }
				
				
				
				
	    } 

          
    
    public function getdiscounts()
	  {
	  	 
		
	  	 $item1 = $this->input->post('item1');
		 $item2 = $this->input->post('item2');
		 $item3 = $this->input->post('item3');
		 $item4 = $this->input->post('item4');
		 $item5 = $this->input->post('item5');
		 $zip   = $this->input->post('zip');
         if($zip=='No Such Zip Code in USA')
		 {
		 	$data['main_content']='bylist';
			$data['message']="Wrong Zip Code, Try Again";
            $this->load->view('bylist',$data); 
		 }	
		 else{
		 $zip=trim($zip);
		 $zipcode=explode('-',$zip);
         $city=explode(',', $zipcode[1]);		 
		 
		 
		$items=array();
		if($item1!='') array_push($items,$item1);
		if($item2!='') array_push($items,$item2);
		if($item3!='') array_push($items,$item3);
		if($item4!='') array_push($items,$item4);
		if($item5!='') array_push($items,$item5);
		 
		 
		 
		//$this->load->model('discounts');
		$vendors=array();
		$vendors = $this->discounts->availablevendors($zipcode[0],$city[0]);
		
		//$details=$this->getdiscountinfo($vendors, $item);
		
		$upcids=array();
	    $images=array();
		$productinfo=array();
		
		$k=0;$upccount=0;$imgpath='';
		$details=array();$nsdata=array();
		foreach($items as $item)
		{
			$itembreak=explode('upc:',$item);
			$itemupc=$itembreak[1];
			
			$link='';$itemname='';
		    $j=0;			     
			foreach($vendors as $vendor)	
			{   $vendorid=$vendor['vendorid'];
			    $company=$vendor['company'];
				$itemdetails=$this->discounts->getdiscountbyitem($vendorid,$itemupc);
				
			    if((count($itemdetails)!=0)||(sizeof($itemdetails)!=0))
				{  //var_dump($itemdetails);
				   
				  $upcid=$itemdetails[0]['upc'];
				  			  
			      if($upcid)
			      {
			      
				  if(!in_array($upcid,$upcids))
				  {	
				  $upccount++;
		          array_push($upcids,$upcid);
				  }
				  /* get the Brand Link*/
				  $gtindetails=$this->discounts->getgtindetailsbyupc($upcid);
				  //var_dump($gtindetails);
				  $bsin=$gtindetails[0]['BSIN'];
				  $itemname=$gtindetails[0]['GTIN_NM'];	
				  
				  $mg=	$gtindetails[0]['M_G'];
				  $moz= $gtindetails[0]['M_OZ'];	
				  $mml= $gtindetails[0]['M_ML'];
				  $mfloz= $gtindetails[0]['M_FLOZ'];
				  $mabv=$gtindetails[0]['M_ABV'];
				  $mabw=$gtindetails[0]['M_ABW'];
				 if(!in_array($upcid,$productinfo))
				  {  $productinfo[$itemname]['upc']=$upcid;
				  if($mg!=NULL)
				    $productinfo[$itemname]['weight']=$mg." grams";
				  
				  if($moz!=NULL)
				    $productinfo[$itemname]['volume']=$moz." oz";
				  
				  if($mml!=NULL)
				    $productinfo[$itemname]['volume']=$mml." ml";
				  
				  if($mfloz!=NULL)
				    $productinfo[$itemname]['volume']=$mfloz." fluid oz";
				  
				  }
				  
				  
				  
				  
				  $branddetails=$this->discounts->getbranddetails($bsin);
				  
				  if(!$this->customSearch('not found', $branddetails[0]))
		          {//var_dump($branddetails);
		  	
			       $link = $branddetails[0]['BRAND_LINK'];
				  }
				  
				$upccode=substr($upcid,0,3);
				$this->load->helper('file');
				$path="../images/gtin/gtin-".$upccode."/$upcid.jpg";
				$exists = read_file($path);
				if($exists)
				$imgpath="http://superdealyo.com/images/gtin/gtin-".$upccode."/$upcid.jpg";
				else
				$imgpath="http://dev.superdealyo.com/assets/img/notavailable.gif";			
			        if(!in_array($imgpath,$images))
			            array_push($images,$imgpath);	
			      //echo $j;
			      $nsdata[$k][$j][]=$itemdetails[0]['item'];
			      $nsdata[$k][$j][]=$company;
			      $nsdata[$k][$j][]=$itemdetails[0]['discount'];
			      $nsdata[$k][$j][]=$itemdetails[0]['startdate'];
			      $nsdata[$k][$j][]=$itemdetails[0]['enddate'];
				  $nsdata[$k][$j][] = $vendorid;
			      
			      
			      
				  $details[$k][$j][]= $itemdetails[0]['item'];	
				  $details[$k][$j][]= $company;
				  $details[$k][$j][]= $itemdetails[0]['upc'];
				  $details[$k][$j][]= $itemdetails[0]['discount'];
				  $details[$k][$j][]= $itemdetails[0]['unit'];
				  $details[$k][$j][]= $itemdetails[0]['startdate'];	
				  $details[$k][$j][]= $itemdetails[0]['enddate'];	
				  $details[$k][$j][]= $imgpath;
				  if($link!='')
				  $details[$k][$j][]= $link;
				  else {
					  $details[$k][$j][]='';
				  }
				  $details[$k][$j][] = $vendorid;
				  $details[$k][$j][] = $itemname;
				  } 
                $j++;	
				}
				else 
				{
					//$details[$k][$j]=array();
				 	
				}
				
				
			}
		
		$k++;	
								
		}
		$itemsinfo[]=$upccount;
		$itemsinfo[]=$upcids;
		$itemsinfo[]=$details;
		$itemsinfo[]=$images;
		$itemsinfo[]=$productinfo;
		$itemsinfo[]=$nsdata;
		//var_dump($productinfo);
		//var_dump($upcids);
		//var_dump($images);
		//var_dump($details);
		//var_dump($itemsinfo);	
		$data['details']=$itemsinfo;
		
		$this->load->view('discountbylist.php',$data);
			 
			 } 		 
	  }	
    
    
    
     public function vendorinfo()
	  {
	  	$vendorid=$this->input->get('vendorid');
		if($vendorid!='')
		{
			
			$vendorinfo=$this->discounts->vendorinformation($vendorid);
		    if(count($vendorinfo)!=0)
			{
				$data['message']='';	
				$data['details']=$vendorinfo;
				$this->load->view('vendorinfo',$data);
				
			}
			else{
				
				$data['message']='No Vendor Details found';	
				$data['details']='';
				$this->load->view('vendorinfo',$data);
			}
		  	
		}
		
		
	  }


      public function getproductinfo()
	  {
	  	$json=array();
		$pnm='';$upc='';$bsin='';$mg='';$moz='';$mml='';$mfloz='';$mabv='';$mabw='';
		$brandnm='';
		$brandtypecd='';$brandlink='';
		$brandtypename='';
		
		
	  	$upc= $this->input->get('upc');
		$upcdetails=$this->discounts->getgtindetailsbyupc($upc);
		//var_dump($upcdetails);
		//echo array_search('not found',$upcdetails[0]);
		if(!$this->customSearch('not found', $upcdetails[0]))
		{
		  $pnm=$upcdetails[0]['GTIN_NM'];
		  $upc=$upcdetails[0]['GTIN_CD'];	
		  $bsin=$upcdetails[0]['BSIN'];
		  $mg=	$upcdetails[0]['M_G'];
		  $moz= $upcdetails[0]['M_OZ'];	
		  $mml= $upcdetails[0]['M_ML'];
		  $mfloz= $upcdetails[0]['M_FLOZ'];
		  $mabv=$upcdetails[0]['M_ABV'];
		  $mabw=$upcdetails[0]['M_ABW'];
		  
		  
		  $branddetails=$this->discounts->getbranddetails($bsin);
		  //var_dump($branddetails);
		  if(!$this->customSearch('not found', $branddetails[0]))
		  {
		  	$brandnm=$branddetails[0]['BRAND_NM'];
			$brandtypecd=$branddetails[0]['BRAND_TYPE_CD'];
			$brandlink=$branddetails[0]['BRAND_LINK'];
			/*
			$json['brandnm']=$brandnm;
		    $json['brandtypecd']=$brandtypecd;
			$json['brandlink']=$brandlink;	           
			  */         
		
			$brandtypenm=$this->discounts->getbrandtypenm($brandtypecd);
			//var_dump($brandtypenm);
			if(!$this->customSearch('not found', $brandtypenm[0]))
			{
				$brandtypename=$brandtypenm[0]['BRAND_TYPE_NM'];
			    //$json['brandtypename']=$brandtypename;	
			}
			
			
			
		  }
		  
		  $json[]=array(
		                    'message'=> '0',
		                    'pnm'=>$pnm,
		                    'upc'=>$upc,
		                    'bsin' => $bsin,
		                    'mg' => $mg,
		                    'moz' => $moz,
		                    'mml' => $mml,
		                    'mfloz' => $mfloz,
		                    'mabv' => $mabv,
		                    'mabw' => $mabw,
		                    'brandnm' => $brandnm,
		                    'brandtypecd' => $brandtypecd,
		                    'brandlink' => $brandlink,
		                    'brandtypename' => $brandtypename
		               );
		  
		  	  
		}
		else{
			$json[]=array(
		                    'message'=> '1',
		                    
		                        );
			
			
			
		}
		
		echo json_encode($json);
		
		
		
		
	  }
	
	  function customSearch($keyword, $arrayToSearch){
	  	    $find=0;
		    foreach($arrayToSearch as $key => $arrayItem){
		        if( stristr( $arrayItem, $keyword ) ){
		            $find=1;
		        }
		    }
			return $find;
         }
			
	
}	
