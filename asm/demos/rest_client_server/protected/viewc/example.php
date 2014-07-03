
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <?php include "header.php"; ?>
    </head>
	<body>
      <?php include "nav.php"; ?>
      <div class="content">
	  	<h1>Example of RESTful features in DooPHP</h1>
		<p class="normal">It is very easy to implement your own REST API.
        What you have to do is just to define the routes with the request method you want it to be accessed</p>
        <p class="normal">It is best that you know more on <a href="http://apiwiki.twitter.com/HTTP-Response-Codes-and-Errors" class="file">HTTP status code</a>.
         and take some popular RESTful web services like <a href="http://apiwiki.twitter.com/Twitter-API-Documentation" class="file">Twitter</a> as example.</p>
        <pre>
<span style="color:yellow"># simply assign routes and define the desire Request method</span>
$route['get']['/api/food/list/all.xml'] = array('RestServerController', 'listFood_xml');  //get only
$route['post']['/api/food/create'] = array('RestServerController', 'createFood');         //post only
$route['put']['/api/food/update'] = array('RestServerController', 'updateFood');         //put only
$route['delete']['/api/food/delete/:id'] = array('RestServerController', 'deleteFood');  //delete only
        </pre>
<br/><p class="boldy"><a id="controller_feature" name="controller_feature"></a>Useful Features in Controller</p>
        <p class="normal">If you want to support various data format for your RESTful API, you can either use <span class="boldy">$this->extension</span> or <span class="boldy">$this->accept_type()</span> to determine what format the client is requesting.
         <p class="normal">The difference between $extension and accept_type is that, <span class="boldy">$extension</span> is get from the extension set in the routes config while <span class="boldy">accept_type()</span> should be used if the client is issueing an Accept header for the desired format.
         $extension returns the extension with a dot in front '.json' while accept_type() returns just the extension name 'json'.</p>
        </p>
        <pre>
<span style="color:yellow"># For a static route like this you don't have to use $this->extension as you can simply direct it to a method</span>
$route['get']['/api/food/list/all.xml'] = array('RestServerController', 'listFood_xml');

<span style="color:yellow"># For dynamic routes you've to define the extension option
# in the Controller you can verity $this->extension and output the result format accordingly</span>
$route['*']['/api/food/list/:id'] = array('RestServerController', 'listFoodById',
                                          'match'=>array('id'=>'/^\d+$/'),
                                          'extension'=>array('.json','.xml')
                                    );

<span style="color:yellow"># Something like this would be best to $this->accept_type() to get the requested format
# while the client can send an Accept header: header("Accept: application/json");
# in the Server method you call $this->accept_type() and you will get 'json'</span>
$route['post']['/api/food/create'] = array('RestServerController', 'createFood');

<span style="color:yellow"># when you are outputing the results, you might want to specify a header on what format is return
# instead of doing header("Content-type: application/xml;"); you can do</span>
$this->setContentType('xml');
echo $xmldata;

<span style="color:yellow">#if you need to specify the Charset along with the data, simply</span>
$this->setContentType('xml', 'utf-8');

<span style="color:yellow">#if your application supports multilanguage, you can get the client's desired language</span>
$this->language()       // this returns lang code such as 'en', 'cn', 'fr'
$this->language(true)   // this returns lang code with the country code, 'en-US'

<span style="color:yellow"># you can authenticate your API method with DooDigestAuth class, or define in the routes</span>
$users['doophp'] = '1234';
$users['demo'] = 'demo';
$this->load()->core('auth/DooDigestAuth');
$username = DooDigestAuth::http_auth('Food Api Admin', $users, 'Failed to login!');
echo 'You are login now. Welcome, ' . $username;

<span style="color:yellow"># in a GET/POST request API, you can get variables from $_GET & $_POST
# BUT, there's no $_PUT in PHP, instead you use  $this->puts</span>
echo  $this->puts['type'];
echo  $this->puts['food'];

        </pre>

<br/><p class="boldy"><a id="doo_rest_client" name="doo_rest_client"></a>DooRestClient Usage</p>
        <p class="normal">DooRestClient is a REST client to make requests to 3rd party RESTful web services such as Twitter. It wraps around CURL and supports method chaining for shorter code.</p>
<p class="normal">Example usage</p>
<pre>
<span style="color:yellow"># make a GET request to Twitter</span>
$this->load()->helper('DooRestClient');
$client = new DooRestClient;
$client->connect_to('http://search.twitter.com/trends/daily.json')
$client->get();

if($client->isSuccess()){
    print_r( $client->resultCode() );
    print_r( $client->resultContentType() );
    print_r( $client->result() );
}

<span style="color:yellow"># for different Request type use</span>
$client->get();
$client->post();
$client->put();
$client->delete();
$client->execute('get');
</pre>

<p class="normal">Make your code shorter!</p>
<pre>
<span style="color:yellow"># method chaining</span>
$this->load()->helper('DooRestClient');
$client = new DooRestClient;
$client->connect_to('http://search.twitter.com/trends/daily.json')->get();

<span style="color:yellow"># Or even...</span>
$this->load()->helper('DooRestClient', true)
     ->connect_to('http://search.twitter.com/trends/daily.json')
     ->get();

<span style="color:yellow"># It's the same</span>
Doo::loadHelper('DooRestClient', true)
     ->connect_to('http://search.twitter.com/trends/daily.json')
     ->get();

</pre>

<p class="normal">Pass in options, data, accept format type, authentication.</p>
<pre>
<span style="color:yellow"># some random example...</span>
$client->connect_to( 'http://someapi.com/api/method' )
       ->options(array('SSL_VERIFYPEER'=>false))
       ->auth('username', 'password')
       ->accept(DooRestClient::XML)
       ->data( array() )
       ->post();

<span style="color:yellow"># Twitter Status update example, Basic auth, need to pass in True in auth()</span>
$client = $this->load()->helper('DooRestClient', true)
                        ->connect_to("http://twitter.com/statuses/update.xml")
                        ->auth('username', 'password', true)
                        ->data( array('status'=>'Some message with DooPHP') )
                        ->post();

<span style="color:yellow"># You can retrieve the data by calling the methods without params</span>
print_r( $client->data() );
print_r( $client->auth() );
print_r( $client->accept() );
</pre>

       <span class="totop"><a href="#top">BACK TO TOP</a></span>  
       </div>
	</body>
</html>
