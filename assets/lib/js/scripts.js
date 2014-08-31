// Function to populate select menu from JSON
// Example call: populateSelect('sel-room', '/components/getRooms', 'R_ID', 'R_Bezeichnung');
function populateSelect(id, api_url, value1, value2) {
	// Get reference to select element
	$select = $('#'+id);
	
	// Request JSON data and parse into the select element
	$.ajax({
	  async: false,
	  url: api_url,
	  dataType:'JSON',
	  success:function(data){
		// Clear current content
		$select.html('');
		// Iterate through data and append to select element
		$.each(data.data, function(key, val){
		  $select.append('<option name="' + val[value1] + '">' + val[value2] + '</option>');
		})
	  },
	  error:function(){
		// If error, append a 'none available' option
		$select.html('<option id="-1">none available</option>');
	  }
	});
	
	return true;
}


function addComponent() {

	var api_url = '/components/insertComponents/' + $('#component-name').val()
		+ '/' + $('#sel-comptype').find('option:selected').attr("name")
		+ '/' + $('#buy-date').val()
		+ '/' + $('#manufacturer').val()
		+ '/' + $('#warranty').val()
		+ '/' + $('#sel-vendor').find('option:selected').attr("name")
		+ '/' + $('#sel-room').find('option:selected').attr("name")
		+ '/' + $('#amount').val();
	
	$.ajax({
	  async: false,
	  url: api_url,
	  type: "POST",
	  success:function(data){
		$('#add-comp-result').html('Komponente Erfolgreich hinzugefügt');
	  },
	  error:function(){
		
	  }
	});

}


function addDistributor() {

	var api_url = '/distributor/insertDistributor/' + $('#company').val()
		+ '/' + $('#street').val()
		+ '/' + $('#zip').val()
		+ '/' + $('#city').val()
		+ '/' + $('#phone').val()
		+ '/' + $('#fax').val()
		+ '/' + $('#email').val();
	
	$.ajax({
	  async: false,
	  url: api_url,
	  type: "POST",
	  success:function(data){
		$('#add-comp-result').html('Komponente Erfolgreich hinzugefügt');
	  },
	  error:function(){
		
	  }
	});

}


function addUser() {

	var api_url = '/components/insertComponents/' + $('#component-name').val() + '/' + $('#sel-comptype').find('option:selected').attr("name") + '/' + $('#buy-date').val() + '/' + $('#manufacturer').val() + '/' + $('#warranty').val() + '/' + $('#sel-vendor').find('option:selected').attr("name") + '/' + $('#sel-room').find('option:selected').attr("name");
	alert(api_url);
	
	$.ajax({
	  async: false,
	  url: api_url,
	  type: "POST",
	  success:function(data){
		loadDataTable();
	  },
	  error:function(){
		
	  }
	});

}


function addRoom() {

	var api_url = '/rooms/insertRoom/' + $('#name').val();
	
	$.ajax({
	  async: false,
	  url: api_url,
	  type: "POST",
	  success:function(data){
		loadDataTable();
	  },
	  error:function(){
		
	  }
	});

}


var color = $(".ui-state-default").css("#ffffff");
$(function() {
	$( ".select" )
	.selectmenu({ icons: { button: "sel-defaultIcon" } })
	.selectmenu({ width: 200 });;

	$.datepicker.setDefaults({
		showOn: "both",
		buttonImageOnly: true,
		buttonImage: "/assets/media/img/calendar.png",
	});
	
	
$('#field').datepicker({
	  showOn: 'both',
	  buttonImage: '/assets/media/img/calendar.png',
	  buttonImageOnly: true
});
$('#field').insertAfter( $('#field').next('img') );



	$.datepicker.regional['de'] = {clearText: 'löschen', clearStatus: 'aktuelles Datum löschen',
			closeText: 'schließen', closeStatus: 'ohne Änderungen schließen',
			prevText: '<zurück', prevStatus: 'letzten Monat zeigen',
			nextText: 'Vor>', nextStatus: 'nächsten Monat zeigen',
			currentText: 'heute', currentStatus: '',
			monthNames: ['Januar','Februar','März','April','Mai','Juni',
			'Juli','August','September','Oktober','November','Dezember'],
			monthNamesShort: ['Jan','Feb','Mär','Apr','Mai','Jun',
			'Jul','Aug','Sep','Okt','Nov','Dez'],
			monthStatus: 'anderen Monat anzeigen', yearStatus: 'anderes Jahr anzeigen',
			weekHeader: 'Wo', weekStatus: 'Woche des Monats',
			dayNames: ['Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag'],
			dayNamesShort: ['So','Mo','Di','Mi','Do','Fr','Sa'],
			dayNamesMin: ['So','Mo','Di','Mi','Do','Fr','Sa'],
			dayStatus: 'Setze DD als ersten Wochentag', dateStatus: 'Wähle D, M d',
			dateFormat: 'dd.mm.yy', firstDay: 1, 
			initStatus: 'Wähle ein Datum', isRTL: false};
	$.datepicker.setDefaults($.datepicker.regional['de']);
	
	
	$( ".datepicker" ).datepicker();
	$(".datepicker").datepicker("option", "dateFormat", "yy-mm-dd ");


	
});