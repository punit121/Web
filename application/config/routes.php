<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "users";
// User Dashboard Pages 

//$route['(:any)'] = 'users/userprofile/$1';
$route['']='users/dashboard';
$route['dashboard']='users/dashboard';
$route['postdraft/(:any)']='users/postdraft/$1';
$route['postschedule/(:any)']='users/postschedule/$1';
$route['register'] = "/auth/register";
$route['logout'] = "auth/logout";
$route['postview/(:any)/(:any)']='users/viewpost/$2';
$route['userprofile/(:any)']= 'users/userprofile/$1';
$route['friends/(:any)']= 'users/friendslist/$1';
$route['search/(:any)']= 'users/search/$1';
$route['friends/(:any)']= 'users/friendslist/$1';
$route['postvertualstory/(:any)']= 'users/postvertualstory/$1';
$route['poststoryboard/(:any)']= 'users/poststoryboard/$1';
$route['posteditorial/(:any)']= 'users/posteditorial/$1';
$route['posteditorialboard/(:any)']= 'users/posteditorialboad/$1';
$route['postedit/(:any)']= 'users/postviewedit1/$1';
$route['postedit2/(:any)']= 'users/postviewedit2/$1';
$route['deletepost/(:any)']= 'users/deletepost/$1';

$route['postvieweditorial/(:any)']= 'users/postviewedt/$1';
$route['postedit3/(:any)']= 'users/postviewedted/$1';
$route['allcategory']= 'users/categorylist';
$route['alluser']= 'users/userlist';
$route['confirmsignup']= 'users/confirmsignup';

// Category Controller pages

$route['category/(:any)'] = 'users/category/$1';
$route['categories/(:any)/(:any)'] = 'users/categorytopic/$1/$2';
$route['categoriess/(:any)/(:any)'] = 'users/categoryuser/$1/$2';

$route['board/(:any)'] = 'users/boardview/$1';
$route['boards/(:any)/(:any)'] = 'users/boardviews/$1/$2';

$route['category/(:any)/(:any)'] = 'category/topic/$1/$2';

$route['translate_uri_dashes'] = FALSE;

$route['photostory/form'] = 'Dashboard/photostory_form';
$route['photostory/submit'] = 'Dashboard/photostory_submit';
$route['upload_pic/photostory'] = 'Uploader/photostory_pic_uploader';