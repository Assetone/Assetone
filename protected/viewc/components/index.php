<div class="content fl">

		<div class="contentbox-large">

		<script type="text/javascript">
		$(document).ready(function() {

			populateSelect('sel-room', '/components/getRooms', 'R_ID', 'R_Bezeichnung');
			populateSelect('sel-comptype', '/components/getComponentType', 'K_Art_ID', 'K_Art_Bezeichnung');
			populateSelect('sel-vendor', '/components/getDistributors', 'L_ID', 'L_Name');

		});
		</script>

			<script type="text/javascript">
			$(document).ready(function() {
			
					var datable = $('#table-layer').dataTable( {

						"ajax": "<?php echo $data['baseurl']; ?>components/getComponents",

						"columns": [ {
									"data": "K_ID",
									"title": "ID"
								}, {
									"data": "K_Name",
									"title": "Bezeichnung" 
								}, {
									"data": "K_Art_Bezeichnung",
									"title": "Art"
								}, {
									"data": "count",
									"title": "Anzahl"
								} ],

					} );
					
			});
			
			</script>
			
			
			<table id="table-layer" class="display"></table>
			
			
		</div>
		
			<!-- Komponenten Start -->
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
					
					
					<div style="clear: both;"></div>
					
					<input type="submit" value="Hinzufügen" onClick="addComponent()" class="button-bl" />
					
					<div id="add-comp-result"></div>
				</div>

	</div>