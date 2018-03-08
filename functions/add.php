<?php 
	//Including database connection
	include 'db.php';
//---------------------------checking method type------------------------------------------
if(isset($_POST['add'])){
	//---------------------Declaring Varibles-----------------------------------------------
	$first_name= mysqli_real_escape_string($connect, $_POST['first_name']);
	$middle_name= mysqli_real_escape_string($connect, $_POST['middle_name']);
	$last_name= mysqli_real_escape_string($connect, $_POST['last_name']);
	$username= mysqli_real_escape_string($connect, $_POST['username']);
	$usergroups_id= mysqli_real_escape_string($connect, $_POST['usergroup']);
	$countries_id= mysqli_real_escape_string($connect, $_POST['country']);
	$dob= mysqli_real_escape_string($connect, $_POST['dob']);
	$gender= mysqli_real_escape_string($connect, $_POST['gender']);
	$password= md5(mysqli_real_escape_string($connect, $_POST['password']));
	$cpassword= md5(mysqli_real_escape_string($connect, $_POST['cpassword']));
	$email= mysqli_real_escape_string($connect, $_POST['email']);
	$phone= mysqli_real_escape_string($connect, $_POST['phone']);
	$address= mysqli_real_escape_string($connect, $_POST['address']);


	//--------------------------------------if image is not empty------------------------------------------
	if(!empty($_FILES['image']['name'])){
	      $target_dir = "../assets/uploads/pictures/";
	      $image = $target_dir .strtolower($last_name).strtolower($first_name).time().'.'. pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);
	      $uploadOk = 1;
	      $imageFileType = pathinfo($image,PATHINFO_EXTENSION);

	       $check = getimagesize($_FILES["image"]["tmp_name"]);
	//------------------------------Checking if the file is an image--------------------------------------------
	      if($check !== false) {
	          $alert="
	          		<center>
	 				<div class='alert  alert-success alert-dismissible fade show' role='alert'>
	                  <span class='badge badge-pill badge-success'><i class='fa fa-check-circle'></i></span> File is an image - " . $check["mime"] . "</strong> has already been taken!
	                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	                        <span aria-hidden='true'>&times;</span>
	                    </button>
	                </div>
	            </center>";
	          $uploadOk = 1;
	      }else {
	          $alert="<center>
	 				<div class='alert  alert-danger alert-dismissible fade show' role='alert'>
	                  <span class='badge badge-pill badge-danger'><i class='fa fa-warning'></i></span> File is not an image!
	                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	                        <span aria-hidden='true'>&times;</span>
	                    </button>
	                </div>
	            </center>";
	          $uploadOk = 0;
	      }//--------------------------------------Checking if the file is an image ends----------------------------------------

	      //-----------------------------------------Check if file already exists-----------------------------------------------
	      if (file_exists($image)) {
	           $alert="<center>
	 				<div class='alert  alert-danger alert-dismissible fade show' role='alert'>
	                  <span class='badge badge-pill badge-danger'><i class='fa fa-warning'></i></span> Sorry, image already exists!
	                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	                        <span aria-hidden='true'>&times;</span>
	                    </button>
	                </div>
	            </center>";
	          $uploadOk = 0;
	      }//-------------------------------------Check if file already exists ends-----------------------------------------

	      //--------------------------------------------Check file size-------------------------------------------------
	      elseif ($_FILES["image"]["size"] > 30000000) {
	          $alert="<center>
	 				<div class='alert  alert-danger alert-dismissible fade show' role='alert'>
	                  <span class='badge badge-pill badge-danger'><i class='fa fa-warning'></i></span> Sorry, your image is too large!
	                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	                        <span aria-hidden='true'>&times;</span>
	                    </button>
	                </div>
	            </center>";
	          $uploadOk = 0;
	      }
	      //-----------------------------------------------Check file size ends--------------------------------------------
      else {
		$time=time();
		$created=date ("Y-m-d H:i:s", $time);
		$modified=$created;
		if($password==$cpassword){
		//-------------------------------------------------Checking if Email Address exist------------------------------------
			$email_check=mysqli_query($connect, "SELECT * FROM employees WHERE email='$email'") or die('Unable To Process Request');
				if (mysqli_num_rows($email_check)>0) {
					$alert="<center>
	 				<div class='alert  alert-danger alert-dismissible fade show' role='alert'>
	                  <span class='badge badge-pill badge-danger'><i class='fa fa-warning'></i></span> Sorry, the email Address <strong>".$email."</strong> has already been taken!
	                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	                        <span aria-hidden='true'>&times;</span>
	                    </button>
	                </div>
	            </center>";
				}//--------------------------------Checking if Email Address exist ends-------------------------------
				else{
				//-------------------------------------Checking if Phone Number exist---------------------------------
					$phone_check=mysqli_query($connect, "SELECT * FROM employees WHERE phone='$phone'") or die('Unable to process request');
					if(mysqli_num_rows($phone_check)>0){
						$alert="<center>
	 				<div class='alert  alert-danger alert-dismissible fade show' role='alert'>
	                  <span class='badge badge-pill badge-danger'><i class='fa fa-warning'></i></span> Sorry, <strong>".$phone."</strong> has already been taken!
	                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	                        <span aria-hidden='true'>&times;</span>
	                    </button>
	                </div>
	            </center>";
					}//----------------------------Checking if Phone Number exist ends---------------------------------
					else{
						//------------------------------Checking if Username exist------------------------------
						$username_check=mysqli_query($connect, "SELECT * FROM employees WHERE username='$username'") or die('Unable to process request');
						if(mysqli_num_rows($username_check)>0){
							$alert="<center>
	 				<div class='alert  alert-danger alert-dismissible fade show' role='alert'>
	                  <span class='badge badge-pill badge-danger'><i class='fa fa-warning'></i></span> Sorry, <strong>".$username."</strong> has already been taken!
	                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	                        <span aria-hidden='true'>&times;</span>
	                    </button>
	                </div>
	            </center>";
						}//------------------------------Checking if Username exist ends------------------------------
						else{
							//------------------------------Inserting inot database------------------------------
							$insert=mysqli_query($connect, "INSERT INTO employees (id,countries_id,usergroups_id,first_name,middle_name,last_name,username,image,dob,password,email,phone,address,gender,status,deleted,created,modified) VALUES('','$countries_id','$usergroups_id','$first_name','$middle_name','$last_name','$username','$image','$dob','$password','$email','$phone','$address','$gender','1','0','$created','$modified')") or die('Unable To Process Request with image');
							if($insert==TRUE){
								$alert="<center>
					 				<div class='alert  alert-success alert-dismissible fade show' role='alert'>
					                  <span class='badge badge-pill badge-success'><i class='fa fa-check-circle'></i></span> Account has been added successfully.
					                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					                        <span aria-hidden='true'>&times;</span>
					                    </button>
					                </div>
					            </center>";
							}else{
								$alert="<center>
					 				<div class='alert  alert-danger alert-dismissible fade show' role='alert'>
					                  <span class='badge badge-pill badge-danger'><i class='fa fa-warning'></i></span> Sorry, Unable to add employee!
					                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					                        <span aria-hidden='true'>&times;</span>
					                    </button>
					                </div>
					            </center>";
							}
						}
					}
				}
			}else{
				$alert="<center>
	 				<div class='alert  alert-danger alert-dismissible fade show' role='alert'>
	                  <span class='badge badge-pill badge-danger'><i class='fa fa-warning'></i></span> Sorry, Password doesn't match!
	                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	                        <span aria-hidden='true'>&times;</span>
	                    </button>
	                </div>
	            </center>";
			}
		}
	}//------------------------------------if image is not availiable-------------------------------------------
		else{
		$time=time();
		$created=date ("Y-m-d H:i:s", $time);
		$modified=$created;
		//--------------------------------------------Chechking if passowrd matches--------------------------------------
		if($password==$cpassword){
		//-------------------------------------------------Checking if Email Address exist------------------------------------
		$email_check=mysqli_query($connect, "SELECT * FROM employees WHERE email='$email'") or die('Unable To Process Request');
				if (mysqli_num_rows($email_check)>0) {
					$alert="<center>
	 				<div class='alert  alert-danger alert-dismissible fade show' role='alert'>
	                  <span class='badge badge-pill badge-danger'><i class='fa fa-warning'></i></span> Sorry, the email Address <strong>".$email."</strong> has already been taken!
	                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	                        <span aria-hidden='true'>&times;</span>
	                    </button>
	                </div>
	            </center>";
				}//--------------------------------Checking if Email Address exist ends-------------------------------
				else{
				//-------------------------------------Checking if Phone Number exist---------------------------------
					$phone_check=mysqli_query($connect, "SELECT * FROM employees WHERE phone='$phone'") or die('Unable to process request');
					if(mysqli_num_rows($phone_check)>0){
						$alert="<center>
	 				<div class='alert  alert-danger alert-dismissible fade show' role='alert'>
	                  <span class='badge badge-pill badge-danger'><i class='fa fa-warning'></i></span> Sorry, the email Address <strong>".$phone."</strong> has already been taken!
	                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	                        <span aria-hidden='true'>&times;</span>
	                    </button>
	                </div>
	            </center>";
					}//----------------------------Checking if Phone Number exist ends---------------------------------
					else{
						//------------------------------Checking if Username exist------------------------------
						$username_check=mysqli_query($connect, "SELECT * FROM employees WHERE username='$username'") or die('Unable to process request');
						if(mysqli_num_rows($username_check)>0){
							$alert="<center>
	 				<div class='alert  alert-danger alert-dismissible fade show' role='alert'>
	                  <span class='badge badge-pill badge-danger'><i class='fa fa-warning'></i></span> Sorry, the email Address <strong>".$username."</strong> has already been taken!
	                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	                        <span aria-hidden='true'>&times;</span>
	                    </button>
	                </div>
	            </center>";
						}//------------------------------Checking if Username exist ends------------------------------
						else{
							//------------------------------Inserting inot database------------------------------
							$insert=mysqli_query($connect, "INSERT INTO employees (id,countries_id,usergroups_id,first_name,middle_name,last_name,username,image,dob,password,email,phone,address,gender,status,deleted,created,modified) VALUES('','$countries_id','$usergroups_id','$first_name','$middle_name','$last_name','$username','','$dob','$password','$email','$phone','$address','$gender','1','0','$created','$modified')") or die('Unable To Process Request NO Image');
							if($insert==TRUE){
								$alert="<center>
					 				<div class='alert  alert-success alert-dismissible fade show' role='alert'>
					                  <span class='badge badge-pill badge-success'><i class='fa fa-check-circle'></i></span> Account has been added successfully.
					                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					                        <span aria-hidden='true'>&times;</span>
					                    </button>
					                </div>
					            </center>";
							}else{
								$alert="<center>
					 				<div class='alert  alert-danger alert-dismissible fade show' role='alert'>
					                  <span class='badge badge-pill badge-danger'><i class='fa fa-warning'></i></span> Sorry, Unable to add employee!
					                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					                        <span aria-hidden='true'>&times;</span>
					                    </button>
					                </div>
					            </center>";
							}
						}
					}
				}
			}else{
				$alert="<center>
	 				<div class='alert  alert-danger alert-dismissible fade show' role='alert'>
	                  <span class='badge badge-pill badge-danger'><i class='fa fa-warning'></i></span> Sorry, Password doesn't match!
	                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	                        <span aria-hidden='true'>&times;</span>
	                    </button>
	                </div>
	            </center>";
			}//-------------------------Password check ends------------------------------
		}//--------------------------- if image empty ends here----------------------------
}


if(isset($_POST['edit'])){
	//---------------------Declaring Varibles-----------------------------------------------
	$id= mysqli_real_escape_string($connect, $_POST['id']);
	$first_name= mysqli_real_escape_string($connect, $_POST['first_name']);
	$middle_name= mysqli_real_escape_string($connect, $_POST['middle_name']);
	$last_name= mysqli_real_escape_string($connect, $_POST['last_name']);
	$username= mysqli_real_escape_string($connect, $_POST['username']);
	$usergroups_id= mysqli_real_escape_string($connect, $_POST['usergroup']);
	$countries_id= mysqli_real_escape_string($connect, $_POST['country']);
	$dob= mysqli_real_escape_string($connect, $_POST['dob']);
	$gender= mysqli_real_escape_string($connect, $_POST['gender']);
	$email= mysqli_real_escape_string($connect, $_POST['email']);
	$phone= mysqli_real_escape_string($connect, $_POST['phone']);
	$address= mysqli_real_escape_string($connect, $_POST['address']);


		$time=time();
		$created=date ("Y-m-d H:i:s", $time);
		$modified=$created;

							//------------------------------Inserting inot database------------------------------
							$update=mysqli_query($connect, "UPDATE employees SET countries_id=$countries_id,usergroups_id=$usergroups_id,first_name='$first_name',middle_name='$middle_name',last_name='$last_name',username='$username',dob='$dob',email='$email',phone='$phone',address='$address',gender='$gender',modified='$modified' WHERE id=$id") or die('Unable To Process Request update');
							if($update==TRUE){
								$alert="<center>
					 				<div class='alert  alert-success alert-dismissible fade show' role='alert'>
					                  <span class='badge badge-pill badge-success'><i class='fa fa-check-circle'></i></span> Account has been updated successfully.
					                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					                        <span aria-hidden='true'>&times;</span>
					                    </button>
					                </div>
					            </center>";
							}else{
								$alert="<center>
					 				<div class='alert  alert-danger alert-dismissible fade show' role='alert'>
					                  <span class='badge badge-pill badge-danger'><i class='fa fa-warning'></i></span> Sorry, Unable to update employee!
					                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					                        <span aria-hidden='true'>&times;</span>
					                    </button>
					                </div>
					            </center>";
							}
	}

 ?>

 			