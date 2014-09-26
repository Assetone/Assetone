var UP = 38;
var DOWN = 40;
var ENTER = 13;

var getKey = function(e) {
	if(window.event) {
		return e.keyCode;
	}

	else if(e.which) {
		return e.which;
	}
	
	var keynum = getKey(e);
	
	if(keynum === UP) {
		// Select up
		alert("up");
	}
	
	if(keynum === DOWN) {
		// Select down
		alert("DOWN");
	}
	
	if(keynum === ENTER) {
		// Referrer to Link
		alert("ENTER");
	}
}

$(document).ready(function() {

  // Check key activity
  $("#livesearch-bar").keyup(function() {
	
	// Put searchbar input into variable
	var searchInput = $("#livesearch-bar").val();
	
	// Verify that input is not empty
	if(searchInput != '') {
	
		  // Define Ajax parameters
		  $.ajax({
			 type: "POST",
			 url: "link-with-search-results",
			 data: { searchInput: searchInput, type: "sbar", limit: "7" },
			 success: function(result) {
			   $("#searchbar_res").html(result);
			   $("#searchbar_res").css('display','block');
			 }
  
		  });
	  
	 }
	 
	 // Searchinput is empty, display nothing
	 else {
		$("#searchbar_res").css('display','none');
	 }
	 
	return false;
	
  });


   $(document).click(function() {
		$("#searchbar_res").css('display','none');
   });
   
   var firstFocus = true;
   
   $("#livesearch-bar").focus(function() {
		if(firstFocus) {
			$("#livesearch-bar").val('');
			firstFocus = false;
		}
		$("#livesearch-bar").css('color','black');
		$("#livesearch-bar").css('font-style','normal');
		$("#searchbar_res").css('display','block');
   });
   
});