<div class="content fl">

		
		<div class="contentbox-large">
		
					<h3>Raum Selector</h3>

					<div id="room-sel-left" class="fl" style="width: 54%;">

						<section id="floorplans">

						<div class="parent" style="overflow: hidden; position: relative;">
							<div class="panzoom" style="-webkit-transform: matrix(1, 0, 0, 1, 0, 0); -webkit-backface-visibility: hidden; -webkit-transform-origin: 50% 50%; cursor: move; transition: -webkit-transform 200ms ease-in-out; -webkit-transition: -webkit-transform 200ms ease-in-out;">


<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<svg
   xmlns:dc="http://purl.org/dc/elements/1.1/"
   xmlns:cc="http://creativecommons.org/ns#"
   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
   xmlns:svg="http://www.w3.org/2000/svg"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
   xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
   version="1.1"
   x="0px"
   y="0px"
   width="551.333px"
   height="445.333px"
   viewBox="0 0 551.333 445.333"
   enable-background="new 0 0 551.333 445.333"
   xml:space="preserve"
   id="svg3913"
   inkscape:version="0.48.5 r10040"
   sodipodi:docname="floorplan.svg"><metadata
   id="metadata4277"><rdf:RDF><cc:Work
       rdf:about=""><dc:format>image/svg+xml</dc:format><dc:type
         rdf:resource="http://purl.org/dc/dcmitype/StillImage" /></cc:Work></rdf:RDF></metadata><defs
   id="defs4275" /><sodipodi:namedview
   pagecolor="#ffffff"
   bordercolor="#666666"
   borderopacity="1"
   objecttolerance="10"
   gridtolerance="10"
   guidetolerance="10"
   inkscape:pageopacity="0"
   inkscape:pageshadow="2"
   inkscape:window-width="1280"
   inkscape:window-height="748"
   id="namedview4273"
   showgrid="false"
   inkscape:zoom="1.2075921"
   inkscape:cx="267.50019"
   inkscape:cy="222.687"
   inkscape:window-x="-8"
   inkscape:window-y="-8"
   inkscape:window-maximized="1"
   inkscape:current-layer="svg3913" />
	<rect
   style="fill:none;stroke:#000000;stroke-width:0.93567157;stroke-opacity:1"
   id="rect5055"
   width="453.9798"
   height="372.79977"
   x="60.298832"
   y="28.676386" /><rect
   style="fill:#cbcbcb;fill-opacity:1;stroke:#000000;stroke-width:0.93567157;stroke-opacity:1"
   id="R001"
   width="100.62835"
   height="114.10643"
   x="58.76252"
   y="27.113285" /><rect
   style="fill:#cbcbcb;fill-opacity:1;stroke:#000000;stroke-width:0.93567157;stroke-opacity:1"
   id="rect5059"
   width="99.860191"
   height="107.07247"
   x="58.76252"
   y="139.65662" /><rect
   style="fill:#cbcbcb;fill-opacity:1;stroke:#000000;stroke-width:0.93567157;stroke-opacity:1"
   id="rect5061"
   width="99.092041"
   height="155.52863"
   x="59.530678"
   y="245.94754" /><rect
   style="fill:#cbcbcb;fill-opacity:1;stroke:#000000;stroke-width:0.93567157;stroke-opacity:1"
   id="rect5069"
   width="84.497093"
   height="78.936646"
   x="158.62271"
   y="322.53952" /><rect
   style="fill:#cbcbcb;fill-opacity:1;stroke:#000000;stroke-width:0.93567157;stroke-opacity:1"
   id="rect5071"
   width="112.15068"
   height="79.718193"
   x="243.11981"
   y="321.75797" /><rect
   style="fill:#cbcbcb;fill-opacity:1;stroke:#000000;stroke-width:0.93567157;stroke-opacity:1"
   id="rect5073"
   width="80.656311"
   height="80.499748"
   x="354.50232"
   y="320.97641" /><rect
   style="fill:#cbcbcb;fill-opacity:1;stroke:#000000;stroke-width:0.93567157;stroke-opacity:1"
   id="R002"
   width="152.09476"
   height="146.15002"
   x="362.1839"
   y="27.894836" /></svg>


							
							</div>
						</div>
						
						<div class="button-gr" style="position: absolute; left: 80px; top: 440px; min-width: 50px; min-height: 10px;">
							<button class="zoom-in ico-rselector-magnifier fl" style="margin: 0 10px 0 5px; cursor: pointer;"></button>
							<button class="zoom-out ico-rselector-mover fl" style="margin: 0 10px 0 5px; cursor: pointer;"></button>
							<div class="reset ico-rselector-mouse fl" style="margin: 0 10px 0 5px; cursor: pointer;"></div>
							<input style="width: 50px;" type="range" class="zoom-range" step="0.05" min="0.4" max="5">
						</div>

							<!-- Floorplan SVG Elements -->
							<script src="<?php echo $data['baseurl']; ?>assets/lib/js/jquery.mousewheel.js"></script>
							<script src="<?php echo $data['baseurl']; ?>assets/lib/js/jquery.panzoom.js"></script>
	
							<script type="text/javascript">
							(function() {
								var $section = $('section').first();
									$section.find('.panzoom').panzoom({
									$zoomIn: $section.find(".zoom-in"),
									$zoomOut: $section.find(".zoom-out"),
									$zoomRange: $section.find(".zoom-range"),
									$reset: $section.find(".reset")
								});
							})();

							$('rect[id^="R"]' ).click(function() {
								$('#room-sel-right').fadeIn();
								$('#rooms-tablebox').slideDown('slow');
								$("#" + this.id).css({"fill": "#fef163"});
								loadDataTable(this.id);
							});
							</script>
						</section>
						
						<div id="room-sel-path" class="button-gr" style="position: absolute; top: 105px; left: 390px; min-width: 50px; min-height: 10px;">
							Stockwerk 1 / R002
						</div>
						
					</div>
					
					<div class="cnt-split-vertical fl" style="height: 400px;"></div>
					
					<div id="room-sel-right" class="fl" style="display: none; width: 40%; padding: 0 0 0 30px;">
					
						<h5>R002</h5>
						<table>
					  	  <tbody>
							<tr>
						  	   <td style="width: 20%; border-right: 1px solid #ddd;">ID:</td>
						  	   <td style="padding: 0 0 0 10px;">002</td>
							</tr>
							<tr>
						  	   <td style="width: 20%; border-right: 1px solid #ddd;">Bezeichnung:</td>
						  	   <td style="padding: 0 0 0 10px;">Labor</td>
							</tr>
							<tr>
						  	   <td style="width: 20%; border-right: 1px solid #ddd;">PCs:</td>
						  	   <td style="padding: 0 0 0 10px;">11</td>
							</tr>
							<tr>
						  	   <td style="width: 20%; border-right: 1px solid #ddd;">Beamer:</td>
						  	   <td style="padding: 0 0 0 10px;">Ja</td>
							</tr>
					  	  </tbody>
						</table>
					
					</div>
					

			
				</div>
				<div id="rooms-tablebox" class="contentbox-large" style="display: none;">
				<script type="text/javascript">
					var dataTable = null;
					
					function loadDataTable(roomName)
					{
						if (dataTable == null)
						{
							dataTable = $('#table-layer').DataTable( {
								"ajax": "<?php echo $data['baseurl']; ?>rooms/getRoomComponents/"+roomName,

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
										} ,{
											"data": "L_Name",
											"title": "Lieferant"
										},{
											"data": "R_Bezeichnung",
											"title": "Raum"
										}
										,{
											"data": "K_Hersteller",
											"title": "Hersteller"
										}],
							});
						}
						else
						{
							dataTable.ajax.url("<?php echo $data['baseurl']; ?>rooms/getRoomComponents/"+roomName).load();
						}
					}
			</script>
			
			
			<table id="table-layer" class="display"></table>
		</div>
	</div>