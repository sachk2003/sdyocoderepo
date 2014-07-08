<footer id="footer-1" class="footer">
                <div class="container">
                    <div class="row">
                    	<div class="col-md-2"><a href="../vendor/index" >Vendor Login</a></div>
                        <div class="col-md-2"><a href="../about" >About Us</a></div>
                        <div class="col-md-2 "><a href="../privacy">Privacy & Terms</a></div>
                        <div class="col-md-2 "><a href="../help">Help</a></div>
                        <div class="col-md-2 "><a href="../jobs">Jobs</a></div>
                        <div class="col-md-2 "><a href="../contact">Contact</a></div>
                                              
                        
                    </div>
                    <!-- /.row -->
                </div>
               
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
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.validate.js');?>"></script>       
        
        <script src="<?php echo base_url('assets/UItoTop/js/easing.js');?>"></script>
        <script src="<?php echo base_url('assets/UItoTop/js/jquery.ui.totop.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/discountbylist.js')?>"></script>
        
        
        
        <!--<script src="assets/js/custom.js"></script>-->
        
        <script type="text/javascript">
            var tpj = jQuery;
            tpj.noConflict();
            
            
            tpj(document).ready(function () {
           
           function getitemdetails(vname)
				{
					var message='';
					//console.log("entered product info");
					
					tpj.ajax({
			          	
			                type: "POST",
			                url: 'getitems?v='+vname,
			                contentType: "application/json; charset=utf-8",
			                dataType: 'json',
			                async:false,
			                success: function(data){
			                			              	 
			                	    tpj.each(data, function(index, element) {
			                	    element.forEach(function(ele)
			                	    {   
			                	    	message+='<li>'+ele.name+' $'+ele.offer+'</li>';
			                	        //console.log(message);                            
			                	    });     
			                	                    
			        });
			                       
			                                      
			                },
							
			               error: function(xhr, status, error) {
			               var msg=xhr.responseText;
			               
			               
			               var status=xhr.status;
			               var error="ReadyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\nresponseText: "+xhr.responseText.EvalError;
			              
			               message = "nothing found";
			               //return message;                       	 
			                   
			               
			               }
			          });
			          //console.log(message);
			          return message;
			          
				}

           
           
                  
           tpj('#cnt[rel=popover]').popover({
			  html: true,
			  trigger: 'hover',
			  placement: function (context, source) {
			        var position = tpj(source).position();
			        var width = window.innerWidth;
			        var positionleft = tpj(source).offset().left;
			        //alert(width - positionleft);
			       if((width - positionleft)<250 && width >500)
			          return "left";         
			        else if(width < 500)
			           return "auto";
			        else if(width < 800)
			           return "auto";    
			        else   
			          return "right";
			        
			    },
			  content: function()
			            {   //console.log("entered the popoer content block");
			            
			               tpj(this).data('bs.tooltip','false').popover(
			               	{
			               	  title: 'Items',
			                }); 	  
			               
			               	var message='';
			            	var vname =tpj(this).attr("name");
			            	if(vname!='')
			            	{
			            		var itemdata=getitemdetails(vname);
			            		var openingmessage='<div><p><ol>';
			            		var closemessage='</ol></p></div>';
			            		message='';
			                    message+=openingmessage;
			                    message+=itemdata;
			                    message+=closemessage;
			            		
			            	}
			            	else{
			            		message='data not found';
			            	} 
			            	
			                //this.empty().append(message);
			                return message;		
			               		
			            }
			               	
			               	
			              
			               
            });   
                
                
                
         });             
        </script>
        
    </body>
</html>
