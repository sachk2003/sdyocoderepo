<?php
 
 $term=$_GET["term"];
 
 
 $url="http://ziptasticapi.com/$term";
  //  echo $url;
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$headers=array('Content-type: application/json');
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
curl_setopt($ch, CURLOPT_URL,$url);


$result=curl_exec($ch);
 $result = json_decode($result,true);
//var_dump($result);
 
 $json=array();
 
 
         for($i=0;$i<count($result);$i+=3){    
         $json[]=array(
                    'value'=> $term.'-'.$result["city"].','.$result["state"],
                    'label'=>$term.'-'.$result["city"].','.$result["state"]
                        );
    }
 
 echo json_encode($json);
 
?>