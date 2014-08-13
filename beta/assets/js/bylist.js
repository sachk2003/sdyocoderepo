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
                                      
                
                
                tpj("#tag1").autocomplete({
                        source:'autocomplete',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#tag1").autocomplete("widget").css("width","350px");
                    },
                    focus:function(event,ui)
                    {
                    	event.preventDefault(); // without this: keyboard movements reset the input to ''
                        
                        var upc;
                        var imgpath='';
                        if(ui.item.value!='')
                        {
                        	var fullname=ui.item.value;
                        	var split=fullname.split('upc:');
                        	upc=split[1];
                        	var gtinfolder=upc.substring(0, 3);
                            imgpath='/images/gtin/gtin-'+gtinfolder+'/'+upc+'.jpg';
                        }
                        tpj.ajax(
                        	{
                                    url:imgpath,
                        	    type:'HEAD',
                        	    error:function(xhr,textstatus,error){
                                          imgpath="/assets/img/notavailable.gif";
                                            var message="<p>Product Image</p><div class='thumbnail'><img src='"+imgpath+"' alt='Product Image' width='100px' height='100px'/>";
                           message+="<div class='caption'></div></div>";
                        tpj("#previewimage").html(message);

                                           }
                        	 });
                                                   
                        var message="<p style='margin-top:10%;'>Product Image</p><div class='thumbnail'><img src='"+imgpath+"' alt='Product Image' width='100px' height='100px'/>";   
                           message+="<div class='caption'></div></div>";
                          tpj("#previewimage").attr('style','border-style:1px black solid;margin-left:55%;');
                    	tpj("#previewimage").html(message);
                    }
                    });
                    
                    
                    
                    tpj("#tag2").autocomplete({
                        source:'autocomplete',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#tag2").autocomplete("widget").css("width","350px");
                    },
                    focus:function(event,ui)
                    {
                        event.preventDefault(); // without this: keyboard movements reset the input to ''

                        var upc;
                        var imgpath='';
                        if(ui.item.value!='')
                        {
                                var fullname=ui.item.value;
                                var split=fullname.split('upc:');
                                upc=split[1];
                                var gtinfolder=upc.substring(0, 3);
                            imgpath='/images/gtin/gtin-'+gtinfolder+'/'+upc+'.jpg';
                        }
                        tpj.ajax(
                                {
                                    url:imgpath,
                                    type:'HEAD',
                                    error:function(xhr,textstatus,error){
                                          imgpath="/assets/img/notavailable.gif";
                                            var message="<p style='margin-top:5%;'>Product Image</p><div class='thumbnail'><img src='"+imgpath+"' alt='Product Image' width='100px' height='100px' />";
                           message+="<div class='caption'></div></div>";
                        tpj("#previewimage").html(message);

                                           }
                                 });

                        var message="<p>Product Image</p><div class='thumbnail'><img src='"+imgpath+"' alt='Product Image' width='100px' height='100px'/>";
                           message+="<div class='caption'></div></div>";
                            tpj("#previewimage").attr('style','border-style:1px black solid;margin-left:55%;margin-top:40%;');
                        tpj("#previewimage").html(message);
                    }
 
                        


                    });
                    tpj("#tag3").autocomplete({
                        source:'autocomplete',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#tag3").autocomplete("widget").css("width","350px");
                    },
                    focus:function(event,ui)
                    {
                        event.preventDefault(); // without this: keyboard movements reset the input to ''

                        var upc;
                        var imgpath='';
                        if(ui.item.value!='')
                        {
                                var fullname=ui.item.value;
                                var split=fullname.split('upc:');
                                upc=split[1];
                                var gtinfolder=upc.substring(0, 3);
                            imgpath='/images/gtin/gtin-'+gtinfolder+'/'+upc+'.jpg';
                        }
                        tpj.ajax(
                                {
                                    url:imgpath,
                                    type:'HEAD',
                                    error:function(xhr,textstatus,error){
                                          imgpath="/assets/img/notavailable.gif";
                                            var message="<p>Product Image</p><div class='thumbnail'><img src='"+imgpath+"' alt='Product Image'  width='100px' height='100px'/>";
                           message+="<div class='caption'></div></div>";
                        tpj("#previewimage").attr('style','border-style:1px black solid;margin-left:55%;margin-top:60%;');
                        tpj("#previewimage").html(message);

                                           }
                                 });

                        var message="<p>Product Image</p><div class='thumbnail'><img src='"+imgpath+"' alt='Product Image'  width='100px' height='100px'/>";
                           message+="<div class='caption'></div></div>";
                        tpj("#previewimage").attr('style','border-style:1px black solid;margin-left:55%;margin-top:60%;');
                        tpj("#previewimage").html(message);
                    }



                    });
                    tpj("#tag4").autocomplete({
                        source:'autocomplete',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#tag4").autocomplete("widget").css("width","350px");
                    },
                    focus:function(event,ui)
                    {
                        event.preventDefault(); // without this: keyboard movements reset the input to ''

                        var upc;
                        var imgpath='';
                        if(ui.item.value!='')
                        {
                                var fullname=ui.item.value;
                                var split=fullname.split('upc:');
                                upc=split[1];
                                var gtinfolder=upc.substring(0, 3);
                            imgpath='/images/gtin/gtin-'+gtinfolder+'/'+upc+'.jpg';
                        }
                        tpj.ajax(
                                {
                                    url:imgpath,
                                    type:'HEAD',
                                    error:function(xhr,textstatus,error){
                                          imgpath="/assets/img/notavailable.gif";
                                            var message="<p>Product Image</p><div class='thumbnail'><img src='"+imgpath+"' alt='Product Image'  width='100px' height='100px'/>";
                           message+="<div class='caption'></div></div>";
                        tpj("#previewimage").attr('style','border-style:1px black solid;margin-left:55%;margin-top:80%;');
                        tpj("#previewimage").html(message);

                                           }
                                 });

                        var message="<p>Product Image</p><div class='thumbnail'><img src='"+imgpath+"' alt='Product Image'  width='100px' height='100px'/>";
                           message+="<div class='caption'></div></div>";
                     tpj("#previewimage").attr('style','border-style:1px black solid;margin-left:55%;margin-top:80%;');
                        tpj("#previewimage").html(message);
                    }


                    });
                    tpj("#tag5").autocomplete({
                        source:'autocomplete',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#tag5").autocomplete("widget").css("width","350px");
                    },
                   focus:function(event,ui)
                    {
                        event.preventDefault(); // without this: keyboard movements reset the input to ''

                        var upc;
                        var imgpath='';
                        if(ui.item.value!='')
                        {
                                var fullname=ui.item.value;
                                var split=fullname.split('upc:');
                                upc=split[1];
                                var gtinfolder=upc.substring(0, 3);
                            imgpath='/images/gtin/gtin-'+gtinfolder+'/'+upc+'.jpg';
                        }
                        tpj.ajax(
                                {
                                    url:imgpath,
                                    type:'HEAD',
                                    error:function(xhr,textstatus,error){
                                          imgpath="/assets/img/notavailable.gif";
                                            var message="<p>Product Image</p><div class='thumbnail'><img src='"+imgpath+"' alt='Product Image'  width='100px' height='100px'/>";
                           message+="<div class='caption'></div></div>";
                       tpj("#previewimage").attr('style','border-style:1px black solid;margin-left:55%;margin-top:100%;');
                        tpj("#previewimage").html(message);

                                           }
                                 });

                        var message="<p>Product Image</p><div class='thumbnail'><img src='"+imgpath+"' alt='Product Image' width='100px' height='100px'/>";
                           message+="<div class='caption'></div></div>";
                     tpj("#previewimage").attr('style','border-style:1px black solid;margin-left:55%;margin-top:100%;');
                        tpj("#previewimage").html(message);
                    }


                    });

                tpj("#zip").autocomplete({
                        source:'getzip',
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
            
