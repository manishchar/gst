<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model {

    public function index1()
    {
      $data['companyName']=$this->db->select('companyName')->from('companymaster')->get()->result_array();
      $data['user']=$this->db->select('userRole')->from('users')->get()->result_array();

      return $data;
    }

// public function CompanyList()
// {
// $data=$this->db->select('companyName,cmId')->from('companymaster')->get()->result_array();
// return $data;
// }

public function companyUpdate()
{
    $cmId=$this->input->post('cmId');
        $arr3=array(
          "companyName"=>$this->input->post('companyName'),
          "address"=>$this->input->post('address'), 
          "contactNo"=>$this->input->post('contactNo'),
          "emailId"=>$this->input->post('emailId'),
          "gistinNo"=>$this->input->post('gistinNo'),
          "panNo"=>$this->input->post('panNo'),
          "cinNo"=>$this->input->post('cinNo'),
          "aadhaarNo"=>$this->input->post('aadhaarNo'),
          "bankAccountNo"=>$this->input->post('bankAccountNo'),
          "bankAccountName"=>$this->input->post('bankAccountName'),
          "bankIfscCode"=>$this->input->post('bankIfscCode'),
          "bankName"=>$this->input->post('bankName'),
          "branchName"=>$this->input->post('branchName'),
          "estimateSeries"=>$this->input->post('estimateSeries'),
          "requiredBarcode"=>$this->input->post('requiredBarcode'),
          "TaxForProduct"=>$this->input->post('TaxForProduct'),
          "barCodeTitle"=>$this->input->post('barCodeTitle'),
          "barCodeMrpPrefix"=>$this->input->post('barCodeMrpPrefix'),
          "barCodeSendingPricePrefix"=>$this->input->post('barCodeSendingPricePrefix'),
          "barCodeField"=>$this->input->post('barCodeField'),
          "barCodePriceCode"=>$this->input->post('barCodePriceCode'),
          "barCodeField1"=>$this->input->post('barCodeField1'),
           "barCodeField2"=>$this->input->post('barCodeField2'),
           "barCodeField3"=>$this->input->post('barCodeField3'),
           "invoiceFormat"=>$this->input->post('invoiceFormat'),
           "barcodeFormat"=>$this->input->post('barcodeFormat'),
           "natureOfBusiness"=>$this->input->post('natureOfBusiness'),
           "cashSalesConditions"=>$this->input->post('cashSalesConditions'),
           "creditSalesConditions"=>$this->input->post('creditSalesConditions'),
           "accountMode"=>$this->input->post('accountMode'),
           "subTitle"=>$this->input->post('subTitle'),
           "requiredRateCalculator"=>$this->input->post('requiredRateCalculator'),
           "requiredProductImage"=>$this->input->post('requiredProductImage'),
           "packingCalculator"=>$this->input->post('packingCalculator'),
           "logo"=>$this->input->post('logo'),
           // 'logoImage' => $folder
        );


    if($_FILES['logoImage']['name'] !=''){
      // file upload
      $config['upload_path']          = 'assets/images/company/';
      $config['allowed_types']        = 'gif|jpg|png';
      $this->load->library('upload', $config);
       if ( ! $this->upload->do_upload('logoImage'))
        {
            $error = array('error' => $this->upload->display_errors());
            //$this->load->view('upload_form', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $arr3['logoImage']= $data['upload_data']['file_name'];
            //$this->load->view('upload_success', $data);
        }
    }
    // echo "string";
    // die;
    //$folder="assets/images/".$filename;
    //move_uploaded_file($tempname,$folder);
        
      $this->db->where('cmId',$cmId);  
      if ($this->db->update('companymaster',$arr3)) {
        return true;
      }else{
        return false;
      }
  }
  // ---------------update------------------------------
  // --------------delete-------------------------------
public function companyDelete()
{
  $cmId=$this->input->post('cmId');
  $deta=$this->db->where('cmId',$cmId)->update('companymaster',array('active' =>'0'));
  if ($deta) {
   return true;
  }else{
    return false;
  }
}



    public function bank_details($data)
  {
    
    $this->db->insert('msd_bank_details',$data);

       if($this->db->affected_rows() > 0)
      {
        return true; 
      }else{
        return false;
      } 
   
  }
  public function group_master($data)
  {
    
    $this->db->insert('msd_group_master',$data);

       if($this->db->affected_rows() > 0)
      {
          
          return true; 
      }else{
        return false;
      } 
   
  }
  public function unit_master($data)
  {
    
    $this->db->insert('msd_unit_master',$data);

       if($this->db->affected_rows() > 0)
      {
          
          return true; 
      }else{
        return false;
      } 
   
  }
  public function party_master($data)
  {
    
    $this->db->insert('msd_party_master',$data);

       if($this->db->affected_rows() > 0)
      {
          
          return true; 
      }else{
        return false;
      } 
   
  }
  public function route_master($data)
  {
    
    $this->db->insert('msd_route_master',$data);

       if($this->db->affected_rows() > 0)
      {
          
          return true; 
      }else{
        return false;
      } 
   
  }
  public function tex_master($data)
  {
    
    $this->db->insert('msd_tex_master',$data);

       if($this->db->affected_rows() > 0)
      {
          
          return true; 
      }else{
        return false;
      } 
   
  }
 
  public function user_master($data)
  {
    $this->db->insert('msd_user_master',$data);
       if($this->db->affected_rows() > 0)
      {
          return true; 
      }else{
        return false;
      } 
  }
  
  public function product_services($data)
  {
    $this->db->insert('msd_product_services',$data);
       if($this->db->affected_rows() > 0)
      {
          return true; 
      }else{
        return false;
      } 
  }
public function get_product(){ 
  $id = $this->input->post("cek_id");
  return $this->db->select('*')->where("id",$id)->get('msd_product_services')->row();
}
public function get_bank(){ 
  $id = $this->input->post("cek_id");
  return $this->db->select('*')->where("id",$id)->get('msd_bank_details')->row();
}
public function get_party(){ 
  $id = $this->input->post("cek_id");
  return $this->db->select('*')->where("id",$id)->get('msd_party_master')->row();
}
public function get_tex(){ 
  $id = $this->input->post("cek_id");
  return $this->db->select('*')->where("id",$id)->get('msd_tex_master')->row();
}
public function get_user(){ 
  $id = $this->input->post("cek_id");

  return $this->db->select('*')->where("id",$id)->get('msd_user_master')->row();
}
public function get_route(){ 
  $id = $this->input->post("id");
  return $this->db->select('*')->where("id",$id)->get('msd_route_master')->row();
}public function get_group(){ 
  $id = $this->input->post("id");
  return $this->db->select('*')->where("id",$id)->get('msd_group_master')->row();
}public function get_unit(){ 
  $id = $this->input->post("id");
  return $this->db->select('*')->where("id",$id)->get('msd_unit_master')->row();
}


// ----------------CompanyList--------------
    public function CompanyList()
    {
    $data=$this->db->select('companyName,cmId')->from('companymaster')->get()->result_array();
    return $data;
    }
    //----------------------------CompanyList--------
    // ---------------------
    public function getGroup(){ 
     $this->db->select('*');
     $this->db->from('companymaster'); 
     $this->db->where("cmId='". $_REQUEST['val']."'"); 
     $query1 = $this->db->get();
     return $query1->row();
}

    // -----------------
     public function userLogin()
    {   

    	$userId=$this->input->post('userId');
    	$password=$this->input->post('password');	


       	$result=$this->db->select('*')->where(['userId'=>$userId,'password'=>md5($password)])->get(MY_USER)->row();

       	if(!empty($result))
       	{
       		$userData=[
          'LogedIn'=>'true',
          'loginId'=>$result->loginId,
          'userId'=>$result->userId,
          'fullName'=>$result->fullName,
          'userRole'=>$result->userRole
           ];

       		$this->session->set_userdata($userData);
       		return true;	  
       	}
       	else
       	{
       		echo false;
       	}

               
    }
    // ------------------gstDetailsInsert--------------
  public function gstDetailsInsert($arr3)
  {
    
    $this->db->insert('companymaster',$arr3);

       if($this->db->affected_rows() > 0)
      {
          
          return true; 
      }else{
        return false;
      } 
   
  }
 // --------------------------------gstDetailsInsert----
  // -------------------update gst data----------------
  public function update()
  {
    $cmId=$this->input->post('cmId');
     $filename=$_FILES['logoImage']['name'];
      $tempname=$_FILES['logo']['tmp_name'];
      $folder="assets/images/".$filename;
      move_uploaded_file($tempname,$folder);
        $arr3=array("companyName"=>$this->input->post('companyName'),"address"=>$this->input->post('address'), "contactNo"=>$this->input->post('contactNo'), "emailId"=>$this->input->post('emailId'), "gistinNo"=>$this->input->post('gistinNo'), "panNo"=>$this->input->post('panNo'),"cinNo"=>$this->input->post('cinNo'),"aadhaarNo"=>$this->input->post('aadhaarNo'),"bankAccountNo"=>$this->input->post('bankAccountNo'),"bankAccountName"=>$this->input->post('bankAccountName'),"bankIfscCode"=>$this->input->post('bankIfscCode'),"bankName"=>$this->input->post('bankName'),"branchName"=>$this->input->post('branchName'),"estimateSeries"=>$this->input->post('estimateSeries'),"requiredBarcode"=>$this->input->post('requiredBarcode'),"TaxForProduct"=>$this->input->post('TaxForProduct'),"barCodeTitle"=>$this->input->post('barCodeTitle'),"barCodeMrpPrefix"=>$this->input->post('barCodeMrpPrefix'),"barCodeSendingPricePrefix"=>$this->input->post('barCodeSendingPricePrefix'),"barCodeField"=>$this->input->post('barCodeField'),"barCodePriceCode"=>$this->input->post('barCodePriceCode'),"barCodeField1"=>$this->input->post('barCodeField1'),"barCodeField2"=>$this->input->post('barCodeField2'),"barCodeField3"=>$this->input->post('barCodeField3'),"logo"=>$this->input->post('logo'),"invoiceFormat"=>$this->input->post('invoiceFormat'),"barcodeFormat"=>$this->input->post('barcodeFormat'),"natureOfBusiness"=>$this->input->post('natureOfBusiness'),"cashSalesConditions"=>$this->input->post('cashSalesConditions'),"creditSalesConditions"=>$this->input->post('creditSalesConditions'),"accountMode"=>$this->input->post('accountMode'),"subTitle"=>$this->input->post('subTitle'),"requiredRateCalculator"=>$this->input->post('requiredRateCalculator'),"requiredProductImage"=>$this->input->post('requiredProductImage'),"packingCalculator"=>$this->input->post('packingCalculator'),'logoImage' => $folder);
      $this->db->where('cmId',$cmId);  
      if ($this->db->update('companymaster',$arr3)) {
        return true;
      }else{
        return false;
      }
  }
  // ---------------update------------------------------
  // --------------delete-------------------------------
  public function delete()
  {
    $cmId=$this->input->post('cmId');
    $deta=$this->db->delete('companymaster',array('cmId' =>$cmId));
    if ($deta) {
     return true;
    }else{
      return false;
    }
  }
  // -------------delete--------------------------------

  } 