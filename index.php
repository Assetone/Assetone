<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF8"/>
		<link rel="stylesheet" type="text/css" href="css/global.css"/>
		<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
		<script type="text/javascript" src="js/jquery-ui.js"></script>
	</head>
	<body>
		<div id="titlebar">
			<div id="logo">
				<img src="img/assetone_logo_small.png" />
			</div>
			<div id="headline">
				<h1>Übersicht</h1>
			</div>
			<div id="account">
				User
			</div>
		</div>
		
		<div id="sidebar">
			<ul>
				<li>
					<a href="?action=">
					&Uuml;bersicht
					</a>
				</li>
				<li>
					<a href="?action=rooms">
					R&auml;ume
					</a>
				</li>
				<li>
					<a href="?action=components">
					Komponenten
					</a>
				</li>
				<li>
					<a>
					Lieferanten
					</a>
				</li>
				<li>
					<a>
					Einstellungen
					</a>
				</li>
			</ul>
		</div>
		
		<?php
			if(isset($_GET["action"]))
			{
				switch($_GET["action"])
				{
					case "components":
						include ("view/components.html");
						break;
					case "rooms":
						include ("view/rooms.html");
						break;
					case "setup":
						include ("view/setup.html");
						break;
					default:
						include ("view/main.html");
				}
			}
			else
			{
				include ("view/main.html");
			}
		?>
	</body>
</html>