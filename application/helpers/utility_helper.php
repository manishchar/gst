<?php
function show_error_messages($message = "")
{

    if (empty($message)) {

        $CI = &get_instance();

        $message = $CI->session->flashdata("message");

    }
    if (!trim($message) == "") {

        echo '<div class="callout callout-danger">';

        echo $message;

        echo '</div>';

    }

}

function set_flash_message($type = "success", $message)

{

    $CI = &get_instance();

    $cls="alert-success";

    $errorcls="badge-success";

    if($type=="error"){

        $cls="alert-danger";

        $errorcls="badge-danger";

    }

 $msg='<div class="col-sm-12">

<div class="alert  '.$cls.' alert-dismissible fade show" role="alert">

  <span class="badge badge-pill  '.$errorcls.'">Error</span> &nbsp;'.$message.'

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">

  <span aria-hidden="true">&times;</span>

    </button>

</div>

</div>';

$CI->session->set_flashdata("message",$msg);
}



function convert_to_mysql_date($format,$date){
	$date = DateTime::createFromFormat($format, $date);
	return $date->format('Y-m-d');
}

function convert_to_html_date($date){
    $date = DateTime::createFromFormat('Y-m-d', $date);
    return $date->format('m/d/Y');
}

function convert_mysql_to_calender_date($date){

    $date = DateTime::createFromFormat('Y-m-d H:i:s', $date);
    return $date->format('Y-m-d');
}

function convert_mysql_to_readable_date($date){
    return $date->format('d-M-Y g:i:s a');
}

function convert_to_mysql_timestamp($date){
    return $date->format('Y-m-d H:i:s');
}

function convert_to_mysql_timestamp_date($date){
    return  date('Y-m-d H:i:s', strtotime($date));
}

function draw_json_encode($array){
    echo json_encode($array);exit;

}

function add_record($table,$data) 
{
        $CI = &get_instance();
        $CI->db->insert($table, $data);
        return $CI->db->insert_id();
}



function delete_record($table,$coloum,$val) 
{
        $CI = &get_instance();
        $CI->db->where($coloum, $val);
		return $CI->db->delete($table);
}



function delete_multipleCond($table,$con) 
{
        $CI = &get_instance();
    return $CI->db->query("DELETE FROM $table where $con");
}

function multiple($select,$from,$where)
{
    $CI = &get_instance();
    $select . $from . $where;
    $CI->db->select($select);
    $CI->db->from($from);
    $CI->db->where($where);
    $query = $CI->db->get();
    return $query->result();

}

function update($table,$data,$where)
 {

    $CI = &get_instance();
    $query = $CI->db->update($table, $data, $where);
    return $CI->db->affected_rows();

}

function printR($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

function isTodayDate($date){
    $timestamp = strtotime($date);
    $date = date('d/m/Y', $timestamp);
    if($date == date('d/m/Y')) {
        return true;
    }else{
        return false;

    }

}

function isAfterNowDateTime($date){
    $timestamp = strtotime($date);
    $now = new DateTime();
    $timestampNow = $now->getTimestamp();
    if($timestamp>$timestampNow) {
        return true;
    }else{
        return false;
    }

}

function dateDifferenceFromNow($date){
    $timestamp = strtotime($date);
    $now = new DateTime();
    $timestampNow = $now->getTimestamp();
    return $timestamp-$timestampNow;
}



function base_encode($data){
	$encoded = base64_encode(base64_encode(base64_encode($data)));
	return rtrim(strtr($encoded, '+/', '-_'), '=');
}



function base_decode($data){
	$data = strtr($data, '-_', '+/');
	return base64_decode(base64_decode(base64_decode($data)));
}



function ArrayToHTMLOptions($option_array, $selected = null){

	$options = "";
	foreach ($option_array as $key => $val){
		$options .= (!is_null($selected) && $key == $selected) ? "<option value='$key' selected='selected'>$val</option>" : "<option value='$key'>$val</option>";
	}
	return $options;
}



function print_array($data){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}



function singledata($tablename,$colname,$val)
{

   $CI = &get_instance();
   $query="SELECT *  FROM `$tablename` where $colname = '".$val."'";
   $q = $CI->db->query($query);
   return $q->row_array();
}

function multiconsingledata($tablename,$condi)

{
   $CI = &get_instance();
   $query="SELECT *  FROM `$tablename` where $condi ";
   $q = $CI->db->query($query);
   return $q->row_array();
}

function multiplecon($tablename,$condi,$groupby)
{

$CI = &get_instance();
if($condi!='')
{
  $query="SELECT *  FROM `$tablename` where $condi";
}
else
{
  $query="SELECT *  FROM `$tablename`"; 
}
$q = $CI->db->query($query);
return $q->result();
}



function multipledata($tablename,$condi)

{
   $CI = &get_instance();
   if($condi!='')
   {
   $query="SELECT *  FROM `$tablename` where $condi ";
   }
   else
   {

   $query="SELECT *  FROM `$tablename` ";
   }
   $q = $CI->db->query($query);
    return $q->result();
}

function getBuckets()
{
   $CI = &get_instance();
   $datalist=array();
   $query="SELECT bucketid,bucket_color,bucket_name  FROM buckets where bucket_status=1";
   $q = $CI->db->query($query);
   $res= $q->result();
foreach ($res as $value) { 
  $CI->db->select('general_info.id')
         ->from('general_info')
         ->join('user_details', 'general_info.id = user_details.info_id')
         ->join('task_assigned', 'general_info.id = task_assigned.taskid')
         ->join('tbl_login', 'task_assigned.userid = tbl_login.id')
         ->where('task_assigned.stage',$value->bucketid)
         ->where('general_info.steps_follow',12)
         ->where('general_info.archive', NULL, TRUE);  
         $result =$CI->db->get();
       //  array_push(, var)
         print_r($value);
         break;
         $value[]['count']=count($result->result());
         $datalist[]=$value;
}
//print_r($datalist);
   // $CI = &get_instance();
   // $CI->db->select('buckets.bucketid,buckets.bucket_color,buckets.name')
   //       ->from('buckets')
   //       ->join('user_details', 'general_info.id = user_details.info_id')
   //       ->join('user_details', 'general_info.id = user_details.info_id')
   //       ->join('task_assigned', 'general_info.id = task_assigned.taskid')
   //       ->join('tbl_login', 'task_assigned.userid = tbl_login.id')
   //       ->where('task_assigned.stage',$stage)
   //       ->where('general_info.steps_follow',12)
   //       ->where('general_info.archive', NULL, TRUE);  


}

function multipleconsngledata($tablename,$condi)
{
   $CI = &get_instance();
   $query="SELECT *  FROM `$tablename` where $condi ";
   $q = $CI->db->query($query);
   return $q->row_array();
}

function countrecord($stage)
{
   $CI = &get_instance();
   $CI->db->select('general_info.id')
         ->from('general_info')
         ->join('user_details', 'general_info.id = user_details.info_id')
         ->join('task_assigned', 'general_info.id = task_assigned.taskid')
         ->join('tbl_login', 'task_assigned.userid = tbl_login.id')
         ->where('task_assigned.stage',$stage)
         ->where('general_info.steps_follow',12)
         ->where('general_info.archive', NULL, TRUE);  
$result =$CI->db->get();
return count($result->result());

}

function countnotification($userid)
{
   $query="SELECT count(*) as totaldata FROM notification_table INNER JOIN tbl_login ON tbl_login.id= notification_table.notify_for INNER JOIN general_info ON general_info.id=notification_table.notify_lead JOIN task_assigned ON task_assigned.taskid=notification_table.notify_lead WHERE tbl_login.user_id='".$userid."' AND notification_table.read_status=0 ORDER BY date(notification_table.notify_date) DESC";
   $CI = &get_instance();
   $q=$CI->db->query($query);
$result =$q->row_array();
return $result['totaldata'];

}

function get_alldata($table,$where,$rows,$returntype)
{

 if($rows!='*')
 {
    $rows= implode(',', $rows);
 }
 else
 {
    $rows="*";
 }
$CI = &get_instance();
$CI->db->select($rows)->from($table)->where($where);
$result =$CI->db->get();
if($returntype=='single')
{
  return $result->row_array();
}
else
{
  return $result->result(); 
}

}










