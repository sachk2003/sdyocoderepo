<?php
 //mysql_connect("localhost:3307","root","");
 //mysql_select_db("superdealyo");
 include('connect.php');
 include 'vendor/autoload.php';

$config = array(
    'endpoint' => array(
        'sdyo' => array(
            'host' => '54.186.194.92', 'port' => '8983', 'path' => '/solr/'
        )
    )
);
 
 // create a client instance
$client = new Solarium\Client($config);
 
 $term=$_GET["term"];
 
 //$query=mysql_query("SELECT * FROM tag where name like '%".$term."%' order by name ",$connection);
 $query = $client->createSelect();
 $query->setStart(0)->setRows(7);

// *:* is equivalent to telling solr to return all docs
$query->setQuery('id:*'.$term.'*');
$resultSet = $client->select($query);
//echo '<div class="search-results">';
 $json=array();
foreach ($resultSet as $result) {
       
        
      $json[]=array(
                    'value'=>  $result->id,
                    'label'=> $result->id
                        );			
}		
 
 

 
 
  /*  while($row=mysql_fetch_array($query)){
         $json[]=array(
                    'value'=> $row["name"],
                    'label'=>$row["name"]
                        );
    }
 */
 echo json_encode($json);
 
?>
