<?php $this->load->view('templates/homeheader');?>
<?php $this->load->view('vendor/vendormenu');?>
<div class="col-md-9" style="margin-top:20px;">
      	       <?php
      	       //var_dump($vendordetails);
      	       $this->load->library('session');
			   $fname=$this->session->userdata('fname');
              echo"<h5>Welcome, ",$fname,".</h5>";
              echo "<br><br>";
              if($vendordetails[0]['vendorid']!='')
			  {$row=$vendordetails[0];
              $vendorid = $row["vendorid"];
              
              $company = $row["company"];
				$category = $row["category"];
				$address = $row["address"];
				$city = $row["city"];
				$state = $row["state"];
				$zip = $row["zip"];
				$country = $row["country"];
				$phone = $row["phone"];
				$companyurl = $row["companyurl"];
				
				//var_dump($discountdetails);
				if($discountdetails[0]['subcatid']!=''){
					$row=$discountdetails[0];
				$subcat1 = $row["subcatname1"];
				$subcat2 = $row["subcatname2"];
				$subcat3 = $row["subcatname3"];
				$subcat4 = $row["subcatname4"];
				$subcat5 = $row["subcatname5"];
				$subcat6 = $row["subcatname6"];
				$subcat7 = $row["subcatname7"];
				$subcat8 = $row["subcatname8"];
				$subcat9 = $row["subcatname9"];
				$subcat10 = $row["subcatname10"];
				}
				else { 
				         echo "The subcategory database is empty";  
				      }
				$query="SELECT * FROM discount WHERE vendorid LIKE '$vendorid%'";
				$result = mysql_query($query);
				$array = array();
				$num = mysql_num_rows($result);
				if ($num > 0){
				while($row = mysql_fetch_assoc($result)){
				$array[] = $row;
				}
				}else { 
				        echo "The Discount database is empty";  
				      }
				      
				echo "<h6>Your Details</h6><br /><br />"; 
				echo "<table class='table table-bordered'><tr><td>Company</td><td>Address</td><td>City</td><td>State</td><td>Zip</td><td>Country</td><td>Company URL</td><td>Phone</td>";
				echo "</tr><tr><td>$company</td><td>$address</td><td>$city</td><td>$state</td><td>$zip</td><td>$country</td><td>$companyurl</td><td>$phone</td></tr></table>";	      
				
				
				echo "<br>";
				
				
				echo "<h6>Category and Sub-categories</b></h6><br />";
				echo "<b>Category:</b> $category<br>";
				echo "<b>Sub-cateogry1:</b> $subcat1<br>";
				echo "<b>Sub-cateogry2:</b> $subcat2<br>";
				echo "<b>Sub-cateogry3:</b> $subcat3<br>";
				echo "<b>Sub-cateogry4:</b> $subcat4<br>";
				echo "<b>Sub-cateogry5:</b> $subcat5<br>";
				echo "<b>Sub-cateogry6:</b> $subcat6<br>";
				echo "<b>Sub-cateogry7:</b> $subcat7<br>";
				echo "<b>Sub-cateogry8:</b> $subcat8<br>";
				echo "<b>Sub-cateogry9:</b> $subcat9<br>";
				echo "<b>Sub-cateogry10:</b> $subcat10<br>";
				echo "<br>";
				echo "<h6>Offerings</h6><br />";
				 }
				 else { 
				         echo "The Vendor database is empty"; 
				         mysql_close(); 
				      }
				echo "<br><br>";
				mysql_close();
      	       
      	       
      	       
      	       
      	       
      	       ?>		
      			
      		<table class="table table-bordered"><tr><td>Item</td><td>UPC</td><td>Sale Price</td><td>Unit</td><td>Start Date</td><td>End Date</td></tr>
      <?php 
              	for($i=0;$i<sizeof($array);$i++)
              	{$j=$i+1;
              		?>
              	<tr>
              		
              		<td><?php echo $array[$i]['item']?></td>
              		<td><?php echo $array[$i]['upc']?></td>
              		<td><?php echo $array[$i]['discount']?></td>
              		<td><?php echo $array[$i]['unit']?></td>
              		<td><?php echo $array[$i]['startdate']?></td>
              		<td><?php echo $array[$i]['enddate']?></td>
              		
              	</tr>		
      	     
      	         
      	
      	
      	
      	
      	<?php }
      	?>
      </table>
      
      	<!--
         <table class="table table-bordered">
        <tr> 
          <td height="29" width="25" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">Item</font></td>
          <td height="29" width="25" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">UPC</font></td>
          <td height="29" width="18%" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">Discount</font></td>
          <td height="29" width="17%" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">Unit</font></td>
          <td height="29" width="20" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">Start 
            Date</font></td>
          <td height="29" width="20" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">End 
            Date</font></td>
        </tr>
        <tr> 
          <td width="25" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><?php echo  $array[0]['item'];?></font></td>
          <td width="25" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><?php echo  $array[0]['upc'];?></font></td>
          <td width="18%" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><?php echo  $array[0]['discount'];?></font></td>
          <td width="17%" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><?php echo  $array[0]['unit'];?></font></td>
          <td width="20" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><?php echo  $array[0]['startdate'];?></font></td>
          <td width="20" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><?php echo  $array[0]['enddate'];?></font></td>
        </tr>
        <tr> 
          <td width="25" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><?php echo  $array[1]['item'];?></font></td>
<td width="25" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><?php echo  $array[1]['upc'];?></font></td>
          <td width="18%" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><?php echo  $array[1]['discount'];?></font></td>
          <td width="17%" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><?php echo  $array[1]['unit'];?></font></td>
          <td width="20" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><?php echo  $array[1]['startdate'];?></font></td>
          <td width="20" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><?php echo  $array[1]['enddate'];?></font></td>
        </tr>
        <tr> 
          <td width="25" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><?php echo  $array[2]['item'];?></font></td>
          <td width="25" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><?php echo  $array[2]['upc'];?></font></td>
          <td width="18%" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><?php echo  $array[2]['discount'];?></font></td>
          <td width="17%" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><?php echo  $array[2]['unit'];?></font></td>
          <td width="20" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><?php echo  $array[2]['startdate'];?></font></td>
          <td width="20" bordercolor="#999999"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000"><?php echo  $array[2]['enddate'];?></font></td>
        </tr>
      </table>-->
      <p>&nbsp;</p>
      <!-- #EndEditable --></td>
  </tr>
</table>
            
           </div>
            
      </div>
</div>





<?php $this->load->view('vendor/vendorfooter');?>