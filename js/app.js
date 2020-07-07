  // passing the dollar sign as a parameter to avoid the dollar sign conflict
  $("#modal").modal('hide');
      
      $(".service-card").hover(function(){
          $(this).find(".service-card-description").toggle();
      });
  

  function sendMessage(){
      //validate form 
      var names = $("#names").val();
      var email = $("#email").val();
      var message = $("#message").val();

      if(names==""){
          window.alert("Please enter Names");
      }
      else if(message==""){
          window.alert("Please enter a message");
      }
      else if(email==""){
          window.alert("Please enter an email address");
      }
      else{
          window.alert("Thank you for reaching out to us !")
          //subscribe the user using mail chimp
          //attempted using php since using pure javascript will return cors error
          $.post("scripts/mail_chimp_sub.php",{  
              email:email,
              message:message,
              names:names
          },function(data){
              if(data=="subscribed"){
                  window.alert("thanks for your message");
              }else{
                  //fail silently
              }
          })
      }

  }