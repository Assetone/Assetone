<?php
/* Auth Users again AD and set basic session vars */
//TODO: replace "(userprincipalname=".$username."@*)" by samAccountName
function login_ldap($username,$password)
{
	$password = $password;
<<<<<<< HEAD
	$ad_username = "KT\\".$username;    	
=======
	$ad_username = "DOMAIN\\".$username;    	
>>>>>>> origin/master

	$basedn = "ou=BLUBB,dc=dom.ain";
	$server = "xxx.xxx.xxx.xxx";

	if($password == '')	{ return false;	}
	else {
		$ldap_port = "389";
		// LDAP Abfrage 

		// Verbindung zum AD herstellen
		$connectid = ldap_connect($server) or die("Could not connect to LDAP server.");
		
		// Ihr könnt dies auch nutzen, um z.B. Usernamen und Passwort z.B. fürs Intranet zu verifizieren.
		$binding = @ldap_bind($connectid,$ad_username,$password);
		
		if($binding) {
			$results = ldap_search($connectid, "OU=DE, DC=KT, DC=group, DC=local", "(userprincipalname=".$username."@*)");
			if ($results) {
				$entries = ldap_get_entries($connectid, $results);

				$user['DISPLAY_NAME'] = $entries[0]['displayname'][0];
				$user['PERSONAL_ID'] = $entries[0]['employeeid'][0];
				$user['user'] = $username;
				$user['company'] = 'IAV';
				return $user;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}

function login_db($username,$password) {
	$db = db_connect();
	$sql = "SELECT users.id,users.email,sites.site 
				FROM `sites` 
				LEFT JOIN usersites ON sites.id = usersites.site_id 
				LEFT JOIN users ON users.id = usersites.users_id 
				WHERE username='" .$username ."' AND password=MD5('" .$password ."')";
	if ($result = $db->query($sql)) {
		if ($result->num_rows <= 0) return false;
		var_dump($result);
		while ($row = $result->fetch_array()) {
			$user['email'] = $row['email'];
			$user['id'] = $row['id'];
			$user['sites'][] = $row['site'];
		}
		$result->free();
		$db->close();
		$user['name'] = $username;
	} else {
		return false;
	}
	return $user;
}

// return:		(ARRAY) user
//				false if user not found or user in AD but has no rights in DB
function login_combined($username,$password) {
	if ($user = login_ldap($username,$password)) {
		$db = db_connect();
		$sql = "SELECT users.id,users.email,sites.site 
				FROM `sites` 
				LEFT JOIN usersites ON sites.id = usersites.site_id 
				LEFT JOIN users ON users.id = usersites.users_id 
				WHERE username='" .$username ."'";
		if ($result = $db->query($sql)) {
			if ($result->num_rows <= 0) {
				$sql = "SELECT users.id,users.email
						FROM `users` 
						WHERE username='" .$username ."'";
				if ($result = $db->query($sql)) {
					if ($result->num_rows <= 0) return false;
					while ($row = $result->fetch_array()) {
						$user['email'] = $row['email'];
						$user['id'] = $row['id'];
					}
					$user['sites'][] = "";
				}
			} else {
				while ($row = $result->fetch_array()) {
					$user['email'] = $row['email'];
					$user['id'] = $row['id'];
					$user['sites'][] = $row['site'];
				}				
			}
			$result->free();
			$db->close();
		} else {
			return false;
		}
		return $user;
	} elseif ($user = login_db($username,$password)) {
		return $user;
	} else {
		return false;
	}
}