<!DOCTYPE html>
<html>
	<head>
<<<<<<< HEAD
		<meta charset="UTF8"/>
=======
		<link rel="stylesheet" type="text/css" href="css/global.css"/>
>>>>>>> origin/development
		<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
		<script type="text/javascript" src="js/jquery-ui.js"></script>
	</head>
	<body>
		<div id="">
			<img src="../img/assetone_logo_small.png" />
			<div id="">
				<h1>Übersicht</h1>
			</div>
		</div>
		<?php
			if(isset($_GET["action"]))
			{
				switch($_GET["action"])
				{
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