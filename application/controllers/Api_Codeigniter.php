<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Api_Codeigniter extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Model_default');
	}

	public function index_get($data=NULL)
	{
		$data = $this->Model_default->select_data('users',array('status'=>1));
		$this->response($data, REST_Controller::HTTP_OK);
	}
}
