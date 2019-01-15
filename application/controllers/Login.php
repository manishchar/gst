<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	  public function __construct() {
        parent::__construct();
            $this->load->model("Login_model");
    }

	public function index()
	{
		$this->load->view('login/index');
		
	}

  public function getgroup(){
     $arr =array();
     $arr = array('val'=>$_REQUEST['val']);  
     $valu['allprojects'] = $this->Login_model->getGroup($arr); 
     echo json_encode($valu);
}

   public function user_login()
	{
      $res=$this->Login_model->userLogin();
      // print_r($res);
      // die;
      if($res==false)
      {
        //$this->session->flashdata('error','Invalid User');
      	redirect(base_url());
      }
      else
      {
      	redirect(base_url('dashboard'));
      }
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
