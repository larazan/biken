<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'homes';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['shop'] = 'Homes/shopList';
$route['product-details/product-a'] = 'Homes/productDetails';
// $route['cart'] = 'Homes/cartList';
$route['checkout/product-a'] = 'Homes/checkout';

//standard
$route['homes-standard'] = 'Homes/standard';
$route['electro/(:any)'] = 'Homes/detailsStandard/$1';
$route['shop/(:any)'] = 'Homes/storeStandard/$1';

//medium
$route['homes-medium'] = 'Homes/medium';
$route['shoplist/(:any)'] = 'Homes/storeMedium/$1';
$route['electros/(:any)'] = 'Homes/detailsMedium/$1';
$route['mycart'] = 'Homes/cartMedium';
$route['ordercheckout'] = 'Homes/checkoutMedium';
$route['login'] = 'Account';
$route['register'] = 'Account/register';
$route['reset'] = 'Account/forgotPassword';
$route['myprofile/dashboard'] = 'Dashboard';
$route['myprofile/profiles'] = 'Dashboard/profiles';
$route['myprofile/transaction'] = 'Dashboard/transaction';
$route['thankyou'] = 'Dashboard/thankyou';

$route['checkout/(:any)'] = "cart/checkout/$1";
