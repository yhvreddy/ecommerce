<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'controllers/DefaultController.php';

class WebsiteController extends DefaultController 
{

    /*
    *   Global Assign values or argiments in constructer
    * */
	public function __construct()
	{
        parent::__construct();
		$this->load->model('WebsiteModel');
	}

    
}
