<div class="content fl">

		<div class="contentbox">

			<script type="text/javascript">
			$(document).ready(function() {

				$('#table-layer').dataTable( {

					"ajax": "<?php echo $data['baseurl']; ?>settings/getUsers",

					"columns": [ {
								"data": "B_ID",
								"title": "ID"
							}, {
								"data": "B_Vorname",
								"title": "Vorname" 
							}, {
								"data": "B_Nachname",
								"title": "Nachname"
							}, {
								"data": "B_email",
								"title": "E-Mail"
							}, {
								"data": "Bg_Bezeichnung",
								"title": "Benutzergruppe"
							}, {
								"data": "B_LastLogin",
								"title": "Letzter Login"
							}, {
								"data": "B_Username",
								"title": "Username"
							} ],

				} );


			});
			</script>
			
			
			<table id="table-layer" class="display"></table>
			<!--
			<input type="submit" value="Bestätigen" class="button-bl" />
			<input type="submit" value="Abbrechen" class="button-re" />
			Results:
			<div id="#searchresults">
			</div>-->
			
		</div>
		
			<!-- Komponenten Start
				<div class="contentbox-large">
		
					<h3>Komponente hinzufügen</h3>

					<div id="add-comp-left" class="fl" style="width: 25%;">

						<p>Komponentenbezeichnung</p>
						<input id="component-name" name="manufacturer" class="input_def" />
						
						<p>Komponentenart</p>
						<select id="sel-comptype" class="select">
						</select>
							
						<p>Hersteller</p>
						<input id="manufacturer" name="manufacturer" class="input_def" />

						<p>Lieferant</p>
						<select id="sel-vendor" class="select">
						</select>
						
						<p>Raum</p>
						<select id="sel-room" class="select">
						</select>

					</div>
					
					<div class="cnt-split-vertical fl" style="height: 400px;"></div>
					
					<div id="add-comp-middle" class="fl" style="width: 25%; padding: 0 0 0 30px;">
						<p>Einkaufsdatum</p>
						<input class="input_def datepicker" id="buy-date" />
						
						<p>Garantie</p>
						<input class="input_def datepicker" id="warranty" />
						
						<p>Anzahl</p>
						<input class="input_def" id="amount"/>
					</div>
					
					
					<div class="cnt-split-vertical fl" style="height: 400px;"></div>
					
					<div id="add-comp-right" class="fl" style="width: 40%; padding: 0 0 0 30px;">
						<p>Notiz</p>
						<textarea style="width: 300px; height: 100px;" class="input_def">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</textarea>
					</div>
					
					
					<div style="clear: both;"></div>
					
					<input type="submit" value="Hinzufügen" onClick="addComponent()" class="button-bl" />
					<input type="submit" value="Abbrechen" class="button-re" />
			
				</div>-->

	</div>