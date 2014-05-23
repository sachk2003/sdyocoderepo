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
                                      
                
                
                tpj("#alertitem1").autocomplete({
                        source:'../bylist/autocomplete',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#alertitem1").autocomplete("widget").css("width","266px");
                    }

                    });
                    
                    
                    
                    tpj("#alertitem2").autocomplete({
                        source:'../bylist/autocomplete',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#alertitem2").autocomplete("widget").css("width","266px");
                    }

                    });
                    tpj("#alertitem3").autocomplete({
                        source:'../bylist/autocomplete',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#alertitem3").autocomplete("widget").css("width","266px");
                    }

                    });
                    
                    
                    tpj("#alertitem4").autocomplete({
                        source:'../bylist/autocomplete',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#alertitem4").autocomplete("widget").css("width","266px");
                    }

                    });
                    tpj("#alertitem5").autocomplete({
                        source:'../bylist/autocomplete',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#alertitem5").autocomplete("widget").css("width","266px");
                    }

                    });

                  tpj("#zip").autocomplete({
                        source:'../bylist/getzip',
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
            