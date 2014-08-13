$('document').ready(function(){
        var upccode= $('input#upc').val();
	    
          if(upccode!='') 
	      {
        $.ajax({
                type: "POST",
                url: 'json/'+upccode,
                contentType: "application/json; charset=utf-8",
                dataType: 'json',
                success: function(data){
                	  
                                        	
                	  var i=1;
                	 
                	 
                	    $.each(data, function(index, element) {
                	    	  
                                switch(i){
                                case 1:                                     
                                       if(element.img!=null){ $('#productimage').attr('src',element.img);} else $('#productimage').attr('src','notavailable.jpg');
                                       if(element.name!=null) $('#pname').append(element.name); else $('#pname').append('Name Not Found');
                                       if(element.weight!=null) $('#weight').append(element.weight); else $('#weight').append('Weight Not Found');
                                       if(element.volume!=null) $('#volume').append(element.volume); else $('#volume').append('Volume Not Found');
                                       if(element.code!=null) $('#pcode').append(element.code); else $('#pcode').append('Code Not Found');
                                                   break;
                               case 2: 
                                       if(element.code!=null) $('#bcode').append(element.code); else $('#bcode').append('Brand Code Not Found');
                                       if(element.name!=null) $('#bname').append(element.name); else $('#bname').append('Brand Name Not Found');
                                       if(element.type!=null) $('#btype').append(element.type); else $('#btype').append('Brand Type Not Found');
                                       if(element.link!=null) {var alink= '<a href='+element.link+' style="color:blue;" >'+element.link+'</a>';$('#bwebsite').append(alink);} 
                                                            else {$('#bwebsite').append('No Website Link Found');}
                                       if(element.img!=null){var ilink= '<a href='+element.img+' ><img src='+element.img+' alt="Brand Image"></a>';
                                            $('#bimage').append(ilink);} else {  var ilink= '<a href='+scripts/notavailable.jpg+'><img src='+scripts/notavailable.jpg+' alt="Brand Image"></a>';$('#bimage').append(ilink);}

                                       break;
                                case 3: //row = '<tr><td>'+element.code+'</td><td>'+element.name+'</td></tr>';i
                                        break;
                                case 4: //row = '<tr><td>'+element.code+'</td></tr>';
                                        break;
                                case 5: 
                                      if(element.segment.code !=null)  $('#pcat').append(element.segment.name); else  $('#pcat').append('Segment Code not found');
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
 
       }
	//});
	});
