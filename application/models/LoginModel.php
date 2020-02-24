<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'models/ModelDefault.php';
class LoginModel extends ModelDefault{
    
    public function __construct() {
        parent::__construct();
    }

    public function saveRegisterData($data)
    {
        $insert = $this->insert_data('admins',$data);
        return $insert;
    }

    public function loginAdminAccount(){
        $account = $this->select_data('admins',array('type'=>1));
        return count($account);
    }
    
    public function checkLoginId($login_id)
    {
        $checkLoginId = $this->select_data('admins',array('mail_id'=>$login_id,'status'=>1));
        return $checkLoginId; 
    }

    public function forgetRequestsave($data)
    {
        $insert = $this->insert_data('forget_password',$data);
        return $insert;
    }

    public function checkUserResettoken($token)
    {
        $update = $this->update_data('forget_password',array('status'=>1),array('reset_token'=>$token));
        return $update;
    }

    public function updateForgetPassword($updatepassword,$conduction){
        $update = $this->update_data('admins',$updatepassword,$conduction);
        return $update;
    }

}
