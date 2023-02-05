<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



// $route['default_controller'] = "site/homepage";
$route['default_controller'] = "home/educator";
// $route['restaurant/(:any)'] = "restaurant/restaurantkeyword/$1";

$route['educator'] = "home/educator";

$route['Content/(:any)/(:any)'] = "content/contentpage/$1/$2";//$1 is menu name just for display
$route['explore/(:any)'] = "content/explorepage/$1";//$1 is menu name just for display
$route['online/(:any)'] = "content/explorepage/$1";//$1 is menu name just for display
//$route['Content'] = "content/test";//$1 is menu name just for display

//$route['Blog'] = "home/blog";
//$route['Blog-Details/(:any)'] = "home/blog_details/$1";

$route['Blog'] = "blog/blog";
$route['Blogs/(:any)'] = "blog/blog_details/$1";
$route['Category'] = "blog/blog_cate";

$route['login'] = "auth";
$route['forgotpass'] = "auth/fpass";
$route['register'] = "auth/register";
$route['myregister/(:any)'] = "auth/myregister/$1";
$route['joinmentor/(:any)'] = "auth/joinmentor/$1";
$route['privacy-policy'] = "contact/pr_pv";
$route['terms'] = "contact/tnc";
$route['about'] = "contact/about";
$route['whyinfidust'] = "contact/whyinfidust";
$route['solution'] = "contact/solution";
$route['pricing'] = "contact/pricing";


$route['institue_panel'] = "dashboard/institue";
$route['student_panel'] = "student/student_panel";
$route['teacher_panel'] = "teacher/teacher_panel";
$route['admin_panel'] = "company/admin_panel";

$route['watchm'] = "watch/watchm";

$route['institue/(:any)'] = "institute/institue_srch/$1";

$route['contact'] = "contact";
$route['Billing'] = "billing";

$route['Dashboard'] = "dashboard/dashbord";
$route['Dashboard/dashboardpage'] = "dashboard/dashboardpage";


$route['admin20'] = "auth/admin";
$route['makesitem/(:any)'] = "makesitem/makes/$1";

$route['institute/(:any)'] = "publicsrch/instidashbord/$1";
$route['testpaper/(:any)'] = "publicsrch/testdashbord/$1";
$route['material/(:any)'] = "publicsrch/matdashbord/$1";

//$route['sample'] = "home/smple";


//$route['(:any)'] = "content/explorepage/$1";



$route['404_override'] = '';
