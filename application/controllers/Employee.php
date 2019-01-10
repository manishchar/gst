<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
  private $loginId='0';
  public function __construct() {
       parent::__construct();
       $this->loginId = $this->session->userdata('crm_id');
       $this->load->model("Master_model",'master');
       if (!$this->session->userdata('crm_id'))
       {
             redirect(base_url());
       }
    }

	public function index()
  {
    $data['page_title'] = "Employee";
    $data['leads'] = $this->db->where_in('leadtype_status',array('0','1'))->get('lead_type')->result();
    $data['provinces'] = $this->db->where('province_status != 3')->get('province')->result();
    $this->load->view('admin/employee/employee',$data);
    
  }
  function get_random_password($chars_min=6, $chars_max=8, $use_upper_case=false, $include_numbers=false, $include_special_chars=false)
    {
        $length = rand($chars_min, $chars_max);
        $selection = 'aeuoyibcdfghjklmnpqrstvwxz';
        if($include_numbers) {
            $selection .= "1234567890";
        }
        if($include_special_chars) {
            $selection .= "!@\"#$%&[]{}?|";
        }
                                
        $password = "";
        for($i=0; $i<$length; $i++) {
            $current_letter = $use_upper_case ? (rand(0,1) ? strtoupper($selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))];            
            $password .=  $current_letter;
        }                
        
      return $password;
    }



  public function add()
  {
    $data['page_title'] = "Add Employee";
    $data['leads'] = $this->db->where('leadtype_status!=','3')->get('lead_type')->result();
    $data['provinces'] = $this->db->where('province_status != ','3')->get('province')->result();

if($this->input->post()){
   $this->load->library('form_validation');
      //$this->form_validation->set_rules('first_name', 'First Name', 'required|callback_leadtype_check['.$id.']');
      $this->form_validation->set_rules('first_name', 'First Name', 'required');
      $this->form_validation->set_rules('last_name', 'Last Name', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('mobile', 'Mobile', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');
      $this->form_validation->set_rules('user_role', 'User Role', 'required');
      $this->form_validation->set_rules('province', 'Province', 'required');
        if($this->form_validation->run() == FALSE){
          $this->load->view('admin/employee/add_employee',$data);
        }else{
          // print_r($_POST);
          // die;

          $employee=array(
            'first_name'    =>$_POST['first_name'],
            'last_name'     =>$_POST['last_name'],
            'email'         =>$_POST['email'],
            'mobile'        =>$_POST['mobile'],
            'password'      =>md5($_POST['password']),
            'hint_password' =>$_POST['password'],
            'role_id' =>$_POST['user_role'],
            'province' =>$_POST['province'],
            'status' =>1,
            'lead_status' =>1,
          );
$flag = $this->db->insert('tbl_login',$employee);
$message = "records Save";
          if($flag){
            $this->session->set_flashdata('message',$message);
          }else{
            $this->session->set_flashdata('errro','Operation Failed');
          }
          redirect(base_url().'employee/add');
        }
}else{
  $this->load->view('admin/employee/add_employee',$data);
}

    
    
  }

}
