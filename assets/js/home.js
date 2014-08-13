//<script type="text/javascript">
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
			      speed:50000000,
			      infiniteLoop: true,
			      easing: null,
			      //easing: 'ease-in-out',
			      controls: false
		                            });
        	}
            	
            	
                
               
                
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
            
            
  //      </script>
