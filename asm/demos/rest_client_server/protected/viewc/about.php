
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//header.php"; ?>
    </head>
	<body>
      <?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//nav.php"; ?>
	  <div class="content">
	  	<h1>Welcome to REST Client Server Demo</h1>
		<p class="normal">Here you can learn about how to make REST server/client with DooPHP.</p>
		<p class="normal">Check out the links page for a list of URLs available in this demo. 
        Download Firefox <a href="https://addons.mozilla.org/firefox/addon/2691" class="file">Poster addon</a> for quick testing of POST/PUT/DELETE request.</p>
        <p class="normal">Download the <a class="file" href="http://doophp.com/download">source</a>.</p>
		
		<p class="boldy"><a name="extension_name" id="extension_name"></a>Test drive REST APIs built with DooPHP:</p>
        <pre>
# The code for the REST API is in RestServerController
# List all food in XML format
<a href="<?php echo $data['baseurl']; ?>index.php/api/food/list/all.xml">/api/food/list/all.xml</a>

# List all food in JSON format
<a href="<?php echo $data['baseurl']; ?>index.php/api/food/list/all.json">/api/food/list/all.json</a>

# List food by id(1-9) in XML format
<a href="<?php echo $data['baseurl']; ?>index.php/api/food/list/1.xml">/api/food/list/1.xml</a>

# List food by id(1-9) in JSON format
<a href="<?php echo $data['baseurl']; ?>index.php/api/food/list/1.json">/api/food/list/1.json</a>

# List food by id(1-9) in JSON format
<a href="<?php echo $data['baseurl']; ?>index.php/api/food/list/1.json">/api/food/list/1.json</a>

# Create new food and get result in JSON/XML format, (format is parsed from Accept header)
<a href="<?php echo $data['baseurl']; ?>index.php/api/food/create">/api/food/create</a>     - POST request

# Update food and get result in JSON/XML format, (format is parsed from Accept header)
<a href="<?php echo $data['baseurl']; ?>index.php/api/food/update">/api/food/update</a>     - PUT request

# Delete food and get result in JSON/XML format, (format is parsed from Accept header)
<a href="<?php echo $data['baseurl']; ?>index.php/api/food/delete/1">/api/food/delete/1</a>     - DELETE request


# Access a method that requires HTTP authentication
<a href="<?php echo $data['baseurl']; ?>index.php/api/admin/dostuff">/api/admin/dostuff</a>     - POST request
</pre>

		<p class="boldy"><a name="restful_routes" id="restful_routes"></a>Test drive client for the REST APIs above</p>
        <pre>
# The code for the REST client request is in RestClientController
# Request to the API /api/food/list/all.xml
<a href="<?php echo $data['baseurl']; ?>index.php/client/food/list/all.xml">/client/food/list/all.xml</a>

# Request to the API /api/food/list/all.json
<a href="<?php echo $data['baseurl']; ?>index.php/client/food/list/all.json">/client/food/list/all.json</a>

# Request to the API /api/food/list/1.json
<a href="<?php echo $data['baseurl']; ?>index.php/client/food/list/1.json">/client/food/list/1.json</a>

# Request to the API /api/food/list/1.xml
<a href="<?php echo $data['baseurl']; ?>index.php/client/food/list/1.xml">/client/food/list/1.xml</a>

# Request to the API /api/food/create
<a href="<?php echo $data['baseurl']; ?>index.php/client/food/new/Lamb Steak/steak/10 out of 10">/client/food/new/Lamb Steak/steak/10 out of 10</a>

# Request to the API /api/food/update
<a href="<?php echo $data['baseurl']; ?>index.php/client/food/edit/2/Lamb Steak/steak/10 out of 10">/client/food/edit/2/Lamb Steak/steak/10 out of 10</a>

# Request to the API /api/admin/dostuff
# authentication needed, change the username and password (admin=>1234)
<a href="<?php echo $data['baseurl']; ?>index.php/client/food/admin/:username/:password">/client/food/admin/:username/:password</a>

        </pre>
        
       <span class="totop"><a href="#top">BACK TO TOP</a></span>
	  </div>
	</body>
</html>