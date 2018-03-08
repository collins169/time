<?php 
	session_start();
	$connect= @mysqli_connect('localhost','root','','time') or die('Could Not Connect to the Database, Please Contact the Administrator of KED Systems.');
	$start_time=$_SESSION['time'];
	$time= date ('H:i:s',time());
	$modified= date ("Y-m-d H:i:s", time());

		$id=$_SESSION['id'];
if(!empty($id)){
		$update2=mysqli_query($connect, "UPDATE attendances SET end_time='$time',modified='$modified',status=1 WHERE employees_id=$id")or die('Unable to process update statemnet');
			if($update2==TRUE){
			session_destroy();
			unset($_SESSION['id']);
			unset($_SESSION['time']);
			unset($_SESSION['working_hour']);
			header('location:../login');
			}
}else{
	session_destroy();
	header('location:../login');
}
	// echo "<script>window.location='../login.php'</script>";
 ?>