<?php $this->load->view('templates/homeheader');?>
<?php $this->load->view('vendor/vendormenu');?>

<div class="col-md-9" style="margin-top:20px;">
	
<div align="center">
<h4>Are you sure to delete below UPC Products?</h4>
<table class="table table-bordered">
<tr><td>Sr.No</td><td>UPC Code</td></tr>	
<?php 
$upcarray='';
for($i=0;$i<sizeof($values);$i++)
{     if($i==0)  $upcarray.=$values[$i];    
      else $upcarray.=','.$values[$i];
?>
<tr><td><?php echo $i+1;?></td><td><?php echo $values[$i]?></td></tr>	
<?php }?>	
</table>

<table><tr>
<td>
<a href="discount_deleted?src=delete_confirm&values=<?php echo "$upcarray" ?>" class='control-small'>Yes</a></td>
<td><a href="index" class='control-small'>No</a></td>
</tr></table>








</div>
            
</div>
</div>
<?php $this->load->view('vendor/vendorfooter');?>