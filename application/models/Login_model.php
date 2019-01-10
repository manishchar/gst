<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {
      
public function getGroup(){ 
  $this->db->select('*');
  $this->db->from('companymaster'); 
  $this->db->where("cmId='". $_REQUEST['val']."'"); 
  $query1 = $this->db->get();
  return $query1->row();
}

  // -------------delete--------------------------------


    public function userLogin()
    {  
    	$email=$this->input->post('email');
    	$password=$this->input->post('password');	
      $result=$this->db->query("SELECT * FROM users  WHERE userId='".$email."' AND password='".md5($password)."' AND status=1")->row(); 

       	if(!empty($result))
       	{
            $userData=['loginId'=>$result->loginId,
              'company_id'=>$result->company_id,
              'company_name'=>$result->fullName,
              'email'=>$result->userId,
     				  ];
     		   $this->session->set_userdata($userData);
     		   return true;			  
       	}
       	else
       	{
          $this->session->set_flashdata('error','Invalid email id or password.');
       		echo false;
       	}

    }



    public function adminProfile()
{
  $this->db->select('t1.*,t2.*,t3.*');
  $this->db->from('users as t1');
  $this->db->join('user_contact as t2', 't1.loginId = t2.loginid');
  $this->db->join('user_details as t3', 't1.loginId = t3.loginId');
  $this->db->where('t1.loginId',$this->session->userdata['userLoginId']);
      $query = $this->db->get();
      return $query->row();
      }       
// ---------------------------------------
 
//....................................... 
  // public function topbarProfile(){
  //   $this->db->select('*');
  //   $this->db->from('user_details');
  //   $this->db->where('loginId',$this->session->userdata['userLoginId']);
  //   $query = $this->db->get();
  //     return $query->row();

  // }

 public function adminProfileUpdate($loginId)
{
 

   $loginId=$this->input->post('loginId');
   $fullName=$this->input->post('fullName');
   $contact_no=$this->input->post('contact_no');


if($_FILES['userProfilePic']['name'] != ""){
    $filename=$_FILES['userProfilePic']['name'];
    $tempname=$_FILES['userProfilePic']['tmp_name'];
    $folder="assets/images/".$filename;
    move_uploaded_file($tempname,$folder);

      $data = array('userProfilePic' => $folder);
      $this->db->where('loginId', $loginId);
      $user_details=$this->db->update('user_details',$data);
      if ($user_details) {
       return true;
      }else{
        return false;
      }
}

  $data1 = array(
    'fullName' => $fullName
  );
  $this->db->where('loginId', $loginId);
  $this->db->update('users',$data1);
  

 $data2 = array('contact_no' => $contact_no);
  $this->db->where('loginid', $loginId);
  $this->db->update('user_contact',$data2);
  
  if($this->db->trans_status() === TRUE){
   return true;
  }else{
    return false;
  }

}         
// .......................................................



// ++++++++++++++++++++++++++++++++++++++++++++++++++++++
  } 