function itemToCart(obj) {
	var name1 = obj;
	$.ajax({
         type: "POST",
         url: "cartSession.php",
         data: "name=" + name1,
         success: function(msg){         	
                     console.log("Recieved cart item(s): " + msg);
                     document.getElementById(name1).style.background = "#74ff61";
                     document.getElementById(name1).style.color = "black";
                     document.getElementById(name1).innerHTML = "Added to Cart";
                     var delay = 1200;
                     setTimeout(function(){
                        document.getElementById(name1).style.background = "#60a5f7";
                        document.getElementById(name1).style.color = "white";
                        document.getElementById(name1).innerHTML = "Add to Cart";
                     }, delay); 
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
                $('#checkoutItems').load(document.URL + ' #checkoutItems');
                     console.log(document.URL + ' #checkoutItems');
                  }
    });
}