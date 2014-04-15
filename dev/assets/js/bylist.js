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
                      tpj("#tag1").autocomplete("widget").css("width","266px");
                    }

                    });
                    
                    
                    
                    tpj("#tag2").autocomplete({
                        source:'autocomplete',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#tag2").autocomplete("widget").css("width","266px");
                    }

                    });
                    tpj("#tag3").autocomplete({
                        source:'autocomplete',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#tag3").autocomplete("widget").css("width","266px");
                    }

                    });
                    tpj("#tag4").autocomplete({
                        source:'autocomplete',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#tag4").autocomplete("widget").css("width","266px");
                    }

                    });
                    tpj("#tag5").autocomplete({
                        source:'autocomplete',
                        minLength:1,
                    open:function(event, ui)
                    {
                      tpj("#tag5").autocomplete("widget").css("width","266px");
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
            