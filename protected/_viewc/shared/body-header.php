<div class="page-wrapper">

	<div class="page-main">



		<div class="header fl">
			<div id="header-left" class="fl light-blue">
				<a href="#uebersicht"><img src="<?php echo $data['baseurl']; ?>global/img/assetone_logo_small.png" alt="Assetone" /></a>
			</div>
		
			<div id="header-right" class="fl">
		
				<!-- Titel -->
				<div id="page-title" class="fl" style="width: 50%; text-align: center;">
					<p class="greyblue f-def-light" style="font-size: 18.7px;">Titel</p>
				</div>
			
				<!-- User Menü -->
				<div id="user-menu" class="fl" style="width: 30%;">
					<div id="user-menu-left" class="fl" style="padding: 10px;">
						<img src="<?php echo $data['baseurl']; ?>global/img/user.png" alt="PB" />
					</div>
					<div id="user-menu-right" class="fl">
						<p class="f-def-light" style="line-height: 0;"><?php echo upper($data['user']['name']); ?></p>
						<p class="f-def-light" style="font-size: 12px; line-height: 5px;"><?php echo $data['user']['type']; ?></p>
					</div>
				</div>
			
			</div>
		</div>