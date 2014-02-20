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
        <!--<script src="assets/js/jquery-2.0.3.min.js"></script>-->
        <!--<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>-->
        <script src="assets/js/jquery.bxslider.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        
        
        <script src="assets/carouFredSel-6.2.1/jquery.carouFredSel-6.2.1.js"></script>
        <!--<script src="assets/prettyPhoto/js/jquery.prettyPhoto.js"></script>-->
        
        <script src="assets/UItoTop/js/easing.js"></script>
        <script src="assets/UItoTop/js/jquery.ui.totop.min.js"></script>
        <script src="assets/isotope-site/jquery.isotope.min.js"></script>
        <script src="assets/FitVids.js/jquery.fitvids.js"></script>
        
        
        <!--<script src="assets/js/custom.js"></script>-->
        
        <script type="text/javascript">
            var tpj = jQuery;
            tpj.noConflict();
            
            
            tpj(document).ready(function () {
            
            /* SLider */    	
           if(tpj('.slider').length != 0)
	        {
		     tpj('.slider').show().bxSlider({
			      pager: true,
			      auto: true,
			      autoHover: true,
			      speed:500,
			      infiniteLoop: true,
			      easing: null,
			      //easing: 'ease-in-out',
			      controls: false
		                            });
        	}
            	
            	
                
                // PrettyPhoto
                /*tpj("a[rel^='prettyPhoto']").prettyPhoto({
                    theme: 'light_square',
                    social_tools: false
                });*/
               
               
                // FitVids
                //tpj(".responsive-video-wrapper").fitVids();
                
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
            });
            
            // jQuery CarouFredSel
            
            var caroufredsel = function () {
                tpj('#caroufredsel-portfolio-container').carouFredSel({
                    responsive: true,
                    scroll: 1,
                    circular: false,
                    infinite: false,
                    items: {
                        visible: {
                            min: 1,
                            max: 3
                        }
                    },
                    prev: '#portfolio-prev',
                    next: '#portfolio-next',
                    auto: {
                        play: false
                    }
                });
                tpj('#caroufredsel-clients-container').carouFredSel({
                    responsive: true,
                    scroll: 1,
                    circular: false,
                    infinite: false,
                    items: {
                        visible: {
                            min: 1,
                            max: 4
                        }
                    },
                    prev: '#client-prev',
                    next: '#client-next',
                    auto: {
                        play: false
                    }
                });
            };
            tpj(window).load(function () {
                caroufredsel();
            });
            tpj(window).resize(function () {
                caroufredsel();
            });         
        </script>
    </body>
</html>