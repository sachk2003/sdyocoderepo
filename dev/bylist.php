
<?php include 'scripts/headerauto.php';?>    
    
  
        <div id="main-wrapper" class="color-skin-3">
                       
            <header id="header-2" class="header"  style="width: 100%; bottom: 0;">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.html">Super<span>Dealyo</span></a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav">
                            	
                                
                            </ul>
                            <!-- /.nav -->
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container -->
                </nav>
                <!-- /.navbar -->
            </header>
            <div class="container-form" id="pad" >
            	<div class="row">
            		<div class="col-md-3"></div>
            		<div class="col-md-6 col-md-offset-1">
            			<h2>Create YOUR Shopping List</h2>
            		</div>
            		<div class="col-md-3"></div>
               	</div>
             <?php 
             
             $items=array("Milk","Quick Oats","Honey","Strawberry Preserves","Laptop");
             
             
             ?>            
            
              <div class="row" style="margin-top:20px">
               <div class="col-md-3"></div>
               <div class="col-md-7">
            <?php for($i=0;$i<5;$i++){?>			
  <form class="form-horizontal" role="form">
  <div class="form-group">
    <label for="Item 1" class="col-lg-4 col-md-3 control-label">Item <?php echo $i+1;?> (example: <?php echo $items[$i];?>)</label>
    <div class="col-md-6">
      <input type="text" name="item<?php echo $i+1;?>" class="form-control" id="tag<?php echo $i+1;?>" placeholder="Item <?php echo $i+1;?>">
    </div>
  </div>
  
    <?php }?>
   <div class="form-group">
   	<label for="zip" class="col-lg-4 col-md-3 control-label">Zip Code</label>
   	<div class="col-md-6">
   		<input type="text" name="zip" class="form-control" placeholder="Zip Code">
   		
   	</div>
   	  	
   </div>
   
   
   	<div class="col-md-4 col-md-offset-2">
   	  <button  class="control">Submit</button>
   	</div>
   
     
</form>
                        			
            			
           </div>
              
            
            
            
              </div>            	
            </div>
            
            	
                
            
            
            
            <footer id="footer-1" class="footer">
                <div class="container">
                    <div class="row">
                    	<div class="col-md-2"><a href="#" >Vendor Login</a></div>
                        <div class="col-md-2"><a href="#" >About Us</a></div>
                        <div class="col-md-2 "><a href="#">Privacy</a></div>
                        <div class="col-md-2 "><a href="#">Help</a></div>
                        <div class="col-md-2 "><a href="#">Jobs</a></div>
                        <div class="col-md-2 "><a href="#">Contact</a></div>
                                              
                        
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </footer>
            <!-- /#footer-1 -->
            <footer id="footer-2" class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <span>© 2014 SuperDealyo. ALL RIGHTS RESERVED </span>                        
                        </div>
                        <!-- /.footer-info-wrapper -->
                        
                        <!-- /.social-link-wrapper -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </footer>
            <!-- /#footer-2 -->
            
        </div>
        <!-- /#main-wrapper -->
        <!-- Bootstrap JS & Others JavaScript Plugins
            ================================================== -->
        <!-- Placed At The End Of The Document So Page Loads Faster -->
        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <!--<script src="assets/js/jquery-2.0.3.min.js"></script>-->
        <!--<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>-->
        <script src="assets/js/jquery.bxslider.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
          
        
        
        <script src="assets/UItoTop/js/easing.js"></script>
        <script src="assets/UItoTop/js/jquery.ui.totop.min.js"></script>
        <script src="assets/isotope-site/jquery.isotope.min.js"></script>
        
        
        
        <!--<script src="assets/js/custom.js"></script>-->
        
        <script type="text/javascript">
            var tpj = jQuery;
            tpj.noConflict();
            
            
            tpj(document).ready(function () {
            
                    	
            	
                
                 
                // jQuery UItoTop
                tpj().UItoTop({ easingType: 'easeOutQuart' });
                // Skin Chooser
                tpj(".color-skin").click(function () {
                    var cls = this.id;
                    tpj(".color-skin").removeClass("active");
                    tpj(this).addClass("active");
                    tpj("#main-wrapper").removeClass();
                    tpj("#main-wrapper").addClass(cls);
                });
                
                
                //AutoComplete
                tpj("#tag1").autocomplete({
                        source:'scripts/getautocomplete.php',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#tag1").autocomplete("widget").css("width","350px");
                    }

                    });
                    tpj("#tag2").autocomplete({
                        source:'scripts/getautocomplete.php',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#tag2").autocomplete("widget").css("width","350px");
                    }

                    });
                    tpj("#tag3").autocomplete({
                        source:'scripts/getautocomplete.php',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#tag3").autocomplete("widget").css("width","350px");
                    }

                    });
                    tpj("#tag4").autocomplete({
                        source:'scripts/getautocomplete.php',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#tag4").autocomplete("widget").css("width","350px");
                    }

                    });
                    tpj("#tag5").autocomplete({
                        source:'scripts/getautocomplete.php',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#tag5").autocomplete("widget").css("width","350px");
                    }

                    });

                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
            });
            
                     
        </script>
    </body>
</html>