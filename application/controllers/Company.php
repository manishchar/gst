<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

private $company_id='';
  function __construct() { 
  parent::__construct();
  $this->load->model('Company_model');
  $this->company_id=$this->session->userdata('company_id');
  if(!$this->session->userdata('loginId'))
  {
    redirect('Login');
  }
      
  }

public function index(){ 
    $data['title']="Company";
    $data['page_title']="Company";
     $company_id=$this->session->userdata('company_id');
     $company = $company_id['loginId'];
    if($this->input->post()){
        $this->form_validation->set_rules('accountId','Account Id','required');
        $this->form_validation->set_rules('bankName','bank Name','required');
        $this->form_validation->set_rules('accountHolder','account Holder','required'); 
        $this->form_validation->set_rules('accountNumber','account Number','required'); 
        $this->form_validation->set_rules('branch','branch','required');
        $this->form_validation->set_rules('ifscCode','ifscCode','required');     
                      
        if ($this->form_validation->run() == TRUE)
        {
          $company_id=$this->session->userdata('company_id');

          $data = array(
            'company_id' => $company_id['loginId'], 
            'accountId' => $this->input->post('accountId'),
            'bankName' => $this->input->post('bankName'),
            'accountHolder' => $this->input->post('accountHolder'),
            'accountNumber' => $this->input->post('accountNumber'),
            'branch' => $this->input->post('branch'),
            'ifscCode' => $this->input->post('ifscCode'),
          );

          if($this->Company_model->bank_details($data)){
          $this->session->set_flashdata('message', 'Record Save succesfully');
          }else{
          $this->session->set_flashdata('error', 'Record Failed');
          }
          redirect('company');


        }
        else
        {
          $this->load->view('template/header');
          $this->load->view('template/sidemenu');
          $this->load->view('template/topbar');
          $this->load->view('template/breadcrumbs');
          $this->load->view('bank_master',$data);
          $this->load->view('template/footer'); 
        }
    }else{
        $this->load->view('template/header');
        $this->load->view('template/sidemenu');
        $this->load->view('template/topbar');
        $this->load->view('template/breadcrumbs');
        $this->load->view('bank_master',$data);
        $this->load->view('template/footer'); 
    }
   }
   public function get_bank(){
   $bank = $this->Company_model->get_bank(); 
   if(!empty($bank)){
    $response = array('status'=>'success','code'=>'200','data'=>$bank);
   }else{
    $response = array('status'=>'failed','code'=>'201','message'=>'data not found');
   }
   echo json_encode($response);
}





                   
// product services end //
public function createCompany()
{ 
    $data['companyName']=$this->Company_model->CompanyList();
    if ($this->input->post('submit')) {
        $this->form_validation->set_rules('companyName', 'Company Name', 'required|is_unique[companymaster.companyName]',array('required'=>'%s Required') );
        $this->form_validation->set_rules('natureOfBusiness', 'Nature of Business', 'required',array('required'=>'%s Required') );
        $this->form_validation->set_rules('accountMode', 'Account Mode', 'required',array('required'=>'%s Required') );
        $this->form_validation->set_rules('emailId', 'Email', 'required|is_unique[companymaster.emailId]',array('required'=>'%s Required') );
        if($this->form_validation->run() == FALSE){
          $this->load->view('master/create_company',$data); 
        }else{
          $arr3=array(
            "companyName"     =>$this->input->post('companyName'),
            "address"         =>$this->input->post('address'), 
            "contactNo"       =>$this->input->post('contactNo'), 
            "emailId"         =>$this->input->post('emailId'), 
            "gistinNo"        =>$this->input->post('gistinNo'), 
            "panNo"           =>$this->input->post('panNo'),
            "cinNo"           =>$this->input->post('cinNo'),
            "aadhaarNo"       =>$this->input->post('aadhaarNo'),
            "estimateSeries"  =>$this->input->post('estimateSeries'),
            "requiredBarcode" =>$this->input->post('requiredBarcode'),
            "TaxForProduct"   =>$this->input->post('TaxForProduct'),
            "logo"            =>$this->input->post('logo'),
            "invoiceFormat"   =>$this->input->post('invoiceFormat'),
            "barcodeFormat"   =>$this->input->post('barcodeFormat'),
            "natureOfBusiness"=>$this->input->post('natureOfBusiness'),
            "cashSalesConditions" =>$this->input->post('cashSalesConditions'),
            "creditSalesConditions" =>$this->input->post('creditSalesConditions'),
            "accountMode"           =>$this->input->post('accountMode'),
            "subTitle"              =>$this->input->post('subTitle'),
            "requiredRateCalculator"=>$this->input->post('requiredRateCalculator'),
            "requiredProductImage"  =>$this->input->post('requiredProductImage'),
            "packingCalculator"     =>$this->input->post('packingCalculator'),
          );
          if($_FILES['logoImage']['name'] !=''){
                $config['upload_path']          = 'assets/images/company/';
                $config['allowed_types']        = 'gif|jpg|png';
                $this->load->library('upload', $config);
                 if ( ! $this->upload->do_upload('logoImage'))
                  {
                      $error = array('error' => $this->upload->display_errors());
                  }
                  else
                  {
                      $data = array('upload_data' => $this->upload->data());
                      $arr3['logoImage']= $data['upload_data']['file_name'];
                  }            
            }          
          $data = $this->Company_model->gstDetailsInsert($arr3);
          if($data) {
          $this->session->set_flashdata('message', 'Create Company successfully');
          redirect("company/createCompany");
          }else{
           $this->load->view('master/create_company',$data); 
          }
        } 
    }else if($this->input->post('update')){
      $update=$this->Company_model->companyUpdate();
      if($update)
      {
        $this->session->set_flashdata('message', 'Record update successfully');
        redirect('company/createCompany');
      }else{
        $this->session->set_flashdata('error', 'Records Update Failed');
      redirect('company/createCompany');
      }

    }else if($this->input->post('delete')){
      $deta=$this->Company_model->companyDelete();
      if($deta)
      {
        $this->session->set_flashdata('message', 'Record Deleted successfully');
        redirect('company/createCompany');
      }else{
        $this->session->set_flashdata('error', 'Records Deleted Failed');
      redirect('company/createCompany');
      }
    }else{
      $this->load->view('master/create_company',$data); 
    }
       
}
 
public function company_list(){
  $data['companyName']=$this->Company_model->CompanyList();
  $data['page_title']="Company List";
// echo "string";
// die;
   $this->load->view('master/view_company',$data);
}
  
  // ----------------get data---------------------
public function getgroup(){
    
     $arr =array();
     $arr = array('val'=>$_REQUEST['val']);  
     $valu['allprojects'] = $this->Login_model->getGroup($arr); 
     echo json_encode($valu);

}
 // --------------------------------
public function profile(){
  $data['page_title'] = "profile";

  $data['company'] = $this->db->join('company_barcode as tab2','tab1.cmId=tab2.company_id')->join('company_bank as tab3','tab1.cmId=tab3.company_id')->where('tab1.cmId', $this->company_id)->get('companymaster as tab1')->row();
// print_r($data['company']);
// die;
  $this->load->view('master/profile',$data); 
}

public function change_password(){
  if($this->input->post()){

  }else{
    $data['page_title'] = "Change Password";
    $this->load->view('master/change_password',$data); 
  }
}

public function Logout()
{
  $user_data = $this->session->all_userdata();
  foreach ($user_data as $key => $value) {
  $this->session->unset_userdata($key);
  }
  $this->session->sess_destroy();
  redirect();
}

// ---------------------
// ******** change password by rahul create on 12-01-19
public function change_password() {
        $data['page_title'] = "Change Password";
        $id = $this->company_id = $this->session->userdata('company_id');
        if ($this->input->post()) {
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('newpass', 'newpass', 'required|alpha_numeric|min_length[6]|max_length[20]');
            $this->form_validation->set_rules('confpassword', 'confpassword', 'required|alpha_numeric|min_length[6]|max_length[20]');

            if ($this->form_validation->run()) {
                $cur_password = $this->input->post('password');
                $new_password = $this->input->post('newpass');
                $conf_password = $this->input->post('confpassword');
                $this->load->model('Company_model');
                $userid = $id;
                $passwd = $this->Company_model->getCurrPassword($userid);

                if ($passwd->password == md5($cur_password)) {

                    if ($new_password == $conf_password) {

                        if ($this->Company_model->updatePassword($new_password, $userid)) {

                            $this->session->set_flashdata('message', 'Password updated successfully');
                        } else {
                            $this->session->set_flashdata('error', 'Failed to update password');
                        }
                    } else {
                        $this->session->set_flashdata('error', 'New password & Confirm password is not matching');
                    }
                } else {

                    $this->session->set_flashdata('error', 'Sorry! Current password is not matching');
                }
            }
        }
        $this->load->view('master/change_password', $data);
    }
}