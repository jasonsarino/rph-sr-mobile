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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Blog
$route['blogs'] = 'manage_blogs';
$route['blogs/datatable'] = 'manage_blogs/datatable';
$route['blog/add-blog'] = 'manage_blogs/add';
$route['blog/edit-blog'] = 'manage_blogs/edit';
$route['blog/edit-blog/(:num)'] = 'manage_blogs/edit/$1';
$route['blog/delete-blog/(:num)'] = 'manage_blogs/delete_blog/$1';
$route['blog/categories'] = 'manage_blog_categories';
$route['blog/add-categories'] = 'manage_blog_categories/add';
$route['blog/edit-categories/(:num)'] = 'manage_blog_categories/edit/$1';
$route['summernote/media/add'] = 'media/summernote_upload_image';

// Events
$route['events'] = 'manage_events';
$route['events/datatable'] = 'manage_events/datatable';
$route['event/add-event'] = 'manage_events/add';
$route['event/edit-event'] = 'manage_events/edit';
$route['event/edit-event/(:num)'] = 'manage_events/edit/$1';
$route['event/delete-event/(:num)'] = 'manage_events/delete_event/$1';
$route['event/categories'] = 'manage_event_categories';
$route['event/add-categories'] = 'manage_event_categories/add';
$route['event/edit-categories/(:num)'] = 'manage_event_categories/edit/$1';

// Sales Reports
$route['sales_report/broker/pending'] = 'pending_sales_report';
$route['sales_report/broker/approved'] = 'approved_sales_report';


// API
$route['api/user/demo'] = 'api/v1/api_test/demo';
$route['api/user/login'] = 'api/v1/api_test/login';
$route['api/user/view'] = 'api/v1/api_test/view';

$route['api/v1/login'] = 'api/v1/login/validate';


// $route['user/(:any)'] = 'frontend/pages/view_user_profile/$1';
// $route['user/(:num)'] = 'frontend/pages/view_user_profile/$1';