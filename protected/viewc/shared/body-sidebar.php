		<div class="page-body">
		
			<div class="sidebar darkblue fl">
				<ul id="nav-sidebar" class="sidebar-left">
						<li>
							<a href="<?php echo $data['baseurl']; ?>"<?php if(curPageURL() == $data['baseurl']){echo ' class="active"';}?>>
								<div class="sidebar-icon ico-overview fl"></div>
								<span>&Uuml;bersicht</span>
							</a>
						</li>
						<li>
							<a href="<?php echo $data['baseurl']; ?>rooms/"<?php if(curPageURL() == $data['baseurl']."rooms/"){echo ' class="active"';}?>>
								<div class="sidebar-icon ico-rooms fl"></div>
								<span>R&auml;ume</span>
							</a>
						</li>
						<li>
							<a href="<?php echo $data['baseurl']; ?>components/"<?php if(curPageURL() == $data['baseurl']."components/"){echo ' class="active"';}?>>
								<div class="sidebar-icon ico-components fl"></div>
								<span>Komponenten</span>
							</a>
						</li>
						<li>
							<a href="<?php echo $data['baseurl']; ?>distributor/"<?php if(curPageURL() == $data['baseurl']."distributor/"){echo ' class="active"';}?>>
								<div class="sidebar-icon ico-vendors fl"></div>
								<span>Lieferanten</span>
							</a>
						</li>
						<li>
							<a href="<?php echo $data['baseurl']; ?>settings/"<?php if(curPageURL() == $data['baseurl']."settings/"){echo ' class="active"';}?>>
								<div class="sidebar-icon ico-settings fl"></div>
								<span>Einstellungen</span>
							</a>
						</li>
				</ul>
			</div>
	
	