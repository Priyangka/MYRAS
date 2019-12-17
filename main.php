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
$category = $row['category'];
$name = $row['name'];

$sqls = "SELECT * FROM latest_information WHERE preference = '$preference' GROUP BY id";
$results = mysqli_query($db, $sqls);
$rows = mysqli_fetch_array($results);
$id1 = $rows['id'];

$sqlz = "SELECT * FROM vacancy WHERE category = '$category' GROUP BY id";
$results1 = mysqli_query($db, $sqlz);
$rows1 = mysqli_fetch_array($results1);
$id11 = $rows1['id'];
$company_id = $rows1['company_id'];

$sqls2 = "SELECT * FROM vacancy,company WHERE vacancy.company_id=company.id AND vacancy.company_id='$company_id'";
$results2 = mysqli_query($db, $sqls2);
$rows2 = mysqli_fetch_array($results2);

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


.label {
  color: white;
  padding: 8px;
  font-family: Arial;
}
.success {background-color: #4CAF50;} /* Green */
.info {background-color: #2196F3;} /* Blue */
.warning {background-color: #ff9800;} /* Orange */
.danger {background-color: #f44336;} /* Red */ 
.other {background-color: #e7e7e7; color: black;} /* Gray */ 

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
          <b>GCP- Global Certification Program : Job Vacancy</b>
          <br/>
        </h3>
    </section>
	 
		<div class="row">  	
		 
		    <div class="col-md-8">	
		   <div class="card sticky-top" >
			<div class="card-body"><div class='box-header with-border'>
			<h5 class="card-title"> <i class="fa fa-newspaper-o"></i> Related Job Vacancy</h5>
			<p><h6 class="card-subtitle mb-2 text-muted">This is masterlist of related job vacancy provided by employer</h6></p>
			</div>
			</div>
		   <div class="box-body box-profile">
       <?php
			    if($results = mysqli_query($db,$sqlz)){
				if(mysqli_num_rows($results) > 0){
				while(($rss=mysqli_fetch_assoc($results))){
				$id = $rss['id'];

			    //echo $title;
				$i = 0;
				$arraydata = $row['category'];
			    $arr=explode(',',$arraydata);
				
				$sqlv = "SELECT * FROM vacancy,personal_info
				WHERE vacancy.category=personal_info.category 
			    AND personal_info.id = '$no'
				AND vacancy.id='$id'
				GROUP BY vacancy.id desc";	
					  
				$sqls1 = "SELECT * FROM vacancy_participant WHERE name='$name' AND vacancy_id='$id'";
				
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
			    $id2 = $rows1['vacancy_id'];
				
				$date = $rss['date'];
				$year = strtotime($date);
				$getYear = date("Y", $year);
				$Year = date("Y");
				$string = $rs['description'];
				$string = strip_tags($string);
								
				if($id1!=$id2 && $name1!=$name2 && $Year==$getYear && $val == $rss['category']){	
				
				echo'<div class="col-md-6">';
				echo'<br/><div class="card pull-left"style="width:100%;height:300;"></a><div class="card-body">';
				if($rows2['company_banner']!=''){
	            echo "<img class='card-img-top' alt='Program Banner' src='manager/company/".$rows2['company_banner']."' style='width:100%;height:150px;object-fit: cover;'/>";
				}
				echo "<ul class='products-list product-list-in-box'>
                <li class='item'>";
                    echo "<h5 class='card-title' style='height:300;'>".$rs['position'].'';
  					echo"</a></h5>";
                   	echo"<h6 class='card-subtitle mb-2 text-muted'>";
					echo $rs['salary'];
                    echo '<p>'.$rs['company'].'</p>';   
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
						$string .= ".. <a href=\"info_details.php?info_id=".$rss['id']."\">Read More</a>";
						echo $string;
					}
					else
					echo $string;
					echo '</p>';
					echo "<a href=\"vacancy_details.php?info_id=".$rss['id']."\" class='btn btn-warning card-link'>View Job</a>";
                    echo "</p>
                    </li>
				    </ul>"; 
			       echo '</div></div>';				
				echo '</div>';
				
				}


				else
				{  //remove  space			
			

				}
			}
				}}}				
				}}}
				
			  ?> 
		     </div>
		  </div>
		  </div>
		 


		   <div class="col-md-4">	
		   <div class="card sticky-top" >
			<div class="card-body">
			<div class='box-header with-border'>
			<h5 class="card-title"> <i class="fa fa-newspaper-o"></i> Job Application</h5>
			<p><h6 class="card-subtitle mb-2 text-muted">This is masterlist of all job application applied by user</h6></p>
			</div>
			<div class="box-body box-profile">
			<?php
				$sqlv= "SELECT * FROM vacancy, vacancy_participant 
				WHERE vacancy.id=vacancy_participant.vacancy_id 
				AND vacancy_participant.no= $no
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
				$status= $rs['status'];
				
				echo '&nbsp'.'<div class="card" style="width:100%;" ></a>';
				echo '</a><div class="card-body">';
				if($rows2['company_banner']!=''){
	            echo "<img class='card-img-top' alt='Program Banner' src='manager/company/".$rows2['company_banner']."' style='width:100%;height:150px;object-fit: cover;'/>";
				}
				echo "<ul class='products-list product-list-in-box'>
                <li class='item'>";
                    echo "<div>";
                    echo "<div class=''><h1 class='card-title'>"; echo $rs['position'].'';
					echo"</a></h1></div>";
                   	echo"<h6 class='card-subtitle mb-2 text-muted'>";
					echo $rs['salary'];
                    echo '<p>'.$rs['company'].'</p>';   
                    echo "</h6>";
                    echo"<p class='card-text text-justify'>";
                    if ($rs['status']=="Reviewed")
                    {echo "<span class='label info'>";echo $rs['status']; echo"</span>";}
                	else if ($rs['status']=="Accepted")
                	{echo "<span class='label success'>";echo $rs['status']; echo"</span>";}
                	else if ($rs['status']=="Rejected")
                	{echo "<span class='label danger'>";echo $rs['status']; echo"</span>";}
                    else if ($rs['status']=="NULL")
                	{echo "<span class='label other'>";echo $rs['status']; echo"</span>";}
					else if ($rs['status']=="In-Process")
                	{echo "<span class='label warning'>";echo $rs['status']; echo"</span>";}
                   echo '</p>';
                    
					echo"<p class='card-text text-justify'>";
				  
	  		        echo '<a data-toggle="collapse" class="test-block" id="test-block-".$index.$salary."" href="#test-block-'.$index.'" aria-expanded="true" aria-controls="test-block-'.$index.'" type="btn btn-warning card-link">Read More</a>';
					echo '<div id="test-block-'.$index.'" class="collapse"><div class="card-block  text-justify">'.$string.'</div></div>';

					echo '</p>';
				    echo "<a href=\"registration_winthdraw.php?info_id=".$rs['vacancy_id']."\"  class='btn btn-warning card-link'>Withdraw</a>";
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
		  <div class="row"> 


		 
		    <div class="col-md-8">	
		   <div class="card sticky-top" >
			<div class="card-body"><div class='box-header with-border'>
			<h5 class="card-title"> <i class="fa fa-newspaper-o"></i> All Job Vacancy</h5>
			<p><h6 class="card-subtitle mb-2 text-muted">This is masterlist of all job vacancy provided by employer</h6></p>
			</div>
			</div>
		   <div class="box-body box-profile">
       <?php
			    if($results = mysqli_query($db,$sqlz)){
				if(mysqli_num_rows($results) > 0){
				while(($rss=mysqli_fetch_assoc($results))){
				$id = $rss['id'];

			    //echo $title;
				$i = 0;
				$arraydata = $row['category'];
			    $arr=explode(',',$arraydata);
				
				$sqlv = "SELECT * FROM vacancy ";	
					  
				$sqls1 = "SELECT * FROM vacancy_participant";
				
				$results1 = mysqli_query($db, $sqls1);
				$rows1 = mysqli_fetch_array($results1);
				
				if($result3 = mysqli_query($db,$sqlv)){
				if(mysqli_num_rows($result3) > 0){
				while(($rs=mysqli_fetch_assoc($result3)))
				{ 
			    foreach($arr as $val) 
				{  
			   // $id1 = $rs['no'];
			    //$name1 = $rs['name'];
			    //$name2 = $rows1['name'];
			    //$id2 = $rows1['vacancy_id'];
				
				$date = $rss['date'];
				$year = strtotime($date);
				$getYear = date("Y", $year);
				$Year = date("Y");
				$string = $rs['description'];
				$string = strip_tags($string);
								
				if(  $Year==$getYear){	
				
				echo'<div class="col-md-6">';
				echo'<br/><div class="card pull-left"style="width:100%;height:300;"></a><div class="card-body">';
				if($rows2['company_banner']!=''){
	            echo "<img class='card-img-top' alt='Program Banner' src='manager/company/".$rows2['company_banner']."' style='width:100%;height:150px;object-fit: cover;'/>";
				}
				echo "<ul class='products-list product-list-in-box'>
                <li class='item'>";
                    echo "<h5 class='card-title' style='height:300;'>".$rs['position'].'';
  					echo"</a></h5>";
                   	echo"<h6 class='card-subtitle mb-2 text-muted'>";
					echo $rs['salary'];
                    echo '<p>'.$rs['company'].'</p>';   
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
						$string .= ".. <a href=\"info_details.php?info_id=".$rss['id']."\">Read More</a>";
						echo $string;
					}
					else
					echo $string;
					echo '</p>';
					echo "<a href=\"vacancy_details.php?info_id=".$rss['id']."\" class='btn btn-warning card-link'>View Job</a>";
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