
<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');

extract($_POST);
$target_dir = "../uploadImage/Room/";
  $image1 = basename($_FILES["image"]["name"]);
  if($_FILES["image"]["tmp_name"]!=''){
    $image = $target_dir . basename($_FILES["image"]["name"]);
   if (move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
    
       @unlink("uploadImage/Room/".$_POST['old_image']);
    
    } else {
        echo "Sorry, there was an error uploading your file." .mysqli_errors($conn);
    }
  }
  else {
     $image1 =$_POST['old_image'];
  }

   $sql = "INSERT INTO `tbl_rooms`(`floorno`, `roomname`, `peradultprice`, `perkidprice`,`color`, `room_pic`) VALUES ('$floorno', '$roomname', '$peradultprice', '$perkidprice', '$color', '$image1')";

 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="../view_room.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_room.php";
</script>
<?php } ?>