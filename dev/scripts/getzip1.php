<?php
 
 $term=$_GET["term"];
 $apikey='AIzaSyBQoZVNNm3VAP9g7pIWeqnfxD6tU3zY5yo';
 
 $url="https://maps.googleapis.com/maps/api/geocode/xml?address=$term&sensor=false&region=us&components=country:us|postal_code:$term&key=AIzaSyBQoZVNNm3VAP9g7pIWeqnfxD6tU3zY5yo";
 //echo $url;
 //$url="http://ziptasticapi.com/$term";
  //  echo $url;
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$headers=array('Content-type: application/xml');
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch, CURLOPT_URL,$url);


    $result=curl_exec($ch);
	
//echo $result;
	
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
	else if($xml->status == 'ZERO_RESULTS'){
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
