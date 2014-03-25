
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
            		<div class="col-md-2"></div>
            		<div class="col-md-8">
            			<h2 style="color:#FF0000;">Create YOUR shopping list</h2>
            		</div>
            		<div class="col-md-2"></div>
               	</div>
             <?php 
             
             $items=array("Peanut Butter","Quick Oats","Honey","Strawberry Preserves","Peanut Butter Creamy");
             
             
             ?>            
            
              <div class="row" style="margin-top:10px">
               <div class="col-md-1"></div>
               <div class="col-md-10">
            			
  <form class="form-horizontal " role="form" method="post" action="discountbylist.php" id="searchform">
  	<?php for($i=0;$i<5;$i++){?>
  <div class="form-group">
  	
    <label for="Item 1" class="col-md-6 control-label">Item <?php echo $i+1;?> (example: <?php echo $items[$i];?>)</label>
    
    <div class="col-md-6">
      <input type="text" name="item<?php echo $i+1;?>" class="form-control fontsforweb_fontid_4368" id="tag<?php echo $i+1;?>" placeholder="Item <?php echo $i+1;?>">
    </div>
  </div>
  
    <?php }?>
    
   <div class="form-group">
   	<label for="zip" class="col-md-6 control-label">Enter zip code and select city from dropdown</label>
   	<div class="col-md-6">
   		<input type="text" name="zip" id="zip"   class="form-control fontsforweb_fontid_4368" placeholder="Zip Code">
   		
   	</div>
   	  	
   </div>
   
   
   	<div class="col-md-4 col-md-offset-2">
   	  <button  class="control"><span>SUBMIT</span></button>
   	</div>
   
     
</form>
                        			
            			
           </div>
              
            
            
            
              </div>            	
            </div>
            
            	
                
            
            
            
            <footer id="footer-1" class="footer">
                <div class="container">
                    <div class="row">
                    	<div class="col-md-2"><a href="#" >Vendor Login</a></div>
                        <div class="col-md-2"><a href="about.php" >About Us</a></div>
                        <div class="col-md-2 "><a href="privacy.php">Privacy</a></div>
                        <div class="col-md-2 "><a href="help.php">Help</a></div>
                        <div class="col-md-2 "><a href="jobs.php">Jobs</a></div>
                        <div class="col-md-2 "><a href="contact.php">Contact</a></div>
                                              
                        
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
        <script src="assets/js/jquery.validate.js"></script>  
        
        
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
                function split( val ) {
                     return val.split(' ');
                }
			    function extractLast( term ) {
			      return split( term ).pop();
			    }
                
                
                
                tpj("#tag1").autocomplete({
                        source:'scripts/getautocomplete1.php',
                        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          
          if ( term.length < 2 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( " " );
          return false;
        },
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#tag1").autocomplete("widget").css("width","266px");
                    }

                    });
                    
                    
                    
                    tpj("#tag2").autocomplete({
                        source:'scripts/getautocomplete1.php',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#tag2").autocomplete("widget").css("width","266px");
                    }

                    });
                    tpj("#tag3").autocomplete({
                        source:'scripts/getautocomplete.php',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#tag3").autocomplete("widget").css("width","266px");
                    }

                    });
                    tpj("#tag4").autocomplete({
                        source:'scripts/getautocomplete.php',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#tag4").autocomplete("widget").css("width","266px");
                    }

                    });
                    tpj("#tag5").autocomplete({
                        source:'scripts/getautocomplete.php',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#tag5").autocomplete("widget").css("width","266px");
                    }

                    });

                tpj("#zip").autocomplete({
                        source:'scripts/getzip1.php',
                        minLength:5,
                    open:function(event, ui)
                    {
                      tpj("#zip").autocomplete("widget").css("width","266px");
                    }

                    });

                
       tpj("#searchform").validate({ 
                
                  // Specify the validation rules
        rules: {
            item1: {required:true,minlength:1},
            zip: "required",
            
        },
                
             // Specify the validation error messages
        messages: {
            item1: "Please enter at least one Item",
            
            zip: "Please enter a valid zipcode",
            
        },
        
        submitHandler: function(form) {
            form.submit();
        }   
                
                
                
                
               });
                
                
                
            });
            
                     
        </script>
    </body>
</html>