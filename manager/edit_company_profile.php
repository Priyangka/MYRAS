<?php
session_start();
include('../connection/config.php');

if(!isset($_SESSION['username']) || $_SESSION['username'] == " ")
{
       header("Location: ../index.php");
       die();
}
$no = $_SESSION['no'];

$sql = "SELECT * FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$image_src2 = $row['image'];

$sqlProfile = "SELECT personal_info.no FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$resultProfile = mysqli_query($db, $sqlProfile);
$rowProfile = mysqli_fetch_array($resultProfile);

$id=$_GET['info_id']; 

$sql_info= "SELECT * FROM company WHERE  id='".$id."'";
$result_info = mysqli_query($db,$sql_info);
$rowsInfo = mysqli_fetch_array($result_info);
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GCP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/iCheck/all.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.9.1.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>
  article, aside, figure, footer, header, hgroup, 
  menu, nav, section { display: block; }
.dl-horizontal dt { text-align: left; }
.pagination > li > a, .pagination > li > span { color: grey; // use your own color here }
.pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover { background-color: orange; border-color: orange; }
</style>
<style>
.dl-horizontal dt { text-align: left; }
.navbar-brand {padding: 0px;}
.example2 .navbar-brand>img {padding: 7px 15px;}

.card {
	top:0;
    font-size: 1em;
    overflow: hidden;
    padding: 0;
    border: none;
    border-radius: .28571429rem;
    box-shadow: 0 1px 1px 0 #d4d4d5, 0 0 0 1px #d4d4d5;
	background-color:white;
}

.card-block {
    font-size: 1em;
    position: relative;
    margin: 0;
    padding: 1em;
    border: none;
    border-top: 1px solid rgba(34, 36, 38, .1);
    box-shadow: none;
}

.card-img-top {
    display: block;
    width: 100%;
    height: auto;
	border:1px solid rgba(0, 0, 0, .05);
}

.card-title {
    font-size: 1.28571429em;
    font-weight: 700;
    line-height: 1.2857em;
	margin-left:0.6em;
	
}
.card-title1 {
    font-size: 1.28571429em;
    font-weight: 700;
    line-height: 1.2857em;
	
}

.card-text {
    clear: both;
    margin-top: .5em;
    color: rgba(0, 0, 0, .68);
	margin-left:1.0em;
	margin-right:1.0em;
	
}
.card-subtitle {
	margin-left:1.0em;
	margin-right:1.0em;
	
}
.card-link {
	margin-left:1.0em;
	margin-right:1.0em;
	
}

.card-footer {
    font-size: 1em;
    position: static;
    top: 0;
    left: 0;
    max-width: 100%;
    padding: .75em 1em;
    color: rgba(0, 0, 0, .4);
    border-top: 1px solid rgba(0, 0, 0, .05) !important;
    background: #fff;
}

.card-inverse .btn {
    border: 1px solid rgba(0, 0, 0, .05);
}
.div {
    width:300px;
    height:300px;    
    overflow:hidden;
}
.div img {
    min-width:100%;
}
</style>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>GCP</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
    </nav>

  </header>  <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <br/>
      <div class="user-panel">
        <div class="pull-left image">
		  <?php if ($row['image'] == ''){
			   echo "<img alt='User profile picture' id='blah' src='../assets/img/user.png' class='img-circle' height='50%' width='50%'/>";}
               else{
			   echo "<img class='img-circle' alt='User profile picture' id='blah' src='../uploads/".$row['image']."' height='50%' width='50%'/>";}?>
        </div>
        <div class="pull-left info">
          <p>Employer :
 		   <span class="hidden-xs"> <a href="profile_details.php"><?php echo $row['username']; ?></a></span></p>
		  <a href="../logout.php">
            <i class="fa fa-sign-out"></i> <span>Log Out</span>
          </a><br/>
        </div>
      </div>
      <br/>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
		<li class="treeview">
          <a href="#">
              <i class="fa fa-home"></i><span>Home</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
		  <ul class="treeview-menu">
              <li><a href="course_offer.php"><i class="fa fa-circle-o"></i>GCP Courses</a></li>
              <li><a href="personal_detail.php"><i class="fa fa-circle-o"></i>Profile</a></li>
              <li><a href="company_details.php"><i class="fa fa-circle-o"></i>Company Profile</a></li>
            </ul> 
		</li>
		<li class="treeview">
          <a href="#">
              <i class="fa fa-list"></i> <span>Vacancy</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
		  <ul class="treeview-menu">
              <li><a href="vacancy_list.php"><i class="fa fa-circle-o"></i>Catalog</a></li>
              <li><a href="registered_vacancy.php"><i class="fa fa-circle-o"></i>Registered</a></li>
              <li><a href="monthly_report_vacancy.php"><i class="fa fa-circle-o"></i>Details</a></li>
            </ul> 
		</li>
		<!-- <li class="treeview">
          <a href="#">
              <i class="fa fa-list"></i> <span>Registered</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
		  <ul class="treeview-menu">
              <li><a href="user_list.php"><i class="fa fa-circle-o"></i>User</a></li>
              <li><a href="user_category.php"><i class="fa fa-circle-o"></i>User By Category</a></li>
              <li><a href="user_category.php"><i class="fa fa-circle-o"></i>Courses</a></li>
            </ul> 
		</li>
		
        <li class="treeview">
            <a href="#">
              <i class="fa fa-line-chart"></i> <span>Report</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="info_list.php"><i class="fa fa-circle-o"></i>Catalog</a></li>
			  <li><a href="monthly_report.php"><i class="fa fa-circle-o"></i>Details</a></li>
            </ul>           
        </li> -->
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <br/>
      <h1>
        Report
      </h1>

    </section>

	<br/>
    <section class="content">
       <!-- Info boxes -->
      <div class="row">
	  <div class="col-xs-12">
	
			  
          <div class="card sticky-top" >
		   <div class="box-header with-border">
			<div class="card-body"><h5 class="card-title"> Development Activity</h5>
			</div>
			</div>
		  <div class="col-md-7 ">
			<br/>

			<form id="fileupload" class="form-horizontal" action="company_profile_update.php?info_id=<?php $rowsInfo['id'] ?>" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label  for="inputEmail3" class="col-sm-2 control-label">Company Name</label>
							  <div class="col-sm-8">
							  	<input id="title" name="title" type="text" class="form-control"  placeholder="Enter Company Name" value="<?php echo $rowsInfo['title']; ?>">
						  </div>
						  </div>
							
							<div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Industrial Type</label>
								    <div class="col-sm-8">
								
                 <select onchange="yesnoCheck(this);" id="industry" name="industry" class="form-control select2" style="width: 100%;">
                            <option value="<?php echo $rowsInfo['industry']; ?>"><?php echo $rowsInfo['industry']; ?></option selected>
                        <option value="Accounting&Finance">Accounting&Finance</option>
                      <option value="Human Resource">Human Resource</option>
                      <option value="Arts">Arts</option>
                      <option value="Construction">Construction</option>
                       <option value="Computer Science">Computer Science</option>
                      <option value="Education">Education</option>
                      <option value="Engineering">Engineering</option>
                      <option value="Healthcare">Healthcare</option>
                      <option value="Manufacturing">Manufacturing</option>
                      <option value="Sales">Sales</option>
                      <option value="Marketing">Marketing</option>
                      <option value="Science">Science</option>
                       <option value="Services">Services</option>
                      <option value="Others">Others</option>
                    </select>

								    </div>
								    </div>
									
									<div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Company Size</label>
								    <div class="col-sm-8">
									<input id="size1" name="size1" type="number" min="1" max="50" class="form-control"  placeholder="Enter Range of Employee Size (eg: 1 to 50)" value="<?php echo $rowsInfo['size']; ?>">
								    </div>
								    </div>
									
									<div class="form-group">
									<label class="col-sm-2 control-label">Working Hours</label>
									  <div class="col-sm-4">
									  <div class="input-group bootstrap-timepicker">
										<input type="text"  id="time_from" name="time_from" class="form-control timepicker"value="<?php echo $rowsInfo['time_from']; ?>">

										<div class="input-group-addon">
										  <i class="fa fa-clock-o"></i>
										</div>
									  </div>
									  </div>
								
									  <div class="col-sm-4">
									  <div class="input-group bootstrap-timepicker">
										<input type="text"  id="time_to" name="time_to" class="form-control timepicker"value="<?php echo $rowsInfo['time_to']; ?>">

										<div class="input-group-addon">
										  <i class="fa fa-clock-o"></i>
										</div>
									  </div>
									  </div>
								  </div>
								  
								 <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Working Days</label>
								    <div class="col-sm-8">
									<input id="days" name="days" type="text" class="form-control"  placeholder="Enter Working Days"value="<?php echo $rowsInfo['days']; ?>">
								    </div>
								    </div> 
									
									<div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
								    <div class="col-sm-8">
									<input id="comp_address" name="comp_address" type="text" class="form-control"  placeholder="Enter Company Address"value="<?php echo $rowsInfo['comp_address']; ?>">
								    </div>
								    </div> 
									
									<div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">SSM No</label>
								    <div class="col-sm-8">
									<input id="ssm_no" name="ssm_no" type="text" class="form-control"  placeholder="Enter SSM No"value="<?php echo $rowsInfo['ssm_no']; ?>">
								    </div>
								    </div>
									
									<div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Benefits</label>
								    <div class="col-sm-8">
									<input id="benefits" name="benefits" type="text" class="form-control"  placeholder="Enter Benifits (eg: Medical, Dental)"value="<?php echo $rowsInfo['benefits']; ?>">
								    </div>
								    </div>
								
								
							
						<div class="form-group">
										<label  for="inputEmail3" class="col-sm-2 control-label">Description</label>
										  <div class="col-sm-8">
										  <textarea id="description" name="description"  class="form-control col-sm-8" rows="3" placeholder="Masukkan Penerangan Informasi....">
										<?php echo $rowsInfo['description']; ?>
										</textarea>
									  </div>
									  </div>	
           
								  
								</div>
				
						
			
							
							<input type="hidden" name="no" id="no" value="<?php echo $no; ?>">
							<input type="hidden" name="id" id="id" value="<?php echo $rowsInfo['id']; ?>">
							<input type="hidden" name="manager" id="manager" value="<?php echo $rowsInfo['manager']; ?>">

							<div class="col-md-5 ">
								     
                                        <label class="col-sm-4 control-label" for="exampleInputFile"></label>
                                         <div class="form-group">
                                          <label class="col-sm-4 control-label" for="exampleInputFile"></label>
                                        
                                            <?php 
											$image_src2 = $rowsInfo['company_banner'];
											echo "<img class='img-thumbnail' alt='Program Banner' id='blah1' src='company/".$rowsInfo['company_banner']."'   style='width:500px; height:300px;object-fit: cover;'/><p></p>";
					                        echo "<div class='col-sm-offset-3 col-sm-9'>";
                                            echo "<input class='input-group' type='file' id='file' name='image' onchange='readURL(this);' />";
                                                ?> 

                                        </div>
                                        </div>

										
		  </div>
		  </div>
		  <div class="box-footer">
             <div class="col-xs-1.9 pull-left">
            <button type="reset" class="btn btn-block pull-right">Cancel </button>
          </div>
			<div class="col-xs-1.5 pull-right">
            <button name="submit" class="btn btn-warning btn-block pull-right">Submit </button>
            </div>
              </div>
		  <br/>  
            </form>
			</div> <!--box -->
      </div>    <!--col-md-12 -->
	  </div>      <!-- row --> 
	 <script type="text/javascript">
		  $('#time_from').timepicker({
			showInputs: false
		  });
		    $('#time_to').timepicker({
			showInputs: false
		  });
		</script>
		<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

        //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<script>
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
</script>
<script type="text/javascript">
/*function ShowHideDiv() {
        var chkYes = document.getElementById("chkYes");
        var dvtext = document.getElementById("dvtext");
        dvtext.style.display = chkYes.checked ? "block" : "none";
    }*/
$(document).ready(function(){
    $("#myNav").affix({
        offset: { 
            top: $(".header").outerHeight(true)
        }
    });
});
      function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah1')
                        .attr('src', e.target.result)
                        .width(500)
                        .height(300);
                };

                reader.readAsDataURL(input.files[0]);
            }
        };

		$(function () {
				$('#datetimepicker9').datetimepicker({
					todayBtn: true
						});
						});
						
</script>
    </section>
</div>
</div>
</body>
</html>
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- bootstrap datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page script -->

