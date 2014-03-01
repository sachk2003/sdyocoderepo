tpj('document').ready(function(){
	
        var upccount= tpj('input#upccount').val();
        var upccode='';var j=0;
	      //alert(upccount);
	      var numrows=0;
          if(upccount!=0) 
	      {
	      	for(var l=0;l<upccount;l++)
	      	{   j=l+1;
	      		upccode = tpj('input#upc'+j).val();
	      		runajax(upccode);
	      		var message=getvendorinformation(upccode);
	      		//alert(message);
  	      		var rows=message.match(/<tr>/g).length;
	      		if(rows>numrows)
	      		 {
	      		 	numrows=rows;
	      		 }
	      		
	      		var tag='#'+upccode;
	      		tpj(''+tag+' .vendor').append(message);
	      		
	      	}
	      	
	      	switch(numrows){
	      		
	      		case 2: break;
	      		case 3: tpj('.container-products .row .col-md-2 .caption .vendor').css("height","50px");break;
	      		case 4: tpj('.container-products .row .col-md-2 .caption .vendor').css("height","70px");break;
	      		default: break;
	      		
	      	}
	      	
	      	
	      	
	      	
	      }
	      
	      function runajax(upccode){
	      			
          tpj.ajax({
          	
                type: "POST",
                url: '/sd/scripts/json/'+upccode,
                contentType: "application/json; charset=utf-8",
                dataType: 'json',
                success: function(data){
                	
                                        	
                	  var i=1;
                                      	 
                	 
                	    tpj.each(data, function(index, element) {
                	    	  
                                switch(i){
                                case 1:                                     
                                      //alert('#'+upccode+' #productimage');
                                       if(element.img!=null){ tpj('#'+upccode+' #productimage').attr('src',element.img);} else tpj('#'+upccode+' #productimage').attr('src','notavailable.jpg');
                                       /*if(element.name!=null) tpj('#'+upccode+' #pname').append(element.name); else tpj('#'+upccode+' #pname').append('Name Not Found');
                                       if(element.weight!=null) tpj('#'+upccode+' #weight').append(element.weight); else tpj('#'+upccode+' #weight').append('Weight Not Found');
                                       if(element.volume!=null) tpj('#'+upccode+' #volume').append(element.volume); else tpj('#'+upccode+' #volume').append('Volume Not Found');
                                       if(element.code!=null) tpj('#'+upccode+' #pcode').append(element.code); else tpj('#'+upccode+' #pcode').append('Code Not Found');
                                       */ break;
                               case 2: 
                                       /*if(element.code!=null) tpj('#'+upccode+' #bcode').append(element.code); else tpj('#'+upccode+' #bcode').append('Brand Code Not Found');
                                       if(element.name!=null) tpj('#'+upccode+' #bname').append(element.name); else tpj('#'+upccode+' #bname').append('Brand Name Not Found');
                                       if(element.type!=null) tpj('#'+upccode+' #btype').append(element.type); else tpj('#'+upccode+' #btype').append('Brand Type Not Found');
                                       if(element.link!=null) {var alink= '<a href='+element.link+' style="color:blue;" >'+element.link+'</a>';tpj('#'+upccode+' #bwebsite').append(alink);} 
                                                            else {tpj('#'+upccode+' #bwebsite').append('No Website Link Found');}
                                       if(element.img!=null){var ilink= '<a href='+element.img+' ><img src='+element.img+' alt="Brand Image"></a>';
                                            tpj('#'+upccode+' #bimage').append(ilink);} else {  var ilink= '<a href='+scripts/notavailable.jpg+'><img src='+scripts/notavailable.jpg+' alt="Brand Image"></a>'; 
                                            tpj('#'+upccode+' #bimage').append(ilink);}

                                       */break;
                                case 3: //row = '<tr><td>'+element.code+'</td><td>'+element.name+'</td></tr>';i
                                        break;
                                case 4: //row = '<tr><td>'+element.code+'</td></tr>';
                                        break;
                                case 5: 
                                      /*if(element.segment.code !=null)  tpj('#'+upccode+' #pcat').append(element.segment.name); else  tpj('#'+upccode+' #pcat').append('Segment Code not found');
                                        */break;
                                case 6: //row = '<tr><td>'+element["return-code"].code+'</td><td>'+elemet["return-code"].name+'</td><td>'+element.source+'</td><td>'+element.gln.code+'</td><td>'+element.gln.name+'</td><td>'+element.gln["address-1"]+'</td><td>'+element.gln["address-2"]+'</td><td>'+element.gln["address-3"]+'</td></tr>';
break;
                                default: break;

                               }
                  
                	    	     	    
                                i++;
			
                            
        });
                 
                 
                        
                },
				
               error: function(xhr, status, error) {
               var msg=xhr.responseText;
               
               
               var status=xhr.status;
               var error="ReadyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\nresponseText: "+xhr.responseText.EvalError;
              
               alert(error);
                                     	 
               
               
               }
          });
          
                
          
          
          
        
       }/*Close of runajax */
      
      
	
	 function getproductinformation(upccode)
	{
		var message='';
		
		
		tpj.ajax({
          	
                type: "GET",
                url: '/sd/scripts/json/'+upccode,
                contentType: "application/json; charset=utf-8",
                dataType: 'json',
                async:false,
                success: function(data){
                	
                                        	
                	  var i=1;
                                      	 
                	 
                	    tpj.each(data, function(index, element) {
                	    	  
                               switch(i){
                                case 1:                                     
                                      //alert('#'+upccode+' #productimage');
                                       //if(element.img!=null){ tpj('#'+upccode+' #productimage').attr('src',element.img);} else tpj('#'+upccode+' #productimage').attr('src','notavailable.jpg');
                                       if(element.name!=null) {var pname="<li>Product Name: "+element.name+"</li>"; message+=pname;} else{ pname="<li>Product Name: Not Found</li>"; message+=pname;}
                                       if(element.weight!=null) {var pweight="<li>Product Weight: "+element.weight+"</li>";message+=pweight;} else{  pweight="<li>Product Weight: Not Found</li>";message+=pweight;}
                                       if(element.volume!=null) {var pvolume="<li>Product Volume: "+element.volume+"</li>";message+=pvolume; }else{  pvolume="<li>Product Volume: Not Found</li>";message+=pvolume;}
                                       if(element.code!=null) {var pcode="<li>Product Code: "+element.code+"</li>";message+=pcode;} else{ pcode="<li>Product Code: Not Found</li>";message+=pcode; }
                                        break;
                               case 2: 
                                       if(element.code!=null) {var bcode="<li>Brand Code: "+element.code+"</li>";message+=bcode;} else {bcode="<li>Brand Code: Not Found</li>";message+=bcode;}
                                       if(element.name!=null) {var bname="<li>Brand Name: "+element.name+"</li>";message+=bname;} else{ bname="<li>Brand Name: Not Found</li>";message+=bname;}
                                       if(element.type!=null) {var btype="<li>Brand Type: "+element.type+"</li>";message+=btype;} else{ btype="<li>Brand Type: Not Found</li>";message+=btype;}
                                       if(element.link!=null) {var alink= '<li><Website Link:<a href='+element.link+' style="color:blue;" >'+element.link+'</a></li>';message+=alink;} 
                                                            else { var alink="No Website Link Found";message+=alink;}
                                       /*if(element.img!=null){var ilink= '<a href='+element.img+' ><img src='+element.img+' alt="Brand Image"></a>';
                                            tpj('#'+upccode+' #bimage').append(ilink);} else {  var ilink= '<a href='+scripts/notavailable.jpg+'><img src='+scripts/notavailable.jpg+' alt="Brand Image"></a>'; 
                                            tpj('#'+upccode+' #bimage').append(ilink);}

                                       */break;
                                case 3: //row = '<tr><td>'+element.code+'</td><td>'+element.name+'</td></tr>';i
                                        break;
                                case 4: //row = '<tr><td>'+element.code+'</td></tr>';
                                        break;
                                case 5: 
                                      if(element.segment.code !=null){var scode="<li>Segment : "+element.segment.name+"</li>";message+=scode;}  else{scode="<li>Category : Not Found</li>";message+=scode;}
                                        break;
                                case 6: //row = '<tr><td>'+element["return-code"].code+'</td><td>'+elemet["return-code"].name+'</td><td>'+element.source+'</td><td>'+element.gln.code+'</td><td>'+element.gln.name+'</td><td>'+element.gln["address-1"]+'</td><td>'+element.gln["address-2"]+'</td><td>'+element.gln["address-3"]+'</td></tr>';
break;
                                default: break;

                               }
                  
                	    	     	    
                                i++;
			
                                  
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
            {  
            	var upcid =tpj(this).attr("name"); 
            	var openingmessage='<div id="productinfo"><h5>Product Details</h5><p><ul>';
                var returnmessage=getproductinformation(upcid);
                
                var closemessage='</ul></p></div>';
                message='';
                message+=returnmessage;
                message+=closemessage;
                
            	return message;
            	
            }
    });
	
    
        
    	
	function getvendorinformation(upcid)
	{
		var message='';
		
		tpj.ajax({
          	    
                type: "POST",
                url: '/sd/scripts/getvendorinfo.php?upcid='+upcid,
                contentType: "application/json; charset=utf-8",
                dataType: 'json',
                async:false,
                success: function(data){
                    var vendorinfo="<table table-bordered><tr><td>Vendor Name</td><td>Price</td><td>Start Date</td><td>End Date</td></tr>";
                    for(var k in data)
                    {
                      vendorinfo+="<tr><td>"+data[k]["name"]+"</td>";
                      vendorinfo+="<td>"+data[k]["price"]+"</td>";	
                      vendorinfo+="<td>"+data[k]["startdate"]+"</td>";	
                      vendorinfo+="<td>"+data[k]["enddate"]+"</td></tr>";	
                    	
                    }
                    
                    vendorinfo+="</table>";
                	
                	message = vendorinfo;
                	               	
                },
                error: function(xhr, status, error) {
               var msg=xhr.responseText;
               
               
               var status=xhr.status;
               var error="ReadyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\nresponseText: "+xhr.responseText.EvalError;
               message = "nothing found";
               //alert(error);
                                     	 
               
               
               }
                
                
                });
                //console.log(message);	   	
     return message;
		
	}
	
	
	
	});
