<div class="content fl">

		<div class="contentbox-large" style="width: 600px">
		
					<h3>Lieferant hinzufügen</h3>

					<div id="add-comp-left" class="fl" style="width: 328px">
						<p>Firma</p>
						<input class="input_def" name="company" value="" />
						
						<p>Straße + Hausnummer</p>
						<input class="input_def" name="street" value="" />
						
						<p>PLZ</p>
						<input class="input_def" name="plz" value="" />
						<p>Ort</p>
						<input class="input_def" name="city" value="" />
					</div>
					
					<div class="cnt-split-vertical fl" style="height: 400px;"></div>
					
					<div id="add-comp-middle" class="fl" style="width: 240px; padding: 0 0 0 30px;">
						<p>Telefon/Mobil</p>
						<input class="input_def" name="phone" />
						
						
						
						<p>Fax</p>
						<input class="input_def" name="fax"  />
						
						<p>Email</p>
						<input class="input_def" name="fax"  />
						
					</div>
					<div style="float:left;margin-left:32px;margin-top:50px;">
					
					
					<div style="clear: both;"></div>
					
					<input type="submit" value="Hinzufügen" class="button-bl" />
					<input type="submit" value="Abbrechen" class="button-re" />
					
					</div>
					<div style="clear: both;"></div>
					
					
			
				</div>
		<div class="contentbox">

			<script type="text/javascript">
			$(document).ready(function() {

				$('#table-layer').dataTable( {

					"ajax": "<?php echo $data['baseurl']; ?>distributor/getDistributor",

					"columns": [ {
								"data": "L_ID",
								"title": "ID"
							}, {
								"data": "L_Name",
								"title": "Name" 
							}, {
								"data": "L_Strasse_Nr",
								"title": "Straße"
							}, {
								"data": "L_Plz",
								"title": "Plz"
							} , {
								"data": "L_Ort",
								"title": "Ort"
							}, {
								"data": "L_Telefon",
								"title": "Telefon"
							}, {
								"data": "L_Fax",
								"title": "Fax"
							}, {
								"data": "L_Mail",
								"title": "E-Mail"
							}
							],

				} );


			});
			</script>
			
			
			<table id="table-layer" class="display"></table>

		</div>

	</div>