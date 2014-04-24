var tpj = jQuery;
tpj.noConflict();
tpj('document').ready(function(){
	   
        var upccount= tpj('input#upccount').val();
        var upccode='';var j=0;
	      //alert(upccount);
	      var numrows=0;
          if(upccount!=0) 
	      {   
	      	 var numrows=tpj('input#maxcount').val();
	      	 //console.log(numrows);
             switch(numrows){
	      		case '1': console.log("entered 1");tpj('.container-products .row .col-md-2 .caption .vendor').css("height","50px");break;
	      		case '2': console.log("entered 2");tpj('.container-products .row .col-md-2 .caption .vendor').css("height","70px");break;
	      		case '3': tpj('.container-products .row .col-md-2 .caption .vendor').css("height","90px");break;
	      		case '4': tpj('.container-products .row .col-md-2 .caption .vendor').css("height","110px");break;
	      		default: console.log("entered default");break;
	      		
	      	}	      	
	      	}/*if Upccount!=0*/
	      	
	      	 	
	      	
	      	function getproductinformation(upccode)
				{
					var message='';
					//console.log("entered product info");
					
					tpj.ajax({
			          	
			                type: "GET",
			                url: 'getproductinfo?upc='+upccode,
			                contentType: "application/json; charset=utf-8",
			                dataType: 'json',
			                async:false,
			                success: function(data){
			                	//console.log("Entered success");                         	
			                      //fn(data);                   	 
			                	 
			                	    tpj.each(data, function(index, element) {
			                	    	if(element.message=='0') 
			                             {  		                             	
			                             	
			                                //console.log("entered message 0");	
			                                //console.log(element.pnm);console.log(element.upc);
			                                if(element.pnm!=null)
			                                message+='<li>Product Name: '+element.pnm+'</li>';
			                                
			                                if(element.upc!=null)
			                                 message+='<li>Product Code: '+element.upc+'</li>';
			                                 
			                                if(element.mg!=null)
			                                {
			                                	message+='<li>Weight : '+element.mg+' grams</li>';
			                                }
			                                if(element.moz!=null)
			                                {
			                                	message+='<li>Volume : '+element.moz+' oz</li>';
			                                }
			                                if(element.mml!=null)
			                                {
			                                	message+='<li>Volume : '+element.mml+' ml</li>';
			                                }
			                                if(element.mfloz!=null)
			                                {
			                                	message+='<li>Volume : '+element.mfloz+' fluid oz</li>';
			                                }
			                                if(element.bsin!=null)
			                             	message+='<li>Brand Code: '+element.bsin+'</li>';
			                             	
			                             	if(element.brandnm!=null)
			                             	message+='<li>Brand Name: '+element.brandnm+'</li>';
			                             	
			                             	if(element.brandtypename!=null)
			                             	message+='<li>Brand Type: '+element.brandtypename+'</li>';
			                             	//console.log(message);
			                             	
			                             }  
			                                           
			                	                         
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

	      	
	      	tpj('img[rel=popover]').popover({
			  html: true,
			  trigger: 'hover',
			  placement: function (context, source) {
			        var position = tpj(source).position();
			        var width = window.innerWidth;
			        var positionleft = tpj(source).offset().left;
			        //alert(width - positionleft);
			        if((width - positionleft)<250)
			          return "left";         
			        else
			          return "right";
			        
			    },
			  content: function()
			            {   //console.log("entered the popoer content block");
			            	var upcid =tpj(this).attr("name"); 
			            	var openingmessage='<div id="productinfo"><h5>Product Details</h5><p><ul>';
			                var returnmessage=getproductinformation(upcid);
			                //console.log(returnmessage);
			                //console.log('Return message:'+returnmessage);
			                
			                var closemessage='</ul></p></div>';
			                message='';
			                //message+=openingmessage;
			                message+=returnmessage;
			                message+=closemessage;
			                return message;	
			            	
			            
			    }
			    
			    });

        

});
