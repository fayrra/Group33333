function showAlert() {
    var myText = "Did you think there would be somthing here?";
    alert (myText);
}

// open pop-up menu for add contact
function show_add_contact(){
  var add_row = document.getElementById("add_contact_form");
  add_row.style = "display: block; width: 100%; margin-left: auto; margin-right: auto;";
  
}

// close pop up menu. right now this is more of a cancel than a submit
function close_add_box(){
  var add_row = document.getElementById("add_contact_form");
  add_row.style = "display: none";
}

