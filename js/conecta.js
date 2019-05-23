

     $(document).ready( function() {


        $("#reply_form").submit(function(){

           var url = "php/enviodemail.php";

           $.ajax({
              type:"POST",
              url:url,
              data: $("#reply_form").serialize(),
              success: function(data)
              {
                
                
                $("#resultado").html(data);
                
              }

           });
           return false;

        }); } );
     
