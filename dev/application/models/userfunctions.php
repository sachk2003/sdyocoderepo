<?php
class Userfunctions extends CI_Model{
		
     public function validate($username,$password){
       //echo "validate function called ";
        $this->db->where('email',$username);
        $this->db->where('password',md5($password));
		$this->db->limit(1);
        $query=$this->db->get('user');
        
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
		
		
	public function getuserbyemail($email)	
	{
		$this->db->where('email',$email);
        
        $query=$this->db->get('user');

               	
			if($query->num_rows >= 1){

            foreach ($query->result() as $row)
            {   //echo "came";
                $data[]=(array)$row;
               

            }
		 
		   return $data; 
		  }
		else{
				
		       return false;		
			}
		
	}	
		
	public function getallusers()
	{
	  $query=$this->db->get('user');
	  if($query->num_rows>=1){
	  	
		foreach ($query->result() as $row)
            {   //echo "came";
                $data[]=(array)$row;
               

            }
		 
		   return $data; 
		  }
		else{
				
		       return false;		
			}
		  	
		
	}	
	
	public function getvendordiscount($vendorid)	
	{ $this->db->where('vendorid',$vendorid);
        
        $query=$this->db->get('subcat');

               	
			if($query->num_rows >= 1){

            foreach ($query->result() as $row)
            {   //echo "came";
                $data[]=(array)$row;
               

            }
		 
		   return $data; 
		  }
		else{
				
		       return false;		
			}
		
		
	}	
	
	function getdiscountforitem($vendorid,$item)
    {
    	$this->db->where('vendorid',$vendorid);
		$this->db->where('item',$item);
		$query=$this->db->get('discount');
		if($query->num_rows >= 1){

            foreach ($query->result() as $row)
            {   //echo "came";
                $data[]=(array)$row;
               

            }
		 
		   return $data; 
		  }
		else{
				
		       return false;		
			}
		
		
		
    }	
	
	function updatediscountforitem($discountid,$discount,$unit,$startdate,$enddate,$timestamp)
	{
		$data=array(
		         'discount'=>$discount,
		         'unit'=>$unit,
		         'startdate'=>$startdate,
		         'enddate'=>$enddate,
		         'timestamp'=>$timestamp
		  		);
		
	 	$this->db->where('discountid', $discountid);
        $this->db->update('discount', $data); 
        //echo $this->db->affected_rows();
		return (bool)($this->db->affected_rows() > 0);
		
	}
	
	
	
	function update_vendor($email)
	{  //echo "function called";
		$data = array(
               'vendorid' => $this->input->post('vendorid'),
               'fname' => $this->input->post('fname'),
               'mname' => $this->input->post('mname'),
               'lname' =>  $this->input->post('lname'),
               'company' =>  $this->input->post('company'),
               'companyurl' => $this->input->post('companyurl'),
               'category' => $this->input->post('category'),
               'address' => $this->input->post('address'),
               'city'  =>  $this->input->post('city'),
               'state' => $this->input->post('state'),
               'zip'  =>  $this->input->post('zip'),
               'country' => $this->input->post('country'),
               'phone' =>  $this->input->post('phone'),
               'mphone' =>  $this->input->post('mphone'),
               'email'  =>  $this->input->post('email'),
            );
		$this->db->where('email', $email);
        $this->db->update('vendor', $data); 
        //echo $this->db->affected_rows();
		return (bool)($this->db->affected_rows() > 0);
			
	}
	
	function delete_vendor($vendorid)
	{
		$message='Following details of Vendor Deleted: ';
			
		$this->db->delete('subcat', array('vendorid' => $vendorid));
		
		if ($this->db->affected_rows() > 0)
		   $message=$message."Sub Categories";
		
		
		$this->db->delete('discount', array('vendorid' => $vendorid));
		   
		   if ($this->db->affected_rows() > 0)
		   $message=$message."Discounts";
		   
		$this->db->where('vendorid',$vendorid);
		$this->db->delete('vendor');
		   
		   if ($this->db->affected_rows() > 0)
		   $message=$message."Profile";
		
		//echo $message;
		  
			return $message;
		
	}	
		
	function checkuser($email,$password)	
	{
		
		$this->db->where('email',$email);
		$this->db->where('password',md5($password));
		$this->db->limit(1);
		
		$query=$this->db->get('vendor');
   	
			if($query->num_rows >= 1){
                         	 
		   return true; 
		  }
			else {
				return false;
			}
		
	}
	
	function checkuserexist($email)
	{
		
		$this->db->where('email',$email);
		
		$this->db->limit(1);
		
		$query=$this->db->get('user');
   	
			if($query->num_rows >= 1){
                         	 
		   return true; 
		  }
			else {
				return false;
			}
		
	}
	
	function createuser($fname,$mname,$lname,$country,$zip,$address,$city,$state,$phone,$mphone,$email,$password,$timestamp,$alertitem1,$alertitem2,$alertitem3,$alertitem4,$alertitem5)
	{
		$this->db->set('timestamp', $timestamp);
		$this->db->set('fname', $fname);
		$this->db->set('mname', $mname);
		$this->db->set('lname', $lname);
		$this->db->set('country', $country);
		$this->db->set('zip', $zip);
		$this->db->set('address', $address);
		$this->db->set('city', $city);
		$this->db->set('state', $state);
		$this->db->set('phone', $phone);
		$this->db->set('mphone', $mphone);
		$this->db->set('email', $email);
		$this->db->set('password', md5($password));
		$this->db->set('alertitem1', $alertitem1);
		$this->db->set('alertitem2', $alertitem2);
		$this->db->set('alertitem3', $alertitem3);
		$this->db->set('alertitem4', $alertitem4);
		$this->db->set('alertitem5', $alertitem5);
		$this->db->insert('user');
		
		if ($this->db->affected_rows() == 1)
		 return true;
		
		else false;
		
		
	}
	
	function updateuserinfo($fname,$mname,$lname,$country,$zip,$address,$city,$state,$phone,$mphone,$email,$password,$timestamp,$alertitem1,$alertitem2,$alertitem3,$alertitem4,$alertitem5)
	{
		$this->db->set('timestamp', $timestamp);
		$this->db->set('fname', $fname);
		$this->db->set('mname', $mname);
		$this->db->set('lname', $lname);
		$this->db->set('country', $country);
		$this->db->set('zip', $zip);
		$this->db->set('address', $address);
		$this->db->set('city', $city);
		$this->db->set('state', $state);
		$this->db->set('phone', $phone);
		$this->db->set('mphone', $mphone);
		
		$this->db->set('password', md5($password));
		
		$this->db->set('alertitem1', $alertitem1);
		$this->db->set('alertitem2', $alertitem2);
		$this->db->set('alertitem3', $alertitem3);
		$this->db->set('alertitem4', $alertitem4);
		$this->db->set('alertitem5', $alertitem5);
		$this->db->where('email',$email);
		$this->db->update('user');
		//echo $this->db->last_query();
		if ($this->db->affected_rows() == 1)
		 return true;
		
		else false;
		
		
	}
	
	function deleteuserinfo($email)	
	{
		$this->db->limit(1);	
		$this->db->delete('user', array('email' => $email));
		
		if ($this->db->affected_rows() == 1)
		 return true;
		
		else false;
		
		
	}
	
	
	function addsubcatentry($vendorid,$subcatname1,$subcatname2,$subcatname3,$subcatname4,$subcatname5,$subcatname6,$subcatname7,$subcatname8,$subcatname9,$subcatname10,$timestamp)
	{
		
		$this->db->set('vendorid', $vendorid);
		$this->db->set('subcatname1', $subcatname1);
		$this->db->set('subcatname2', $subcatname2);
		$this->db->set('subcatname3', $subcatname3);
		$this->db->set('subcatname4', $subcatname4);
		$this->db->set('subcatname5', $subcatname5);
		$this->db->set('subcatname6', $subcatname6);
		$this->db->set('subcatname7', $subcatname7);
		$this->db->set('subcatname8', $subcatname8);
		$this->db->set('subcatname9', $subcatname9);
		$this->db->set('subcatname10', $subcatname10);
		$this->db->set('timestamp', $timestamp);
		$this->db->insert('subcat');
		
		if ($this->db->affected_rows() == 1)
		 return true;
		
		else false;
		
		
	}
	
	function forgotretrieve($email,$lname,$zip)
	{
		$this->db->where('email',$email);
		$this->db->where('lname',$lname);
		$this->db->where('zip',$zip);
		$query=$this->db->get('user');
		
		if($query->num_rows >= 1){
             
			 foreach ($query->result() as $row)
            {   //echo "came";
                $data[]=(array)$row;
               

            }
		 
            //var_dump($data);		 
		   return true; 
			 
			             	 
		   //return true; 
		  }
			else {
				return false;
			}
		
		
		
		
	}
	
	
	
	function updateuser($email,$newpassword)
	{
		$data = array(
               'password' => md5($newpassword)
                           );
		
		$this->db->where('email',$email);
		$this->db->update('user', $data); 
		//echo $this->db->affected_rows();
		return (bool)($this->db->affected_rows() > 0);
		
		
		
	}
	
	function getvendordiscounts($vendorid)
	{
		$this->db->where('vendorid',$vendorid);
        
        $query=$this->db->get('discount');

               	
			if($query->num_rows >= 1){

            foreach ($query->result() as $row)
            {   //echo "came";
                $data[]=(array)$row;
               

            }
		 
		   return $data; 
		  }
		else{
				
		       return false;		
			}
		
		
		
	}
   
   function checkupc($upc)
	{
		
		$this->db->where('GTIN_CD',$upc);
        $this->db->limit(1);
        $query=$this->db->get('gtin');
		if($query->num_rows >= 1){
		
		 foreach ($query->result() as $row)
            {   //echo "came";
                $data[]=(array)$row;
               

            }
		 
		   return $data; 
		}
		
		else {
			return false;
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
	
    function deleteupc($vendorid,$upc)	
	{
		$this->db->limit(1);	
		$this->db->delete('discount', array('vendorid' => $vendorid,'upc'=>$upc));
		
		if ($this->db->affected_rows() == 1)
		 return true;
		
		else false;
		
		
	}
	
}		
	