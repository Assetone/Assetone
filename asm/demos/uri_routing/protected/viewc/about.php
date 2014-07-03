
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <?php include "header.php"; ?>
    </head>
	<body>
      <?php include "nav.php"; ?>
	  <div class="content">
	  	<h1>Welcome to URI Demo Home</h1>
		<p class="normal">Here you can test and learn about the handling of URI routes in Doo framework.</p>
		<p class="normal">Check out the links page for a list of URLs available in this demo. All links can be accessed with or without 'index.php'.</p>
        <p class="normal">See the routes.conf.php source.</p>
		<p class="boldy"><a name="auto_routing" id="auto_routing"></a>Test drive Auto routing:</p>
        <pre>
# There is a controller called HelloController
# The controller has 3 methods index, walao, sayhi
<a href="<?php echo $data['baseurl']; ?>index.php/hello">/hello</a>
<a href="<?php echo $data['baseurl']; ?>index.php/hello/walao">/hello/walao</a>
<a href="<?php echo $data['baseurl']; ?>index.php/hello/sayhi/doophp">/hello/sayhi/doophp</a>

# Get variables can be used as well
<a href="<?php echo $data['baseurl']; ?>index.php/hello/sayhi/doophp/?title=Mr.">/hello/sayhi/doophp/?title=Mr.</a>

# Camel case in auto routes, CamelCaseController
<a href="<?php echo $data['baseurl']; ?>index.php/camel-case">/camel-case</a>
<a href="<?php echo $data['baseurl']; ?>index.php/camel-case/moo">/camel-case/moo</a>

        </pre>

		<p class="boldy"><a name="extension_name" id="extension_name"></a>Test drive Extension name:</p>
        <pre>
# There is a controller called SimpleController
# The controller has 1 methods simple()
<a href="<?php echo $data['baseurl']; ?>index.php/simple">/simple</a>
<a href="<?php echo $data['baseurl']; ?>index.php/simple.html">/simple.html</a>
<a href="<?php echo $data['baseurl']; ?>index.php/simple.json">/simple.json</a>
<a href="<?php echo $data['baseurl']; ?>index.php/simple.rss">/simple.rss</a>

# Dynamic routes defined as
$route['*']['/simple/:pagename']

# Call $this->extension to get the extension name.
<a href="<?php echo $data['baseurl']; ?>index.php/simple/superpage.json">/simple/superpage.json</a>
<a href="<?php echo $data['baseurl']; ?>index.php/simple/some page.rss">/simple/some page.rss</a>
<a href="<?php echo $data['baseurl']; ?>index.php/simple/only_xml/pagename.xml">/simple/only_xml/pagename.xml</a>  - This route only support .xml
        </pre>

		<p class="boldy"><a name="restful_routes" id="restful_routes"></a>Test drive RESTful routes</p>
        <pre>
# You might want to use Firefox Poster addon for a quick test.
<a href="<?php echo $data['baseurl']; ?>index.php/api/food/list/1.json">/api/food/list/1.json</a>  -  GET return result in Json format
<a href="<?php echo $data['baseurl']; ?>index.php/api/food/list/1.xml">/api/food/list/1.xml</a>  -  GET return result in Xml format
<a href="<?php echo $data['baseurl']; ?>index.php/api/food/create">/api/food/create</a>  -  POST request, post variable to test
<a href="<?php echo $data['baseurl']; ?>index.php/api/food/update">/api/food/update</a>  - PUT request, send a PUT request to test
<a href="<?php echo $data['baseurl']; ?>index.php/api/food/delete/1">/api/food/delete/1</a> - DELETE request, send a DELETE request to test
        </pre>

		<p class="boldy"><a name="redirection" id="redirection"></a>Test drive Redirection</p>
        <pre>
// here's how you do redirection to an existing route internally
// http status code is optional, default 302 Moved Temporarily
<a href="<?php echo $data['baseurl']; ?>index.php/about">/about</a>
<a href="<?php echo $data['baseurl']; ?>index.php/home">/home</a>

// redirect to http://doophp.com
<a href="<?php echo $data['baseurl']; ?>index.php/doophp">/doophp</a>

// If you have tamper data FF addon, you can see a 301 status is issued instead of 302
<a href="<?php echo $data['baseurl']; ?>index.php/easier">/easier</a>
        </pre>

		<p class="boldy"><a name="authentication" id="authentication"></a>Test drive routes with Authentication</p>
        <pre>
// Http digest auth and subfolder example.
// the Admin controller is in a subfolder 'admin'
// it is easier to manage controller files with Doophp
<a href="<?php echo $data['baseurl']; ?>index.php/admin">/admin</a>
# Login with 'admin'=>'1234' or 'demo'=>'abc'
        </pre>

		<p class="boldy"><a name="matching_routes" id="matching_routes"></a>Matching parameters in routes</p>
        <pre>
// You can match a parameter's value against a pattern
// If not matched it will throw up 404 error.
<a href="<?php echo $data['baseurl']; ?>index.php/news/2009/07">/news/2009/07</a>

// Values that do not match
<a href="<?php echo $data['baseurl']; ?>index.php/news/10009/aa">/news/10009/aa</a>

/**
 * The matching pattern
 * year   ^\d{4}$
 * month  ^\d{2}$
 */
        </pre>


		<p class="boldy"><a name="identical_routes" id="identical_routes"></a>Almost identical routes</p>
        <pre>
//almost identical routes examples, must assigned a matching pattern to the parameters
//if no pattern is assigned, it will match the route defined first.

# this show news by id
<a href="<?php echo $data['baseurl']; ?>index.php/news/88">/news/88</a>

# this show news by title
<a href="<?php echo $data['baseurl']; ?>index.php/news/doophp is great">/news/doophp is great</a>

/**
 * The matching pattern
 * id   ^\d+$
 * title  [a-z0-9]+
 */
        </pre>
        
       <span class="totop"><a href="#top">BACK TO TOP</a></span>
	  </div>
	</body>
</html>