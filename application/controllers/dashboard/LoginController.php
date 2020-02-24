<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'controllers/DefaultController.php';

class LoginController extends DefaultController 
{

    /*
    *   Global Assign values or argiments in constructer
    * */
	public function __construct()
	{
        parent::__construct();
		$this->load->model('LoginModel');
	}

    //Login account
    public function index(){
        $session = $this->session->userdata();
        if(isset($session['admin']) && $session['admin']['isAdminLogin'] == TRUE)
        {
            redirect(base_url('admin/dashboard'));
        }
        else
        {
            $data['page_title'] =   'Dashboard Login';
            $data['adminAccount']   =   $this->LoginModel->loginAdminAccount();
            $this->load->view('dashboard/login',$data);
        }
        
    }

    //Login Access account
    public function loginAccountAccess()
    {
        extract($_REQUEST);
        $this->form_validation->set_rules('login_id', 'Login Id', 'trim|required|valid_email');
        $this->form_validation->set_rules('login_password', 'Login Password', 'trim|required|min_length[6]');
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $loginIdresponce = $this->LoginModel->checkLoginId($login_id);
            if(count($loginIdresponce) != 0)
            {
                if(password_verify($login_password, $loginIdresponce[0]->password))
                {
                    if($loginIdresponce[0]->type == 1)
                    {
                        $loginuser = array('isAdminLogin' => TRUE,'login_id' => $loginIdresponce[0]->id,'login_id' => $loginIdresponce[0]->id,'login_name'=>$loginIdresponce[0]->name);
                        $this->session->set_userdata('admin',$loginuser);
                        $this->session->set_flashdata('success','Welcome '.$loginIdresponce[0]->name);
                        redirect(base_url('admin/dashboard'));
                    }
                    else
                    {
                        $loginuser = array('isAdminLogin' => TRUE,'login_id' => $loginIdresponce[0]->id,'login_id' => $loginIdresponce[0]->id,'login_name'=>$loginIdresponce[0]->name);
                        $this->session->set_userdata('admin',$loginuser);
                        $this->session->set_flashdata('success','Welcome '.$loginIdresponce[0]->name);
                        redirect(base_url('admin/dashboard'));
                    }
                }
                else
                {
                    $this->session->set_flashdata('failed','Invalid Login Password.');
                    redirect(base_url('dashboard/login'));
                }
            }
            else
            {
                $this->session->set_flashdata('failed','Invalid Login Id.');
                redirect(base_url('dashboard/login'));
            }
            
        }
    }
    
    //register account
    public function registerAccount(){
        $data['page_title'] =   'Dashboard Register Account';
        $this->load->view('dashboard/registeraccount',$data);
    }

    //save register account data
    public function saveRegisterAccount(){
        extract($_REQUEST);
        $this->form_validation->set_rules('reg_name', 'Name', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('reg_password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('reg_mobile', 'Mobile', 'numeric|trim|required|min_length[10]|is_unique[ecom_admins.mobile]');
        $this->form_validation->set_rules('reg_email', 'Email', 'trim|required|valid_email|is_unique[ecom_admins.mail_id]');
        if($this->form_validation->run() == FALSE)
        {
            // $this->session->set_flashdata('failed','Unable to register. Please try again or later.!');
            // redirect(base_url('dashboard/registeraccout'));    
            $this->registerAccount();
        }
        else
        {
            $password = password_hash($reg_password, PASSWORD_DEFAULT);
            $registerdata = array('name' => $reg_name,'mobile' => $reg_mobile,'mail_id' => $reg_email,'type' => 1,'password' => $password);
            $responce = $this->LoginModel->saveRegisterData($registerdata);
            if($responce != 0)
            {
                $this->session->set_flashdata('success','You have successfully register..!');
                redirect(base_url('dashboard/login'));
            }
            else
            {
                $this->session->set_flashdata('failed','You have failed to register. Please try again or later.!');
                redirect(base_url('dashboard/registeraccout'));
            }
            
        }
    }

    //Forget Password
    public function forgetPassword(){
        $data['page_title'] =   'Dashboard Forget Password';
        $this->load->view('dashboard/forgetpassword',$data);
    }

    public function saveForgetPassword(){
        extract($_REQUEST);
        $this->form_validation->set_rules('reg_email', 'Register mail', 'trim|required|valid_email');
        if($this->form_validation->run() == FALSE)
        {
            $this->forgetPassword();
        }
        else
        {
            $loginIdresponce = $this->LoginModel->checkLoginId($reg_email);
            if(count($loginIdresponce) != 0)
            {
                $key = md5(date('Ymd H:i s').rand(10,999));
                $forgetrequest = array('mail_id' => $reg_email,'reset_token' => $key,'verify_code' => rand(100000,999999));
                $forgetresponce = $this->LoginModel->forgetRequestsave($forgetrequest);
                if($forgetresponce != 0){
                    $generatelink = base_url('account/resetpassword/'.$loginIdresponce[0]->id.'/reset?token='.$key);
                    $to = $reg_email;
                    $subject = "Ecom : : Your reset password link.";
                    $txt = "Hi ".$loginIdresponce[0]->name.", \n Your reset password link : ".$generatelink." \n\n\n ThankQ being with us. ";
                    $headers = "From: info@yhvreddy.com" . "\r\n" .
                    "CC: abvrinfo@gmail.com";
                    @mail($to,$subject,$txt,$headers);
                    $this->session->set_flashdata('success','Password Reset link as sent to your register mail.');
                    redirect(base_url('dashboard/login'));
                }
                else
                {
                    $this->session->set_flashdata('failed','Password Reset request as failed.');
                    redirect(base_url('dashboard/forgetpassword'));
                }
            }
            else
            {
                $this->session->set_flashdata('failed','Invalid Mail Id.');
                redirect(base_url('dashboard/forgetpassword'));
            }
        }
    }

    public function resetpassword($id,$token)
    {
        $data['page_title'] = 'Reset password';
        $data['user_id']    =   $id;
        $data['token']      =   $token;
        $this->load->view('dashboard/resetforgetpassword',$data);
    }

    //reset password
    public function resetForgetPassword()
    {
        extract($_REQUEST);
        $user_id = $this->uri->segment(3);
        if(isset($token) && !empty($token) && !empty($user_id))
        {
            $checktoken = $this->LoginModel->checkUserResettoken($token);
            if($checktoken != 0){
                $this->resetpassword($user_id,$token);
            }
            else
            {
                $this->session->set_flashdata('failed','Invalid request or Token time out..!');
                redirect(base_url('dashboard/forgetpassword'));
            }
        }
        else
        {
            $this->session->set_flashdata('failed','Invalid request to reset password..!');
            redirect(base_url('dashboard/forgetpassword'));
        }
    }

    //save reset password
    public function saveResetPassword()
    {
        extract($_REQUEST);
        $this->form_validation->set_rules('new_password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[new_password]|min_length[6]');
        if($this->form_validation->run() == FALSE)
        {
            $this->resetpassword($user_id,$token);
        }
        else
        {
            $password = password_hash($new_password, PASSWORD_DEFAULT);
            $updatepassword = array('password' => $password);
            $conduction = array('id'=>$user_id);
            $responce = $this->LoginModel->updateForgetPassword($updatepassword,$conduction);
            if($responce != 0)
            {
                $this->session->set_flashdata('success','Your password as successfully reset..!');
                redirect(base_url('dashboard/login'));
            }
            else
            {
                $this->session->set_flashdata('failed','Invalid request to reset password..!');
                redirect(base_url('dashboard/forgetpassword'));
            } 
        }
    }

    public function logoutAccount()
    {
        $this->session->sess_destroy();
        redirect(base_url('dashboard/login'));
    }
    
}
