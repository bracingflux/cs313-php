function itemToCart(obj) {
	var name1 = obj;
	$.ajax({
         type: "POST",
         url: "cartSession.php",
         data: "name=" + name1,
         success: function(msg){         	
                     // console.log("Recieved cart item(s): " + msg);
                  }
    });
}

function removeFromCart(obj) {
	var name2 = obj;
	$.ajax({
         type: "POST",
         url: "removeCartSession.php",
         data: "name=" + name2,
         success: function(msg){
                     // console.log("Recieved cart item(s): " + msg);
                  }
    });
}