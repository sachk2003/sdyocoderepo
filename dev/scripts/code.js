tpj('document').ready(function(){
	
        var upccount= tpj('input#upccount').val();
        var upccode='';var j=0;
	      //alert(upccount);
          if(upccount!=0) 
	      {
	      	for(var l=0;l<upccount;l++)
	      	{   j=l+1;
	      		upccode = tpj('input#upc'+j).val();
	      		runajax(upccode);
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
                                       if(element.name!=null) tpj('#'+upccode+' #pname').append(element.name); else tpj('#'+upccode+' #pname').append('Name Not Found');
                                       if(element.weight!=null) tpj('#'+upccode+' #weight').append(element.weight); else tpj('#'+upccode+' #weight').append('Weight Not Found');
                                       if(element.volume!=null) tpj('#'+upccode+' #volume').append(element.volume); else tpj('#'+upccode+' #volume').append('Volume Not Found');
                                       if(element.code!=null) tpj('#'+upccode+' #pcode').append(element.code); else tpj('#'+upccode+' #pcode').append('Code Not Found');
                                                   break;
                               case 2: 
                                       if(element.code!=null) tpj('#'+upccode+' #bcode').append(element.code); else tpj('#'+upccode+' #bcode').append('Brand Code Not Found');
                                       if(element.name!=null) tpj('#'+upccode+' #bname').append(element.name); else tpj('#'+upccode+' #bname').append('Brand Name Not Found');
                                       if(element.type!=null) tpj('#'+upccode+' #btype').append(element.type); else tpj('#'+upccode+' #btype').append('Brand Type Not Found');
                                       if(element.link!=null) {var alink= '<a href='+element.link+' style="color:blue;" >'+element.link+'</a>';tpj('#'+upccode+' #bwebsite').append(alink);} 
                                                            else {tpj('#'+upccode+' #bwebsite').append('No Website Link Found');}
                                       if(element.img!=null){var ilink= '<a href='+element.img+' ><img src='+element.img+' alt="Brand Image"></a>';
                                            tpj('#'+upccode+' #bimage').append(ilink);} else {  var ilink= '<a href='+scripts/notavailable.jpg+'><img src='+scripts/notavailable.jpg+' alt="Brand Image"></a>'; 
                                            tpj('#'+upccode+' #bimage').append(ilink);}

                                       break;
                                case 3: //row = '<tr><td>'+element.code+'</td><td>'+element.name+'</td></tr>';i
                                        break;
                                case 4: //row = '<tr><td>'+element.code+'</td></tr>';
                                        break;
                                case 5: 
                                      if(element.segment.code !=null)  tpj('#'+upccode+' #pcat').append(element.segment.name); else  tpj('#'+upccode+' #pcat').append('Segment Code not found');
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
              
               alert(error);
                                     	 
               
               
               }
          });
        
       }/*Close of runajax */
	/*
	if(upccount!=0) 
	      {
	      	for(var l=0;l<upccount;l++)
	      	{   j=l+1;
	      		upccode = tpj('input#upc'+j).val();
	      		
	      		tpj('#'+upccode+' #productimage').hover(
	      			function(){
	      				
	      			
	      			
	      			
	      		});
	      		
	      		
	      	}
	      }
	*/
	
	tpj('img[rel=popover]').popover({
  html: true,
  trigger: 'hover',
  placement: 'right',
  content: function()
            {
            	var upcid =tpj(this).attr("name"); 
                var message=getvendorinformation(upcid); 
                //console.log(message);       	
            	
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
                	
                	var name= data[0]["name"];
                	var price= data[0]["price"];
                	var startdate = data[0]["startdate"];
                	var enddate = data[0]["enddate"];
                	
                	//var vendorinfo="<div class="popover popover-medium">";
                	var vendorinfo="<table table-bordered><tr><td>Vendor Name: </td><td>"+name+"</td></tr>";
                	vendorinfo+="<tr><td>Price: </td><td>"+price+"</td></tr>";
                	vendorinfo+="<tr><td>Start Date: </td><td>"+startdate+"</td></tr>";
                	vendorinfo+="<tr><td>End Date: </td><td>"+enddate+"</td></tr></table>";
                	
                	//console.log(vendorinfo);
                	message = vendorinfo;
                	//console.log(message);               	
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
