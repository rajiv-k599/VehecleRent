function showFunction() {
    var x = document.getElementById("current");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  function ConfirmshowFunction() {
    var x = document.getElementById("new");
    var y=document.getElementById("confirm");
    if (x.type === "password" && y.type === "password") {
      x.type = "text";
      y.type = "text";
    } else {
      x.type = "password";
      y.type = "password";
    }
  }
  $(document).ready(function(){
    $('#confirm,#new').keyup(function(){
        var password = $('#new').val();
        var confirmpassword = $('#confirm').val();
        if(confirmpassword!=password){
          $('#Error').html('**Password Not Matched**');
          $('#Error').css('color','red');
          return false;
        } else {
           $('#Error').html('**Password Matched**');
          $('#Error').css('color','green');
          return true;
        }
    

    });
  });