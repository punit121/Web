<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
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

//changes in main page
$route['default_controller'] = "dashboard";
$route['404_override'] = 'error/error_404';
// User Dashboard Pages
//$route['(:any)'] = 'users/userprofile/$1';
$route[''] = 'dashboard';
//$route['dashboard'] = 'users/redirect_dashboard';
$route['contactus'] = 'users/contact';
$route['postdraft/(:any)'] = 'users/postdraft/$1';
$route['postschedule/(:any)'] = 'users/postschedule/$1';
$route['register'] = "/auth/register";
$route['logout'] = "auth/logout";
$route['postview/(:any)/(:any)'] = 'users/viewpost/$2';

//user profile of requested person
$route['userprofile/(:any)'] = 'users/userprofile/$1';
$route['user_feeds/(:any)'] = 'dashboard/user_feeds/$1';

/** Bookmarking * */
$route['mybookmarks/(:any)'] = 'users/mybookmarks/$1';

/** view video */
$route['postviewvideo/(:any)/(:any)'] = 'users/viewvideo/$2';


/** view editorial * */
$route['postvieweditorial/(:any)/(:any)'] = 'users/postviewedt/$2';

/** post video * */
$route['postvideo/(:any)'] = 'users/postvideo/$1';


/** post editorial * */
/** post editorial * */
$route['posteditorial/(:any)'] = 'dashboard/editorial_form/$1';
$route['posteditorial/(:any)/(:any)'] = 'dashboard/editorial_form/$1/$2';
$route['posteditorial/(:any)/(:any)/(:num)'] = 'dashboard/editorial_form/$1/$2/$3';
//$route['posteditorial/(:any)'] = 'users/posteditorial/$1';
$route['posteditorialboard/(:any)'] = 'users/posteditorialboad/$1';

$route['friends/(:any)'] = 'users/friendslist/$1';
$route['search/(:any)'] = 'users/search/$1';
$route['friends/(:any)'] = 'users/friendslist/$1';

/** edit post * */
$route['postedit/(:any)'] = 'users/postviewedit1/$1';
$route['postedit2/(:any)'] = 'users/postviewedit2/$1';
$route['deletepost/(:any)'] = 'users/deletepost/$1';


$route['postedit3/(:any)'] = 'users/postviewedted/$1';
$route['allcategory'] = 'users/categorylist';
$route['alluser'] = 'users/userlist';
$route['allboard/(:any)']='users/boardlist/$1';
$route['confirmsignup'] = 'users/confirmsignup';

// depreciated routes for depedency removal system
$route['postvertualstory/(:any)'] = 'users/postvertualstory/$1';
$route['poststoryboard/(:any)'] = 'users/poststoryboard/$1';

// Category Controller pages
//
//any one category
$route['category/(:any)'] = 'users/category/$1';
$route['category_feeds/(:any)'] = 'dashboard/category_feeds/$1';
//several categories
$route['categories/(:any)/(:any)'] = 'users/categorytopic/$1/$2';
$route['categoriess/(:any)/(:any)'] = 'users/categoryuser/$1/$2';

$route['board/(:any)'] = 'users/boardview/$1';
$route['boards/(:any)/(:any)'] = 'users/boardviews/$1/$2';

$route['category/(:any)/(:any)'] = 'category/topic/$1/$2';

$route['translate_uri_dashes'] = FALSE;


/* * --------dashboard features ---------- */
$route['poststory/(:any)'] = 'dashboard/photostory_form/$1';
$route['poststory/(:any)/(:any)'] = 'dashboard/photostory_form/$1/$2';
$route['poststory/(:any)/(:any)/(:num)'] = 'dashboard/photostory_form/$1/$2/$3';
$route['photostory/submit'] = 'dashboard/photostory_submit';
$route['upload_pic/photostory'] = 'uploader/photostory_pic_uploader';

//following
$route['follow_category'] = 'dashboard/follow_category';
$route['follow_user'] = 'dashboard/follow_user';

//feeds
$route['fetch_feeds/(:any)'] = 'dashboard/custom_feeds/$1';
//confirm the user custom feed input has been done
$route['custom_feed_input_confirm'] = 'dashboard/custom_feed_input_confirm';


//editorial
$route['upload_pic/editorial'] = 'uploader/photostory_pic_uploader';
//form submission
$route['editorialsubmit'] = 'dashboard/editorial_submit';
