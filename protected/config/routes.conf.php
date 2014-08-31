<?php
/**
 * Define your URI routes here.
 *
 * $route[Request Method][Uri] = array( Controller class, action method, other options, etc. )
 *
 * RESTful api support, *=any request method, GET PUT POST DELETE
 * POST 	Create
 * GET      Read
 * PUT      Update, Create
 * DELETE 	Delete
 *
 * Use lowercase for Request Method
 *
 * If you have your controller file name different from its class name, eg. home.php HomeController
 * $route['*']['/'] = array('home', 'index', 'className'=>'HomeController');
 * 
 * If you need to reverse generate URL based on route ID with DooUrlBuilder in template view, please defined the id along with the routes
 * $route['*']['/'] = array('HomeController', 'index', 'id'=>'home');
 *
 * If you need dynamic routes on root domain, such as http://facebook.com/username
 * Use the key 'root':  $route['*']['root']['/:username'] = array('UserController', 'showProfile');
 *
 * If you need to catch unlimited parameters at the end of the url, eg. http://localhost/paramA/paramB/param1/param2/param.../.../..
 * Use the key 'catchall': $route['*']['catchall']['/:first'] = array('TestController', 'showAllParams');
 * 
 * If you have placed your controllers in a sub folder, eg. /protected/admin/EditStuffController.php
 * $route['*']['/'] = array('admin/EditStuffController', 'action');
 * 
 * If you want a module to be publicly accessed (without using Doo::app()->getModule() ) , use [module name] ,   eg. /protected/module/forum/PostController.php
 * $route['*']['/'] = array('[forum]PostController', 'action');
 * 
 * If you create subfolders in a module,  eg. /protected/module/forum/post/ListController.php, the module here is forum, subfolder is post
 * $route['*']['/'] = array('[forum]post/PostController', 'action');
 *
 * Aliasing give you an option to access the action method/controller through a different URL. This is useful when you need a different url than the controller class name.
 * For instance, you have a ClientController::new() . By default, you can access via http://localhost/client/new
 * 
 * $route['autoroute_alias']['/customer'] = 'ClientController';
 * $route['autoroute_alias']['/company/client'] = 'ClientController';
 * 
 * With the definition above, it allows user to access the same controller::method with the following URLs:
 * http://localhost/company/client/new
 *
 * To define alias for a Controller inside a module, you may use an array:
 * $route['autoroute_alias']['/customer'] = array('controller'=>'ClientController', 'module'=>'example');
 * $route['autoroute_alias']['/company/client'] = array('controller'=>'ClientController', 'module'=>'example');
 *
 * Auto routes can be accessed via URL pattern: http://domain.com/controller/method
 * If you have a camel case method listAllUser(), it can be accessed via http://domain.com/controller/listAllUser or http://domain.com/controller/list-all-user
 * In any case you want to control auto route to be accessed ONLY via dashed URL (list-all-user)
 *
 * $route['autoroute_force_dash'] = true;	//setting this to false or not defining it will keep auto routes accessible with the 2 URLs.
 *
 */
// $route['autoroute_force_dash'] = true;
$route['*']['/'] = array('MainController', 'index');
$route['*']['/err/login'] = array('ErrorController','login');
$route['*']['/error'] = array('ErrorController', 'index');

$route['*']['/rooms'] = array('RoomsController','index');

$route['*']['/settings'] = array('SettingsController','index');
$route['*']['/settings/getUsers'] = array('SettingsController','getUsers');

$route['*']['/components'] = array('ComponentsController','index');
$route['*']['/components/getComponents'] = array('ComponentsController','getComponents');
$route['*']['/rooms/getRoomComponents'] = array('RoomsController','getRoomComponents');
$route['*']['/components/getDistributor/'] = array('ComponentsController','getDistributor');
$route['*']['/components/getRooms'] = array('ComponentsController','getRooms');
$route['*']['/components/insertComponentType/:K_Art_Bezeichnung'] = array('ComponentsController','insertComponentType');
$route['*']['/components/insertComponents/:K_Name/:K_Art/:K_Einkaufsdatum/:K_Hersteller/:K_Gewaehrleistung/:L_ID/:R_ID'] = array('ComponentsController','insertComponents');


$route['*']['/distributor'] = array('DistributorController','index');
$route['*']['/distributor/getDistributor'] = array('DistributorController','getDistributor');
$route['*']['/distributor/insertDistributor/:L_Name/:L_Strasse_Nr/:L_Plz/:L_Ort/:L_Telefon/:L_Fax/:L_Mail'] = array('DistributorController','insertDistributor');

$route['*']['/rooms'] = array('RoomsController','index');
$route['*']['/rooms/getRoomInfo/:id'] = array('RoomsController','getRoomInfo');
$route['*']['/rooms/getRoomComponents/:name'] = array('RoomsController','getRoomComponents');

$route['*']['/login/:user/:pass'] = array('AuthController','login');


/**
@TODO: remember how this should work
$route['*']['/classinfo'] = array('ClassInfoController',
**/

//---------- Delete if not needed ------------
$admin = array('admin'=>'1234');

//view the logs and profiles XML, filename = db.profile, log, trace.log, profile
$route['*']['/debug/:filename'] = array('MainController', 'debug', 'authName'=>'DooPHP Admin', 'auth'=>$admin, 'authFail'=>'Unauthorized!');

//show all urls in app
$route['*']['/allurl'] = array('MainController', 'allurl', 'authName'=>'DooPHP Admin', 'auth'=>$admin, 'authFail'=>'Unauthorized!');

//generate routes file. This replace the current routes.conf.php. Use with the sitemap tool.
$route['post']['/gen_sitemap'] = array('MainController', 'gen_sitemap', 'authName'=>'DooPHP Admin', 'auth'=>$admin, 'authFail'=>'Unauthorized!');

//generate routes & controllers. Use with the sitemap tool.
$route['post']['/gen_sitemap_controller'] = array('MainController', 'gen_sitemap_controller', 'authName'=>'DooPHP Admin', 'auth'=>$admin, 'authFail'=>'Unauthorized!');

//generate Controllers automatically
$route['*']['/gen_site'] = array('MainController', 'gen_site', 'authName'=>'DooPHP Admin', 'auth'=>$admin, 'authFail'=>'Unauthorized!');

//generate Models automatically
$route['*']['/gen_model'] = array('MainController', 'gen_model', 'authName'=>'DooPHP Admin', 'auth'=>$admin, 'authFail'=>'Unauthorized!');


?>