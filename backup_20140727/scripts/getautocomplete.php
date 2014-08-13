<?php
 //mysql_connect("localhost:3307","root","");
 //mysql_select_db("superdealyo");
 include('connect.php');
 $term=$_GET["term"];
 
 $query=mysql_query("SELECT * FROM tag where name like '%".$term."%' order by name ",$connection);
 $json=array();
 
 
    while($row=mysql_fetch_array($query)){
         $json[]=array(
                    'value'=> $row["name"],
                    'label'=>$row["name"]
                        );
    }
 
 echo json_encode($json);
 
?>
