<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'controllers/DefaultController.php';

class DashboardController extends DefaultController 
{

    /*
    *   Global Assign values or argiments in constructer
    * */
	public function __construct()
	{
        parent::__construct();
        $this->isAdminLoggedIn();
        $this->users = $this->logindetails();
	}

    
    public function index(){
        $data['page_title'] =   'Welcome Dashboard';
        $this->load->view('dashboard/dashboard',$data);
    }
    

    
}
