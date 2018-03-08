<?php 
session_start();
//Connection to the Database Start here
$connect= @mysqli_connect('localhost','root','','time') or die('Could Not Connect to the Database, Please Contact the Administrator of KED Systems.');
//Connection to the Database Start here

	if (isset($_SESSION["id"])=="" ) {
		header('location: functions/logout');
	}
        
    $rem = strtotime($ti['working_hour']) - time();
	$day = floor($rem / 86400);
	$hr  = floor(($rem % 86400) / 3600);
	$min = floor(($rem % 3600) / 60);
	$sec = ($rem % 60);
	if($hr==0 && $min==20){
		$alertMessage="<center>
 				<div class='alert  alert-danger alert-dismissible fade show' role='alert'>
                  <span class='badge badge-pill badge-danger'><i class='fa fa-check-circle'></i></span> Your have ".$min."Minutes before the system signs you out.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            </center>";
	}elseif($min==0 && $sec==20){
		$alertMessage="<center>
 				<div class='alert  alert-danger alert-dismissible fade show' role='alert'>
                  <span class='badge badge-pill badge-danger'><i class='fa fa-check-circle'></i></span> Your have ".$sec."Seconds before the system signs you out.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            </center>";
	}
	$id=$_SESSION['id'];
if(!empty($id)){
    $check= mysqli_query($connect, "SELECT * FROM employees WHERE id=$id")or die("Unable to process request epl");
    if (mysqli_num_rows($check)>0) {
        $user_info=mysqli_fetch_array($check);
    }
}
    $username=$user_info['username'];
 ?>
