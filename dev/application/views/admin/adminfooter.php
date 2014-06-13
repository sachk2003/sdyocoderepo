<footer id="footer-1" class="footer">
                
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
        <script src="http://<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
        <script src="http://<?php echo base_url('assets/js/jquery.validate.js');?>"></script>       
        
        <script src="http://<?php echo base_url('assets/UItoTop/js/easing.js');?>"></script>
        <script src="http://<?php echo base_url('assets/UItoTop/js/jquery.ui.totop.min.js');?>"></script>
        <script src="http://<?php echo base_url('assets/js/discountbylist.js')?>"></script>
        
        
        
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
        	
           email: {required:true},
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
           
         });       
        </script>
        
    </body>
</html>