<?php
session_start();
include('connection/config.php');
$no = $_SESSION['no'];
$id = $_GET['id'];

$sql = "SELECT * FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);

$sqlProfile = "SELECT personal_info.id FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$resultProfile = mysqli_query($db, $sqlProfile);
$rowProfile = mysqli_fetch_array($resultProfile);

$sql_comp = "SELECT * FROM personal_info WHERE id = '$id'";
$result_comp = mysqli_query($db, $sql_comp);
$row_comp = mysqli_fetch_array($result_comp);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GCP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<script type="text/javascript">
$(document).ready(function(){
    $("#myNav").affix({
        offset: { 
            top: $(".header").outerHeight(true)
        }
    });
});
</script>
<style>
.dl-horizontal dt { text-align: left; }

 /*----------------Containers--------------------*/
#banner-container-fluid
{
	background-image: url("dist/img/images7.jpg");
	background-color:#2C3E50  ;	
	background-attachment:scroll;
	background-repeat:no-repeat;
	background-position:center;
	background-size:cover;
 }
 
/**********************
		GLOBAL DECLARATIONS
**********************/

#banner-container-fluid  .jumbotron
{
	background-color:#9e9e9e54;
	color:white;
	max-height:600px;
	height:430px;
	width:430px;
	background-size:cover;
 }
</style>
<body class="hold-transition skin-yellow layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar">
      <!-- Sidebar toggle button-->
     
        <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
	  <li class="home-menu">
		  <a href="main.php">
              <i class="fa fa-home fa-fw"></i>
            </a>
		  </li>

      
       <li class="home-menu">
      <a href="course_main.php">
             <i class="fa fa-book fa-fw"> </i>Course
            </a>
      </li>
           <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <?php if ($row['image'] == ''){
			   echo "<img class='user-image' alt='User profile picture' id='blah' src='assets/img/user.png' width='125' height='125'/>";}
               else{
			   echo "<img class='user-image' alt='User profile picture' id='blah' src='uploads/".$row['image']."' width='125' height='125'/>";}?>
              <span class="hidden-xs"><?php echo $row['name']; ?></span>
            </a>
			<ul class="dropdown-menu">
			 <!-- User image -->
              <li class="user-header">
				<?php if ($row['image'] == ''){
			   echo "<img class='img-circle' alt='User profile picture' id='blah' src='assets/img/user.png' width='125' height='125'/>";}
               else{
			   echo "<img class='img-circle' alt='User profile picture' id='blah' src='uploads/".$row['image']."' width='125' height='125'/>";}?>
         
                <p>
                  <span class="hidden-xs"><?php echo $row['name']; ?></span>
                </p>
              </li>
			   <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="profile_details.php?id=<?php echo $rowProfile['id']; ?>" class="text-center">Profile</a>
                  </div>
                  <!--<div class="col-xs-4 text-center">
                    <a href="company_details.html">Syarikat</a>
                  </div>-->
                  <div class="col-xs-6 text-center">
                   <a href="logout.php" class="text-center">Sign Out</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
			</ul>
		</li>
          
        </ul>
      </div>
    </nav>
  </header>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container-fluid" id="banner-container-fluid">
				<div class="container">
					<div class="jumbotron">
					  <h2 class="leader"><?php echo $row_comp['name']; ?></h2>
  					  <p><i  class="fa fa-map-marker"></i> <?php echo $row_comp['address']; ?>   <a href="edit_profile.php">
					  <?php //if ($row_comp['no']==$id){ 
                     // echo '<i class="fa fa-pencil "></i>'; }?></a></p>
  					  <p><i  class="fa fa-phone"></i> <?php echo $row_comp['phone']; ?></p>
  					  <p><i  class="fa fa-envelope"></i> <?php echo $row_comp['email']; ?></p>
					</div>
			
				</div>
			</div>	
    <!-- Content Header (Page header) -->
    <section class="content-header center">
         <div class="row">
    <section class="content center">
	<div class="row">
  	<div class="col-md-7 col-md-offset-1">
            <div class="panel panel-default">
            <div class="box-header with-border">
              <h1 class="box-title"><a href="edit_employmentbcg.php">Employment Background</a></h1>
              <div class="box-tools pull-right">
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Widget: user widget style 1 -->
              <div class="row">
			  <!-- /.col -->
                <div class="col-md-12">
               
             <?php 
				$no = $row_comp['no'];
				$sqlv= "SELECT * FROM experience WHERE no = '$no' ";
				$index=0;
				if($result3 = mysqli_query($db,$sqlv)){
				if(mysqli_num_rows($result3) > 0){
				while(($rs=mysqli_fetch_assoc($result3)))	
				{
				$index++;
				$string = $rs['description'];
				$string = strip_tags($string);
			    echo "
				<dl>
				<div class='box-header with-border'><dt><h12 class='box-title col-md-10  widget-user-desc'> ";echo $rs['act_name'];echo"</h12>
				<dd class='col-md-10 '>"; echo $rs['venue'];echo"
				<dd class='col-md-10 '>";echo $rs['start_date']; echo"
				<dd class='col-md-10 '>";
				echo '<a data-toggle="collapse" class="test-block" id="test-block-".$index."" href="#test-block-'.$index.'" aria-expanded="true" aria-controls="test-block-'.$index.'" type="btn btn-warning card-link">...</a>';
				echo '<div id="test-block-'.$index.'" class="collapse"><div class="card-block text-justify">'.$string.'</div></div>';			
				echo"</dd></dd></dd></dt>						
		        </div></dl>";
				 }}}
				?>
				
        
            </div>
            <!-- /.box-body -->
     </div>
</div><!-- /.box-body -->
</div><!-- box box-default collapsed-box-->
            <div class="panel panel-default">
            <div class="box-header with-border">
              <h1 class="box-title"><a href="edit_educationbcg.php">Education Background</a></h1>
              <div class="box-tools pull-right">
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Widget: user widget style 1 -->
              <div class="row">
			  <!-- /.col -->
                <div class="col-md-12">
           		  <?php 
				$no = $row_comp['no'];
				$sqlv= "SELECT * FROM education WHERE no = '$no' ";
				$index=0;
				if($result3 = mysqli_query($db,$sqlv)){
				if(mysqli_num_rows($result3) > 0){
				while(($rs=mysqli_fetch_assoc($result3)))	
				{
				$index = $rs['id'];
				$index++;
				$university = $rs['university'];
				$string1 = $rs['description'];
				$string1 = strip_tags($string1);
				echo"<p class='card-text text-justify'>";
				//echo 'test-block-"'.$index.$university.'"'.'<br>';

			    echo "
				<dl>
				<div class='box-header with-border'><dt><h12 class='box-title col-md-10  widget-user-desc'> ";echo $rs['course'];echo"</h12>
				<dd class='col-md-10 '>"; echo $rs['university'];echo"
				<dd class='col-md-10 '>";echo $rs['grad']; echo"
				<dd class='col-md-10'>";
	  		    echo '<a data-toggle="collapse" class="test-block" id="test-block-".$index.$university."" href="#test-block-'.$index.'" aria-expanded="true" aria-controls="test-block-'.$index.'" type="btn btn-warning card-link">...</a>';
				echo '<div id="test-block-'.$index.'" class="collapse"><div class="card-block text-justify">'.$string1.'</div></div>';			
				echo"</dd></dd></dt>						
		        </div>
                </dl></p>
			  ";
			  
				 }}}
				?>
            </div>
            <!-- /.box-body -->
     </div>
</div><!-- /.box-body -->
</div><!-- box box-default collapsed-box-->
	</div><!-- col-md-12--> 
	
	<div class="col-md-3 col-md-offset-0">
                 <div class="panel panel-default">
              <div class="box-body box-profile">
				<?php if ($row['image'] == ''){
			   echo "<img class='profile-user-img img-responsive img-circle' alt='User profile picture' id='blah' src='assets/img/user.png' width='125' height='125'/>";}
               else{
			   echo "<img class='profile-user-img img-responsive img-circle' alt='User profile picture' id='blah' src='uploads/".$row['image']."' width='125' height='125'/>";}?>
           
                  <h3 class="profile-username text-center"><?php echo $row['name']; ?></h3>
                  <p class="text-muted text-center"></p>
                 <!-- <p class="text-center"><a href="profile_details.php?id=<?php echo $rowProfile['id']; ?>" class="text-center"><b>Personal Information</b></a></p>-->
                    <hr>
                      <p class="text-center">
                      <?php
					    echo '<strong><i class="fa fa-briefcase"></i> Category</strong>
						  <h4 class="text-muted text-center">';echo $row['category']; echo'</h4>
						  <hr>';
					    echo '<a href="edit_profile.php" class="btn btn-block btn-warning"> Update Profile</a>';
					  ?>
            </p>
              </div>
            </div>
	</div><!-- col-md-12--> 
</div><!-- col-md-12--> 
     
</div><!-- row 1-->
    </section>
    </section>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
