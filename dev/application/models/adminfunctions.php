<?php
class Adminfunctions extends CI_Model{
		
     public function validate($username,$password){
       //echo "validate function called ";
        $this->db->where('username',$username);
        $this->db->where('password',md5($password));
		$this->db->limit(1);
        $query=$this->db->get('admin');
        
        if($query->num_rows == 1){
        	
            $row=$query->result();
			
			$user=(array)$row[0];
			
            $data[]=$user['fname'];
            $data[]=true;
            return $data;

        }
		else{
			$data[]='';
			$data[1]=false;
			return $data;
		}


    }
	 
	 public function getvendors()
	 {
	 	$query=$this->db->get('vendor');
		if($query->num_rows >= 1){

            foreach ($query->result() as $row)
            {   
                
                $data[]=(array)$row;
               

            }
		return $data;
	 }
		
	 }
	 
	 public function itemvalidity($upc)
	 {
	 	  
	 	$this->db->where('GTIN_CD',$upc);
		
		$query=$this->db->get('gtin');
		if($query->num_rows() == 1)
		  {
		  	foreach ($query->result() as $row)
            {   
                
                $data[1]=(array)$row;
            }
			$data[0]=true;
			 return $data;
		   
		  }
		else 
			{
			$data[0]=false;$data[1]="";
		  return $data;	
			}
	 }
	 
	 function discountupcadd($upc,$discount,$unit,$startdate,$enddate,$vendorid,$item)
	{
		
		$date = new DateTime();
        
		$timestamp=$date->getTimestamp();
		
		$this->db->set('timestamp', $timestamp);
		$this->db->set('vendorid', $vendorid);
		$this->db->set('upc', $upc);
		$this->db->set('item', $item);
		$this->db->set('startdate', $startdate);
		$this->db->set('enddate', $enddate);
		$this->db->set('discount', $discount);
		$this->db->set('unit', $unit);
		
		$this->db->insert('discount');
		
		if ($this->db->affected_rows() == 1)
		 return true;
		
		else false;
		
		
		
		
	}
	
	function getvendordetails($vendorid) 
	 {
        $this->db->where('vendorid',$vendorid);
		$query=$this->db->get('vendor');	 	
		if($query->num_rows>0)
		{
			foreach ($query->result() as $row)
            {   
                
                $data[]=(array)$row;
            }
			
			 return $data;
			
		}
		
		
	 }
	 
	function cleanup()
	{
		$today=date('m/d/y');
		echo $today;
		
	} 
	 
}