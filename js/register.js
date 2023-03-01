$(document).ready(function() {
   
    $("#register-form").submit(function(event) {
      event.preventDefault();
     
      var name = $("#name").val();
      var email = $("#email").val();
      var password = $("#password").val();
      var confirmPassword = $("#confirm-password").val();
      if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return;
      }
      $.ajax({
        url: "register.php",
        type: "POST",
        data: {name: name, email: email, password: password},
        success: function(data) {
          window.location.href = "login.html";
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert("Error registering user.");
        }
      });
    });
  });