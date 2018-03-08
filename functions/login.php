<?php 
	session_start();
	//Creating Connection with the database.
	$connect= @mysqli_connect('localhost','root','','time') or die('Could Not Connect to the Database, Please Contact the Administrator of KED Systems.');
	//---------------------------------Check if Session Has been started before----------------------
	if (isset($_SESSION["id"])!="" ) {
		header('location: index');
	}
	
	//---------------------------------Check if Session Has been started before ends----------------------

	if (isset($_POST['login'])) {
		$email=mysqli_real_escape_string($connect,$_POST['email']);
		$password=md5(mysqli_real_escape_string($connect,$_POST['password']));
		//---------------------Checking if the username and password inputted is correct-------------------------
		$check=mysqli_query($connect,"SELECT * FROM employees WHERE email='$email' AND password='$password' AND status=1")or die("Unable to process request");
			$info=mysqli_fetch_assoc($check);
//--------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------//
			$date=date ("Y-m-d", time());
				if(mysqli_num_rows($check)>0){
						//----------------Intializing varibles and session
						$time= date ('H:i:s',time());
						$working_hour='17:00:00';
						$_SESSION['working_hour']=$working_hour;
						$_SESSION["id"]=$info['id'];
						$_SESSION['time']=$time;
						$created= date ("Y-m-d H:i:s", time());
						$modified=$created;
						
							$insert=mysqli_query($connect, "INSERT INTO attendances (id,employees_id,start_time,end_time,status,working_hour,created,modified,created_date) VALUES('','$info[id]','$time','',0,'$working_hour','$created','$modified','$date')")or die("Unable to process insert");
							if($insert==TRUE){
								header("location:index");
								}
				}else{
					$alert="<center class='alert alert-danger'><i class='fa fa-warning'></i> Username and Password Not Correct!</center><hr/>";
				}
		}
	
 ?>	
