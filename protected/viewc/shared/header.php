<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Assetone - <?php echo $data['page']['title']; ?></title>
    <meta name="author" content="B3-Best Team">
    <link href="<?php echo $data['baseurl']; ?>assets/lib/css/style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $data['baseurl']; ?>assets/lib/js/jquery-ui-1.11.0/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo $data['baseurl']; ?>assets/lib/css/jquery.dataTables.css">
    <script type="text/javascript" src="<?php echo $data['baseurl']; ?>assets/lib/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo $data['baseurl']; ?>assets/lib/js/scripts.js"></script>
    <script type="text/javascript" src="<?php echo $data['baseurl']; ?>assets/lib/js/livesearch.js"></script>
    <script src="<?php echo $data['baseurl']; ?>assets/lib/js/jquery-ui-1.11.0/jquery-ui.js"></script>
    <script src="<?php echo $data['baseurl']; ?>assets/lib/js/jquery.dataTables.js"></script>
	<?php
	function curPageURL() {
		$pageURL = 'http';
		//if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
				$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
			} else {
				$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
			}
			return $pageURL;
		}
	?>
</head>
