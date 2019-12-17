<?php
session_start();
include('connection/config.php');
$no = $_SESSION['no'];


$sql = "SELECT * FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);

$sqlProfile = "SELECT personal_info.id FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$resultProfile = mysqli_query($db, $sqlProfile);
$rowProfile = mysqli_fetch_array($resultProfile);
$preference = $row['preference'];
$name = $row['name'];
$preference = $row['preference'];
	
/*$sqls1 = "SELECT * FROM child_reg GROUP BY id";
$results1 = mysqli_query($db, $sqls1);
$rowss = mysqli_fetch_array($results1);

$child = $rowss['no']; */

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
  <title>MYRAS</title>
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
    <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->

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
</style>
<body class="hold-transition skin-yellow layout-top-nav">
<div class="wrapper">
  <header class="main-header">
  <!-- Logo -->
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar">
	<!-- <a href="main.php" class="logo">
      <span class="logo-mini"><b>U</b>maker</span>
      <span class="logo-lg"><b>Uni</b>maker</span></span>
    </a>-->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
	  <li class="home-menu">
		  <a href="main.php">
              <i class="fa fa-home fa-fw"></i>
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
                  <!--<small>Toris Sdn.Bhd</small>-->
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
	<section class="content-header">
		<h3>
          <b>IDEA Innovation Development Centre</b>
          <br/>
        </h3>
    </section>
	 <section class="content">
		<div class="row">  
	     <!--<div class="col-md-3 align-self-baseline" style="background-color: rgba(255,0,0,0.1);">-->	
	     <div class="col-md-3">	
          <!-- Profile Image -->
            <div class="box box-warning">
              <div class="box-body box-profile">
                  <!--<img class="profile-user-img img-responsive img-circle" src="asset/images/me.jpg" alt="User profile picture" height="125" width="125">-->
				<?php if ($row['image'] == ''){
			   echo "<img class='profile-user-img img-responsive img-circle' alt='User profile picture' id='blah' src='assets/img/user.png' width='125' height='125'/>";}
               else{
			   echo "<img class='profile-user-img img-responsive img-circle' alt='User profile picture' id='blah' src='uploads/".$row['image']."' width='125' height='125'/>";}?>
           
                  <h3 class="profile-username text-center"><?php echo $row['name']; ?></h3>
                  <p class="text-muted text-center"><?php //echo $row['zone']; ?></p>
                 <!-- <p class="text-center"><a href="profile_details.php?id=<?php echo $rowProfile['id']; ?>" class="text-center"><b>Personal Information</b></a></p>-->
                    <hr>
                    <!-- /.box-header -->
                    <div class="box-body">

                      <strong><i class="fa fa-map-marker"></i> Address</strong>
                      <p class="text-muted"><?php echo $row['address']; ?></p>
                      <hr>

                      <strong><i class="fa fa-phone"></i> Phone Number</strong>
                      <p class="text-muted"><?php echo $row['phone']; ?></p>
                      <hr>

                      <strong><i class="fa fa-envelope"></i> Email</strong>
                      <p class="text-muted"><?php echo $row['email']; ?></p>
                      <hr>
                      <a href="profile_details.php?id=<?php echo $rowProfile['id']; ?>" class="btn btn-warning btn-block"><b>Profile Details</b></a>
                    </div>
              </div>
            </div>
            </div> 
		  
		   <div class="col-md-5">	
		   <div class="card sticky-top" >
			<div class="card-body"><h5 class="card-title"> <i class="fa fa-newspaper-o"></i> Latest Activity</h5>
			<p><h6 class="card-subtitle mb-2 text-muted">This is masterlist of all activities held by organizer</h6></p>
			</div>
		  </div>
		  <br/>
		
           <!-- Aktiviti Pembangunan -->

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

					
				if($id1!=$id2 && $name1!=$name2 && $Year==$getYear && $val == $rss['preference']){		
				echo '<div class="card" ></a><div class="card-body">';
				if($rs['image_banner']!=''){
	            echo "<img class='card-img-top' alt='Program Banner' src='admin/banner/".$rs['image_banner']."' style='width:100%; height:400px;'/>";
				}
				echo "<ul class='products-list product-list-in-box'>
                <li class='item'>";
                    echo "<h5 class='card-title'>".$rs['title'].'';
                    //echo "<h5 class='card-title'><a href=\"info_details.php?info_id=".$rss['id']."\" class='product-title'>"; echo $rs['title'].'';
					//echo"<span class='glyphicon glyphicon-info-sign pull-right'></a></span></h5>";
					echo"</a></h5>";
                   	echo"<h6 class='card-subtitle mb-2 text-muted'>";
					echo $rs['date'];
                    echo '<p>'.$rs['venue'].'</p>';   
                    echo "</h6>";
					echo"<p class='card-text'>";
					echo $rs['description'];
					echo '</p>';
					echo "<a href=\"info_details.php?info_id=".$rss['id']."\" class='btn btn-warning card-link'>View More</a>";
                    echo "</p>
                    </li>
				    </ul>"; 
			       echo '</div></div></br>';				
				}}
				}}}				
				}}}
				
			  ?> 

              <?php
		        echo '<div class="box box-primary invisible">';
		        $index=0;
		        $sqlv= "SELECT * FROM latest_information WHERE preference='$preference'";
			   if($result3 = mysqli_query($db,$sqlv)){
				if(mysqli_num_rows($result3) > 0){
				while(($rs=mysqli_fetch_assoc($result3)))
				{
				$now = date("m/d/Y");
				$date =  $rs['date'];	
				$index++;
			    $id = $rs['id'];
				echo $index; 
				echo '<br/>';
				echo $rs['title']; 
			    echo '<br/>';
				 }}}
			     echo '</div>';
		  ?>
          
            </div> 
            <div class="col-md-4">	
		    <div class="card sticky-top" >
			<div class="card-body"><h5 class="card-title"> <i class="fa fa-bullhorn"></i> Activity Join</h5>
			<p><h6 class="card-subtitle mb-2 text-muted">This is masterlist of all activities attend by user </h6></p>
			</div>
		    </div>
		    <br/>
			</div>
	        <!-- Activity Join -->
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
				echo '<div class="col-md-2"><div class="card" style="width: 20rem; height:160px;" ></a><div class="card-deck"><div class="card-body">';	
				echo "<ul class='products-list product-list-in-box'>
                <li class='item'>";
                    echo "<div>";
                    //echo "<div class=''><h12 class='card-title1'><a href=\"info_details_registration.php?info_id=".$rs['info_id']."\" class='product-title'>"; echo $rs['title'].'';
                    echo "<div class=''><h1 class='card-title'>"; echo $rs['title'].'';
					echo"</a></h1></div>";
                   	echo"<h6 class='card-subtitle mb-2 text-muted'>";
					echo $rs['date'];
                    echo '<p>'.$rs['venue'].'</p>';   
                    echo "</h6>";
					//echo"<p class='card-text'>";
					//echo $rss['id'].'</p>';
				    //echo'<div class="card-block d-flex flex-column">';
				    echo "<a href=\"registration_delete.php?info_id=".$rs['info_id']."\" style='position:absolute; bottom:0;  margin-bottom:25px;' class='btn btn-warning card-link'>Dismiss</a>";
					//echo'</div>';
                    echo "</div></li></ul>";
				    echo '</div></div></div><br/>';
					 echo'</div>';
				}}}
				
					/*$results3 = mysqli_query($db, $sqlv);
					$rows3 = mysqli_fetch_array($results3);
					if ($rows3['no']!=''){
						
					$sqlv= "SELECT * FROM personal_info WHERE no!='$no'
					AND level!='admin'";
					$result4 = mysqli_query($db,$sqlv);
					$rowsViews = mysqli_fetch_array($result4);
					$nums = mysqli_num_rows($result4);
					$pfilearray=array();
			 
					if($result4 = mysqli_query($db,$sqlv)){
					if(mysqli_num_rows($result4) > 0){
					while(($rs2 = mysqli_fetch_assoc($result4)))
					{
					echo'
					<div class="col-md-4">
					<div class="box box-primary">
					<div class="box-header with-border">
					<h3 class="box-title">Connection List</h3> 
					</a>              
					</div>
					<div class="box-body">
					<table id="example1" class="table">
					<thead>
					<tr>
					  <th></th>
					</tr>
					</thead>
					<tbody>	';
					$id = $rs2['id'];
					echo '<tr>
					<td>
					  <ul class="products-list">
					  <li class="item">
					  <div class="product-img">';
					  if ($rs2['image']==''){
					  echo'<span><img class="img-circle img-bordered-sm" src="assets/img/user.png" alt="user image"></span>';}
					  else{
					  echo'<span><img class="img-circle img-bordered-sm" src="uploads/'.$rs2['image'].'" alt="user image"></span>';}
					  echo '</div>';
					  echo '<div class="product-info"><p></p><p>';echo "<a href='profile_details.php?id=$id' class='product-title'>"; echo $rs2['name'];
					  echo'</p></a>
					  </li>
					  </ul></td>
					</tr>';
					echo' </tfoot>
				  </table>
				</div>
				</div>
				</div>
				</div>';
					}}}
						
				}*/
			?>
			 
	</div>
	</section>
	</div>

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
	$('#example2').DataTable()
  })
</script>
</body>
</html>