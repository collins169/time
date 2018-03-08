<?php 
include 'functions/db.php';
	if(isset($_POST['alertMessage'])){
        $id=htmlspecialchars($_POST['idValue'],ENT_QUOTES);
        $id=mysqli_real_escape_string($connect,$_POST['idValue']);

	$check4=mysqli_query($connect, "SELECT * FROM attendances WHERE employees_id=$id")or die('Unable');
    $ti=mysqli_fetch_assoc($check4);
    $rem = strtotime($_SESSION['working_hour']) - time();
	$day = floor($rem / 86400);
	$hr  = floor(($rem % 86400) / 3600);
	$min = floor(($rem % 3600) / 60);
	$sec = ($rem % 60);
    if($hr){$h= "$hr ";
    }
    if($min){ $m= "$min ";
    }
    if($sec){ $s= "$sec ";
    }


            $mes="$hr:$min:$sec";
            echo"<center>
                <div class='alert  alert-success alert-dismissible fade show' role='alert'>
                  <span class='badge badge-pill badge-success'><i class='fa fa-clock-o'></i></span> You Have <?php echo $mes ?>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            </center>"
}
?>
            