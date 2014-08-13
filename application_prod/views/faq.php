<?php $this->load->view('templates/homeheader');?>

<div class="container">
	<div class="row">
  			<div class="col-md-3" id="leftCol">
              
              	<ul class="nav nav-stacked" id="sidebar">
                  <li><a href="#sec0">FAQ</a></li>
                  
              	</ul>
              
      		</div>  
      		<div class="col-md-9">
              	<h2 id="sec0">Frequently Asked Questions</h2>
<p>
<ol>
<li>	
How to create a shopping list?<br /> 
A: Click on the button "Create Shopping List" on the landing page to access the menu to start entering your shopping list. As you type, the auto-compete feature shows you the names of products. You can select a product from this drop down list. This will eliminate any typing errors. To see the demo, please see the video on the YouTube channel on the landing page or click <a target="_blank" href=https://www.youtube.com/channel/UC1SmKeJ0Ft8c6ZE4alFlIww>Demo</a> 
</li><br />
<li>
How to interpret the results for your shopping list?<br />
A: The results page shows images of products in your shopping list. Below the images, a list of stores and their deals are shown for easy comaprision. As you click the image or hover over the image, details of products are shown. By clicking "Best Bet" link on the page, you can see which store matches how many items from your shopping list and what will be your total bill at that store. You can also get the location of that store. The stores are ranked by the number of items matched from your shopping list.
</li><br />
<li>
When you go to vendor or user login you may see a message that says “This certificate is not Trusted” what does this mean and what to do at this point?<br />
A: When you go to vendor or user login, it goes through https and so a session key is established by using our domain’s public key. This public key is authenticated by CA Cert. However CA Cert's root certificate is not automatically installed by browsers. This results in the message “This certificate is not Trusted”. At this point you have two options (a) ignore the message and proceed or (b) install the CA Cert's root certificate. For details please see <a target="_blank" href=http://wiki.cacert.org/FAQ/BrowserClients>CA Cert Wiki</a>
</li><br />
</ol>
</p>
</div></div></div>
<?php $this->load->view('templates/aboutfooter');?>
