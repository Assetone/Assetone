<!DOCTYPE html>
<html>
	<head>
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