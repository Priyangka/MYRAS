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
$preference = $row['preference'];
$name = $row['name'];

$sqlProfile = "SELECT personal_info.id FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$resultProfile = mysqli_query($db, $sqlProfile);
$rowProfile = mysqli_fetch_array($resultProfile);

$sqls = "SELECT * FROM latest_information WHERE preference = '$preference' GROUP BY id";
$results = mysqli_query($db, $sqls);
$rows = mysqli_fetch_array($results);
$id1 = $rows['id'];

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
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<style>
.dl-horizontal dt { text-align: left; }
.navbar-brand {padding: 0px;}
.example2 .navbar-brand>img {padding: 7px 15px;}

.card {
	top:0;
    max-height: 200;
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

  </header>  <aside class="main-sidebar">
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
   <section class="content-header">
      <br/>
      <h1>
        Home
      </h1>
    </section>
	<section class="content">
		<div class="row">  	
		 
		   <div class="col-md-8">	
		   <div class="card sticky-top" >
			<div class="card-body">
			<div class='box-header with-border'>
			<h5 class="card-title"> <i class="fa fa-newspaper-o"></i> Courses</h5>
			<p><h6 class="card-subtitle mb-2 text-muted">This is masterlist of all courses held by organizer</h6></p>
			</div>
			  	 <div class="box-body box-profile">
		   <?php
			    if($results = mysqli_query($db,$sqls)){
				if(mysqli_num_rows($results) > 0){
				while(($rss=mysqli_fetch_assoc($results))){
				$id = $rss['id'];
				$title = $rss['title'];
				//$zone = $row['zone'];
			   
			    //echo $title;
				$i = 0;
				$arraydata = $row['preference'];
			    $arr=explode(',',$arraydata);
				
				$sqlv = "SELECT * FROM latest_information,personal_info
				WHERE latest_information.preference=personal_info.preference 
			    AND personal_info.id = '$no'
				AND latest_information.id='$id'
				GROUP BY latest_information.id desc";	
					  
				$sqls1 = "SELECT * FROM latest_information_participant WHERE name='$name' AND info_id='$id'";
				$results1 = mysqli_query($db, $sqls1);
				$rows1 = mysqli_fetch_array($results1);
				
				if($result3 = mysqli_query($db,$sqlv)){
				if(mysqli_num_rows($result3) > 0){
				while(($rs=mysqli_fetch_assoc($result3)))
				{ 
			    foreach($arr as $val) 
				{  
			    $id1 = $rs['no'];
			    $name1 = $rs['name'];
			    $name2 = $rows1['name'];
			    $id2 = $rows1['info_id'];
				
				$date = $rss['date'];
				$year = strtotime($date);
				$getYear = date("Y", $year);
				$Year = date("Y");
				$string = $rs['description'];
				$string = strip_tags($string);
								
				if($id1!=$id2 && $name1!=$name2 && $Year==$getYear && $val == $rss['preference']){	
				
				echo'<div class="col-md-6">';
				echo'<br/><div class="card pull-left"></a><div class="card-body">';
				if($rs['image_banner']!=''){
	            echo "<img class='card-img-top' alt='Program Banner' src='../admin/banner/".$rs['image_banner']."' style='width:100%;height:150px;object-fit: cover;'/>";
				}
				echo "<ul class='products-list product-list-in-box'>
                <li class='item'>";
                    echo "<h5 class='card-title' style='height:300;'>".$rs['title'].'';
  					echo"</a></h5>";
                   	echo"<h6 class='card-subtitle mb-2 text-muted'>";
					echo $rs['date'];
                    echo '<p>'.$rs['venue'].'</p>';   
                    echo "</h6>";
					//echo"<p class='card-text text-justify'>";
					//echo $rs['description'];
					//echo '</p>';
					echo"<p class='card-text text-justify'>";
					if (strlen($string) > 44) {
						// truncate string
						$stringCut = substr($string, 0, 44);
						$endPoint = strrpos($stringCut, ' ');

						//if the string doesn't contain any space then it will cut without word basis.
						$string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
						//$string .= '... <a href="/this/story">Read More</a>';
						$string .= ".. <a href=\"course_details.php?info_id=".$rss['id']."\">Read More</a>";
						echo $string;
					}
					else
					echo $string;
					echo '</p>';
					echo "<a href=\"course_details.php?info_id=".$rss['id']."\" class='btn btn-warning card-link'>View Info</a>";
                    echo "</p>
                    </li>
				    </ul>"; 
			       echo '</div></div>';				
				echo '</div>';
				
				}}
				}}}				
				}}}
				
			  ?>  
		   
		   </div>
			</div>
		  </div>
		  </div>
		   <div class="col-md-4">	
		   <div class="card sticky-top" >
			<div class="card-body">
			<div class='box-header with-border'><h5 class="card-title"> 
			<i class="fa fa-newspaper-o"></i> Enroll</h5>
			<p><h6 class="card-subtitle mb-2 text-muted">This is masterlist of all courses held by organizer</h6></p>
			</div>
			    <div class="box-body box-profile">
				
			 <?php
				$sqlv= "SELECT * FROM latest_information, latest_information_participant WHERE
				latest_information.id=latest_information_participant.info_id 
				AND latest_information_participant.no= $no
				";
				
    			$pfilearray=array();
				$index=0;
          
				if($result3 = mysqli_query($db,$sqlv)){
				if(mysqli_num_rows($result3) > 0){
				while(($rs=mysqli_fetch_assoc($result3)))
				{
				$now = date("m/d/Y");
				$date =  $rs['date'];	
				$index++;
			    $id = $rs['id'];
				$string = $rs['description'];
				$string = strip_tags($string);
				
				echo '&nbsp'.'<div class="card" style="width:100%;" ></a>';
				echo '</a><div class="card-body">';
				if($rs['image_banner']!=''){
	            echo "<div><img class='card-img-top' alt='Program Banner' src='../admin/banner/".$rs['image_banner']."' style='width:100%;height:150px;object-fit: cover;'/></div>";
				}
				 
				echo "<ul class='products-list product-list-in-box'>
                <li class='item'>";
                    echo "<div>";
                    echo "<div class=''><h1 class='card-title'>"; echo $rs['title'].'';
					echo"</a></h1></div>";
                   	echo"<h6 class='card-subtitle mb-2 text-muted'>";
					echo $rs['date'];
                    echo '<p>'.$rs['venue'].'</p>';   
                    echo "</h6>";
					echo"<p class='card-text text-justify'>";
					//echo $rs['description'];
				    echo '<a data-toggle="collapse" href="#test-block" aria-expanded="true" aria-controls="test-block">Read More</a>';
					echo '<div id="test-block" class="collapse"><div class="card-block  text-justify">'.$string.'</div></div>';

					echo '</p>';
				    echo "<a href=\"registration_delete.php?info_id=".$rs['info_id']."\"  class='btn btn-warning card-link'>Unenroll</a>";
                    echo "</div></li></ul>";
				    echo '</div>';
				echo '</div>';	 
				
				
				}}}
				?> 
		</div>
			</div>
		  </div>
		  </div>			  
		  </div>			  
		
				</div>
				</div>
				
		</section>
    <!-- Main content -->
   
    <!-- /.content -->
  </div>
  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
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
  });
     $(document).ready(function()
                     {
        $("#fetchval").on('change',function()
                         {
            var keyword = $(this).val();
            $.ajax(
            {
                url:'fetch.php',
                type:'POST',
                data:'request='+keyword,
                
                beforeSend:function()
                {
                    $("#table-container").html('Working...');
                    
                },
                success:function(data)
                {
                    $("#table-container").html(data);
                },
            });
        });
    });
</script>
</body>
</html>
