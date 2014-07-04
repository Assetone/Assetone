<div class="content fl">
	<div class="contentbox">
		<h3>Herzlich Willkommen!</h3>
		<h5>Hallo <?php echo ($data['user']['name']); ?>,</h5>
		<h6>Ihr letzter Login im Assetone Verwaltungssystem war am <?php echo upper($data['user']['lastlogin_ddmmyy']); ?> um <?php echo upper($data['user']['lastlogin_hhmm']); ?> Uhr.</h6>
	</div>
</div>