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
                     var delay = 600;
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

function checkAddress() {
    var address = document.getElementById('address1').value;
    var pattern = new RegExp(/^[a-zA-Z0-9\s,.'-]{3,}$/);
    var valid = pattern.test(address);
    if (!valid) {
        document.getElementById('invalAddress').style.display = "block";
    }
    else {
        document.getElementById('invalAddress').style.display = "none";        
    }    
    return valid;
}

function checkName() {
    var name = document.getElementById('username1').value;
    if (!name) {
        document.getElementById('invalName').style.display = "block";
        return false;
    }
    else {
        var pattern = new RegExp(/^[a-z\sA-Z]*$/);
        var valid = pattern.test(name);
        if (valid) {
            document.getElementById('invalName').style.display = "none";            
        }
        else {
            document.getElementById('invalName').style.display = "block";
        }
        return valid;
    }    
}

function checkCity() {
    var city = document.getElementById('city1').value;
    if (city.length < 2) {
        document.getElementById('invalCity').style.display = "block";
        return false;
    }
    else {
        var pattern = new RegExp(/^[a-z\sA-Z]*$/);
        var valid = pattern.test(city);
        if (valid) {
            document.getElementById('invalCity').style.display = "none";
        }
        else {
            document.getElementById('invalCity').style.display = "block";
        }
        return valid;
    }    
}

function checkState() {
    var state = document.getElementById('state1').value;
    if (state.length < 2) {
        document.getElementById('invalState').style.display = "block";
        return false;
    }
    else {
        var pattern = new RegExp(/^[a-z\sA-Z]*$/);
        var valid = pattern.test(state);
        if (valid) {
            document.getElementById('invalState').style.display = "none";
        }
        else {
            document.getElementById('invalState').style.display = "block";
        }
        return valid;
    }    
}

function checkZip() {
    var zip = document.getElementById('zip1').value;
    if (zip.length < 5) {
        document.getElementById("invalZip").style.display = "block";
        return false;
    }
    else {
        var pattern = new RegExp(/^[0-9]*$/);
        var valid = pattern.test(zip);
        if (valid) {
            document.getElementById('invalZip').style.display = "none";
        }
        else {
            document.getElementById('invalZip').style.display = "block";
        }
        return valid;
    }    
}

function validate() {
    if (checkAddress() && checkName() && checkState() && checkZip()) {
        return true;
    }
    else {
        return false;
    }
}