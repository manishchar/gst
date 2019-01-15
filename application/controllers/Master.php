<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

private $company_id='';
  function __construct() { 
  parent::__construct();
  $this->load->model('Master_model');
  $this->company_id=$this->session->userdata('company_id');
  //  if(!$this->session->userdata('LogedIn')==true)
  // {
  //   redirect('Login');
  // }
      
  }

public function index(){ 
    $data['title']="Bank Details";
    $data['page_title']="Bank Details";
     $company_id=$this->session->userdata('company_id');
     //$company = $company_id['loginId'];
    if($this->input->post()){
        $this->form_validation->set_rules('accountId','Account Id','required');
        $this->form_validation->set_rules('bankName','bank Name','required');
        $this->form_validation->set_rules('accountHolder','account Holder','required'); 
        $this->form_validation->set_rules('accountNumber','account Number','required'); 
        $this->form_validation->set_rules('branch','branch','required');
        $this->form_validation->set_rules('ifscCode','ifscCode','required');     
                      
        if ($this->form_validation->run() == TRUE)
        {

          $data = array(
            'company_id' => $this->company_id, 
            'accountId' => $this->input->post('accountId'),
            'bankName' => $this->input->post('bankName'),
            'accountHolder' => $this->input->post('accountHolder'),
            'accountNumber' => $this->input->post('accountNumber'),
            'branch' => $this->input->post('branch'),
            'ifscCode' => $this->input->post('ifscCode'),
          );

          if($this->Master_model->bank_details($data)){
          $this->session->set_flashdata('message', 'Record Save succesfully');
          }else{
          $this->session->set_flashdata('error', 'Record Save Failed');
          }
          redirect('master');


        }
        else
        {
          $this->load->view('master/bank_master',$data);
        }
    }else{
        $this->load->view('master/bank_master',$data);
    }
   }
   public function get_bank(){
   $bank = $this->Master_model->get_bank(); 
   if(!empty($bank)){
    $response = array('status'=>'success','code'=>'200','data'=>$bank);
   }else{
    $response = array('status'=>'failed','code'=>'201','message'=>'data not found');
   }
   echo json_encode($response);
}

public function get_bank_details(){
 $company =$this->company_id;
  $draw = $_REQUEST['draw'];
  $start = $_REQUEST['start'];
  $length = $_REQUEST['length'];
  $searchArray = $_REQUEST['search'];
  $search = $searchArray['value'];

  if($search !=''){
    //$w = array('active' => 1, 'company_id' => $company);

    $q="SELECT * FROM `msd_bank_details` WHERE `active` = 1 AND `company_id` = '".$company."' AND  (`accountId` LIKE '%".$search."%' ESCAPE '!' OR  `bankName` LIKE '%".$search."%' ESCAPE '!' OR  `accountHolder` LIKE '%".$search."%' ESCAPE '!' OR  `accountNumber` LIKE '%".$search."%' OR  `branch` LIKE '%".$search."%' ESCAPE '!') ORDER BY `created_date` DESC, `deleted_date` DESC";

    $totalCount = $this->db->query($q)->num_rows();

    $product =$this->db->query($q)->result_array();

    //echo $this->db->last_query();
   
  }else{
    $totalCount = $this->db->where(['active'=> 1,'company_id'=> $company])->get('msd_bank_details')->num_rows();
 // print_r($totalCount);
 // die();
    $product = $this->db->where(['active'=> 1,'company_id'=> $company])->limit($length, $start)->order_by("created_date DESC,deleted_date DESC")->get('msd_bank_details')->result_array();
  }

  $productResult = array();
  foreach ($product as $key => $value) {
    $productResult[$key] =$value;
    $productResult[$key]['action'] ="<a onclick='bankEdit(".$value['id'].")' class='btn btn-warning'>Edit</a>";
  }

  $data=array(
          "draw"=> $draw,
          "recordsTotal"=> $totalCount,
          "recordsFiltered"=> $totalCount,
          "data"=>$productResult
    );
    echo json_encode($data);
}

public function update_bank_details(){
    $id = $_POST['id'];
    $accountId= $_POST['accountId'];
    $bankName= $_POST['bankName'];
    $accountHolder= $_POST['accountHolder'];
    $accountNumber= $_POST['accountNumber'];
    $branch= $_POST['branch'];
    $ifscCode= $_POST['ifscCode'];
    $qery=$this->db->query("UPDATE `msd_bank_details` SET `accountId`='$accountId',`bankName`='$bankName',`accountHolder`='$accountHolder',`accountNumber`='$accountNumber',`branch`='$branch',`ifscCode`='$ifscCode' WHERE `id`='$id' ");
    if($id){
    if($qery){
      //$this->session->set_flashdata('message','data update successfully');
      $response = array('status'=>'success','message'=>'data update successfully');
    }else{
      //$this->session->set_flashdata('error','data update Failed');
      $response = array('status'=>'failed','message'=>'data update failed');
    }
  }else{
          $response = array('status'=>'failed','message'=>'data Invailid Records');

  }
    echo json_encode($response);
  
}
public function delete_bank_details(){
  $id = $_POST['id'];
  $qery= $this->db->query("UPDATE `msd_bank_details` SET `active`='0' WHERE `id`='$id' ");
   if($id){
        if($qery){
          $response = array('status'=>'success','message'=>'data Delete successfully');
          }else{
          $response = array('status'=>'failed','message'=>'data Delete failed');
           }
   }else{
          $response = array('status'=>'failed','message'=>'data Invailid Records');

    }
  echo json_encode($response);

}

  // ----------------group master---------------------
public function group_master(){

     $data['title']="Company";
      $data['page_title']="group master";
    $data['all_groups'] = $this->db->select('*')->where('active',1)->get('msd_group_master')->result();
       if($this->input->post()) {
                         
                $this->form_validation->set_rules('groupName','group name','required');
          if ($this->form_validation->run() == TRUE)
                                 {
                        $data = array(
                                     'company_id' => $this->company_id,
                                     'groupName' => $this->input->post('groupName'),
                               );
               
                           
    
                   if($this->Master_model->group_master($data)){
                            $this->session->set_flashdata('message', 'Record Save succesfully');
                      }
                  else{

                           $this->session->set_flashdata('error', 'Record Save failed');
                     }      
                           redirect('Master/group_master');
                    
            }
         else
            {

                   $this->load->view('master/group_master');
           }
        }
else{
                   $this->load->view('master/group_master',$data);
}      
          
           

}
public function delete_group_master(){
  $id = $_POST['id'];
  if($id){
     $qery=$this->db->query("UPDATE `msd_group_master` SET `active`='0' WHERE `id`='$id' ");
  if(!empty($qery)){
    $response = array('status'=>'success','code'=>'200','message'=>'Record Delete succesfully');
  }else{
    $response = array('status'=>'failed','code'=>'201','message'=>'Record Delete Failed');
  }
}else{
      $response = array('status'=>'failed','code'=>'201','message'=>'Invailid Records');
 
}
  echo json_encode($response);

}
public function get_group(){
   $user = $this->Master_model->get_group(); 
   if(!empty($user)){
    $response = array('status'=>'success','code'=>'200','data'=>$user);
   }else{
    $response = array('status'=>'failed','code'=>'201','message'=>'data not found');
   }
   echo json_encode($response);
}
 
public function party_master(){
  $data['title']="Party Master";
  $data['page_title']="Party Master";
  if($this->input->post()){

    $this->form_validation->set_rules('customerType','customerType','required');
    $this->form_validation->set_rules('customer','customer','required'); 
    $this->form_validation->set_rules('primaryContactPerson','primaryContactPerson','required');
    $this->form_validation->set_rules('email','email','required');
    $this->form_validation->set_rules('mobile','mobile','required');
    $this->form_validation->set_rules('billingAddress','billingAddress','required');
    $this->form_validation->set_rules('addressLine2','addressLine2','required');
    $this->form_validation->set_rules('city','city','required');
    $this->form_validation->set_rules('state','state','required');
    $this->form_validation->set_rules('pin','pin','required');
    $this->form_validation->set_rules('gstinNo','gstinNo','required');
    $this->form_validation->set_rules('panNo','panNo','required');
    $this->form_validation->set_rules('collectionRoute','collectionRoute','required');
    $this->form_validation->set_rules('openingBalance','openingBalance','required');
    $this->form_validation->set_rules('openingBalance','openingBalance','required');
    $this->form_validation->set_rules('requiredSms','requiredSms','required');
    if ($this->form_validation->run() == TRUE){
      $data = array(
           'company_id' => $this->company_id,
           'customerType' => $this->input->post('customerType'),
           'customer' => $this->input->post('customer'),
           'primaryContactPerson' => $this->input->post('primaryContactPerson'),
           'email' => $this->input->post('email'),
           'mobile' => $this->input->post('mobile'),
           'billingAddress' => $this->input->post('billingAddress'),
           'addressLine2' => $this->input->post('addressLine2'),
           'city' => $this->input->post('city'),
           'state' => $this->input->post('state'),
           'pin' => $this->input->post('pin'),
           'gstinNo' => $this->input->post('gstinNo'),
           'panNo' => $this->input->post('panNo'),
           'collectionRoute' => $this->input->post('collectionRoute'),
           'openingBalance' => $this->input->post('openingBalance'),
           'requiredSms' => $this->input->post('requiredSms'),
      );  
      if($_FILES['partyImage']['name'] != ''){
          $config['upload_path']   = './assets/images/party_image'; 
          $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
          $config['max_size']      = 1048576; 
          $config['encrypt_name']  = true; 
          $this->load->library('upload', $config);
          if ( ! $this->upload->do_upload('partyImage')) {
            $error = array('error' => $this->upload->display_errors()); 
          }else { 
            $file = $this->upload->data(); 
            $data['partyImage'] = $file['file_name'];
          }
      }
      if($this->Master_model->party_master($data)){
          $this->session->set_flashdata('message', 'Record Save succesfully');
      }else{
         $this->session->set_flashdata('error', 'Record Failed');
      }
      redirect('master/party_master');
    }else{
     $this->load->view('master/party_master',$data);
    }
  }else{
       $this->load->view('master/party_master',$data);
  }   
} 
public function get_party(){
   $party = $this->Master_model->get_party(); 
   if(!empty($party)){
    $response = array('status'=>'success','code'=>'200','data'=>$party);
   }else{
    $response = array('status'=>'failed','code'=>'201','message'=>'data not found');
   }
   echo json_encode($response);
}
public function get_party_master(){
  //$company_id=$this->session->userdata('gst_login');
  $draw = $_REQUEST['draw'];
  $start = $_REQUEST['start'];
  $length = $_REQUEST['length'];
  $searchArray = $_REQUEST['search'];
  $search = $searchArray['value'];

  if($search !=''){

    $q="SELECT * FROM `msd_party_master` WHERE `active` = 1 AND `company_id` = '".$this->company_id."' AND  (`customerType` LIKE '%".$search."%' ESCAPE '!' OR  `customer` LIKE '%".$search."%' ESCAPE '!' OR  `primaryContactPerson` LIKE '%".$search."%' ESCAPE '!' OR  `email` LIKE '%".$search."%' ESCAPE '!' OR  `mobile` LIKE '%".$search."%' ESCAPE '!' OR  `billingAddress` LIKE '%".$search."%' ESCAPE '!' OR  `addressLine2`LIKE '%".$search."%' ESCAPE '!' OR  `city` LIKE '%".$search."%' ESCAPE '!' OR  `state` LIKE '%".$search."%' ESCAPE '!' OR  `pin` LIKE '%".$search."%' ESCAPE '!' OR  `gstinNo` LIKE '%".$search."%' ESCAPE '!' OR  `panNo` LIKE '%".$search."%' ESCAPE '!' OR  `collectionRoute` LIKE '%".$search."%' ESCAPE '!' OR  `openingBalance` LIKE '%".$search."%' ESCAPE '!' OR  `requiredSms` LIKE '%".$search."%' ESCAPE '!') ORDER BY `created_date` DESC, `deleted_date` DESC ";
    $totalCount = $this->db->query($q)->num_rows();
    $q.=" limit $start, $length ";
    $product = $this->db->query($q)->result_array();
  }else{
    $totalCount = $this->db->where(['active'=> 1,'company_id'=> $this->company_id])->get('msd_party_master')->num_rows();
    //print_r($totalCount);
    $product = $this->db->where(['active'=> 1,'company_id'=> $this->company_id])->limit($length, $start)->order_by("created_date DESC,deleted_date DESC")->get('msd_party_master')->result_array();
  }

  $productResult = array();
  foreach ($product as $key => $value) {
    $productResult[$key] =$value;
    $productResult[$key]['partyImage'] ="<img src='".base_url('assets/images/party_image')."/".$value['partyImage']."' style='width: 50px;'>";
    $productResult[$key]['action'] ="<a onclick='partyEdit(".$value['id'].")' class='btn btn-warning'>Edit</a>";
  }

  $data=array(
          "draw"=> $draw,
          "recordsTotal"=> $totalCount,
          "recordsFiltered"=> $totalCount,
          "data"=>$productResult
    );
  // print_r($data);
  // die();
    echo json_encode($data);
}

public function update_party_master(){
  // print_r($_FILES);
  // die;
  $id = $_POST['id'];
   $data = array(
           'customerType' => $this->input->post('customerType'),
           'customer' => $this->input->post('customer'),
           'primaryContactPerson' => $this->input->post('primaryContactPerson'),
           'email' => $this->input->post('email'),
           'mobile' => $this->input->post('mobile'),
           'billingAddress' => $this->input->post('billingAddress'),
           'addressLine2' => $this->input->post('addressLine2'),
           'city' => $this->input->post('city'),
           'state' => $this->input->post('state'),
           'pin' => $this->input->post('pin'),
           'gstinNo' => $this->input->post('gstinNo'),
           'panNo' => $this->input->post('panNo'),
           'collectionRoute' => $this->input->post('collectionRoute'),
           'openingBalance' => $this->input->post('openingBalance'),
           'requiredSms' => $this->input->post('requiredSms'),
      );
 
    if($_FILES['partyImage']['name'] != ''){
              $config['upload_path']   = './assets/images/party_image'; 
              $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
              $config['max_size']      = 1048576; 
              $config['encrypt_name']  = true; 
              $this->load->library('upload', $config);
              if ( ! $this->upload->do_upload('partyImage')) {
                $error = array('error' => $this->upload->display_errors()); 
              }else { 
                $file = $this->upload->data(); 
                $data['partyImage'] = $file['file_name'];
              }
    }
  if($id){
    $qery=$this->db->where('id',$id)->update('msd_party_master',$data);
    if(!empty($qery)){
      $response = array('status'=>'success','code'=>'200','message'=>'Record Update succesfully');
    }else{
      $response = array('status'=>'failed','code'=>'201','message'=>'Record Update Failed');
    }
  }else{
    $response = array('status'=>'failed','code'=>'201','message'=>'Invailid Records');
  }
  echo json_encode($response);
  //redirect('company/party_master');
}
public function delete_party_master(){
  $id = $_POST['id'];
  if($id){

       $qery=$this->db->query("UPDATE `msd_party_master` SET `active`='0' WHERE `id`='$id' ");
      if(!empty($qery)){
            $response = array('status'=>'success','code'=>'200','message'=>'Record Delete succesfully');
       }else{
            $response = array('status'=>'failed','code'=>'201','message'=>'Record Delete Failed');
        }
}else{
    $response = array('status'=>'failed','code'=>'201','message'=>'Invailid Records');

}
  echo json_encode($response);

}

//party master 
public function route_master(){
   $data['title']="Route Master";
    $data['page_title']="Route Master";
    $data['all_routes'] = $this->db->select('*')->where('active',1)->get('msd_route_master')->result();
  // print_r($da);
  // die();
     if($this->input->post()){  
                  $this->form_validation->set_rules('routeName','route name','required');     
              if ($this->form_validation->run() == TRUE)
                {
                  $data = array(
                     'company_id' => $this->company_id,
                     'routeName' => $this->input->post('routeName'),
                  );
                   
                 if($this->Master_model->route_master($data)){
                         $this->session->set_flashdata('message', 'Record Save succesfully');
                    }else{
                         $this->session->set_flashdata('error', 'Record Failed');
                     }
                redirect('master/route_master');
                   
             }else{
                     $this->load->view('master/Route_master',$data);
               }
     }
  else{
                        $this->load->view('master/Route_master',$data);    
    }
                   
}
public function get_route(){
   $user = $this->Master_model->get_route(); 
   if(!empty($user)){
    $response = array('status'=>'success','code'=>'200','data'=>$user);
   }else{
    $response = array('status'=>'failed','code'=>'201','message'=>'data not found');
   }
   echo json_encode($response);
}
public function delete_route_master(){
  $id = $_POST['id'];
  if($id){
     $qery=$this->db->query("UPDATE `msd_route_master` SET `active`='0' WHERE `id`='$id' ");
  if(!empty($qery)){
    $response = array('status'=>'success','code'=>'200','message'=>'Record Delete succesfully');
  }else{
    $response = array('status'=>'failed','code'=>'201','message'=>'Record Delete Failed');
  }
}else{
      $response = array('status'=>'failed','code'=>'201','message'=>'Invailid Records');
 
}
  echo json_encode($response);

}


public function tex_master(){
    $data['title']="Master";
    $data['page_title']="Taxs Master";
    $data['taxs']=$this->db->where(['active', 1,'company_id'=>$this->company_id])->get('msd_tex_master')->result();

     if($this->input->post()){
                  $this->form_validation->set_rules('texName','texName','required'); 
                  $this->form_validation->set_rules('texPercentage','texPercentage','required');     
                  $this->form_validation->set_rules('texType','texType','required');     
                  $this->form_validation->set_rules('sgst','sgst','required');     
                  $this->form_validation->set_rules('cgst','cgst','required');     
                  $this->form_validation->set_rules('igst','igst','required');     

                
          if ($this->form_validation->run() == TRUE)
        {
          //$company_id=$this->session->userdata('gst_login');

          $data = array(
            'company_id' => $this->company_id, 
            'texName' => $this->input->post('texName'),
            'texPercentage' => $this->input->post('texPercentage'),
            'texType' => $this->input->post('texType'),
            'sgst' => $this->input->post('sgst'),
            'cgst' => $this->input->post('cgst'),
            'igst' => $this->input->post('igst'),
          );

         if($this->Master_model->tex_master($data)){
          $this->session->set_flashdata('message', 'Record Save succesfully');
          }else{
          $this->session->set_flashdata('error', 'Record Failed');
          }
          
          redirect('master/tex_master');


        }
        else
        {
           $this->load->view('master/Tex_master',$data);
        }
    }else{
          $this->load->view('master/Tex_master',$data);
      }
   }  


public function get_tex_details(){

  $draw = $_REQUEST['draw'];
  $start = $_REQUEST['start'];
  $length = $_REQUEST['length'];
  $searchArray = $_REQUEST['search'];
  $search = $searchArray['value'];

  if($search !=''){





  $query = "SELECT * FROM `msd_tex_master` WHERE `active` = 1 AND `company_id` = '".$this->company_id."' AND  (`texName` LIKE '%".$search."%' ESCAPE '!'
OR  `texPercentage` LIKE '%".$search."%' OR  `texType` LIKE '%".$search."%' OR  `sgst` LIKE '%".$search."%' OR  `cgst` LIKE '%".$search."%' OR  `igst` LIKE '%".$search."%')";
    $totalCount = $this->db->query($query)->num_rows();
  $query .= "ORDER BY `created_date` DESC, `deleted_date` DESC LIMIT 10";
    $product = $this->db->query($query)->result_array();

   
  }else{
    $totalCount = $this->db->where(['active'=>1,'company_id'=>$this->company_id])->get('msd_tex_master')->num_rows();
     $product = $this->db->where(['active'=>1,'company_id'=>$this->company_id])->limit($length, $start)->order_by("created_date DESC,deleted_date DESC")->get('msd_tex_master')->result_array();
  }

  $productResult = array();
  foreach ($product as $key => $value) {
    $productResult[$key] =$value;
    $productResult[$key]['action'] ="<a onclick='texEdit(".$value['id'].")' class='btn btn-warning'>Edit</a>";
  }

  $data=array(
          "draw"=> $draw,
          "recordsTotal"=> $totalCount,
          "recordsFiltered"=> $totalCount,
          "data"=>$productResult
    );
    echo json_encode($data);
}

public function update_tex_master(){
    $id = $_POST['id'];
    $texName= $_POST['texName'];
    $texPercentage= $_POST['texPercentage'];
    $texType= $_POST['texType'];
    $sgst= $_POST['sgst'];
    $cgst= $_POST['cgst'];
    $igst= $_POST['igst'];
if($id){ 
      $qery=$this->db->query("UPDATE `msd_tex_master` SET `texName`='$texName',`texPercentage`='$texPercentage',`texType`='$texType',`sgst`='$sgst',`cgst`='$cgst',`igst`='$igst' WHERE `id`='$id'");
      if($qery){
         //  $this->session->set_flashdata('message','data update successfully');
          $response = array('status'=>'success','message'=>'data update successfully');
        }else{
           // $this->session->set_flashdata('error','data update Failed');
          $response = array('status'=>'failed','message'=>'data update failed');
         }
  }else{
      //$this->session->set_flashdata('error','Invalid Records');
      $response = array('status'=>'failed','message'=>'Invalid Records');
  }
    echo json_encode($response);
  
}


public function get_tex(){
   $tex = $this->Master_model->get_tex(); 
   if(!empty($tex)){
    $response = array('status'=>'success','code'=>'200','data'=>$tex);
   }else{
    $response = array('status'=>'failed','code'=>'201','message'=>'data not found');
   }
   echo json_encode($response);
}


public function delete_tex_master(){
  $id = $_POST['id'];
  if($id){
  $qery= $this->db->query("UPDATE `msd_tex_master` SET `active`='0' WHERE `id`='$id' ");
  if($qery){
    $response = array('status'=>'success','message'=>'data Delete successfully');
  }else{
    $response = array('status'=>'failed','message'=>'data Delete failed');
  }
  }else{
       $response = array('status'=>'failed','message'=>'Invailid Records');
 
  }
  echo json_encode($response);
}
//end tex master

public function unit_master(){
   $data['title']="Master";
  $data['page_title']="Unit Master";
$data['all_units'] = $this->db->where('active',1 )->get('msd_unit_master')->result();
     if($this->input->post()){
              $this->form_validation->set_rules('unitName','unitName','required',array('required'=>'%s required'));     
            if($this->form_validation->run() == TRUE)
                {
                   // $company_id=$this->session->userdata('gst_login');

                        $data = array(
                         'company_id' => $this->company_id,
                         //'parent_id' => $this->input->post('unit') ,
                         'unit' => $this->input->post('unitName'),
                                     
                  );
               if($this->Master_model->unit_master($data)){
                   $this->session->set_flashdata('message', 'Data Save succesfully');
                     }
                  else{
                      $this->session->set_flashdata('error', 'faild');
                    }
                       redirect('master/unit_master');            
             }else{         
                    $this->load->view('master/Unit_master',$data);
          }

      }else{
                     $this->load->view('master/Unit_master',$data);
          }
 }                 
public function get_unit(){
   $user = $this->Master_model->get_unit(); 
   if(!empty($user)){
    $response = array('status'=>'success','code'=>'200','data'=>$user);
   }else{
    $response = array('status'=>'failed','code'=>'201','message'=>'data not found');
   }
   echo json_encode($response);
}     
public function delete_unit_master(){
  $id = $_POST['id'];
  if($id){
     $qery=$this->db->query("UPDATE `msd_unit_master` SET `active`='0' WHERE `id`='$id' ");
  if(!empty($qery)){
    $response = array('status'=>'success','code'=>'200','message'=>'Record Delete succesfully');
  }else{
    $response = array('status'=>'failed','code'=>'201','message'=>'Record Delete Failed');
  }
}else{
      $response = array('status'=>'failed','code'=>'201','message'=>'Invailid Records');
 
}
  echo json_encode($response);

}
//user master start
public function user_master(){
    $data['title']="Company";
    $data['page_title']="user master";

    $this->db->select('*');
    $this->db->from('msd_user_master');
    $this->db->where('active', 1);
    $query = $this->db->get();
    $data['user'] = $query->result();
    if($this->input->post()){

             // $this->form_validation->set_rules('company_id','company_id','required');
              $this->form_validation->set_rules('userName','userName','required'); 
              $this->form_validation->set_rules('name','name','required');
              $this->form_validation->set_rules('email','email','required');
              $this->form_validation->set_rules('mobile','mobile','required');
              $this->form_validation->set_rules('password','password','required');
              
          if ($this->form_validation->run() == TRUE){
            $data = array(
                         'company_id' => $this->company_id,
                         'userName' => $this->input->post('userName'),
                         'name' => $this->input->post('name'),
                         'email' => $this->input->post('email'),
                         'mobile' => $this->input->post('mobile'),
                         'password' => $this->input->post('password')
                                          );
           
             

          if($this->Master_model->user_master($data)){
          $this->session->set_flashdata('message', 'Record Save succesfully');
          }else{
          $this->session->set_flashdata('error', 'Record Failed');
          }

          redirect('master/user_master');
          }else{
                  $this->load->view('master/user_master',$data);
          }
    }else{
         $this->load->view('master/user_master',$data);
    }   
} 
public function get_user(){
   $product = $this->Master_model->get_user(); 
   if(!empty($product)){
    $response = array('status'=>'success','code'=>'200','data'=>$product);
   }else{
    $response = array('status'=>'failed','code'=>'201','message'=>'data not found');
   }
   echo json_encode($response);
}
public function get_user_master(){

  $draw = $_REQUEST['draw'];
  $start = $_REQUEST['start'];
  $length = $_REQUEST['length'];
  $searchArray = $_REQUEST['search'];
  $search = $searchArray['value'];

  if($search !=''){
    $totalCount = $this->db->where('active', 1)->like('userName',$search)->or_like(array('name'=>$search,'email'=>$search,'mobile'=>$search,'password'=>$search))->get('msd_user_master')->num_rows();
  
    $product = $this->db->where('active', 1)->like('userName',$search)->or_like(array('name'=>$search,'email'=>$search,'mobile'=>$search,'password'=>$search))->limit($length, $start)->order_by("created_date DESC,deleted_date DESC")->get('msd_user_master')->result_array();
    
  }else{
    $totalCount = $this->db->where('active', 1)->get('msd_user_master')->num_rows();
//print_r($totalCount);
    $product = $this->db->where('active', 1)->limit($length, $start)->order_by("created_date DESC,deleted_date DESC")->get('msd_user_master')->result_array();
  }

  $productResult = array();
  foreach ($product as $key => $value) {
    $productResult[$key] =$value;
    $productResult[$key]['action'] ="<a onclick='userEdit(".$value['id'].")' class='btn btn-warning'>Edit</a>";
  }

  $data=array(
          "draw"=> $draw,
          "recordsTotal"=> $totalCount,
          "recordsFiltered"=> $totalCount,
          "data"=>$productResult
    );
  // print_r($data);
  // die();
    echo json_encode($data);
}

public function update_user_master(){
  $id = $_POST['id'];
  //$company_id= $_POST['company_id'];
  $userName= $_POST['userName'];
  $name= $_POST['name'];
  $email= $_POST['email'];
  $mobile= $_POST['mobile'];
  $password= $_POST['password'];
  
    if($id){
       $qery=$this->db->query("UPDATE `msd_user_master` SET `userName`='$userName',`name`='$name',`email`='$email',`mobile`='$mobile',`password`='$password' WHERE `id`='$id' ");
  if($qery){
      //$this->session->set_flashdata('message','data update successfully');
      $response = array('status'=>'success','message'=>'data update successfully');
    }else{
      //$this->session->set_flashdata('error','data update Failed');
      $response = array('status'=>'failed','message'=>'data update failed');
    }
  }else{
          $response = array('status'=>'failed','message'=>'Invailid Records');

  }
    echo json_encode($response);
  
}
public function delete_user_master(){
  $id = $_POST['id'];
  if($id){
        $qery=$this->db->query("UPDATE `msd_user_master` SET `active`='0' WHERE `id`='$id' ");
          if(!empty($qery)){
        $response = array('status'=>'success','code'=>'200','message'=>'Record Delete succesfully');
      }else{
       $response = array('status'=>'failed','code'=>'201','message'=>'Record Delete Failed');
  }
  }else{
           $response = array('status'=>'failed','code'=>'201','message'=>'Invailid Records');
     }
  echo json_encode($response);
}


//end user master
 // product_services start  


 public function product_services($id=null){
    $data['title']="Company";
    $data['page_title']="product services";
            
            $query=$this->db->select('*')->where(['texType'=>'sales','company_id'=>$this->company_id])->group_by('texName')->get('msd_tex_master');

            $data['tax']=$query->result();
            $q=$this->db->select('*')->where(['texType'=>'purchase', 'company_id'=>$this->company_id])->group_by('texName')->get('msd_tex_master');
           $data['taxPurchase']=$q->result();
           $que=$this->db->select('*')->where(['active'=>1,'company_id'=>$this->company_id])->group_by('unit')->get('msd_unit_master');
           $data['unit']=$que->result();
 
 
    if($this->input->post()){

             // $this->form_validation->set_rules('company_id','company_id','required');
              $this->form_validation->set_rules('productCode','productCode','required'); 
              $this->form_validation->set_rules('productGroup','productGroup','required');
              $this->form_validation->set_rules('productName','productName','required');
              $this->form_validation->set_rules('productType','productType','required');
              $this->form_validation->set_rules('productDescription','productDescription','required');
              $this->form_validation->set_rules('sellingPrice','sellingPrice','required');
              $this->form_validation->set_rules('productPrice','productPrice','required');
              $this->form_validation->set_rules('mrpPrice','mrpPrice','required');
              $this->form_validation->set_rules('openingStock','openingStock','required');
              $this->form_validation->set_rules('unitType','unitType','required');
              $this->form_validation->set_rules('salesType','salesType','required');
              $this->form_validation->set_rules('purchaseType','purchaseType','required');
              $this->form_validation->set_rules('calculation','calculation','required');
              $this->form_validation->set_rules('negativeStock','negativeStock','required');
              $this->form_validation->set_rules('hsnCode','hsnCode','required');
              $this->form_validation->set_rules('minQty','minQty','required');
              $this->form_validation->set_rules('subUnit','subUnit','required');
              
          if ($this->form_validation->run() == TRUE){

                      $config['upload_path']   = './assets/master/uploads/'; 
                      $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
                      $config['max_size']      = 100; 
                      $config['max_width']     = 1024; 
                      $config['max_height']    = 768;  
                      $this->load->library('upload', $config);
      
                    if ( ! $this->upload->do_upload('productImage')) {
                      $error = array('error' => $this->upload->display_errors()); 
                    }else { 
                       $file = $this->upload->data(); 
                    } 
            $data = array(
                         'company_id' => $this->company_id,
                         'productCode' => $this->input->post('productCode'),
                         'productGroup' => $this->input->post('productGroup'),
                         'productName' => $this->input->post('productName'),
                         'productType' => $this->input->post('productType'),
                         'productDescription' => $this->input->post('productDescription'),
                         'sellingPrice' => $this->input->post('sellingPrice'),
                         'productPrice' => $this->input->post('productPrice'),
                         'mrpPrice' => $this->input->post('mrpPrice'),
                         'openingStock' => $this->input->post('openingStock'),
                         'unitType' => $this->input->post('unitType'),
                         'salesType' => $this->input->post('salesType'),
                         'purchaseType' => $this->input->post('purchaseType'),
                         'calculation' => $this->input->post('calculation'),
                         'negativeStock' => $this->input->post('negativeStock'),
                         'hsnCode' => $this->input->post('hsnCode'),
                         'minQty' => $this->input->post('minQty'),
                         'subUnit' => $this->input->post('subUnit'),
                         'productImage' => $file['client_name'],
              );
           
              

               if($this->Master_model->product_services($data)){
                $this->session->set_flashdata('message', 'Record Save succesfully');
                    }else{
                 $this->session->set_flashdata('error', 'Record Failed');
                     }

                   redirect('master/product_services');
           
          }else{
                $this->load->view('master/product_services',$data);
          }
    }else{
         $this->load->view('master/product_services',$data);
    }   
} 
public function get_product(){
   $product = $this->Master_model->get_product(); 
   if(!empty($product)){
    $response = array('status'=>'success','code'=>'200','data'=>$product);
   }else{
    $response = array('status'=>'failed','code'=>'201','message'=>'data not found');
   }
   echo json_encode($response);
}
public function get_product_services(){

  $draw = $_REQUEST['draw'];
  $start = $_REQUEST['start'];
  $length = $_REQUEST['length'];
  $searchArray = $_REQUEST['search'];
  $search = $searchArray['value'];

  if($search !=''){

 $q="SELECT * FROM `msd_product_services` WHERE `active` = 1 AND `company_id` = '".$this->company_id."' AND  (`productCode` LIKE '%".$search."%' ESCAPE '!' OR  `productGroup` LIKE '%".$search."%' ESCAPE '!' OR  `productName` LIKE '%".$search."%' ESCAPE '!' OR  `productType` LIKE '%".$search."%' ESCAPE '!' OR  `productDescription` LIKE '%".$search."%' ESCAPE '!' OR  `sellingPrice` LIKE '%".$search."%' ESCAPE '!' OR  `productPrice`LIKE '%".$search."%' ESCAPE '!' OR  `mrpPrice` LIKE '%".$search."%' ESCAPE '!' OR  `openingStock` LIKE '%".$search."%' ESCAPE '!' OR  `unitType` LIKE '%".$search."%' ESCAPE '!' OR  `salesType` LIKE '%".$search."%' ESCAPE '!' OR  `purchaseType` LIKE '%".$search."%' ESCAPE '!' OR  `calculation` LIKE '%".$search."%' ESCAPE '!' OR  `negativeStock` LIKE '%".$search."%' ESCAPE '!' OR  `hsnCode` LIKE '%".$search."%' ESCAPE '!' OR  `minQty` LIKE '%".$search."%' ESCAPE '!' OR  `subUnit` LIKE '%".$search."%' ESCAPE '!') ORDER BY `created_date` DESC, `deleted_date` DESC ";
    $totalCount = $this->db->query($q)->num_rows();
    $q.=" limit $start, $length ";
    $product = $this->db->query($q)->result_array();
    //echo $this->db->last_query();

    // $totalCount = $this->db->where('active', 1)->like('productCode',$search)->or_like(array('productGroup'=>$search,'productName'=>$search,'productType'=>$search,'productDescription'=>$search,'sellingPrice'=>$search,'productPrice'=>$search,'mrpPrice'=>$search,'openingStock'=>$search,'unitType'=>$search,'salesType'=>$search,'purchaseType'=>$search,'calculation'=>$search,'negativeStock'=>$search,'hsnCode'=>$search,'minQty'=>$search,'subUnit'))->get('msd_product_services')->num_rows();
  
    // $product = $this->db->where('active', 1)->like('productCode',$search)->or_like(array('productGroup'=>$search,'productName'=>$search,'productType'=>$search,'productDescription'=>$search,'sellingPrice'=>$search,'productPrice'=>$search,'mrpPrice'=>$search,'openingStock'=>$search,'unitType'=>$search,'salesType'=>$search,'purchaseType'=>$search,'calculation'=>$search,'negativeStock'=>$search,'hsnCode'=>$search,'minQty'=>$search,'subUnit'))->limit($length, $start)->order_by("created_date DESC,deleted_date DESC")->get('msd_product_services')->result_array();
    
  }else{
    $totalCount = $this->db->where('active', 1)->get('msd_product_services')->num_rows();
    $product = $this->db->where('active', 1)->limit($length, $start)->order_by("created_date DESC,deleted_date DESC")->get('msd_product_services')->result_array();
  }

  $productResult = array();
  foreach ($product as $key => $value) {
    $productResult[$key] =$value;
    $productResult[$key]['productImage'] ="<img src='".base_url('assets/master/uploads')."/".$value['productImage']."' style='width: 50px;'>";
    $productResult[$key]['action'] ="<a onclick='productEdit(".$value['id'].")' class='btn btn-warning'>Edit</a>&nbsp;<a href=' ".base_url('master/product_view/'.$value['id'].'')." 'class='btn btn-success'>View</a>";
  }

  $data=array(
          "draw"=> $draw,
          "recordsTotal"=> $totalCount,
          "recordsFiltered"=> $totalCount,
          "data"=>$productResult
    );
    echo json_encode($data);
}

public function update_product_services(){
 $productImage =$_POST['old_image'];
  if($_FILES['productImage']['name'] != ''){
    $config['upload_path']   = './assets/master/uploads/'; 
    $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
    $config['max_size']      = 1048576; 
    $config['encrypt_name']      = true; 
    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('productImage')) {
      $error = array('error' => $this->upload->display_errors());
    }else { 
      $file = $this->upload->data();
      $productImage=$file['file_name'];
    }
  }else{
        $productImage =$_POST['old_image'];
  }   

  $id = $_POST['id'];
  $productCode= $_POST['productCode'];
  $productGroup= $_POST['productGroup'];
  $productName= $_POST['productName'];
  $productType= $_POST['productType'];
  $productDescription= $_POST['productDescription'];
  $sellingPrice= $_POST['sellingPrice'];
  $productPrice= $_POST['productPrice'];
  $mrpPrice= $_POST['mrpPrice'];
  $openingStock= $_POST['openingStock'];
  $unitType= $_POST['unitType'];
  $salesType= $_POST['salesType']?$_POST['salesType']:'';
  $purchaseType= $_POST['purchaseType'];
  $calculation= $_POST['calculation'];
  $negativeStock= $_POST['negativeStock'];
  $hsnCode= $_POST['hsnCode'];
  $minQty= $_POST['minQty'];
  $subUnit= $_POST['subUnit'];

  
  $qery=$this->db->query("UPDATE `msd_product_services` SET `productCode`='$productCode',`productGroup`='$productGroup',`productName`='$productName',`productType`='$productType',`productDescription`='$productDescription',`sellingPrice`='$sellingPrice',`productPrice`='$productPrice',`mrpPrice`='$mrpPrice',`openingStock`='$openingStock',`unitType`='$unitType',`salesType`='$salesType',`purchaseType`='$purchaseType',`calculation`='$calculation',`negativeStock`='$negativeStock',`hsnCode`='$hsnCode',`minQty`='$minQty',`subUnit`='$subUnit',`productImage`='$productImage' WHERE `id`='$id' ");
   if($id){
    if($qery){
        //$this->session->set_flashdata('message','data update successfully');
        $response = array('status'=>'success','message'=>'data update successfully');
      }else{
        //$this->session->set_flashdata('error','data update Failed');
        $response = array('status'=>'failed','message'=>'data update failed');
      }
    }else{
            $response = array('status'=>'failed','message'=>'Invailid Records');

    }
    echo json_encode($response);
  
}
public function product_view($id){
  $data['title']="Company";
  $data['page_title']="product services datails";
  //$id=$this->input->post('id');
  $data['product']=$this->db->select('*')->where('id',$id)->get('msd_product_services')->result();
  
  $this->load->view('master/product_view',$data);
}
public function delete_product_master(){
  $id = $_POST['id'];
  if($id){
  $qery=$this->db->query("UPDATE `msd_product_services` SET `active`='0' WHERE `id`='$id' ");
  if($qery){
    $response = array('status'=>'success','message'=>'data Delete successfully');
  }else{
    $response = array('status'=>'failed','message'=>'data Delete failed');
  }
}else{
      $response = array('status'=>'failed','message'=>'Invailid Records');

}
  echo json_encode($response);

}
                   
// product services end //
  public function createCompany()
   { 
    $data['companyName']=$this->Company_model->CompanyList();
   if ($this->input->post('submit')) {

      $this->form_validation->set_rules('companyName', 'Company Name', 'required',array('required'=>'%s Required') );
      $this->form_validation->set_rules('natureOfBusiness', 'Nature of Business', 'required',array('required'=>'%s Required') );
      $this->form_validation->set_rules('accountMode', 'Account Mode', 'required',array('required'=>'%s Required') );
        if($this->form_validation->run() == FALSE){
                 $this->load->view('master/create_company',$data); 
        }else{
        $filename=$_FILES['logoImage']['name'];
        $tempname=$_FILES['logo']['tmp_name'];
        $folder="assets/images/".$filename;
        move_uploaded_file($tempname,$folder);
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
          "logo"=>$this->input->post('logo'),
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
          'logoImage' => $folder
        );
            
      $data = $this->Company_model->gstDetailsInsert($arr3);

     if($data) {
        $this->session->set_flashdata('error', 'Create Company successfully');

          redirect("company/createCompany");
        
        }else{
         $this->load->view('template/header',$data);
         $this->load->view('template/sidemenu');
         $this->load->view('template/topbar');
         $this->load->view('template/breadcrumbs');
         $this->load->view('create_company'); 
         $this->load->view('template/footer');
      
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
   $this->load->view('template/header');
         $this->load->view('template/sidemenu');
         $this->load->view('template/topbar');
         $this->load->view('template/breadcrumbs');
           $this->load->view('company_list');

         $this->load->view('template/footer');
}
  
  // ----------------get data---------------------
public function getgroup(){
    
     $arr =array();
     $arr = array('val'=>$_REQUEST['val']);  
     $valu['allprojects'] = $this->Login_model->getGroup($arr); 
     echo json_encode($valu);

}
 // --------------------------------
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


}