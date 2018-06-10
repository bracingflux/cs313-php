  $( function() {
    var dialog, form,

 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 500,
      width: 500,
      modal: true,
      buttons: {
        Okay: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        $('#loaded_rb').text("");
        $('.loader').show();
      }
    });
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
    });
 
    $( ".view_rb" ).button().on( "click", function() {      
      dialog.dialog( "open" );
    });
  } );



 $(function () {

  $('.rbForm').on('submit', function (e) {

    e.preventDefault();
    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();
    
    $.ajax({  
      type: 'post',
      url: 'rb_data.php',
      data: serializedData,
      success: function (response) {
        // $('#loaded_rb').text(response);
        $('#loaded_rb').html(response);
      },
      complete: function () {
        $('.loader').hide();
      }             
    });

  });

});

$(function () {

  $('#login_form').on('submit', function (e) {

    e.preventDefault();
    e.stopImmediatePropagation();        
    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();
    
    $.ajax({  
      type: 'post',
      url: 'check_user.php',
      data: serializedData,
      success: function (response) {
        if (response.includes("-1")) {
          alert("Username or password incorrect. Please try again");
        }
        else {
          $('#id01').hide();
          $('.input1').val('');
          $('#current_user').text(response);                    
          alert(response);
        }
        // $('#loaded_rb').text(response);
      },
      complete: function () {
        // $('.loader').hide();
      }             
    });

  });

});

$(function () {

  $('#signup_form').on('submit', function (e) {

    e.preventDefault();
    e.stopImmediatePropagation();    
    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();
    
    $.ajax({  
      type: 'post',
      url: 'register_user.php',
      data: serializedData,
      success: function (response) {
        // alert(response);
        if (response.includes("already exists")) {
          alert("Account already exists.");
        }
        else {
          $('#id02').hide();
          $('.input1').val('');
          $('#current_user').text(response);                    
          // alert(response);
        }
        // $('#loaded_rb').text(response);
      },
      complete: function () {
        // $('.loader').hide();
      }             
    });

  });

});

$(function () {


  $('.commentSubmit').on('submit', function (e) {

    e.preventDefault();
    e.stopImmediatePropagation();
    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();
    
    $.ajax({  
      type: 'post',
      url: 'submit_comment.php',
      data: serializedData,
      success: function (response) {
        var info = $('#loaded_rb').html();
        info = info + response;
        // alert(info);
        $('#loaded_rb').html(info); 
        // $("#loaded_rb").load(location.href + " #loaded_rb");        
        // $('#loaded_rb').text(response);
      },
      complete: function () {
        // $('.loader').hide();
      }             
    });

  });

});

var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function showSignUp() {
  document.getElementById('id02').style.display='block';
  document.getElementById('id01').style.display='none';
}

function showSignIn() {
  document.getElementById('id01').style.display='block';
  document.getElementById('id02').style.display='none';  
}

function verifyPassword() {
  var pass1 = document.getElementById('pass1').value;
  var pass2 = document.getElementById('pass2').value;
  if (pass1 && pass2) {
    var result = pass1.localeCompare(pass2);
    if (result == 0) {
      document.getElementById('passVerify').style.display = 'none';
      return true;
    }
    else {
      document.getElementById('passVerify').style.display = 'block';
      return false;      
    }
  }
  else {
    return false;
  }
  
}
   