<?php 
include 'functions/db.php';
if (isset($_GET['present'])) {
        $id=$_GET['present'];

        $time=time();
		$created=date ("Y-m-d H:i:s", $time);
		$modified=$created;

        $present=mysqli_query($connect, "INSERT INTO attendances (id,members_id,status,attendance,attendance_date,created,modified) VALUES('','$id','present','Latter Rain','$created','$created','$modified')")or die("Unable to process request");
        // if($present==TRUE || $present==1){
        //         echo "<script>alert('File has been deleted')
        //         window.location.href='blog.php'</script>";
        // }else{
        //          echo "<script>alert('Unable to delete')
        //                window.location.href='blog.php'</script>";
        //        }
    }

    if (isset($_GET['abscent'])) {
        $id=$_GET['abscent'];

        $time=time();
        $created=date ("Y-m-d H:i:s", $time);
        $modified=$created;

        $abscent=mysqli_query($connect, "INSERT INTO attendances (id,members_id,status,attendance,attendance_date,created,modified) VALUES('','$id','abscent','Latter rain','$created','$created','$modified')")or die("Unable to process request");
        // if($abscent==TRUE || $abscent==1){
        //         echo "<script>alert('File has been deleted')
        //         window.location.href='blog.php'</script>";
        // }else{
        //          echo "<script>alert('Unable to delete')
        //                window.location.href='blog.php'</script>";
        //        }
    }
 ?>