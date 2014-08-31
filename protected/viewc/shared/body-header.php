<div class="page-wrapper">

	<div class="page-main">



<div class="header fl">
		<div id="header-left" class="fl light-blue">
			<a href="#uebersicht"><img src="<?php echo $data['baseurl']; ?>assets/media/img/assetone_logo_small.png" alt="Assetone" /></a>
		</div>

	<div id="header-right" class="fl">

			<!-- LiveSearch -->
			<div class="livesearch" style="position: absolute; left: 10px; top: 15px; width: 304px;">
				<input style="width: 227px; margin-left: -11px; margin-top: -1px;" type="text" id="livesearch-bar" class="livesearch" />
				<div style="float: right;">
					<div class="ico-livesearch-magn fl" style="position: absolute; right: 90px; top: 8px;"></div>
					<div style="margin: -22px 0 0 0;">
						<div class="ico-livesearch-filter-rooms fl"></div>
							<p class="fl" style="margin: 0 5px -10px 5px; color: #cdcdcd;">|</p>
						<div class="ico-livesearch-filter-components fl"></div>
							<p class="fl" style="margin: 0 5px -10px 5px; color: #cdcdcd;">|</p>
						<div class="ico-livesearch-filter-vendors fl"></div>
					</div>
				</div>
				<div style="display: none;" id="searchbar_res">
						<h5 style="margin: 5px;">Komponenten</h5>
						<a href="?p=edit_comp=1">
							<div class="sbar_wrapper">
								<p class="sbar_result">
									Bezeichnung: VT590
								</p>
								<p class="sbar_result">
									Art: Beamer
								</p>
								<p class="sbar_result">
									Anzahl: 1
								</p>
							</div>
						</a>
						<a href="?p=edit_comp=2">
							<div class="sbar_wrapper">
								<p class="sbar_result">
									Bezeichnung: HL-2150N
								</p>
								<p class="sbar_result">
									Art: Drucker
								</p>
								<p class="sbar_result">
									Anzahl: 1
								</p>
							</div>
						</a>
						
						<h5 style="margin: 5px;">Räume</h5>
						<a href="?p=edit_comp=1">
							<div class="sbar_wrapper">
								<p class="sbar_result">
									Bezeichnung: VT590
								</p>
								<p class="sbar_result">
									Art: Beamer
								</p>
								<p class="sbar_result">
									Anzahl: 1
								</p>
							</div>
						</a>
						<a href="?p=edit_comp=2">
							<div class="sbar_wrapper">
								<p class="sbar_result">
									Bezeichnung: HL-2150N
								</p>
								<p class="sbar_result">
									Art: Drucker
								</p>
								<p class="sbar_result">
									Anzahl: 1
								</p>
							</div>
						</a>
						
						<h5 style="margin: 5px;">Lieferanten</h5>
						<a href="?p=edit_comp=1">
							<div class="sbar_wrapper">
								<p class="sbar_result">
									Bezeichnung: VT590
								</p>
								<p class="sbar_result">
									Art: Beamer
								</p>
								<p class="sbar_result">
									Anzahl: 1
								</p>
							</div>
						</a>
						<a href="?p=edit_comp=2">
							<div class="sbar_wrapper">
								<p class="sbar_result">
									Bezeichnung: HL-2150N
								</p>
								<p class="sbar_result">
									Art: Drucker
								</p>
								<p class="sbar_result">
									Anzahl: 1
								</p>
							</div>
						</a>
				</div>

						
			</div>
				
			<!-- Titel -->
			<div id="page-title" class="fl" style="width: 70%; text-align: center;">
				<p class="greyblue f-def-light" style="font-size: 18.7px;"><?php echo $data['page']['title']; ?></p>
			</div>

			<!-- User Menue -->
			<div id="user-menu" class="fl" style="width: 30%;">
				<div id="user-menu-left" class="fl" style="padding: 10px;">
					<img src="<?php echo $data['baseurl']; ?>assets/media/img/user.png" alt="PB" />
				</div>
				<div id="user-menu-right" class="fl">
					<p class="f-def-light" style="line-height: 0;"><?php echo upper($data['user']['name']); ?></p>
					<p class="f-def-light" style="font-size: 12px; line-height: 5px;"><?php echo $data['user']['type']; ?></p>
				</div>
			</div>

		</div>
	</div>