<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/global.css"/>
		<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
		<script type="text/javascript" src="js/jquery-ui.js"></script>
	</head>
	<body>
		<?php
			if(isset($_GET["action"]))
			{
				switch($_GET["action"])
				{
					case "setup":
						include ("view/setup.html");
						break;
					default:
				}
			}
		?>
	</body>
</html>