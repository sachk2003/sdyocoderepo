<footer id="footer-1" class="footer">
                <div class="container">
                    <div class="row">
                    	<div class="col-md-2"><a href="index.php" >Vendor Login</a></div>
                        <div class="col-md-2"><a href="../about.php" >About Us</a></div>
                        <div class="col-md-2 "><a href="../privacy.php">Privacy</a></div>
                        <div class="col-md-2 "><a href="../help.php">Help</a></div>
                        <div class="col-md-2 "><a href="../jobs.php">Jobs</a></div>
                        <div class="col-md-2 "><a href="../contact.php">Contact</a></div>
                                              
                        
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
        <!--<script src="assets/js/jquery-2.0.3.min.js"></script>-->
        <!--<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>-->
        <script src="../assets/js/jquery.bxslider.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery.validate.js"></script> 
        
        <script src="../assets/carouFredSel-6.2.1/jquery.carouFredSel-6.2.1.js"></script>
        <!--<script src="assets/prettyPhoto/js/jquery.prettyPhoto.js"></script>-->
        
        <script src="../assets/UItoTop/js/easing.js"></script>
        <script src="../assets/UItoTop/js/jquery.ui.totop.min.js"></script>
        <script src="../assets/isotope-site/jquery.isotope.min.js"></script>
        <script src="../assets/FitVids.js/jquery.fitvids.js"></script>
        
        
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
            
            tpj('#sidebar').affix({
      offset: {
        top: 245
             }
            });
            
            
            
       tpj("#loginform").validate({ 
                
                  // Specify the validation rules
        rules: {
        	
           email: {required:true,email:true},
           password: "required",
            
        },
                
             // Specify the validation error messages
        messages: {
            email: "Enter a valid email",
            
            password:"Please enter a valid password",
            
        },
        
        submitHandler: function(form) {
            form.submit();
        }   
                
                
                
                
               });
       /* Vendor Create Form*/     
            
         tpj("#signupform").validate({ 
                
                  // Specify the validation rules
        rules: {
        	
           fname: {required:true},
           lname: "required",
           country: "required",
           zip:"required",
           address:"required",
           city:"required",
           state:"required",
           phone:"required",
           email2:"required",
           category:"required"
            
        },
                
             // Specify the validation error messages
        messages: {
            fname: "First Name is Required",
           lname: "Last Name is required",
           country: "Country is required",
           zip:"zip is required",
           address:"Address is required",
           city:"City is required",
           state:"state is required",
           phone:"Phone is required",
           email2:"Email is required",
           category:"Category is required"
            
        },
        
        submitHandler: function(form) {
            form.submit();
        }   
                        
                
                
               });
               
            
        tpj("#vendorchangepwd").validate({ 
                
                  // Specify the validation rules
        rules: {
        	
           email2: {required:true,email:true},
           password2: "required",
           newpassword: "required"
            
        },
                
             // Specify the validation error messages
        messages: {
            email2: "Enter a valid email",
            newpassword:"Enter valid new password",
            password2:"Please enter a correct password"
            
        },
        
        submitHandler: function(form) {
            form.submit();
        }   
                
                
                
                
               });
            
            tpj("#discountadd").validate({ 
                
                  // Specify the validation rules
        rules: {
        	
           discount: {required:true,email:true},
           unit: "required",
           startdate: "required",
           enddate:"required"
            
        },
                
             // Specify the validation error messages
        messages: {
             discount:"Enter a discount",
             unit:"Enter Unit",
             startdate:"Enter Startdate",
             enddate:"Enter enddate"
            
        },
        
        submitHandler: function(form) {
            form.submit();
        }   
                
                
                
                
               });
            
      tpj('#discountdelete').validate({ // initialize the plugin
        rules: {
            'check_list[]': {
                required: true,
                //maxlength: 5
            }
        },
        messages: {
            'check_list[]': {
                required: "You must check at least 1 box",
                //maxlength: "Check no more than {0} boxes"
            }
        },
        submitHandler: function (form) { // for demo
            alert('valid form submitted'); // for demo
            return false; // for demo
        }
    });
            
            
      tpj("#vendorforgotpwd").validate({ 
                
                  // Specify the validation rules
        rules: {
        	
           fname: {required:true},
           lname: "required",
           country: "required",
           zip:"required",
           address:"required",
           city:"required",
           state:"required",
           phone:"required",
           email2:{required:true,email:true},
           
            
        },
                
             // Specify the validation error messages
        messages: {
            fname: "First Name is Required",
           lname: "Last Name is required",
           country: "Country is required",
           zip:"zip is required",
           address:"Address is required",
           city:"City is required",
           state:"state is required",
           phone:"Phone is required",
           email2:"Email is required",
           
            
        },
        
        submitHandler: function(form) {
            form.submit();
        }   
                        
                
                
               });   
            
            
            
            });         
        </script>
        
    </body>
</html>