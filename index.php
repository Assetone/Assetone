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
				<img id="accountpic" src="img/user.png"></img>
				<div id="accountinfo">
					<p id="accountname">Anmelden</p>
					<p id="accountrole"></p>
				</div>
				<div id="useractions" hidden>
					<div id="userlogout" hidden>
						<form id="logoutform">
							<input type="submit" value="Abmelden" />
						</form>
					</div>
					<div id="userlogin">
						<form id="loginform">
							<label>Benutzername:</label><br>
							<input id="username" type="text" required /><br>
							<label>Passwort:</label><br>
							<input id="userpassword" type="password" required /><br>
							<input type="submit" value="Anmelden" />
						</form>
					</div>
				</div>
				<script type="text/javascript">					
					function getCurrentUser()
					{				
						$.ajax({
							url: "controller/index.php?getCurrentUser",
						}).done(function(jsonString) {
							var jsonData = JSON.parse(jsonString);
							
							if (jsonData == null)
							{
								$("#userlogin")[0].hidden = false;
								$("#userlogout")[0].hidden = true;
								
								$("#accountname").html("Anmelden");
								$("#accountrole").html("");
							}
							else
							{
								if (jsonData.logedin == true)
								{
									$("#userlogin")[0].hidden = true;
									$("#userlogout")[0].hidden = false;
									
									$("#accountname").html(jsonData.name);
									$("#accountrole").html(jsonData.role);
								}
								else
								{
									$("#userlogin")[0].hidden = false;
									$("#userlogout")[0].hidden = true;
									
									$("#accountname").html("Anmelden");
									$("#accountrole").html("");
								}
							}
						});
					}
					
					getCurrentUser();
					
					$("#loginform").submit(function(event){
						event.preventDefault();
						
						$.post("controller/index.php?login", {
							username: $("#username").val(), 
							userpassword: $("#userpassword").val()}).done(getCurrentUser);
							
						$("#username").val("");
						$("#userpassword").val("");
					});
					
					$("#logoutform").submit(function(event){
						event.preventDefault();
						
						$.post("controller/index.php?logout").done(getCurrentUser);
					});
					
					$("#account").click(function( event ) {
					  $("#useractions").fadeIn();
					});
					
					$("#account").mouseleave(function( event ) {
					  $("#useractions").fadeOut();
					});
				</script>
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
					<a href="?action=settings">
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
					case "settings":
						include ("view/settings.html");
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