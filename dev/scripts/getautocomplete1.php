<?php
 //mysql_connect("localhost:3307","root","");
 //mysql_select_db("superdealyo");
 include('connect.php');
 include 'vendor/autoload.php';

$config = array(
    'endpoint' => array(
        'sdyo' => array(
            'host' => '54.186.192.32', 'port' => '8983', 'path' => '/solr/'
        )
    )
);
 
 // create a client instance
$client = new Solarium\Client($config);
 
 $term=$_GET["term"];
 //echo $term;
 
 $terms=explode(' ',$term);
 //var_dump($terms); 
 $count=sizeof($terms);
 $searchterm= $terms[$count-1]; 
  
 $json=array();




// get a suggester query instance
$query = $client->createSuggester();
$query->setQuery('sname:'.$searchterm); //multiple terms
$query->setDictionary('suggest');
$query->setOnlyMorePopular(true);
$query->setCount(10);
$query->setCollate(true);
 
// this executes the query and returns the result
$resultset = $client->suggester($query);
 
//echo '<b>Query:</b> '.$query->getQuery().'<hr/>';
 
// display results for each term
foreach ($resultset as $term => $termResult) {
    //echo '<h3>' . $term . '</h3>';
    //echo 'NumFound: '.$termResult->getNumFound().'<br/>';
    //echo 'StartOffset: '.$termResult->getStartOffset().'<br/>';
    //echo 'EndOffset: '.$termResult->getEndOffset().'<br/>';
    //echo 'Suggestions:<br/>';
    /*foreach($termResult as $result){
    	
		
        echo '- '.$result.'<br/>';
    }*/
   
  
foreach ($termResult as $result) {
       
        
      $json[]=array(
                    'value'=>  $result,
                    'label'=> $result
                        );			
}		
   
}   
 //   echo '<hr/>';

  echo json_encode($json);
?>