<div class="header fl">
		<div id="header-left" class="fl light-blue">
			<img src="<?php echo $data['baseurl']; ?>global/img/b3-verwaltung-logo.png" alt="Assetone" />
		</div>

		<div id="header-right" class="fl">

			<!-- Titel -->
			<div id="page-title" class="fl" style="width: 50%; text-align: center;">
				<p class="greyblue f-def-light" style="font-size: 18.7px;"><?php echo $data['page']['title']; ?></p>
			</div>

			<!-- User Menue -->
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