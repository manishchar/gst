<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
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
    $this->load->view('admin/dashboard');
    
  }

public function leadtype_check($leadtype_name,$lead_id)
{
  if($lead_id !=''){
    $result = $this->db->where('leadtype_name',$leadtype_name)->where('leadtype_id != ',$lead_id)->get('lead_type')->row();
  }else{
    $result = $this->db->where('leadtype_name',$leadtype_name)->where('leadtype_status != ','3')->get('lead_type')->row();
  }
        if (!empty($result))
        {
          $this->form_validation->set_message('leadtype_check', 'The {field} Duplicate');
          return FALSE;
        }
        else
        {
          return TRUE;
        }
}
public function lead($id='')
{
    $data['page_title'] = "Lead";
    $data['leads'] = $this->db->where('leadtype_status!=','3')->get('lead_type')->result();
    $data['lead']=array();
    if($id != ''){
        $data['lead'] = $this->db->where('leadtype_id',$id)->get('lead_type')->row();
    }
    if($this->input->post()){
      $this->load->library('form_validation');
      $this->form_validation->set_rules('leadtype_name', 'leadtype Name', 'required|callback_leadtype_check['.$id.']');
        if($this->form_validation->run() == FALSE){

          $this->load->view('admin/master/lead',$data);  
        }else{
          $lead_type= array(
            'leadtype_name'=>$_POST['leadtype_name'],
          );
          if($id != ''){
            $flag = $this->db->where('leadtype_id',$id)->update('lead_type',$lead_type);
            $message = "Records Update"; 
          }else{
            $lead_type['created_by']=$this->loginId;
            $flag = $this->db->insert('lead_type',$lead_type); 
            $message = "Records Save"; 
          }
          if($flag){
            $this->session->set_flashdata('message',$message);
          }else{
            $this->session->set_flashdata('errro','Operation Failed');
          }
          redirect(base_url().'master/lead');
        }
    }else{
      $this->load->view('admin/master/lead',$data);  
    }
}
public function leadDelete($id){
  if($id){
      $flag = $this->db->where('leadtype_id',$id)->update('lead_type',array('leadtype_status'=>3));
      if($flag){
        $this->session->set_flashdata('message','Records Delete Successfully');
      }else{
        $this->session->set_flashdata('error','Operation Failed');
      }
  }else{
    $this->session->set_flashdata('error','Invalid Lead');
  }
   redirect(base_url().'master/lead');
}
public function leadActive($id){
  if($id){
      $flag = $this->db->where('leadtype_id',$id)->update('lead_type',array('leadtype_status'=>1));
      if($flag){
        $this->session->set_flashdata('message','Records Active Successfully');
      }else{
        $this->session->set_flashdata('error','Operation Failed');
      }
  }else{
    $this->session->set_flashdata('error','Invalid Lead');
  }
  redirect(base_url().'master/lead');
}
public function leadDeactive($id){
  if($id){
      $flag = $this->db->where('leadtype_id',$id)->update('lead_type',array('leadtype_status'=>0));
      if($flag){
        $this->session->set_flashdata('message','Records Active Successfully');
      }else{
        $this->session->set_flashdata('error','Operation Failed');
      }
  }else{
    $this->session->set_flashdata('error','Invalid Lead');
  }
   redirect(base_url().'master/lead');
}

//** Buckets code start **//

public function bucket_check($bucket_name,$bucket_id)
{
  if($bucket_id !=''){
    $result = $this->db->where('bucket_name',$bucket_name)->where('bucketid != ',$bucket_id)->get('buckets')->row();
  }else{
    $result = $this->db->where('bucket_name',$bucket_name)->where('bucket_status != ','3')->get('buckets')->row();
  }
  if (!empty($result))
  {
    $this->form_validation->set_message('bucket_check', 'The {field} Already Exist');
    return FALSE;
  }
  else
  {
    return TRUE;
  }
}
public function bucket($id='')
{
    $data['page_title'] = "Bucket List";
    $data['buckets'] = $this->db->where('bucket_status!=','3')->get('buckets')->result();
    $data['bucket']=array();
    if($id != ''){
      $data['bucket'] = $this->db->where('bucketid',$id)->get('buckets')->row();
    }
    if($this->input->post()){
      // print_r($_POST);
      // die;
      $this->load->library('form_validation');
      //$this->form_validation->set_rules('bucket_name', 'Bucket Name', 'required');
      $this->form_validation->set_rules('bucket_color', 'Bucket color', 'required');
      $this->form_validation->set_rules('bucket_name', 'Bucket Name', 'required|callback_bucket_check['.$id.']');
        if($this->form_validation->run() == FALSE){

          $this->load->view('admin/master/bucket',$data);  
        }else{

          $bucket = array(
            'bucket_name'=>$_POST['bucket_name'],
            'bucket_color'=>$_POST['bucket_color'],
          );
          if($id != ''){
            $flag = $this->db->where('bucketid',$id)->update('buckets',$bucket);
            $message = "Records Update"; 
          }else{
            $lead_type['created_by']=$this->loginId;
            $flag = $this->db->insert('buckets',$bucket); 
            $message = "Records Save"; 
          }
          if($flag){
            $this->session->set_flashdata('message',$message);
          }else{
            $this->session->set_flashdata('errro','Operation Failed');
          }
          redirect(base_url().'master/bucket');
        }
    }else{
      $this->load->view('admin/master/bucket',$data);  
    }
}
public function bucketDelete($id){
  if($id){
      $flag = $this->db->where('bucketid',$id)->update('buckets',array('bucket_status'=>3));
      if($flag){
        $this->session->set_flashdata('message','Records Delete Successfully');
      }else{
        $this->session->set_flashdata('error','Operation Failed');
      }
  }else{
    $this->session->set_flashdata('error','Invalid Lead');
  }
   redirect(base_url().'master/bucket');
}
public function bucketActive($id){
  if($id){
      $flag = $this->db->where('bucketid',$id)->update('buckets',array('bucket_status'=>1));
      if($flag){
        $this->session->set_flashdata('message','Records Active Successfully');
      }else{
        $this->session->set_flashdata('error','Operation Failed');
      }
  }else{
    $this->session->set_flashdata('error','Invalid Lead');
  }
  redirect(base_url().'master/bucket');
}
public function bucketDeactive($id){
  if($id){
      $flag = $this->db->where('bucketid',$id)->update('buckets',array('bucket_status'=>0));
      if($flag){
        $this->session->set_flashdata('message','Records Active Successfully');
      }else{
        $this->session->set_flashdata('error','Operation Failed');
      }
  }else{
    $this->session->set_flashdata('error','Invalid Lead');
  }
   redirect(base_url().'master/bucket');
}

//** Buckets code end **//

//** Buckets code start **//

public function province_check($province_name,$province_id)
{
  if($province_id !=''){
    $result = $this->db->where('province_name',$province_name)->where('province_id != ',$province_id)->get('province')->row();
  }else{
    $result = $this->db->where('province_name',$province_name)->where('province_status != ','3')->get('province')->row();
  }
  if (!empty($result))
  {
    $this->form_validation->set_message('province_check', 'The {field} Already Exist');
    return FALSE;
  }
  else
  {
    return TRUE;
  }
}
public function province($id='')
{
    $data['page_title'] = "Province List";
    $data['provinces'] = $this->db->where('province_status!=','3')->get('province')->result();
    $data['province']=array();
    if($id != ''){
      $data['province'] = $this->db->where('province_id',$id)->get('province')->row();
    }
    if($this->input->post()){
      // print_r($_POST);
      // die;
      $this->load->library('form_validation');
      //$this->form_validation->set_rules('bucket_name', 'Bucket Name', 'required');
      $this->form_validation->set_rules('province_name', 'Province Name', 'required|callback_province_check['.$id.']');
        if($this->form_validation->run() == FALSE){
          $this->load->view('admin/master/province',$data);  
        }else{
          $province = array(
            'province_name'=>$_POST['province_name'],
          );
          if($id != ''){
            $flag = $this->db->where('province_id',$id)->update('province',$province);
            $message = "Records Update"; 
          }else{
            $lead_type['created_by']=$this->loginId;
            $flag = $this->db->insert('province',$province); 
            $message = "Records Save"; 
          }
          if($flag){
            $this->session->set_flashdata('message',$message);
          }else{
            $this->session->set_flashdata('errro','Operation Failed');
          }
          redirect(base_url().'master/province');
        }
    }else{
      $this->load->view('admin/master/province',$data);  
    }
}
public function provinceDelete($id){
  if($id){
      $flag = $this->db->where('province_id',$id)->update('province',array('province_status'=>3));
      if($flag){
        $this->session->set_flashdata('message','Records Delete Successfully');
      }else{
        $this->session->set_flashdata('error','Operation Failed');
      }
  }else{
    $this->session->set_flashdata('error','Invalid Lead');
  }
   redirect(base_url().'master/province');
}
public function provinceActive($id){
  if($id){
      $flag = $this->db->where('province_id',$id)->update('province',array('province_status'=>1));
      if($flag){
        $this->session->set_flashdata('message','Records Active Successfully');
      }else{
        $this->session->set_flashdata('error','Operation Failed');
      }
  }else{
    $this->session->set_flashdata('error','Invalid Lead');
  }
  redirect(base_url().'master/province');
}
public function provinceDeactive($id){
  if($id){
      $flag = $this->db->where('province_id',$id)->update('province',array('province_status'=>0));
      if($flag){
        $this->session->set_flashdata('message','Records Active Successfully');
      }else{
        $this->session->set_flashdata('error','Operation Failed');
      }
  }else{
    $this->session->set_flashdata('error','Invalid Lead');
  }
   redirect(base_url().'master/province');
}

//** Buckets code end **//



//////////////////////////
  public function buckets()
  {
    echo "buckets";
    //$this->load->view('admin/dashboard');
    
  }
 //  public function province()
	// {
 //    echo "province";
	// 	//$this->load->view('admin/dashboard');
		
	// }
}
