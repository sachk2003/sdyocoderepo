<?php $this->load->view('templates/homeheader');?>
<?php $this->load->view('templates/loggedinusermenu');?>
<div class="col-md-9" style="margin-top:20px;">
<div class="row">
<div class="col-md-12">
	<br />
	<?php $fname=$this->session->userdata('fname');
	echo "<h4> Hello ".$fname."</h4>";?>
	<br />
	Welcome to Superdealyo User management portal.Please select an action item from left menu.
</div>
</div>		
	
		
<?php $fname=$this->session->userdata('fname');?>






</div>
</div>
</div>
<?php $this->load->view('user/userfooter');?>