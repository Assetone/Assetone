<?php
/**
 * User Management Class
 */
	if(!isset($_SESSION)) {
		session_start();
	}
/**
 * Class for user management
 *
 * This class contains functions for the user management like login, logout, add user, delete user and so on
*/
class userMgmt {
	/**
	 * Check login status
	 *
	 * Checks, if the user is logged in or not and returns a boolean answer
	 *
	 * @author	Sebastian Kraetzig
	 * @copyright	Copyright (c) since 2014, Sebastian Kraetzig
	 * @link	https://github.com/B3-Best/Assetone
	 * @since	2014-07-02
	 * @return	boolean true or false
	*/
	private function loginStatus() {
		if(isset($_SESSION["loggedIn"])) {
			if($_SESSION["loggedIn"] == 1) {
				return 1;
			}
		}
		return 0;
	}

	/**
	 * Login user
	 *
	 * Logs user in to a system
	 *
	 * @author	Sebastian Kraetzig
	 * @copyright   Copyright (c) since 2014, Sebastian Kraetzig
	 * @link        https://github.com/B3-Best/Assetone
	 * @since	2014-07-02
	 * @return	boolean true or false
	 * @param	string $username B_Username from database
	 * @param	string $password B_Passwort from database
	*/
	public function login($username, $password) {
		$username = trim($username);
		$password = trim($password);

		$query = "SELECT B_ID, B_Vorname, B_Nachname, B_email, B_Username, B_Passwort, B_LastLogin, B_Resethash FROM Benutzer WHERE B_Username=\"$username\"";

		$dbconf = Doo::db()->getDefaultDbConfig();
		$dbname = $dbconf[1];

		if((!empty($username)) AND (!empty($password))) {
			if($userDetails = Doo::db()->query($query)) {
				$userDetails = $userDetails->fetchAll();

				if(md5($password) === $userDetails["B_Passwort"]) {
					$_SESSION["loggedIn"] = 1;
					$_SESSION["userDetails"] = $tables;

					return 1;
				}
			}
		}
		return 0;
	}

	/**
	 * Logout user
	 *
	 * Logs user out from a system
	 *
	 * @author	Sebastian Kraetzig
	 * @copyright   Copyright (c) since 2014, Sebastian Kraetzig
	 * @link        https://github.com/B3-Best/Assetone
	 * @since	2014-07-02
	 * @return	boolean true or false
	*/
	public function logout() {
		if(session_destroy()) {
			return 1;
		}
		return 0;
	}

	/**
	 * Sends 'Password forgot'-Link to user
	 *
	 * Sends the link via phpMailer as eMail to user
	 *
	 * @author	Sebastian Kraetzig
	 * @copyright   Copyright (c) since 2014, Sebastian Kraetzig
	 * @link        https://github.com/B3-Best/Assetone
	 * @since	2014-07-02
	 * @return	boolean true or false
	 * @param	string $username B_Username from database
	 * @param	string $email B_email from database
	*/
	public function sendPasswordForgotLink($username, $email) {
		$queryUserID = "SELECT B_ID FROM Benutzer WHERE B_Username=\"$username\" AND B_email=\"$email\"";

		$dbconf = Doo::db()->getDefaultDbConfig();
		$dbname = $dbconf[1];

		if($userID = Doo::db()->query($queryUserID)) {
			$userID = $userID->fetchAll()["B_ID"];

			$randomResetHash = md5($this->randomString(20));

			$querySaveResetHash = "UPDATE Benutzer SET B_Resethash=\"$randomResetHash\" WHERE B_ID=\"$userID\"";

			if(Doo::db()->query($querySaveResetHash)) {
				$mail = new PHPMailer;

				$mail->CharSet = 'utf-8';
				$mail->From = "noReply@" . $_SERVER['SERVER_NAME'];
				$mail->FromName = 'Assetone';
				$mail->AddAddress("$user_email", "$first_name $last_name"); // Add a recipient

				$mail->IsHTML(true); // Set email format to HTML

				$mail->Subject = 'Assetone - Passwort zurücksetzen';

				$email_message_html = "Hallo $B_Vorname $B_Nachname,<br><br>";
				$email_message_html .= "es wurde eine Passwort-Änderung Ihres Assetones Accounts angefordert. Sie können das Passwort über den nachfolgenden Link ändern<br>";
				$email_message_html .= "------------------<br>";
				$email_message_html .= "<a href=\"$http_type://" . $_SERVER['SERVER_NAME'] . "$root_url/changeforgottenpassword.php?rstpw=true&hash=$random_password_hash&uid=" . $id . "\">Passwort ändern</a><br>";
				$email_message_html .= "Benutzername: $username<br>";
				$email_message_html .= "------------------<br><br>";
				$email_message_html .= "Sollten Sie keine Passwort-Änderung angefordert haben, ignorieren Sie diese E-Mail bitte.<br><br><br>";
				$email_message_html .= "Mit freundlichen Grüßen,<br>";
				$email_message_html .= "Assetone System<br<br>>";
				$email_message_html .= "Ihr Assetone System: <a href=\"$http_type://" . $_SERVER['SERVER_NAME'] . "$root_url/\">" . $_SERVER['SERVER_NAME'] . "</a><br><br>";
				$email_message_html .= "Projekt auf GitHub: <a href=\"https://github.com/B3-Best/Assetone/\">https://github.com/B3-Best/Assetone</a>";

				$mail->Body = "$email_message_html";

				if($mail->Send()) {
					return 1;
				}
			}
		}
		return 0;
	}

	/**
	 * Validates requested link
	 *
	 * Checks if somebody is trying to change the password with evil background or not
	 *
	 * @author	Sebastian Kraetzig
	 * @copyright   Copyright (c) since 2014, Sebastian Kraetzig
	 * @link        https://github.com/B3-Best/Assetone
	 * @since	2014-07-02
	 * @return	boolean true or false
	*/
	private function validatePasswordResetLink() {
		if($_SERVER["REQUEST_URI"] != $_SERVER["SCRIPT_NAME"]) {
			if($_GET["rstpw"] == "true") {
				$queryResetHash = "SELECT B_Resethash FROM Benutzer WHERE B_ID=\"" . $_GET["uid"] . "\"";

				$dbconf = Doo::db()->getDefaultDbConfig();
				$dbname = $dbconf[1];

				$resetHash = Doo::db()->query($queryResetHash);
				$resetHash = $resetHash->fetchAll();

				if($resetHash["B_Resethash"] == $_GET["hash"]) {
					return 1;
				}
			}
		}
		return 0;
	}

	/**
	 * Save reseted password
	 *
	 * Saves the new password in the database and sends an email to the user
	 *
	 * @author	Sebastian Kraetzig
	 * @copyright   Copyright (c) since 2014, Sebastian Kraetzig
	 * @link        https://github.com/B3-Best/Assetone
	 * @since	2014-07-02
	 * @return	boolean true or false
	 * @param	string $newPassword new password for user (can contain every char)
	 * @param	integer $userID B_ID from database
	*/
	public function saveResetedPassword($userID, $newPassword) {
		$newPassword = md5($newPassword);

		$querySavePassword = "UPDATE Benutzer SET B_Resethash=\"\", B_Passwort=\"$newPassword\" WHERE B_ID=\"$userID\"";

		$dbconf = Doo::db()->getDefaultDbConfig();
		$dbname = $dbconf[1];

		if(Doo::db()->query($querySavePassword)) {
			return 1;
		}
		return 0;
	}

	/**
	 * Returns the first and last name or the group of the logged in user
	 *
	 * Select type and get first and last name or group name
	 *
	 * @author	Sebastian Kraetzig
	 * @copyright   Copyright (c) since 2014, Sebastian Kraetzig
	 * @link        https://github.com/B3-Best/Assetone
	 * @since	2014-07-02
	 * @return	string first and last name or group
	 * @param	integer $type use 1 for first and last name and 2 for group name
	 * @param	integer $userID B_ID from database
	 */
	public function getUserDetails($type, $userID) {
		$dbconf = Doo::db()->getDefaultDbConfig();
		$dbname = $dbconf[1];

		if($type == 1) {
			$queryGetFirstAndLastName = "SELECT B_Vorname, B_Nachname, B_LastLogin FROM Benutzer WHERE B_ID=\"$userID\"";

			if($userDetails = Doo::db()->query($queryGetFirstAndLastName)) {
				$tables = $userDetails->fetchAll();
				return $tables[0];
			}
		}
		elseif($type == 2) {
			$queryGetGroup = "SELECT Benutzergruppen.Bg_Bezeichnung FROM Benutzergruppen LEFT JOIN Benutzer ON Benutzergruppen.Bg_ID=Benutzer.Bg_ID WHERE Benutzer.B_ID=\"$userID\"";

			if($userGroup = Doo::db()->query($queryGetGroup)) {
				$tables = $userGroup->fetchAll();
				return $tables[0];
			}
		}
		return 0;
	}

	/**
	 * Add new user
	 *
	 * Adds new user to the database
	 *
	 * @author	Sebastian Kraetzig
	 * @copyright   Copyright (c) since 2014, Sebastian Kraetzig
	 * @link        https://github.com/B3-Best/Assetone
	 * @since	2014-07-02
	 * @return	boolean true or false
	 * @param	string $firstName first name of user
	 * @param	string $lastName last name of user
	 * @param	string $email eMail of user
	 * @param	string $username username of user
	 * @param	string $password password of user
	 * @param	integer $groupID Bg_ID from database
	 */
	public function addUser($firstName, $lastName, $email, $username, $password, $groupID) {
		$firstName = trim($firstName);
		$lastName = trim($lastName);
		$email = trim($email);
		$username = trim($username);
		$password = md5(trim($password));
		$groupID = trim($groupID);

		$queryAddUser = "INSERT INTO Benutzer (B_Vorname, B_Nachname, B_email, B_Username, B_Passwort, Bg_ID) VALUES (\"$firstName\", \"$lastName\", \"$email\", \"$username\", \"$password\", \"$groupID\")";

		$dbconf = Doo::db()->getDefaultDbConfig();
		$dbname = $dbconf[1];

		if(Doo::db()->query($queryAddUser)) {
			return 1;
		}

		return 0;
	}

	/**
	 * Delete user
	 *
	 * Deletes existing user from database
	 *
	 * @author	Sebastian Kraetzig
	 * @copyright   Copyright (c) since 2014, Sebastian Kraetzig
	 * @link        https://github.com/B3-Best/Assetone
	 * @since	2014-07-02
	 * @return	boolean true or false
	 * @param	integer $userID B_ID from database
	 */
	public function deleteUser($userID) {
		$queryDeleteUser = "DELETE FROM Benutzer WHERE B_ID=\"$userID\"";

		$dbconf = Doo::db()->getDefaultDbConfig();
		$dbname = $dbconf[1];

		if(Doo::db()->query($queryDeleteUser)) {
			return 1;
		}
		return 0;
	}

	/**
	 * Has user "computer systems supervisor" permissions?
	 *
	 * Checks, if the user has "computer systems supervisor" permissions
	 *
	 * @author	Sebastian Kraetzig
	 * @copyright   Copyright (c) since 2014, Sebastian Kraetzig
	 * @link        https://github.com/B3-Best/Assetone
	 * @since	2014-07-02
	 * @param	integer $userID B_ID from database
	*/
	private function isUserComputerSystemsSupervisor($userID) {
		if($this->getUserDetails(2, $userID) == "Systembetreuer") {
			return 1;
		}
		return 0;
	}

	/**
	 * Has user "apprentice" permissions?
	 *
	 * Checks, if the user has "apprentice" permissions
	 *
	 * @author      Sebastian Kraetzig
	 * @copyright   Copyright (c) since 2014, Sebastian Kraetzig
	 * @link        https://github.com/B3-Best/Assetone
	 * @since	2014-07-02
	 * @param	integer $userID B_ID from database
	*/
	private function isUserApprentice($userID) {
		if($this->getUserDetails(2, $userID) == "Auszubildender") {
			return 1;
		}
		return 0;
	}

	/**
	 * Has user "teacher" permissions?
	 *
	 * Checks, if the user has "teacher" permissions
	 *
	 * @author      Sebastian Kraetzig
	 * @copyright   Copyright (c) since 2014, Sebastian Kraetzig
	 * @link        https://github.com/B3-Best/Assetone
	 * @since	2014-07-02
	 * @param	integer $userID B_ID from database
	*/
	private function isUserTeacher($userID) {
		if($this->getUserDetails(2, $userID) == "Lehrer") {
			return 1;
		}
		return 0;
	}

	/**
	 * Has user "management" permissions?
	 *
	 * Checks, if the user has "management" permissions
	 *
	 * @author	Sebastian Kraetzig
	 * @copyright   Copyright (c) since 2014, Sebastian Kraetzig
	 * @link        https://github.com/B3-Best/Assetone
	 * @since	2014-07-02
	 * @param	integer $userID B_ID from database
	*/
	private function isUserManagement($userID) {
		if($this->getUserDetails(2, $userID) == "Verwaltung") {
			return 1;
		}
		return 0;
	}
}
?>
