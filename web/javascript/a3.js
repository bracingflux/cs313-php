  $( function() {
    var dialog, form,

 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 500,
      width: 500,
      modal: true,
      buttons: {
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        $('#loaded_rb').text("");
      }
    }).prev(".ui-dialog-titlebar").css("background","red");
 
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
        $('#loaded_rb').text(response);
      }
    });

  });

});

   