<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']    = 'welcome';
$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;

//Dashboard Lisks
$route['dashboard/login']                   =   'dashboard/LoginController';
$route['dashboard/login-access']            =   'dashboard/LoginController/loginAccountAccess';
$route['dashboard/registeraccout']          =   'dashboard/LoginController/registerAccount';
$route['dashboard/register-save']           =   'dashboard/LoginController/saveRegisterAccount';
$route['dashboard/forgetpassword']          =   'dashboard/LoginController/forgetPassword';
$route['dashboard/forgetpassword-save']     =   'dashboard/LoginController/saveForgetPassword';
$route['account/resetpassword/:num/reset']  =   'dashboard/LoginController/resetForgetPassword';
$route['account/resetpassword-save']        =   'dashboard/LoginController/saveResetPassword';
$route['dashboard/logout']                  =   'dashboard/LoginController/logoutAccount';


$route['admin/dashboard']                   =   'dashboard/DashboardController';
$route['admin/dashboard/sitedetails']       =   'dashboard/SitedetailsController';