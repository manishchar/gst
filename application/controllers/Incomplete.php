<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Incomplete extends CI_Controller {
  public function __construct() {
        parent::__construct();
        $this->load->model("Login_model");
      if (!$this->session->userdata('crm_id'))
       {
             redirect(base_url());
        }
    }

	public function index()
	{
    $data['page_title'] = "Incomplete Lead";
		$this->load->view('admin/lead/incomplete',$data);
		
	}

  public function getDaTaRecords()
  {

   $requestData= $_REQUEST;
   // print_r($requestData);
   // die();
    $columns = array( 
      0 =>'invoice_no', 
      1 => 'product_name',
      2 => 'delivery_status',
      3 => 'pin_code',
      4 => 'city',
      5 => 'country',
      6 => 'action'
    );
$sql = "SELECT * ";
$sql.=" FROM order_product WHERE 1=1";
// if( !empty($requestData['search']['value']) ) {  
//   $sql.=" AND ( invoice_no LIKE '".$requestData['search']['value']."%' ";    
//   $sql.=" OR product_name LIKE '".$requestData['search']['value']."%' ";
//   $sql.=" OR pin_code LIKE '".$requestData['search']['value']."%' )";
// }

$res=$this->db->query($sql)->result();
$totalData = count($res);
$totalFiltered = $totalData;
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";

//echo $sql;
$data=array();
$i=0;

$result=$this->db->query($sql)->result();
foreach ($result  as $value) {
  $nestedData=array(); 
  $nestedData['invoice_no'] ='<div class="form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="leadids[]" value="'.$value->id.'"><span class="checkbox-icon fuse-ripple-ready"></span><span>'.$value->invoice_no.'</span></label></div>&nbsp;';
  $nestedData['product_name'] =$value->product_name;
  $nestedData['delivery_status'] =$value->delivery_status;
  $nestedData['pin_code'] =$value->pin_code;
  $nestedData['city'] =$value->city;
  $nestedData['country'] =$value->country;
  $nestedData['action'] ='<a style="cursor:pointer;" data-toggle="modal"  onclick="add_notes('.$value->id.')" title="Add Notes"><i class="icon-plus-box"></i></a>&nbsp;<a title="View Details" style="position: absolute;"><i class="icon-eye"></i></a>';
  $data[] = $nestedData;
}
$json_data = array("draw"=>intval($requestData['draw']),"recordsTotal"=> intval( $totalData),"recordsFiltered" => intval( $totalFiltered ),"records"=> $data);


echo json_encode($json_data);


  }
}
