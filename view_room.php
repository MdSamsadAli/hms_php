<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<!-- <link rel="stylesheet" href="popup_img.css"> -->
<link rel="stylesheet" href="popup_style.css">
<?php include('sidebar.php');

if(isset($_GET['id']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Sure
    </h1>
    <p>Are You Sure To Delete This Record?</p>
    <p>
      <a href="del_room.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Yes</a>
      <a href="view_room.php" class="button button--error" data-for="js_success-popup">No</a>
    </p>
  </div>
</div>
<?php } ?>
  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> View Room</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Room</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <style>
                  #show_image_popup {
                    width: 800px !important;
                    border: 1px solid #333 !important;
                    box-sizing: border-box !important;
                    text-align: center;
                    z-index: 999;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    background: #e5e5e5;
                    display: none;
                }
                #show_image_popup img{
                  width: 100%;
                }
                #all-images .active {
                    filter: blur(5px);
                }

                .close-btn-area {
                    position : absolute;
                    width: 100%;
                    text-align: right;
                    margin-bottom: 5px;
                }
                .close-btn-area button {
                    cursor: pointer;
                }
                </style>
                <!-- /# row -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Room Details</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sr.No.</th>
                                                <th>Floor No</th>
                                                <th>Room Name</th>
                                                <th>Per Adult Price</th>
                                                <th>Per kid Price</th>
                                                <th>Color</th>
                                                <th>Room Pic</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Sr.No.</th>
                                                <th>Floor No</th>
                                                <th>Room Name</th>
                                                <th>Per Adult Price</th>
                                                <th>Per kid Price</th>
                                                <th>Color</th>
                                                <th>Room Pic</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                    <?php 
                                    include 'connect.php';
                                    $sql = "SELECT * FROM `tbl_rooms`";
                                     $result = $conn->query($sql);
                                  $i=1;
                                   while($row = $result->fetch_assoc()) { 
                               
                                      ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['floorno']; ?></td>
                                                <td><?php echo $row['roomname']; ?></td>
                                                <td><?php echo $row['peradultprice']; ?></td>
                                                <td><?php echo $row['perkidprice']; ?></td>
                                                <td><?php echo $row['color']; ?></td>
                                                <td id="all-images">
                                                    <img class="small-image" src="uploadImage/Room/<?=$row['room_pic']; ?>" alt="" style="width:200px; height:100px;" />
                                                </td>
                                                <td>
                                                  <a href="edit_room.php?id=<?=$row['id'];?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>
                                                  <a href="view_room.php?id=<?=$row['id'];?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                          <?php  $i++;} 
                                          ?>

                                        </tbody>
                                    </table>
                                  </form>
                                </div>
                            </div>
                        </div>
                        
                        <div id="show_image_popup">
                          <div class="close-btn-area">
                            <button id="close-btn">X</button> 
                          </div>
                          <div id="image-show-area">
                            <img id="large-image" src="" alt="">
                          </div>
                        </div>
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	                      <script type="text/javascript" src="jquery.js"></script>
                <!-- /# row -->

                <!-- End PAge Content -->
           

<?php include('footer.php');?>


<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);


function openModal() {
  document.getElementById("myModal").style.display = "block";
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

</script>