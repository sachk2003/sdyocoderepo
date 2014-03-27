<?php
 //mysql_connect("localhost:3307","root","");
 //mysql_select_db("superdealyo");
 include('connect.php');
 include 'vendor/autoload.php';

$config = array(
    'endpoint' => array(
        'sdyo' => array(
            'host' => 'dev.superdealyo.com', 'port' => '8983', 'path' => '/solr/'
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
 
 
 // get a terms query instance and set some options
$query = $client->createTerms();
$query->setFields('sname');
$query->setPrefix($searchterm); 
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
 ?>