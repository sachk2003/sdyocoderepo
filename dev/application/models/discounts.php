<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lenovo
 * Date: 2/12/13
 * Time: 5:54 PM
 * To change this template use File | Settings | File Templates.
 */
class Discounts extends CI_Model{
		
       public function availablevendors($zip,$city)
	   {
	   	
		$this->db->where('zip', $zip);
        $this->db->where('city',$city);
		$query=$this->db->get('vendor');
		
		if($query->num_rows >= 1){

            foreach ($query->result() as $row)
            {   //echo "came";
                
                $data[]=(array)$row;
               

            }
            

        }
		else{
			$data[]='No Vendors';
			
		}
		
		return $data;
		
	   }
	   
	   public function vendorinformation($vendorid)
	   {
	   	
		$this->db->where('vendorid', $vendorid);
        
		$query=$this->db->get('vendor');
		
		if($query->num_rows >= 1){

            foreach ($query->result() as $row)
            {   //echo "came";
                
                $data[]=(array)$row;
               

            }
            

        }
		else{
			$data[]='No Vendors';
			
		}
		
		return $data;
		
	   }
	   
	   
	   public function getdiscountbyitem($vendor,$upc)
	   {
	   	  $data=array();
		  $this->db->where('vendorid', $vendor);
          $this->db->where('upc',$upc);
		  $query=$this->db->get('discount');
		  if($query->num_rows >= 1){

            foreach ($query->result() as $row)
            {   //echo "came";
              
                $data[]=(array)$row;
               

            }
		  
		  }
		  
		  else{
		  	/*$message='not found';
		  	$data['message']=(array)$message;
			 
			 */
		  }
		
		  return $data;
		  
		
	   }
	   
	   public function getgtindetails($item)
	    {
	      $this->db->where('GTIN_NM',$item);
		  $query=$this->db->get('gtin');
		  if($query->num_rows >= 1){

            foreach ($query->result() as $row)
            {   //echo "came";
                $data[]=(array)$row;
               

            }
		  
		  }
		  
		  else{
		  	
		  	$message='not found';
		  	$data[0]=(array)$message;
			
		  }
		
		  return $data;
			
	    }		
		
		public function getgtindetailsbyupc($upc)
		{
			
			$this->db->where('GTIN_CD',$upc);
		    $query=$this->db->get('gtin');
			if($query->num_rows >= 1){

            foreach ($query->result() as $row)
            {   //echo "came";
                $data[]=(array)$row;
               

            }
		  
		  }
			else{
		  	
		  	$message='not found';
		  	$data[0]=(array)$message;
			
		  }
			
			
		return $data;	
			
		}
		
		
		public function getbranddetails($bsin)
		{
			$this->db->where('BSIN',$bsin);
		    $query=$this->db->get('brand');
			if($query->num_rows >= 1){

            foreach ($query->result() as $row)
            {   //echo "came";
                $data[]=(array)$row;
               

            }
		  
		  }
			else{
		  	
		  	$message='not found';
		  	$data[0]=(array)$message;
			
		  }
			return $data;
			
		}
		
		public function getbrandtypenm($brandtypecd)
		{
			
			$this->db->where('BRAND_TYPE_CD',$brandtypecd);
		    $query=$this->db->get('brand_type');
			if($query->num_rows >= 1){

            foreach ($query->result() as $row)
            {   //echo "came";
                $data[]=(array)$row;
               

            }
		  
		  }
			else{
		  	
		  	$message='not found';
		  	$data[0]=(array)$message;
			
		  }
			return $data;
			
			
		}
		
		
}		
	
