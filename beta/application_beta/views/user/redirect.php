<?php $this->load->view('templates/homeheader');?>
<div class="col-md-12" style="margin-top:20px;">
	<br /><br /><br /><br />
<h5 style="text-align: center;"><?php if($message!='') echo $message;?></h5>
<br />
<h6 style="text-align: center;">If not redirected, <a href="<?php if($url!='') echo $url;?>" style="color: blue">Click Here</a></h6>
<?php header("Refresh:5;url=".$url.""); ?>
</div>
</div>
</div>
<?php $this->load->view('user/userfooter');?>