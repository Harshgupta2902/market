<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Ipo';
$route['404_override'] = 'Ipo/error';
$route['translate_uri_dashes'] = FALSE;


// ///////////        IPO Routes     //////////////////////
$route['Ipo'] = 'Ipo';
$route['upcomingIpo'] = 'Ipo/upcomingIpo';
$route['greyMarketIpo'] = 'Ipo/greyMarketIpo';
$route['smeMarketIpo'] = 'Ipo/smeMarketIpo';
$route['subscriptionStatus'] = 'Ipo/subscriptionStatus';
$route['ipoForms'] = 'Ipo/ipoForms';
$route['sharesBuyBack'] = 'Ipo/sharesBuyBack';



// ///////////        Crypto Routes     //////////////////////
$route['Crypto'] = 'Crypto';
$route['screener'] = 'Crypto/screener';
$route['symbols'] = 'Crypto/symbols';



// ///////////        Ifsc Routes     //////////////////////
$route['Ifsc'] = 'Ifsc/home';
$route['search'] = 'Ifsc/search';



// ///////////        Pincode Routes     //////////////////////
$route['Pincode'] = 'Pincode/home';
$route['find'] = 'Pincode/search';
$route['details'] = 'Pincode/details';



// ///////////        Calculator Routes     //////////////////////
$route['sip_calculator'] = 'Tools/sip_calculator';
$route['calculate_sip'] = 'Tools/calculate_sip';
$route['lumpsum_calculator'] = 'Tools/lumpsum_calculator';
$route['calculate_lumpsum'] = 'Tools/calculate_lumpsum';




// ///////////        Admin Panel Routes     //////////////////////
$route['process_login'] = 'Admin/process_login';
$route['login'] = 'Admin/login';
$route['dashboard'] = 'Admin/dashboard';
$route['addnavbarform'] = 'Admin/addnavbarform';
$route['allnavs'] = 'Admin/allnavs';
$route['addseodetails'] = 'Admin/addseodetails';
$route['seolist'] = 'Admin/seolist';
$route['pageview'] = 'Admin/pageview';
$route['ipolist'] = 'Admin/ipolist';
$route['scrap'] = 'Admin/scrap';
$route['allblogs'] = 'Admin/allblogs';
$route['addblogs'] = 'Admin/addblogs';
$route['createPost'] = 'Admin/createPost';




// ///////////        Blogs Routes     //////////////////////
$route['blogs/(:any)'] = 'Blog/index/$1';
$route['blogs'] = 'Blog/blogs';
