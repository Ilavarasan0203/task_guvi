$(document).ready(function() {
    
    $("#profile-form").submit(function(event) {
      event.preventDefault();
      var name = $("#name").val();
      var age = $("#age").val();
      var dob = $("#dob").val();
      var contact = $("#contact").val();
      var gender = $("input[name=gender]:checked").val();
      $.ajax({
        url: "update_profile.php",
        type: "POST",
        data: {name: name, age: age, dob: dob, contact: contact, gender: gender},
        success: function(data) {
          alert("Profile updated successfully.");
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert("Error updating profile.");
        }
      });
    });
  });