<?php 
	//Including database connection
	include 'db.php';
//---------------------------checking method type------------------------------------------
if(isset($_POST['add'])){
	//---------------------Declaring Varibles-----------------------------------------------
	$title= mysqli_real_escape_string($connect, $_POST['title']);
	$description= mysqli_real_escape_string($connect, $_POST['description']);

		$time=time();
		$created=date ("Y-m-d H:i:s", $time);
		$modified=$created;
		if($title!=''){
		//-------------------------------------------------Checking if Email Address exist------------------------------------
			$title_check=mysqli_query($connect, "SELECT * FROM user_groups WHERE title='$title'") or die('Unable To Process Request');
				if (mysqli_num_rows($title_check)>0) {
					$alert="<center>
	 				<div class='alert  alert-danger alert-dismissible fade show' role='alert'>
	                  <span class='badge badge-pill badge-danger'><i class='fa fa-warning'></i></span> Sorry, <strong>".$title."</strong> has already been taken!
	                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	                        <span aria-hidden='true'>&times;</span>
	                    </button>
	                </div>
	            </center>";
				}//--------------------------------Checking if Email Address exist ends-------------------------------
				else{
					//------------------------------Inserting inot database------------------------------
					$insert=mysqli_query($connect, "INSERT INTO user_groups (id,title,description,status,created,modified) VALUES('','$title','$description','1','$created','$modified')") or die('Unable To Process Request with image');
					if($insert==TRUE){
						$alert="<center>
			 				<div class='alert  alert-success alert-dismissible fade show' role='alert'>
			                  <span class='badge badge-pill badge-success'><i class='fa fa-check-circle'></i></span> ".$title." has been added successfully.
			                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			                        <span aria-hidden='true'>&times;</span>
			                    </button>
			                </div>
			            </center>";
					}else{
						$alert="<center>
			 				<div class='alert  alert-danger alert-dismissible fade show' role='alert'>
			                  <span class='badge badge-pill badge-danger'><i class='fa fa-warning'></i></span> Sorry, Unable to add user group!
			                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			                        <span aria-hidden='true'>&times;</span>
			                    </button>
			                </div>
			            </center>";
					}
				}
			}else{
				echo"<script> alert('Title field cannot be empty')</script>";
			}
	}
			
 ?>

 			