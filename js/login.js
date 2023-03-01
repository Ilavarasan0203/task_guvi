$(document).ready(function() {
    
    $("#login-form").submit(function(event) {
      event.preventDefault();
     
      var email = $("#email").val();
      var password = $("#password").val();
      
      $.ajax({
        url: "login.php",
        type: "POST",
        data: {email: email, password: password},
        success: function(data) {
          
          window.location.href = "profile.html";
        },
        error: function(jqXHR, textStatus, errorThrown) {
         
          alert("Invalid email or password.");
        }
      });
    });
  });

  