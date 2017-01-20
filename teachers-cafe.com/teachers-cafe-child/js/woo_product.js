jQuery(document).ready(function($){

    function makeRepeater(sectionsSelector, addClass, removeClass, AYSMsg){  

       (function($){  

          $(  

             sectionsSelector + " " + addClass +","+  

             sectionsSelector + " " + removeClass  

          ).on("click", function(event){  

             // Avoiding the link to do the default behavior.  

             event.preventDefault();  

      

             // Get the container to be removed/cloned  

             var theContainer = $(this).parents(sectionsSelector);  

             if($(this).is(addClass)){  

      

                // Cloning the container with events  

                var clonedSection = $(theContainer).clone(true);  

      

                // And appending it just after the current container  

                $(clonedSection).insertAfter(theContainer);  

             }else{  

                // If the user confirm the "Are You Sure" message   

                // we can remove the current container  

                if(confirm(AYSMsg)){  

      

                   // Making fade out, hide and remove element a sequence  

                   // to provide a nice UX when removing element.   

                   $(theContainer).fadeOut('normal',   

                      function( ){  

                         $(this).hide('fast',   

                            function(){ $(this).remove();  }   

                         );  

                      }   

                   );  

                }  

             }  

          });  

       })(jQuery);  

    }

    makeRepeater(  

        '.my-repeated-section',   /* The container selector */  

        '.add',                   /* The add action selector */  

        '.remove',                /* The remove action selector */  

        'Are you sure you want to remove this section?' /* The AYS message. */  

    );  

    $('#dokan-single-variation-form input_text wc_file_url').blur(function(e){
      var url = $(this).val();
      alert(url);
       $('#dokan-single-variation-form').bind('submit',function(e){e.preventDefault();});
    })
   

})