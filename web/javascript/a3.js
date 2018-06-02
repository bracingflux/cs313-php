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
        alert("Success! " + response + "(Just once?)");        
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
   